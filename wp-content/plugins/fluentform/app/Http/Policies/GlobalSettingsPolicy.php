<?php

namespace FluentForm\App\Http\Policies;

use FluentForm\App\Modules\Acl\Acl;
use FluentForm\Framework\Foundation\Policy;
use FluentForm\Framework\Request\Request;

class GlobalSettingsPolicy extends Policy
{
    public function verifyRequest(Request $request)
    {
        return Acl::hasPermission('fluentform_settings_manager');
    }
    public function index()
    {
        return Acl::hasPermission('fluentform_settings_manager');
    }
}
