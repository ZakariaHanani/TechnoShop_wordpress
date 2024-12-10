<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The base theme install functionality of the plugin.
 *
 */
class Kt_Base_Install_Hooks {

    /**
     * Initialize the class and set its properties.
     *
     */
    public function __construct() {
        add_action( 'wp_ajax_install_base_theme', array( $this, 'install_base_theme' ));
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ), 10, 1 );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10, 1 );
    }

    /**
     * Enqueue styles.
     *
     */
    public function enqueue_styles() {
    
        wp_enqueue_style( 'kt-base-install', plugin_dir_url( __FILE__ ) . 'assets/base-install.css',array( 'wp-admin' ), '1.0.0', 'all' );
    }

    /**
     * Enqueue scripts.
     *
     */
    public function enqueue_scripts() {

        wp_enqueue_script( 'kt-base-install', plugin_dir_url( __FILE__ ) . 'assets/base-install.js', array( 'jquery' ), '1.0.0', true );

        $base_theme = kt_get_base_theme();
        $action = __( 'Install and Activate', 'keon-toolset' );
        if( kt_base_theme_installed() ){
            $action = __( 'Activate', 'keon-toolset' );
        }
        wp_localize_script(
            'kt-base-install',
            'direct_install',
            array(
                'ajax_url'  => admin_url( 'admin-ajax.php' ),
                'nonce'     => wp_create_nonce( 'direct_theme_install' ),
                'base_html' => sprintf(
                    '<div class="base-install-notice-outer">
                        <div class="base-install-notice-inner">
                            <div class="base-install-prompt" >
                                <div class="base-install-content"><h2 class="base-install-title">%1$s</h2><p>We recommend to %2$s %1$s theme as all our demo works perfectly with this theme. You can still try our demo on any block theme but it might not look as you see on our demo.</p></div>
                                <div class="base-install-btn">
                                    <a class= "install-base-theme button button-primary">%2$s %1$s</a>
                                    <a class= "close-base-notice button close-base-button">Skip</a>
                                </div>
                            </div>
                            <div class="base-install-success">
                                <div class="base-install-content"><h3>Thank you for installing %1$s. Click on Next to proceed to demo importer.</h3></div>
                                <div class="base-install-btn">
                                    <a class= "close-base-notice button button-primary">Next</a>
                                </div>
                            </div>
                        </div>
                    </div>',
                    $base_theme['name'],
                    $action
                ),
            )
        );
    }

    /**
     *  Install base theme.
     */
    public function install_base_theme(){
        check_ajax_referer( 'direct_theme_install', 'security' );

        if( !current_user_can('manage_options') ) {
            $error = __( 'Sorry, you are not allowed to install themes on this site.', 'keon-toolset' );
            wp_send_json_error( $error );
        }

        $base_theme = kt_get_base_theme();
        if ( kt_base_theme_installed() ) {
            switch_theme( $base_theme['slug'] );
            wp_send_json_success();
        }

        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        include_once ABSPATH . 'wp-admin/includes/theme.php';

        $api = themes_api(
            'theme_information',
            array(
                'slug'   => $base_theme['slug'],
                'fields' => array( 'sections' => false ),
            )
        );
     
        if ( is_wp_error( $api ) ) {
            $status['errorMessage'] = $api->get_error_message();
            wp_send_json_error( $status['errorMessage'] );
        }

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Theme_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );

        if (is_wp_error($result)) {
           wp_send_json_error( $result->errors );
        }

        switch_theme( $base_theme['slug'] );
        wp_send_json_success();
        die();
    }
}

/**
 * Checks if base theme installed.
 */
function kt_base_theme_installed(){
    $base_theme = kt_get_base_theme();
    $all_themes = wp_get_themes();
    $installed_themes = array();
    foreach( $all_themes as $theme ){
        $theme_text_domain = esc_attr ( $theme->get('TextDomain') );
        $installed_themes[] = $theme_text_domain;
    }
    if( in_array( $base_theme['slug'], $installed_themes, true ) ){
        return true;
    }
    return false;
    
}

/**
 * Returns base theme.
 */
function kt_get_base_theme(){
    $theme = keon_toolset_get_theme_slug();
    $base_theme = array(
        'name' => '',
        'slug' => '',
    );
    if( strpos( $theme, 'bosa' ) !== false ){
        $base_theme['name'] = 'Bosa';
        $base_theme['slug'] = 'bosa';
    }elseif( strpos( $theme, 'shoppable' ) !== false ){
        $base_theme['name'] = 'Hello Shoppable';
        $base_theme['slug'] = 'hello-shoppable';
    }
    return $base_theme;
}

return new Kt_Base_Install_Hooks();