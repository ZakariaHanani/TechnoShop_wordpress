<?php

namespace FluentForm\App\Http\Policies;

use FluentForm\App\Modules\Acl\Acl;
use FluentForm\Framework\Request\Request;
use FluentForm\Framework\Foundation\Policy;

class SubmissionPolicy extends Policy
{
    /**
     * Check permission for any method
     *
     * @param  \FluentForm\Framework\Request\Request $request
     * @return bool
     */
    public function verifyRequest(Request $request)
    {

        return Acl::hasPermission('fluentform_entries_viewer', $request->get('form_id'));
    }

    public function handleBulkActions(Request $request)
    {
        return Acl::hasPermission('fluentform_manage_entries', $request->get('form_id'));
    }

    public function updateStatus(Request $request)
    {
        return $this->handleBulkActions($request);
    }

    public function toggleIsFavorite(Request $request)
    {
        return $this->handleBulkActions($request);
    }

    public function remove(Request $request)
    {
        return $this->handleBulkActions($request);
    }

    public function print(Request $request)
    {
        return $this->handleBulkActions($request);
    }
}
