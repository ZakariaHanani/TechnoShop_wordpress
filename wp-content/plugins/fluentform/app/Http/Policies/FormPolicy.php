<?php

namespace FluentForm\App\Http\Policies;

use FluentForm\App\Modules\Acl\Acl;
use FluentForm\Framework\Request\Request;
use FluentForm\Framework\Foundation\Policy;

class FormPolicy extends Policy
{
    /**
     * Check permission for any method
     *
     * @param  \FluentForm\Framework\Request\Request $request
     * @return bool
     */
    public function verifyRequest(Request $request)
    {
        return Acl::hasPermission('fluentform_forms_manager', $request->get('form_id'));
    }

    public function index(Request $request)
    {
        return Acl::hasPermission('fluentform_dashboard_access', $request->get('form_id'));
    }

    public function templates(Request $request)
    {
        return Acl::hasAnyFormPermission($request->get('form_id'));
    }

    public function updateModuleStatus(Request $request)
    {
        return Acl::hasPermission('fluentform_settings_manager', $request->get('form_id'));
    }
    public function updateIntegration(Request $request)
    {
        return Acl::hasPermission('fluentform_settings_manager', $request->get('form_id'));
    }

    public function ping()
    {
        return Acl::hasAnyFormPermission();
    }
}
