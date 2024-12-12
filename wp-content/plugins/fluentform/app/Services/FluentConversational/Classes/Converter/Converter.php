<?php

namespace FluentForm\App\Services\FluentConversational\Classes\Converter;

use FluentForm\App\Helpers\Helper;
use FluentForm\Framework\Helpers\ArrayHelper;
use FluentForm\App\Modules\Component\Component;
use FluentForm\App\Services\FormBuilder\Components\DateTime;
use FluentForm\App\Modules\Form\FormFieldsParser;
use FluentFormPro\classes\DraftSubmissionsManager;

class Converter
{
    public static function convert($form)
    {
        $fields = $form->fields['fields'];
        
        $form->submit_button = $form->fields['submitButton'];
        
        $form->reCaptcha = false;
        $form->hCaptcha = false;
        $form->turnstile = false;
        $form->hasCalculation = false;
        
        $questions = [];
        
        $imagePreloads = [];
        
        $allowedFields = static::fieldTypes();
        
        $hasSaveAndResume = static::hasSaveAndResume($form);
        $saveAndResumeData = [];
        
        if ($hasSaveAndResume && ArrayHelper::get($form->settings, 'conv_form_per_step_save')) {
            $saveAndResumeData = static::getSaveAndResumeData($form);
            
            $form->stepCompleted = intval(ArrayHelper::get($saveAndResumeData, 'step_completed', 0));
        }
        
        foreach ($fields as $field) {
            $field = apply_filters_deprecated('fluentform_rendering_field_data_' . $field['element'],
                [
                    $field,
                    $form
                ],
                FLUENTFORM_FRAMEWORK_UPGRADE,
                'fluentform/rendering_field_data_' . $field['element'],
                'Use fluentform/rendering_field_data_' . $field['element'] . ' instead of fluentform_rendering_field_data_' . $field['element']
            );
            
            $field = apply_filters('fluentform/rendering_field_data_' . $field['element'], $field, $form);
            
            $validationsRules = self::resolveValidationsRules($field, $form);
            
            $question = static::buildBaseQuestion($field, $validationsRules, $form);
            
            if (!$hasSaveAndResume && $answer = self::setDefaultValue(ArrayHelper::get($field, 'attributes.value'), $field, $form)) {
                $question['answer'] = $answer;
            }
            
            if ($hasSaveAndResume && $saveAndResumeData) {
                $response = ArrayHelper::get($saveAndResumeData, 'response');
                $questionId = ArrayHelper::get($question, 'id');
                $value = ArrayHelper::get($response, $questionId);
                
                if (isset($value)) {
                    if (ArrayHelper::get($field, 'element') == 'input_file') {
                        $files = ArrayHelper::get($response, $questionId);
                        foreach ($files as $file) {
                            $question['answer'][] = ArrayHelper::get($file, 'data_src');
                        }
                    } elseif (
                        ArrayHelper::get($field, 'element') == 'rangeslider' ||
                        ArrayHelper::get($field, 'element') == 'subscription_payment_component'
                    ) {
                        $question['answer'] = +$value;
                    } else {
                        $question['answer'] = $value;
                    }
                }
            }
            
            if ('default' != ArrayHelper::get($question, 'style_pref.layout')) {
                $media = ArrayHelper::get($question, 'style_pref.media');
                if ($media) {
                    $imagePreloads[] = $media;
                }
            }
            if ('address' === $field['element']) {
                if ($order = ArrayHelper::get($field, 'settings.field_order')) {
                    $order = array_values(array_column($order, 'value'));
                    $fields = ArrayHelper::get($field, 'fields');
                    $field['fields'] = array_merge(array_flip($order), $fields);
                }
                $googleAutoComplete = 'yes' === ArrayHelper::get($field, 'settings.enable_g_autocomplete');
                if (defined('FLUENTFORMPRO') && $googleAutoComplete) {
                    $question['ff_map_autocomplete'] = true;
                    $question['ff_with_g_map'] = 'yes' == ArrayHelper::get($field, 'settings.enable_g_map');
                    $question['ff_with_auto_locate'] = ArrayHelper::get($field, 'settings.enable_auto_locate', false);
                    $question['GmapApiKey'] = apply_filters('fluentform/conversational_form_address_gmap_api_key', '');
                }
                
                foreach ($field['fields'] as $item) {
                    if ($item['settings']['visible']) {
                        $itemName = ArrayHelper::get($item, 'attributes.name');
                        if ($parentName = ArrayHelper::get($question, 'name')) {
                            $itemName = $parentName . '.' . $itemName;
                        }
                        $validationsRules = self::resolveValidationsRules($item, $form, $itemName);
                        $itemQuestion = [
                            'title'           => ArrayHelper::get($item, 'settings.label'),
                            'container_class' => ArrayHelper::get($item, 'settings.container_class'),
                            'required'        => ArrayHelper::get($validationsRules, 'required.value'),
                            'requiredMsg'     => ArrayHelper::get($validationsRules, 'required.message'),
                            'errorMessage'    => ArrayHelper::get($validationsRules, 'required.message'),
                            'validationRules' => $validationsRules,
                            'conditional_logics'   => self::parseConditionalLogic($item),
                        ];
                        if ('select_country' === $item['element']) {
                            $countryComponent = new \FluentForm\App\Services\FormBuilder\Components\SelectCountry();
                            $item = $countryComponent->loadCountries($item);
                            $activeList = ArrayHelper::get($item, 'settings.country_list.active_list');
                            if ('priority_based' == $activeList) {
                                $selectCountries = ArrayHelper::get($item, 'settings.country_list.priority_based', []);
                                $priorityCountries = $countryComponent->getSelectedCountries($selectCountries);
                                $item['options'] = array_merge($priorityCountries, $item['options']);
                            }
                            
                            if ('visible_list' === $activeList && $googleAutoComplete) {
                                $restrictionCountries = (array) ArrayHelper::get($item, 'attributes.value', []);
                                $restrictionCountries = array_unique(
                                    array_merge(
                                        $restrictionCountries,
                                        ArrayHelper::get($item, 'settings.country_list.visible_list', [])
                                    )
                                );
                                $question['autocomplete_restrictions'] = array_filter($restrictionCountries);
                            }
                            
                            $options = [];
                            $countries = $item['options'];
                            foreach ($countries as $key => $value) {
                                $options[] = [
                                    'label' => $value,
                                    'value' => $key,
                                ];
                            }
                            $item['type'] = 'FlowFormTextType';
                            $item['options'] = $options;
                        }
                        if ($itemQuestion['required']) {
                            $question['requiredFields'][] = [
                                "name"         => ArrayHelper::get($item, 'attributes.name', ''),
                                'requiredMessage'  => ArrayHelper::get($itemQuestion, 'requiredMsg')
                            ];
                            $question['required'] = true;
                        }
                        
                        if (!$hasSaveAndResume && $defaultValue = self::setDefaultValue(ArrayHelper::get($item, 'attributes.value'), $item, $form)) {
                            $item['attributes']['value'] = $defaultValue;
                        }
                        $question['fields'][] = wp_parse_args($itemQuestion, $item);
                    }
                }
            } elseif ('input_name' === $field['element']) {
                
                foreach ($field['fields'] as $item) {
                    if ($item['settings']['visible']) {
                        $itemName = ArrayHelper::get($item, 'attributes.name');
                        if ($parentName = ArrayHelper::get($question, 'name')) {
                            $itemName = $parentName . '.' . $itemName;
                        }
                        $validationsRules = self::resolveValidationsRules($item, $form, $itemName);
                        $itemQuestion = [
                            'title'           => ArrayHelper::get($item, 'settings.label'),
                            'container_class' => ArrayHelper::get($item, 'settings.container_class'),
                            'required'        => ArrayHelper::get($validationsRules, 'required.value'),
                            'requiredMsg'     => ArrayHelper::get($validationsRules, 'required.message'),
                            'errorMessage'    => ArrayHelper::get($validationsRules, 'required.message'),
                            'validationRules' => $validationsRules,
                            'conditional_logics'   => self::parseConditionalLogic($item),
                        ];
                        if ($itemQuestion['required']) {
                            $question['requiredFields'][] = [
                                "name"         => ArrayHelper::get($item, 'attributes.name', ''),
                                'requiredMessage'  => ArrayHelper::get($itemQuestion, 'requiredMsg', '')
                            ];
                            $question['required'] = true;
                        }
                        
                        $item['attributes']['value'] = (new Component(wpFluentForm()))->replaceEditorSmartCodes(ArrayHelper::get($item, 'attributes.value'), $form);
                        
                        $question['fields'][] = wp_parse_args($itemQuestion, $item);
                    }
                }
            } elseif ('input_text' === $field['element']) {
                $mask = ArrayHelper::get($field, 'settings.temp_mask');
                
                $mask = 'custom' === $mask ? ArrayHelper::get($field, 'attributes.data-mask') : $mask;
                
                if ($mask) {
                    $question['mask'] = $mask;
                }
            } elseif ('welcome_screen' === $field['element']) {
                $question['settings'] = ArrayHelper::get($field, 'settings', []);
                $question['subtitle'] = ArrayHelper::get($field, 'settings.description');
                $question['required'] = false;
                //				$question['css'] = (new \FluentConversational\Form)->getSubmitBttnStyle($field);
            } elseif ('select' === $field['element']) {
                $question['options'] = self::getAdvancedOptions($field);
                $question['placeholder'] = ArrayHelper::get($field, 'settings.placeholder', null);
                $question['searchable'] = ArrayHelper::get($field, 'settings.enable_select_2');
                $isMultiple = ArrayHelper::get($field, 'attributes.multiple', false);
                
                if ($isMultiple) {
                    $question['multiple'] = true;
                    $question['placeholder'] = ArrayHelper::get($field, 'attributes.placeholder', false);
                    $question['max_selection'] = ArrayHelper::get($field, 'settings.max_selection');
                    $question['max_selection'] = $question['max_selection'] ? intval($question['max_selection']) : 0;
                }
            } elseif ('select_country' === $field['element']) {
                $countryComponent = new \FluentForm\App\Services\FormBuilder\Components\SelectCountry();
                $field = $countryComponent->loadCountries($field);
                $activeList = ArrayHelper::get($field, 'settings.country_list.active_list');
                if ('priority_based' == $activeList) {
                    $selectCountries = ArrayHelper::get($field, 'settings.country_list.priority_based', []);
                    $priorityCountries = $countryComponent->getSelectedCountries($selectCountries);
                    // @todo : add opt group in conversation js
                    $question['has_opt_grp'] = true;
                    $primaryListLabel = ArrayHelper::get($field, 'settings.primary_label');
                    $otherListLabel = ArrayHelper::get($field, 'settings.other_label');
                    $field['options'] = array_merge($priorityCountries, $field['options']);
                }
                
                $options = [];
                $countries = $field['options'];
                foreach ($countries as $key => $value) {
                    $options[] = [
                        'label' => $value,
                        'value' => $key,
                    ];
                }
                $question['options'] = $options;
                $question['placeholder'] = ArrayHelper::get($field, 'attributes.placeholder', null);
                $question['searchable'] = ArrayHelper::get($field, 'settings.enable_select_2');
            } elseif ('dynamic_field' === $field['element']) {
                $dynamicFetchValue = 'yes' == ArrayHelper::get($field, 'settings.dynamic_fetch');
                if ($dynamicFetchValue) {
                    $field = apply_filters('fluentform/dynamic_field_re_fetch_result_and_resolve_value', $field);
                    $question['answer'] = ArrayHelper::get($field, 'attributes.value');
                }
                $type = ArrayHelper::get($field, 'settings.field_type', 'select');
                if (in_array($type, ['checkbox', 'radio'])) {
                    $question['type'] = 'FlowFormMultipleChoiceType';
                    $question['options'] = self::getAdvancedOptions($field);
                    if ('checkbox' == $type) {
                        $question['multiple'] = true;
                    }
                } elseif (in_array($type, ['select', 'multi_select'])) {
                    $question['type'] = 'FlowFormDropdownType';
                    $question['options'] = self::getAdvancedOptions($field);
                    $question['searchable'] = ArrayHelper::get($field, 'settings.enable_select_2');
                    $question['multiple'] = ArrayHelper::isTrue($field, 'attributes.multiple');
                } else {
                    continue;
                }
                $question['nextStepOnAnswer'] = true;
            } elseif ('input_checkbox' === $field['element']) {
                $question['options'] = self::getAdvancedOptions($field);
                $question['multiple'] = true;
                $question = static::hasPictureMode($field, $question);
            } elseif ('input_radio' === $field['element']) {
                $question['options'] = self::getAdvancedOptions($field);
                $question['nextStepOnAnswer'] = true;
                $question = static::hasPictureMode($field, $question);
            } elseif ('custom_html' === $field['element']) {
                $question['content'] = ArrayHelper::get($field, 'settings.html_codes', '');
            } elseif ('section_break' === $field['element']) {
                $question['content'] = ArrayHelper::get($field, 'settings.description', '');
                $question['contentAlign'] = ArrayHelper::get($field, 'settings.align', '');
            } elseif ('phone' === $field['element']) {
                if (defined('FLUENTFORMPRO')) {
                    $question['phone_settings'] = self::getPhoneFieldSettings($field, $form);
                    
                    if ($question['phone_settings']['enabled']) {
                        $cssSource = FLUENTFORMPRO_DIR_URL . 'public/libs/intl-tel-input/css/intlTelInput.min.css';
                        if (is_rtl()) {
                            $cssSource = FLUENTFORMPRO_DIR_URL . 'public/libs/intl-tel-input/css/intlTelInput-rtl.min.css';
                        }
                        wp_enqueue_style('intlTelInput', $cssSource, [], '18.1.1');
                        wp_enqueue_script('intlTelInputUtils', FLUENTFORMPRO_DIR_URL . 'public/libs/intl-tel-input/js/utils.js', [], '18.1.1', true);
                        wp_enqueue_script('intlTelInput', FLUENTFORMPRO_DIR_URL . 'public/libs/intl-tel-input/js/intlTelInput.min.js', [], '18.1.1', true);
                    }
                }
            } elseif ('input_number' === $field['element']) {
                $question['min'] = ArrayHelper::get($field, 'settings.validation_rules.min.value');
                $question['max'] = ArrayHelper::get($field, 'settings.validation_rules.max.value');
                $question['min'] = is_numeric($question['min']) ? $question['min'] : null;
                $question['max'] = is_numeric($question['max']) ? $question['max'] : null;
                $question['is_calculable'] = true;
                
                if (!$form->hasCalculation) {
                    $form->hasCalculation = static::hasFormula($question);
                }
                
                do_action_deprecated(
                    'ff_rendering_calculation_form',
                    [
                        $form,
                        $field
                    ],
                    FLUENTFORM_FRAMEWORK_UPGRADE,
                    'fluentform/rendering_calculation_form',
                    'Use fluentform/rendering_calculation_form instead of ff_rendering_calculation_form'
                );
                
                do_action('fluentform/rendering_calculation_form', $form, $field);
            } elseif (in_array($field['element'], ['terms_and_condition', 'gdpr_agreement'])) {
                $question['options'] = [
                    [
                        'label' => ArrayHelper::get($field, 'settings.tc_agree_text', 'I accept'),
                        'value' => 'on',
                    ],
                ];
                
                if ('terms_and_condition' === $field['element']) {
                    $question['options'][] = [
                        'label' => ArrayHelper::get($field, 'settings.tc_dis_agree_text', 'I don\'t accept'),
                        'value' => 'off',
                    ];
                }
                
                $question['nextStepOnAnswer'] = true;
                $question['title'] = ArrayHelper::get($field, 'settings.tnc_html');
                if ('gdpr_agreement' === $field['element']) {
                    $question['required'] = true;
                }
            } elseif ('ratings' === $field['element']) {
                $question['show_text'] = ArrayHelper::get($field, 'settings.show_text');
                $question['rateOptions'] = ArrayHelper::get($field, 'options', []);
                $question['nextStepOnAnswer'] = true;
            } elseif ('input_date' === $field['element']) {
                $app = wpFluentForm();
                $dateField = new DateTime();
                
                wp_enqueue_style('flatpickr', fluentFormMix('libs/flatpickr/flatpickr.min.css'));
                wp_enqueue_script('flatpickr', fluentFormMix('libs/flatpickr/flatpickr.min.js'), [], false, true);
                
                $question['dateConfig'] = json_decode($dateField->getDateFormatConfigJSON($field['settings'], $form));
                $question['dateCustomConfig'] = $dateField->getCustomConfig($field['settings']);
            } elseif (in_array($field['element'], ['input_image', 'input_file'])) {
                $question['multiple'] = true;
                
                $maxFileCount = ArrayHelper::get($field, 'settings.validation_rules.max_file_count');
                $maxFileSize = ArrayHelper::get($field, 'settings.validation_rules.max_file_size');
                
                if ('input_image' === $field['element']) {
                    $allowedFieldTypes = ArrayHelper::get($field, 'settings.validation_rules.allowed_image_types.value');
                    
                    $question['validationRules']['allowed_file_types'] = $question['validationRules']['allowed_image_types'];
                } else {
                    $allowedFieldTypes = ArrayHelper::get($field, 'settings.validation_rules.allowed_file_types.value');
                }
                
                if ($maxFileCount) {
                    $question['max'] = $maxFileCount['value'];
                }
                
                if ($maxFileSize) {
                    $question['maxSize'] = $maxFileSize['value'];
                }
                
                if ($allowedFieldTypes) {
                    $question['accept'] = implode('|', $allowedFieldTypes);
                }
            } elseif ('tabular_grid' === $field['element']) {
                $question['grid_columns'] = $field['settings']['grid_columns'];
                $question['grid_rows'] = $field['settings']['grid_rows'];
                $question['selected_grids'] = $field['settings']['selected_grids'];
                $question['multiple'] = 'checkbox' === $field['settings']['tabular_field_type'];
                
                if ($field['settings']['selected_grids']) {
                    $rowValues = array_keys($question['grid_rows']);
                    $colValues = array_keys($question['grid_columns']);
                    
                    foreach ($field['settings']['selected_grids'] as $selected) {
                        if (in_array($selected, $rowValues)) {
                            $question['answer'][$selected] = $colValues;
                        } else {
                            foreach ($rowValues as $rowValue) {
                                if ($question['multiple']) {
                                    $question['answer'][$rowValue][] = $selected;
                                } else {
                                    $question['answer'][$rowValue] = $selected;
                                }
                            }
                        }
                    }
                }
                
                $question['requiredPerRow'] = ArrayHelper::get($field, 'settings.validation_rules.required.per_row');
            } elseif ('rangeslider' === $field['element']) {
                if (!ArrayHelper::exists($question, 'answer')) {
                    if ($field['attributes']['value'] == '') {
                        $question['answer'] = 0;
                    } else {
                        $question['answer'] = +$field['attributes']['value'];
                    }
                }
                
                $question['min'] = intval($field['attributes']['min']);
                $question['max'] = intval($field['attributes']['max']);
                
                if ($step = ArrayHelper::get($field, 'settings.number_step')) {
                    $question['step'] = intval($step);
                } else {
                    $question['step'] = 1;
                }
                
                $question['is_calculable'] = true;
                $question['type'] = 'FlowFormRangesliderType';
            } elseif ('save_progress_button' === $field['element']) {
                $question['id'] = 'save_and_resume-' . ArrayHelper::get($field, 'uniqElKey');
                $question['name'] = ArrayHelper::get($field, 'uniqElKey');
                $question['title'] = ArrayHelper::get($field, 'editor_options.title');
                $question['settings'] = ArrayHelper::get($field, 'settings');
                
                $vars = apply_filters('fluentform/save_progress_vars', [
                    'ajaxurl'                   => admin_url('admin-ajax.php'),
                    'sourceurl'                 => home_url($_SERVER['REQUEST_URI']),
                    'form_id'                   => $form->id,
                    'nonce'                     => wp_create_nonce(),
                    'copy_button'               => fluentFormMix('img/copy.svg'),
                    'copy_success_button'       => fluentFormMix('img/check.svg'),
                    'email_button'              => fluentFormMix('img/email.svg'),
                    'email_placeholder_str'     => __('Your Email Here', 'fluentformpro'),
                    'email_resume_link_enabled' => false
                ]);
                
                if (ArrayHelper::get($field, 'settings.email_resume_link_enabled')) {
                    $vars['email_resume_link_enabled'] = true;
                }
                
                wp_localize_script('fluent_forms_conversational_form', 'form_state_save_vars', $vars);
            } elseif ('multi_payment_component' === $field['element']) {
                $type = $field['attributes']['type'];
                
                if ('single' == $type) {
                    $question['priceLabel'] = $field['settings']['price_label'];
                } else {
                    $question['nextStepOnAnswer'] = true;
                    
                    if ('radio' == $type || 'checkbox' == $type) {
                        $question['paymentType'] = 'MultipleChoiceType';
                        $question['type'] = 'FlowFormMultipleChoiceType';
                        $question = static::hasPictureMode($field, $question);
                        
                        if ('checkbox' == $type) {
                            $question['multiple'] = true;
                        }
                    } else {
                        $question['paymentType'] = 'DropdownType';
                        $question['type'] = 'FlowFormDropdownType';
                    }
                    
                    $question['options'] = ArrayHelper::get($field, 'settings.pricing_options');
                }
                
                $question['is_payment_field'] = true;
                $question['is_calculable'] = true;
            } elseif ('subscription_payment_component' === $field['element']) {
                $question['is_payment_field'] = true;
                $question['is_subscription_field'] = true;
                
                if (!$hasSaveAndResume) {
                    $question['answer'] = null;
                }
                
                $type = $field['attributes']['type'];
                $question['subscriptionFieldType'] = $type;
                $currency = \FluentFormPro\Payments\PaymentHelper::getFormCurrency($form->id);
                
                foreach ($field['settings']['subscription_options'] as $index => &$option) {
                    $hasCustomPayment = false;
                    
                    if (array_key_exists('user_input', $option) && 'yes' == $option['user_input']) {
                        $hasCustomPayment = true;
                        $option['subscription_amount'] = 0;
                        
                        if (array_key_exists('user_input_default_value', $option)) {
                            $option['subscription_amount'] = $option['user_input_default_value'];
                        }
                    }
                    
                    $paymentSummaryText = \FluentFormPro\Payments\PaymentHelper::getPaymentSummaryText($option, $form->id, $currency, false);
                    
                    $planValue = 'single' == $type ? $option['subscription_amount'] : $index;
                    
                    $field['plans'][] = [
                        'label'               => $option['name'],
                        'value'               => $planValue,
                        'sub'                 => strip_tags($paymentSummaryText),
                        'subscription_amount' => $planValue,
                    ];
                    
                    $option['sub'] = strip_tags($paymentSummaryText);
                    
                    if ('yes' == $option['is_default'] && !$hasSaveAndResume) {
                        $question['answer'] = $index;
                    }
                    
                    if ($hasCustomPayment) {
                        $option['customInput'] = $question['name'] . '_custom_' . $index;
                        
                        if ($hasSaveAndResume && $saveAndResumeData) {
                            if ($customPayment = ArrayHelper::get($saveAndResumeData, 'response.' . $option['customInput'])) {
                                $question['customPayment'] = $customPayment;
                            }
                        } else {
                            $question['customPayment'] = $option['subscription_amount'];
                        }
                    }
                }
                
                $question['plans'] = $field['settings']['subscription_options'];
                
                if ('single' != $type) {
                    $question['options'] = $field['plans'];
                    $question['subscriptionFieldType'] = 'radio' == $field['settings']['selection_type'] ? 'FlowFormMultipleChoiceType' : 'FlowFormDropdownType';
                    $question['nextStepOnAnswer'] = true;
                }
            } elseif ('custom_payment_component' === $field['element']) {
                $question['type'] = 'FlowFormNumberType';
                $question['min'] = ArrayHelper::get($field, 'settings.validation_rules.min.value');
                $question['max'] = ArrayHelper::get($field, 'settings.validation_rules.max.value');
                $question['min'] = is_numeric($question['min']) ? $question['min'] : null;
                $question['max'] = is_numeric($question['max']) ? $question['max'] : null;
                
                $question['is_payment_field'] = true;
                $question['is_calculable'] = true;
                
                if (!$form->hasCalculation) {
                    $form->hasCalculation = static::hasFormula($question);
                }
                
                do_action_deprecated(
                    'ff_rendering_calculation_form',
                    [
                        $form,
                        $field
                    ],
                    FLUENTFORM_FRAMEWORK_UPGRADE,
                    'fluentform/rendering_calculation_form',
                    'Use fluentform/rendering_calculation_form instead of ff_rendering_calculation_form'
                );
                
                do_action('fluentform/rendering_calculation_form', $form, $field);
            } elseif ('item_quantity_component' === $field['element']) {
                $question['type'] = $allowedFields['input_number'];
                $question['targetProduct'] = $field['settings']['target_product'];
                
                $question['min'] = ArrayHelper::get($field, 'settings.validation_rules.min.value');
                $question['max'] = ArrayHelper::get($field, 'settings.validation_rules.max.value');
                $question['min'] = is_numeric($question['min']) ? $question['min'] : null;
                $question['max'] = is_numeric($question['max']) ? $question['max'] : null;
                $question['step'] = 1;
                $question['stepErrorMsg'] = __('Please enter a valid value. The two nearest valid values are {lower_value} and {upper_value}', 'fluentform');
            } elseif ('payment_method' === $field['element']) {
                $question['nextStepOnAnswer'] = true;
                $question['options'] = [];
                $question['paymentMethods'] = [];
                
                foreach ($field['settings']['payment_methods'] as $methodName => $paymentMethod) {
                    if ('yes' === $paymentMethod['enabled']) {
                        $question['options'][] = [
                            'label' => $paymentMethod['settings']['option_label']['value'],
                            'value' => $paymentMethod['method_value'],
                        ];
                        
                        $question['paymentMethods'][$methodName] = $paymentMethod;
                        
                        do_action_deprecated(
                            'fluentform_rendering_payment_method_' . $methodName,
                            [
                                $paymentMethod,
                                $field,
                                $form
                            ],
                            FLUENTFORM_FRAMEWORK_UPGRADE,
                            'fluentform/rendering_payment_method_' . $methodName,
                            'Use fluentform/rendering_payment_method_' . $methodName . ' instead of fluentform_rendering_payment_method_' . $methodName
                        );
                        
                        do_action(
                            'fluentform/rendering_payment_method_' . $methodName,
                            $paymentMethod,
                            $field,
                            $form
                        );
                    }
                }
            } elseif ('payment_summary_component' === $field['element']) {
                $question['title'] = __('Payment Summary', 'fluentform');
                $question['emptyText'] = $field['settings']['cart_empty_text'];
            } elseif ('recaptcha' === $field['element']) {
                $reCaptchaConfig = get_option('_fluentform_reCaptcha_details');
                $siteKey = ArrayHelper::get($reCaptchaConfig, 'siteKey');
                
                if (! $siteKey) {
                    continue;
                }
                
                $question['siteKey'] = $siteKey;
                $question['answer'] = '';
                
                $apiVersion = ArrayHelper::get($reCaptchaConfig, 'api_version', 'v2_visible');
                $apiVersion = 'v3_invisible' == $apiVersion ? 3 : 2;
                $api = 'https://www.google.com/recaptcha/api.js';
                
                $form->reCaptcha = [
                    'version' => $apiVersion,
                    'siteKey' => $siteKey,
                ];
                
                if (3 === $apiVersion) {
                    $api .= '?render=' . $siteKey;
                }
                
                wp_enqueue_script(
                    'google-recaptcha',
                    $api,
                    [],
                    FLUENTFORM_VERSION,
                    true
                );
                
                if (3 === $apiVersion) {
                    continue;
                }
            } elseif (('hcaptcha' === $field['element'])) {
                $hCaptchaConfig = get_option('_fluentform_hCaptcha_details');
                $siteKey = ArrayHelper::get($hCaptchaConfig, 'siteKey');
                
                if (! $siteKey) {
                    continue;
                }
                
                $question['siteKey'] = $siteKey;
                
                $api = 'https://js.hcaptcha.com/1/api.js';
                
                $form->hCaptcha = [
                    'siteKey' => $siteKey,
                ];
                
                wp_enqueue_script(
                    'hcaptcha',
                    $api,
                    [],
                    FLUENTFORM_VERSION,
                    true
                );
            } elseif ('turnstile' === $field['element']) {
                $turnstileConfig = get_option('_fluentform_turnstile_details');
                $siteKey = ArrayHelper::get($turnstileConfig, 'siteKey');
                $appearance = ArrayHelper::get($turnstileConfig, 'appearance', 'always');
                $theme = ArrayHelper::get($turnstileConfig, 'theme', 'auto');
                
                if (! $siteKey) {
                    continue;
                }
                
                $question['siteKey'] = $siteKey;
                $question['appearance'] = $appearance;
                $question['theme'] = $theme;
                
                $form->turnstile = [
                    'siteKey' => $siteKey,
                ];
                
                wp_enqueue_script(
                    'turnstile_conv',
                    'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit',
                    [],
                    FLUENTFORM_VERSION,
                    false
                );
            } elseif ('payment_coupon' === $field['element']) {
                if ($hasSaveAndResume && $saveAndResumeData) {
                    if ($coupons = ArrayHelper::get($saveAndResumeData, 'response.__ff_all_applied_coupons')) {
                        $question['answer'] = json_decode($coupons);
                    }
                }
            }
            
            do_action('fluentform/conversational_question', $question, $field, $form);
            
            if ($question['type']) {
                $questions[] = $question;
            }
            if ('custom_submit_button' === $field['element']) {
                $form->submit_button = $field;
            }
        }
        $form->questions = $questions;
        
        $form->image_preloads = $imagePreloads;
        
        return $form;
    }
    
