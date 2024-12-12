<?php
    do_action_deprecated(
        'fluentform_global_menu',
        [
        ],
        FLUENTFORM_FRAMEWORK_UPGRADE,
        'fluentform/global_menu',
        'Use fluentform/global_menu instead of fluentform_global_menu.'
    );
    do_action('fluentform/global_menu');
?>
<div class="ff_addon_wrapper ff_block">
    <div class="ff_card text-center mb-4">
        <img class="mb-6" style="width: 100px; height: 100px;" src="<?php echo esc_url($logo); ?>"/>
        <h1 class="mb-4"><?php _e('Solve Email Deliverability Issues Forever', 'fluentform'); ?></h1>
        <p>
            <a target="_blank" href="https://wordpress.org/plugins/fluent-smtp/" rel="nofollow">FluentSMTP</a><?php _e(', the ultimate WordPress SMTP Plugin, natively integrates with your email service providers to ensure smooth delivery of your emails. This plugin makes WordPress email delivery fast, secure, and reliable, ensuring your emails consistently reach the inbox.', 'fluentform'); ?>
        </p>
        <?php if (!$is_installed): ?>
            <div class="ff_addon_btn_wrapper mb-6 mt-6">
                <button class="ff_addon_btn intstall_fluentsmtp"><?php _e('Install and Activate FluentSMTP Plugin', 'fluentform'); ?></button>
                <p style="display: none;" class="ff_addon_installing"><?php _e('Installing FluentSMTP Plugin. Please wait...', 'fluentform'); ?></p>
            </div>
        <?php else: ?>
            <div class="ff_alert ff_alert_s2 success-soft mt-5">
                <h3 class="mb-4"><?php _e('FluentSMTP is Activated and Running', 'fluentform'); ?></h3>
                <a href="<?php echo esc_url($setup_url); ?>" class="el-button el-button--large el-button--success"><?php _e('View FluentSMTP Settings', 'fluentform'); ?></a>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!$is_installed): ?>
        <div class="ff_card">
            <img class="ff_addon_banner mb-5" src="<?php echo esc_url($banner_image); ?>"/>
            <div class="ff_card_head">
                <h4 class="title"><?php _e('FluentSMTP - The ultimate SMTP & Email Service Connection Plugin for WordPress', 'fluentform'); ?></h4>
                <p class="text">
                    <?php _e('For FluentCRM users, we built a well-optimized SMTP/Amazon SES plugin. It will help you manage all your WordPress website emails, including FluentCRM emails. ', 'fluentform'); ?>
                    <a target="_blank" rel="noopener" href="https://fluentsmtp.com/"><?php _e('Learn more about FluentSMTP Plugin', 'fluentform'); ?></a>.
                </p>
            </div>
            <div class="el-row mt-5" style="margin-left: -12px; margin-right: -12px;">
                <div class="el-col el-col-12" style="padding-left: 12px; padding-right: 12px;">
                    <h5 class="mb-4"><?php _e('Dedicated API and SMTP connections', 'fluentform'); ?></h5>
                    <ul class="fs-15">
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> Amazon SES</li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> Mailgun</li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> SendGrid</li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> Brevo (formerly SendInBlue)</li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> PepiPost</li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> SparkPost</li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> <?php _e('+ Any SMTP Provider', 'fluentform'); ?></li>
                    </ul>
                </div>
                <div class="el-col el-col-12" style="padding-left: 12px; padding-right: 12px;">
                    <h5 class="mb-4"><?php _e('Features of FluentSMTP Plugin', 'fluentform'); ?></h5>
                    <ul class="fs-15">
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> <?php _e('Optimized API connection with Mail Service Providers', 'fluentform'); ?></li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> <?php _e('Email Logging for better visibility', 'fluentform'); ?></li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> <?php _e('Email Routing based on the sender email address', 'fluentform'); ?></li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> <?php _e('Real-Time Email Delivery', 'fluentform'); ?></li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> <?php _e('Resend Any Emails', 'fluentform'); ?></li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> <?php _e('In Details Reporting', 'fluentform'); ?></li>
                        <li class="mb-3"><i class="el-icon el-icon-success text-success mr-2"></i> <?php _e('Super fast UI powered by VueJS', 'fluentform'); ?></li>
                    </ul>
                </div>
            </div><!-- .el-row -->
            <div class="ff_addon_footer text-center mt-6 mb-4">
                <button class="ff_addon_btn ff_invert intstall_fluentsmtp"><?php _e('Install and Activate FluentSMTP Plugin', 'fluentform'); ?></button>
                <p style="display: none;" class="ff_addon_installing"><?php _e('Installing FluentSMTP Plugin. Please wait...', 'fluentform'); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>
