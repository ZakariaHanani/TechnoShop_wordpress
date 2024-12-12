<?php

namespace FluentForm\App\Modules\Registerer;

use FluentForm\App\Modules\Acl\Acl;
use FluentForm\App\Services\Manager\FormManagerService;
use FluentForm\Framework\Helpers\ArrayHelper;

class AdminBar
{
    
    public function register()
    {
        if (!self::isDisabled()) {
            add_action('admin_bar_menu', [$this, 'addMenuBar'], 99);
        }
    }
    
    public static function isDisabled()
    {
        $settings = get_option('_fluentform_global_form_settings');

        if(!$settings || is_multisite()) {
            return true;
        }

        return 'no' == ArrayHelper::get($settings, 'misc.admin_top_nav_status');
    }
    
    public function addMenuBar($wpAdminBar)
    {
        $items = $this->getMenuItems();
        if(empty($items)){
            return;
        }

        foreach ($items as $itemKey => $item) {
            $arr = [
                'id'     => $itemKey == 'fluent_form' ? $itemKey : sanitize_title($itemKey),
                'parent' => $itemKey != 'fluent_form' ? 'fluent_form' : '',
                'title'  => ArrayHelper::get($item, 'title'),
                'href'   => ArrayHelper::get($item, 'url'),
            ];
            if(ArrayHelper::get($item,'meta')){
                $arr['meta'] = [
                    'target' => '_blank',
                    'rel'    => 'noopener noreferrer',
                ];
            }
            $wpAdminBar->add_menu(
                $arr
            );
            do_action("fluentform/admin_nav_menu_{$itemKey}");
        }
    }
    
    
    private function getMenuItems()
    {
        $dashBoardCapability = 'fluentform_dashboard_access';
        $dashBoardCapability = apply_filters_deprecated(
            'fluentform_dashboard_capability',
            [
                $dashBoardCapability
            ],
            FLUENTFORM_FRAMEWORK_UPGRADE,
            'fluentform/dashboard_capability',
            'Use fluentform/dashboard_capability instead of fluentform_dashboard_capability.'
        );

        $dashBoardCapability = apply_filters(
            'fluentform/dashboard_capability',
            $dashBoardCapability
        );
    
        $settingManager = 'fluentform_settings_manager';
        $settingManager = apply_filters_deprecated(
            'fluentform_settings_capability',
            [
                $settingManager
            ],
            FLUENTFORM_FRAMEWORK_UPGRADE,
            'fluentform/settings_capability',
            'Use fluentform/settings_capability instead of fluentform_settings_capability.'
        );

        $settingsCapability = apply_filters(
            'fluentform/settings_capability',
            $settingManager
        );
        
        $fromRole = $currentUserCapability = false;
        if (!current_user_can($dashBoardCapability) && !current_user_can($settingsCapability)) {
            $currentUserCapability = Acl::getCurrentUserCapability();
            if (!$currentUserCapability) {
                return;
            } else {
                $fromRole = true;
                $dashBoardCapability = $settingsCapability = $currentUserCapability;
            }
        }
        
        if (Acl::isSuperMan()) {
            $fromRole = true;
        }
        
        if (defined('FLUENTFORMPRO')) {
            $title = __('Fluent Forms Pro', 'fluentform');
        } else {
            $title = __('Fluent Forms', 'fluentform');
        }

        $allowForms = FormManagerService::getUserAllowedForms();
        $hasUnreadSubmissions = wpFluent()->table('fluentform_submissions')
            ->where('status', 'unread')
            ->when($allowForms, function ($q) use ($allowForms){
                return $q->whereIn('form_id', $allowForms);
            })
            ->count();

        $entriesDropdownTitle = __('Entries', 'fluentform');
        if ($hasUnreadSubmissions > 0) {
            $style = "background: #1A7EFB;color: white;border-radius: 8px;padding: 1px 7px; height: 16px; display: inline-flex; align-items: center;";
            $title .= ' <span class="ff_unread_count" style="' . $style . '">' . $hasUnreadSubmissions . '</span>';
            // for dropdown title
            $style .= 'float:right; margin-top:4px';
            $entriesDropdownTitle .= ' <span class="ff_unread_count" style="' . $style . '">' . $hasUnreadSubmissions . '</span>';
        }
        
        $items = [
            'fluent_form' => [
                'title'      => $title,
                'capability' => $currentUserCapability,
                'url'        => admin_url('admin.php?page=fluent_forms')
            ],
            'all_forms'   => [
                'title'      => __('Forms', 'fluentform'),
                'capability' => $currentUserCapability,
                'url'        => admin_url('admin.php?page=fluent_forms')
            ],
        ];
        
        if ($settingsCapability) {
            $items['new_form'] = [
                'title' => __('New Form', 'fluentform'),
                'capability' => $fromRole ? $settingsCapability : 'fluentform_forms_manager',
                'url' => admin_url('admin.php?page=fluent_forms#add=1'),
            ];

            $items['fluent_forms_all_entries'] = [
                'title' => $entriesDropdownTitle,
                'capability' => $fromRole ? $settingsCapability : 'fluentform_entries_viewer',
                'url' => admin_url('admin.php?page=fluent_forms_all_entries'),
            ];
            $showPaymentEntries = false;
            $showPaymentEntries = apply_filters_deprecated(
                'fluentform_show_payment_entries',
                [
                    $showPaymentEntries
                ],
                FLUENTFORM_FRAMEWORK_UPGRADE,
                'fluentform/show_payment_entries',
                'Use fluentform/show_payment_entries instead of fluentform_show_payment_entries.'
            );

            if (apply_filters('fluentform/show_payment_entries', $showPaymentEntries)) {
                $items ['fluent_forms_payment_entries'] = [
                    'title'      => __('Payments', 'fluentform'),
                    'capability' => $fromRole ? $settingsCapability : 'fluentform_view_payments',
                    'url'        => admin_url('admin.php?page=fluent_forms_payment_entries')
                ];
            }
         
        }
        $items['fluent_forms_community'] = [
            'title'  => esc_html__( 'Community', 'wpforms-lite' ),
            'url'   => 'https://www.facebook.com/groups/fluentforms/',
            'meta'   => true
        ];
        $items['fluent_forms_doc'] = [
            'title' => __('Docs','fluentform'),
            'url' => 'https://wpmanageninja.com/docs/fluent-form/',
            'meta'   => true
        ];
        $items['fluent_forms_doc'] = [
            'title' => __('Docs','fluentform'),
            'url' => 'https://wpmanageninja.com/docs/fluent-form/',
        ];
        $items['fluent_forms_dev_doc'] = [
            'title' => __('Developer Docs','fluentform'),
            'url' => 'https://developers.fluentforms.com/',
            'meta'   => true
        ];
        return apply_filters('fluentform/admin_menu_bar_items', $items);
    }
    
    
}