    public static function convertExistingForm($form)
    {
        $formFields = json_decode($form->form_fields, true);
        $fields = $formFields['fields'];
        $formattedFields = [];
        
        if (is_array($fields) && ! empty($fields)) {
            foreach ($fields as $field) {
                $element = ArrayHelper::get($field, 'element');
                $allowedFields = array_keys(static::fieldTypes());
                if (!in_array($element, $allowedFields)) {
                    continue;
                }
                
                if (! ArrayHelper::exists($field, 'style_pref')) {
                    $field['style_pref'] = [
                        'layout'           => 'default',
                        'media'            => fluentFormGetRandomPhoto(),
                        'brightness'       => 0,
                        'alt_text'         => '',
                        'media_x_position' => 50,
                        'media_y_position' => 50,
                    ];
                }
                $formattedFields[] = $field;
            }
        }
        
        $formFields['fields'] = $formattedFields;
        
        return json_encode($formFields);
    }
    
    private static function buildBaseQuestion($field, $validationsRules, $form)
    {
        return [
            'id'              => ArrayHelper::get($field, 'attributes.name'),
            'name'            => ArrayHelper::get($field, 'attributes.name'),
            'title'           => ArrayHelper::get($field, 'settings.label'),
            'type'            => ArrayHelper::get(static::fieldTypes(), $field['element']),
            'ff_input_type'   => ArrayHelper::get($field, 'element'),
            'container_class' => ArrayHelper::get($field, 'settings.container_class'),
            'placeholder'     => ArrayHelper::get($field, 'attributes.placeholder'),
            'maxLength'       => ArrayHelper::get($field, 'attributes.maxlength'),
            'required'        => ArrayHelper::get($validationsRules, 'required.value'),
            'requiredMsg'     => ArrayHelper::get($validationsRules, 'required.message'),
            'errorMessage'    => ArrayHelper::get($validationsRules, 'required.message'),
            'validationRules' => $validationsRules,
            'tagline'         => ArrayHelper::get($field, 'settings.help_message'),
            'style_pref'      => ArrayHelper::get($field, 'style_pref', [
                'layout'           => 'default',
                'media'            => '',
                'brightness'       => 0,
                'alt_text'         => '',
                'media_x_position' => 50,
                'media_y_position' => 50,
            ]),
            'conditional_logics'   => self::parseConditionalLogic($field),
            'calculation_settings' => ArrayHelper::get($field, 'settings.calculation_settings'),
            'is_calculable'        => ArrayHelper::get($field, 'settings.calc_value_status', false),
            'has_save_and_resume'  => static::hasSaveAndResume($form)
        ];
    }
    
