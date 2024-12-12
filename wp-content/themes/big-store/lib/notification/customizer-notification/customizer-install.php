<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
    return;
}
function big_store_customizer_scripts() {
    wp_enqueue_script('big-store-customizer', get_template_directory_uri() . '/lib/notification/customizer-notification/customizer.js', array('jquery'), '1.0', true);

    wp_localize_script('big-store-customizer', 'theme_data_customizer', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('thactivatenonce'),
        'redirectUrl' => esc_url(admin_url('themes.php?page=one-click-demo-import')),
        'redirectUrlPro' => esc_url(admin_url('themes.php?page=themehunk-site-library'))
    ));
}
add_action('customize_controls_enqueue_scripts', 'big_store_customizer_scripts');

// style
function big_store_customizer_notify_css(){
    
  wp_enqueue_style('big-store-customizer-notify-styles', BIG_STORE_THEME_URI .'lib/notification/customizer-notification/customizer-notify.css');
}
add_action('customize_controls_print_styles', 'big_store_customizer_notify_css');