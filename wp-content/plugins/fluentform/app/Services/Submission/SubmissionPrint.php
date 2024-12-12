<?php

namespace FluentForm\App\Services\Submission;


use FluentForm\App\Helpers\Helper;
use FluentForm\App\Models\Submission;
use FluentForm\App\Services\FormBuilder\ShortCodeParser;
use FluentForm\Framework\Helpers\ArrayHelper as Arr;


class SubmissionPrint
{
    public function getContent($attr)
    {
        $submissionIds = Arr::get($attr, 'submission_ids', []);
        $submissionIds = array_filter(array_map('intval', $submissionIds));
        $orderBy = Helper::sanitizeOrderValue(Arr::get($attr, 'sort_by', 'DESC'));
        $formId = intval(Arr::get($attr, 'form_id'));
        $form = Helper::getForm($formId);
        $submissions = Submission::whereIn('id', $submissionIds)->orderBy('id', $orderBy)->get();
        if (!$submissions || !$form) {
            throw new \Exception(__('Invalid Submissions', 'fluentform'));
        }
        $pdfBody = $this->getBody($submissions, $form);
        $pdfCss = '<style>' . $this->getCss() . '</style>';
        return fluentform_sanitize_html($pdfCss . $pdfBody);
    }

    protected function getBody($submissions, $form)
    {
        $pdfBody = "";
        foreach ($submissions as $index => $submission) {
            $formData = json_decode($submission->response, true);
            $htmlBody = ShortCodeParser::parse('{all_data}', $submission, $formData, $form, false, true);
            $htmlBody = '<h3>Submission - #' . $submission->id . '</h3>' . $htmlBody;
            if ($index !== 0 && apply_filters('fluentform/bulk_entries_print_start_on_new_page', __return_true(),
                    $submission, $form)) {
                $htmlBody = '<div class="ff-new-entry-page-break"></div>' . $htmlBody;
            }
            if (apply_filters('fluentform/entry_print_with_notes', __return_true(), $form, $submission)) {
                $htmlBody = $this->addNotes($htmlBody, $submission, $form);
            }
            $pdfBody .= apply_filters('fluentform/entry_print_body', $htmlBody, $submission, $form, $formData);
        }
        return apply_filters('fluentform/entries_print_body', $pdfBody, $submissions, $form);
    }

    protected function addNotes($htmlBody, $submission, $form)
    {
        $notes = (new SubmissionService())->getNotes($submission->id, ['form_id' => $form->id]);
        if ($notes && count($notes) > 0) {
            $notesHtml = '<br\><h3>Submission Notes</h3><table class="ff_all_data" width="600" cellpadding="0" cellspacing="0"><tbody>';
            foreach ($notes as $note) {
                if (isset($note->created_by)) {
                    $label = '' . $note->created_by . ' - ' . $note->created_at;
                } else {
                    $label = '' . $note->name . ' - ' . $note->created_at;
                }
                $notesHtml .= '<tr class="field-label"><th style="padding: 6px 12px; background-color: #f8f8f8; text-align: left;"><strong>' . $label . '</strong></th></tr><tr class="field-value"><td style="padding: 6px 12px 12px 12px;">' . $note->value . '</td></tr>';
            }
            $htmlBody = $htmlBody . $notesHtml . '</tbody></table>';
        }
        return $htmlBody;
    }


    protected function getCss()
    {
        $mainColor = '#4F4F4F';
        $fontSize = 14;
        $secondaryColor = '#EAEAEA';
        ob_start();
        ?>
        .ff_pdf_wrapper, p, li, td, th {
        color: <?php
        echo $mainColor; ?>;
        font-size: <?php
        echo $fontSize; ?>px;
        }

        .ff_all_data, table {
        empty-cells: show;
        border-collapse: collapse;
        border: 1px solid <?php
        echo $secondaryColor; ?>;
        width: 100%;
        color: <?php
        echo $mainColor; ?>;
        }
        hr {
        color: <?php
        echo $secondaryColor; ?>;
        background-color: <?php
        echo $secondaryColor; ?>;
        }
        .ff_all_data th {
        border-bottom: 1px solid <?php
        echo $secondaryColor; ?>;
        border-top: 1px solid <?php
        echo $secondaryColor; ?>;
        padding-bottom: 10px !important;
        }
        .ff_all_data tr td {
        padding-left: 30px !important;
        padding-top: 15px !important;
        padding-bottom: 15px !important;
        }

        .ff_all_data tr td, .ff_all_data tr th {
        border: 1px solid <?php
        echo $secondaryColor; ?>;
        text-align: left;
        }

        table, .ff_all_data {width: 100%; overflow:wrap;} img.alignright { float: right; margin: 0 0 1em 1em; }
        img.alignleft { float: left; margin: 0 10px 10px 0; }
        .center-image-wrapper {text-align:center;}
        .center-image-wrapper img.aligncenter {display: initial; margin: 0; text-align: center;}
        .alignright { float: right; }
        .alignleft { float: left; }
        .aligncenter { display: block; margin-left: auto; margin-right: auto; text-align: center; }

        .invoice_title {
        padding-bottom: 10px;
        display: block;
        }
        .ffp_table thead th {
        background-color: #e3e8ee;
        color: #000;
        text-align: left;
        vertical-align: bottom;
        }
        table th {
        padding: 5px 10px;
        }
        .ff_rtl table th, .ff_rtl table td {
        text-align: right !important;
        }
        /* Add CSS for page breaks */
        @media print { .ff-new-entry-page-break { page-break-before: always; } }
        <?php
        return apply_filters('fluentform/entries_print_css', ob_get_clean());
    }
}