    public static function fieldTypes()
    {
        $fieldTypes = [
            'input_url'             => 'FlowFormUrlType',
            'input_date'            => 'FlowFormDateType',
            'input_text'            => 'FlowFormTextType',
            'input_email'           => 'FlowFormEmailType',
            'input_hidden'          => 'FlowFormHiddenType',
            'input_number'          => 'FlowFormNumberType',
            'select'                => 'FlowFormDropdownType',
            'select_country'        => 'FlowFormDropdownType',
            'textarea'              => 'FlowFormLongTextType',
            'input_password'        => 'FlowFormPasswordType',
            'custom_html'           => 'FlowFormSectionBreakType',
            'section_break'         => 'FlowFormSectionBreakType',
            'welcome_screen'        => 'FlowFormWelcomeScreenType',
            'input_checkbox'        => 'FlowFormMultipleChoiceType',
            'input_radio'           => 'FlowFormMultipleChoiceType',
            'terms_and_condition'   => 'FlowFormTermsAndConditionType',
            'gdpr_agreement'        => 'FlowFormTermsAndConditionType',
            'MultiplePictureChoice' => 'FlowFormMultiplePictureChoiceType',
            'recaptcha'             => 'FlowFormReCaptchaType',
            'hcaptcha'              => 'FlowFormHCaptchaType',
            'turnstile'             => 'FlowFormTurnstileType',
            'address'               => 'FlowFormAddressType',
            'input_name'            => 'FlowFormNameType',
            'ffc_custom'            => 'FlowFormCustomType',
        ];
        
        if (defined('FLUENTFORMPRO')) {
            $fieldTypes['phone'] = 'FlowFormPhoneType';
            $fieldTypes['input_image'] = 'FlowFormFileType';
            $fieldTypes['input_file'] = 'FlowFormFileType';
            $fieldTypes['ratings'] = 'FlowFormRateType';
            $fieldTypes['tabular_grid'] = 'FlowFormMatrixType';
            $fieldTypes['payment_method'] = 'FlowFormPaymentMethodType';
            $fieldTypes['multi_payment_component'] = 'FlowFormPaymentType';
            $fieldTypes['custom_payment_component'] = 'FlowFormPaymentType';
            $fieldTypes['item_quantity_component'] = 'FlowFormPaymentType';
            $fieldTypes['payment_summary_component'] = 'FlowFormPaymentSummaryType';
            $fieldTypes['subscription_payment_component'] = 'FlowFormSubscriptionType';
            $fieldTypes['payment_coupon'] = 'FlowFormCouponType';
            $fieldTypes['quiz_score'] = 'FlowFormHiddenType';
            $fieldTypes['rangeslider'] = 'FlowFormRangesliderType';
//            $fieldTypes['save_progress_button'] = 'FlowFormSaveAndResumeType';
            $fieldTypes['dynamic_field'] = 'FlowFormDynamicFieldType';
        }
        
        return apply_filters('fluentform/conversational_field_types', $fieldTypes);
    }
    
    public static function hasPictureMode($field, $question)
    {
        $pictureMode = ArrayHelper::get($field, 'settings.enable_image_input');
        
        if ($pictureMode) {
            $question['type'] = static::fieldTypes()['MultiplePictureChoice'];
        }
        
        return $question;
    }
    
    public static function hex2rgb($color, $opacity = 0.3)
    {
        if (! $color) {
            return;
        }
        $rgbValues = [$r, $g, $b] = array_map(
            function ($c) {
                return hexdec(str_pad($c, 2, $c));
            },
            str_split(ltrim($color, '#'), strlen($color) > 4 ? 2 : 1)
        );
        $rgbValues[3] = $opacity;
        $formattedValues = implode(',', $rgbValues);
        
        return "rgb({$formattedValues})";
    }
    
    public static function getPhoneFieldSettings($data, $form)
    {
        $geoLocate = 'yes' == ArrayHelper::get($data, 'settings.auto_select_country');
        
        // todo:: remove the 'with_extended_validation' check in future.
        $enabled = ArrayHelper::get($data, 'settings.validation_rules.valid_phone_number.value');
        if (! $enabled) {
            $enabled = 'with_extended_validation' == ArrayHelper::get($data, 'settings.int_tel_number');
        }
        
        $itlOptions = [
            'separateDialCode' => false,
            'nationalMode'     => true,
            'autoPlaceholder'  => 'aggressive',
            'formatOnDisplay'  => true,
        ];
        
        if ($geoLocate) {
            $itlOptions['initialCountry'] = 'auto';
        } else {
            $itlOptions['initialCountry'] = ArrayHelper::get($data, 'settings.default_country', '');
            $activeList = ArrayHelper::get($data, 'settings.phone_country_list.active_list');
            
            if ('priority_based' == $activeList) {
                $selectCountries = ArrayHelper::get($data, 'settings.phone_country_list.priority_based', []);
                $priorityCountries = self::getSelectedCountries($selectCountries);
                $itlOptions['preferredCountries'] = array_keys($priorityCountries);
            } elseif ('visible_list' == $activeList) {
                $onlyCountries = ArrayHelper::get($data, 'settings.phone_country_list.visible_list', []);
                $itlOptions['onlyCountries'] = $onlyCountries;
            } elseif ('hidden_list' == $activeList) {
                $countries = self::loadCountries($data);
                $itlOptions['onlyCountries'] = array_keys($countries);
            }
        }
        
        $itlOptions = apply_filters_deprecated(
            'fluentform_itl_options',
            [
                $itlOptions,
                $data,
                $form
            ],
            FLUENTFORM_FRAMEWORK_UPGRADE,
            'fluentform/itl_options',
            'Use fluentform/itl_options instead of fluentform_itl_options'
        );
        
        $itlOptions = apply_filters('fluentform/itl_options', $itlOptions, $data, $form);
        $itlOptions = json_encode($itlOptions);
        
        $settings = get_option('_fluentform_global_form_settings');
        $token = ArrayHelper::get($settings, 'misc.geo_provider_token');
        
        $url = 'https://ipinfo.io';
        if ($token) {
            $url = 'https://ipinfo.io/?token=' . $token;
        }
        
        $url = apply_filters_deprecated(
            'fluentform_ip_provider',
            [
                $url
            ],
            FLUENTFORM_FRAMEWORK_UPGRADE,
            'fluentform/ip_provider',
            'Use fluentform/ip_provider instead of fluentform_ip_provider'
        );
        
        $ipProviderUrl = apply_filters('fluentform/ip_provider', $url);
        
        return [
            'enabled'     => $enabled,
            'itlOptions'  => $itlOptions,
            'ipLookupUrl' => ($geoLocate && $ipProviderUrl) ? $ipProviderUrl : false,
        ];
    }
    
    /**
     * Load country list from file
     *
     * @param array $data
     *
     * @return array
     */
    public static function loadCountries($data)
    {
        $data['options'] = [];
        $activeList = ArrayHelper::get($data, 'settings.phone_country_list.active_list');
        $countries = getFluentFormCountryList();
        $filteredCountries = [];
        if ('visible_list' == $activeList) {
            $selectCountries = ArrayHelper::get($data, 'settings.phone_country_list.' . $activeList, []);
            foreach ($selectCountries as $value) {
                $filteredCountries[$value] = $countries[$value];
            }
        } elseif ('hidden_list' == $activeList || 'priority_based' == $activeList) {
            $filteredCountries = $countries;
            $selectCountries = ArrayHelper::get($data, 'settings.phone_country_list.' . $activeList, []);
            foreach ($selectCountries as $value) {
                unset($filteredCountries[$value]);
            }
        } else {
            $filteredCountries = $countries;
        }
        
        return $filteredCountries;
    }
    
    public static function getSelectedCountries($keys = [])
    {
        $options = [];
        $countries = getFluentFormCountryList();
        foreach ($keys as $value) {
            $options[$value] = $countries[$value];
        }
        
        return $options;
    }
    
    public static function setDefaultValue($value, $field, $form)
    {
        if ($dynamicValue = ArrayHelper::get($field, 'settings.dynamic_default_value')) {
            $dynamicVal = (new Component(wpFluentForm()))->replaceEditorSmartCodes($dynamicValue, $form);
            
            $element = $field['element'];
            
            if ($dynamicVal && 'input_checkbox' == $element) {
                $defaultValues = explode(',', $dynamicVal);
                
                return array_map('trim', $defaultValues);
            }
            
            if ($dynamicVal) {
                return $dynamicVal;
            }
        }
        
        if (! $value) {
            return $value;
        }
        if (is_string($value)) {
            return (new Component(wpFluentForm()))->replaceEditorSmartCodes($value, $form);
        }
        
        return $value;
    }
    
    private static function parseConditionalLogic($field)
    {
        $logics = ArrayHelper::get($field, 'settings.conditional_logics', []);
        
        if (! $logics || ! $logics['status']) {
            return [];
        }
        
        $validConditions = [];
        foreach ($logics['conditions'] as $condition) {
            if (empty($condition['field']) || empty($condition['operator'])) {
                continue;
            }
            $validConditions[] = $condition;
        }
        
        if (! $validConditions) {
            return [];
        }
        
        $logics['conditions'] = $validConditions;
        
        return $logics;
    }
    
    private static function getAdvancedOptions($field)
    {
        $options = ArrayHelper::get($field, 'settings.advanced_options', []);
        
        if ($options && 'yes' == ArrayHelper::get($field, 'settings.randomize_options')) {
            shuffle($options);
        }
        
        return $options;
    }
    
    private static function hasFormula($question)
    {
        return (bool) (
            ArrayHelper::get($question, 'calculation_settings.status')
            && ArrayHelper::get($question, 'calculation_settings.formula')
        );
    }
    
    private static function hasSaveAndResume($form)
    {
        if (!defined('FLUENTFORMPRO')){
            return false;
        }
        
        if (!version_compare(FLUENTFORMPRO_VERSION,'5.1.13' ,'>=')){
            return false;
        }
        
        $perStepSave = ArrayHelper::get($form->settings, 'conv_form_per_step_save');
        if (!$perStepSave) {
            return false;
        }
        
        $saveAndResume = false;
        $hash = '';
        $form->save_state = false;
        
        $key = isset($_GET['fluent_state']) ? sanitize_text_field($_GET['fluent_state']) : false;
        
        if ($key) {
            $hash = base64_decode($key);
            $form->save_state = true;
        } else {
            $cookieName = 'fluentform_step_form_hash_' . $form->id;
            $hash = ArrayHelper::get($_COOKIE, $cookieName, wp_generate_uuid4());
        }
        
        DraftSubmissionsManager::migrate();
        
        $draftForm = wpFluent()->table('fluentform_draft_submissions')->where('hash', $hash)->first();
        
        if ($draftForm) {
            $saveAndResume = true;
        }
        
        return $saveAndResume;
    }
    
    
    /**
     * @param array $field
     * @param object $form
     * @param string $fieldName
     * @return array
     */
    private static function resolveValidationsRules($field, $form, $fieldName = '')
    {
        $validationsRules = ArrayHelper::get($field, 'settings.validation_rules', []);
        if ($validationsRules) {
            if (!$fieldName) {
                $fieldName = ArrayHelper::get($field, 'attributes.name');
            }
            foreach ($validationsRules as $ruleName => $rule) {
                if (ArrayHelper::exists($rule, 'message')) {
                    if (ArrayHelper::isTrue($rule, 'global')) {
                        $rule['message'] = apply_filters('fluentform/get_global_message_' . $ruleName, $rule['message']);;
                    }
                    // Shortcode parse on validation message
                    $rule['message'] = Helper::shortCodeParseOnValidationMessage($rule['message'], $form, $fieldName);
                    $validationsRules[$ruleName]['message'] = apply_filters('fluentform/validation_message_' . $ruleName, $rule['message'], $field);
                }
            }
        }
        return $validationsRules;
    }
    
    private static function getSaveAndResumeData($form)
    {
        $draftForm = null;
        $data = null;
        $formId = $form->id;
        $cookieName = 'fluentform_step_form_hash_' . $formId;
        $hash = ArrayHelper::get($_COOKIE, $cookieName, wp_generate_uuid4());
        
        if ($hash) {
            $draftForm = wpFluent()->table('fluentform_draft_submissions')
                ->where('hash', $hash)
                ->where('form_id', $formId)
                ->first();
        } elseif (!$draftForm && $userId = get_current_user_id()) {
            $draftForm = wpFluent()->table('fluentform_draft_submissions')
                ->where('user_id', $userId)
                ->where('form_id', $formId)
                ->first();
        } else {
            return $data;
        }
        
        if ($draftForm) {
            $data['step_completed'] = (int)$draftForm->step_completed;
            $data['response'] = json_decode($draftForm->response, true);
            
            $fields = FormFieldsParser::getInputsByElementTypes($form, ['input_file', 'input_image']);
            foreach ($fields as $name => $field) {
                if ($urls = ArrayHelper::get($data['response'], $name)) {
                    foreach ($urls as $index => $url) {
                        $data['response'][$name][$index] = [
                            "data_src" => $url,
                            "url"      => \FluentForm\App\Helpers\Helper::maybeDecryptUrl($url)
                        ];
                    }
                }
            }
            unset(
                $data['response']['_wp_http_referer'],
                $data['response']['__fluent_form_embded_post_id'],
                $data['response']['_fluentform_' . $draftForm->form_id . '_fluentformnonce']
            );
        }
        
        return $data;
    }
}
