<?php
/**
 * Plugins hooks and library files for the plugins
 * 
 * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
*/
Class BEW_Ajax_Import_Template {

    public static $template_path_path = BEW_URL . 'includes/admin/json/%s.json';

    /**
     * Get Instance
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    private static $_instance = null;
    public static function instance(){
        if( is_null( self::$_instance ) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        if ( is_admin() ) {
            add_action( 'admin_menu', [ $this, 'admin_menu' ] );

            add_action( 'wp_ajax_bew_ajax_required_plugin', [ $this, 'plugin_requirements' ] );
            add_action( 'wp_ajax_bew_start_import_template', [ $this, 'start_importer' ] );
        }
    }

    /**
     * Register Navigation Menu
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    public function admin_menu() {
        add_menu_page(
            __( 'BEW Elements Templates Import', 'bosa-elementor-for-woocommerce' ),
            __( 'BEW Templates', 'bosa-elementor-for-woocommerce' ),
            'manage_options',
            'bew-elements-templates',
            [ $this, 'import_template_list' ],
            'dashicons-screenoptions',
            58
        );
    }

    /**
     * Menu Callback functions to load templates
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    public function import_template_list() { 
        require_once BEW_PATH . 'includes/bew-template-list.php';
        require_once BEW_PATH . 'includes/bew-template.php';
    }


    /**
     * Plugins importer process start from here
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    function start_importer(){
        check_ajax_referer( 'bew_ajax_import_nonce', 'nonce' );

        if ( ! current_user_can( 'install_plugins' ) ) {
            $errorMessage = __( 'Sorry, you are not allowed to install plugins on this site.', 'bosa-elementor-for-woocommerce' );
            wp_send_json_error( $errorMessage );
        }
        
        // check required plugins
        $freeplugins = explode( ';', sanitize_text_field(wp_unslash($_REQUEST['plugins'])) );
        foreach ( $freeplugins as $key => $plugin ) {
            $plugindata = explode( ',', $plugin );
            $data = array(
                'slug'      => isset( $plugindata[0] ) ? $plugindata[0] : '',
                'location'  => isset( $plugindata[1] ) ? $plugindata[0].'/'.$plugindata[1] : '',
                'name'      => isset( $plugindata[2] ) ? $plugindata[2] : '',
                'pllink'    => isset( $plugindata[3] ) ? 'https://'.$plugindata[3] : '#',
            );
            
            $this->is_installed($data);

        }

        // check required theme
        $theme        = sanitize_text_field(wp_unslash($_REQUEST['theme']));
        $this->_activate_theme($theme);

        //save data
        if ( isset( $_REQUEST ) ) {

            $template_id        = sanitize_text_field(wp_unslash($_REQUEST['httemplateid']));
            $template_parentid  = sanitize_text_field(wp_unslash($_REQUEST['htparentid']));
            $template_title     = sanitize_text_field(wp_unslash($_REQUEST['httitle']));
            $page_title         = sanitize_text_field(wp_unslash($_REQUEST['pagetitle']));
            $page_template      = sanitize_text_field(wp_unslash($_REQUEST['pagetemplate']));
            $page_status        = sanitize_text_field(wp_unslash($_REQUEST['status']));
            $action             = sanitize_text_field(wp_unslash($_REQUEST['page']));


            $response_data  = $this->_get_content_remote_request( $template_id );
            
            $args = [
                'post_type'    => $action,
                'post_status'  => !empty( $page_status ) ? $page_status : 'draft',
                'post_title'   => !empty( $page_title ) ? $page_title : $template_title,
                'post_content' => '',
            ];
            // print_r($args); exit;
            $new_id = wp_insert_post( $args );
        
            update_post_meta( $new_id, '_elementor_data', $response_data['content'] );
            update_post_meta( $new_id, '_elementor_page_settings', $response_data['page_settings'] );
            update_post_meta( $new_id, '_elementor_template_type', $response_data['type'] );
            update_post_meta( $new_id, '_elementor_edit_mode', 'builder' );
            update_post_meta( $new_id, '_elementor_location', 'myCustomLocation' );
            update_post_meta( $new_id, '_elementor_conditions', [ 'include/general' ] );
            update_post_meta( $new_id, '_wp_page_template', !empty( $page_template ) ? $page_template : '' );

            echo json_encode(
                array( 
                    'id' => $new_id,
                    'edittxt' => esc_html__( 'Edit Template', 'bosa-elementor-for-woocommerc' )
                )
            );
            
        }

        wp_die();
    }

    /**
     * Verify Plugins Requirements
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    function plugin_requirements(){
        check_ajax_referer( 'bew_ajax_plugin_nonce', 'nonce' );

        if ( ! current_user_can( 'install_plugins' ) ) {
            $errorMessage = __( 'Sorry, you are not allowed to install plugins on this site.', 'bosa-elementor-for-woocommerce' );
            wp_send_json_error( $errorMessage );
        }
        if ( isset( $_POST ) ) {
            $freeplugins = explode( ';', sanitize_text_field(wp_unslash($_POST['plugins'])) );
            $themeinfo = explode( ';', sanitize_text_field(wp_unslash($_POST['theme'])) );

            if(!empty($_POST['plugins'])){
                $this->plugin_status( $freeplugins, 'free' );
            }else{
                $this->plugin_empty_notice();
            }
            if(!empty($_POST['theme'])){ $this->required_theme( $themeinfo, 'free' );}
        }
        wp_die();
    }

    /**
     * Required plugins empty message 
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.11
     */
    public function plugin_empty_notice(){
        ?>
        <p><?php echo esc_html__( 'Additional plugins are not required.', 'bosa-elementor-for-woocommerce' ); ?></p>
        <?php
    }

    /**
     * Install plugins and activate them
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    function install_and_activate_plugin( $path, $slug ){
        $plugin_status = $this->_plugin_status($path);
        if ($plugin_status == 'install') {
            // Include required libs for installation
            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
            require_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';

            // Get Plugin Info
            $api = $this->call_wp_plugin_api($slug);

            $skin = new WP_Ajax_Upgrader_Skin();
            $upgrader = new Plugin_Upgrader($skin);
            $upgrader->install($api->download_link);

            $this->_activate_plugin($path);

        } else if ($plugin_status == 'inactive') {
            $this->_activate_plugin($path);
        }
        
    }

    /**
     * API Information from WorPress Org
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    function call_wp_plugin_api($slug) {
        include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

        $call_api = plugins_api('plugin_information', array(
            'slug' => $slug,
            'fields' => array(
                'downloaded' => false,
                'rating' => false,
                'description' => false,
                'short_description' => false,
                'donate_link' => false,
                'tags' => false,
                'sections' => false,
                'homepage' => false,
                'added' => false,
                'last_updated' => false,
                'compatibility' => false,
                'tested' => false,
                'requires' => false,
                'downloadlink' => true,
                'icons' => false
        )));

        return $call_api;
    }

    /**
     * Check Plugin Status and Install It
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    function is_installed( $data ){
        if(!isset($data)) return false;

        $status = '';
        
        if ( ! is_wp_error( $data ) ):
            // Installed but Inactive.
            if ( file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) && is_plugin_inactive( $data['location'] ) ):
                return $this->_activate_plugin( $data['location'] );

            // Not Installed.
            elseif ( ! file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) ):
                $this->install_and_activate_plugin($data['location'], $data['slug']);

            // Active.
            else:
                return array(
                        'success' => true,
                        'message' => $data['name']. __( ' Plugin Activated', 'bosa-elementor-for-woocommerce' ),
                );
            endif;
        else:
            return array(
                'success' => false,
                'message' => esc_html__( 'Plugin Data Error', 'bosa-elementor-for-woocommerce' ),
            );
        endif;

    }
    
    /**
     * Activate the given theme
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    function _activate_theme($theme) {
        if(!trim($theme)) return;

        if ( !file_exists( WP_THEME_DIR . '/' . $theme ) )
            return array(
                'success' => false,
                'message' => esc_html__( 'Theme not found!', 'bosa-elementor-for-woocommerce' ),
            );



        if ( !current_user_can( 'install_themes' ) || !isset ($theme) || !sanitize_text_field( wp_unslash($theme)) ) {
           return
                array(
                    'success' => false,
                    'message' => esc_html__( 'Sorry, you are not allowed to install themes on this site.', 'bosa-elementor-for-woocommerce' ),
                );
            
        }
        $theme_slug = ( isset($theme) )  ? sanitize_text_field(  $theme ) : '';
        switch_theme( $theme_slug );
        
        return(
            array(
                'success' => true,
                'message' => __( 'Theme Activated', 'bosa-elementor-for-woocommerce' ),
            )
        );
    }

    /**
     * Activate the given plugin
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    public function _activate_plugin( $path ) {
        
        if ( ! current_user_can( 'install_plugins' ) || ! isset ($path) || ! sanitize_text_field( wp_unslash($path)) ) {
            
            return array(
                'success' => false,
                'message' => esc_html__( 'Plugin Not Found '. $path, 'bosa-elementor-for-woocommerce' ),
            );
        }

        $plugin_path = ( isset($path) )  ? sanitize_text_field( wp_unslash($path)) : '';
        $activate    = activate_plugin( $plugin_path, '', false, true );
        if ( is_wp_error( $activate ) ) {
            return array(
                    'success' => false,
                    'message' => $activate->get_error_message(),
                );
        }
        
        return array(
                'success' => true,
                'message' => esc_html__( 'Plugin Successfully Activated', 'bosa-elementor-for-woocommerce' ),
            );

    }

    /**
     * Get theme data in details from given json file
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    function _get_content_remote_request( $template_id ){
        $url    = sprintf( self::$template_path_path, $template_id );
        
        $response = wp_remote_get( $url, array(
            'timeout'   => 60,
            'sslverify' => false
        ) );
        $result = json_decode( wp_remote_retrieve_body( $response ), true );
        return $result;
    }

    /**
     * Retrive Plugin status
     * 
     * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
     */
    function _plugin_status($file_path) {
        $status = 'install';
        $plugin_path = WP_PLUGIN_DIR . '/' . $file_path;
        if (file_exists($plugin_path)) {
            $status = is_plugin_active($file_path) ? 'active' : 'inactive';
        }
        return $status;
    }

    /*
    * Required Plugins
    *
    * @since Bosa Elementor Addons and Templates for WooCommerce 1.0.0
    */
    public function plugin_status( $plugins, $type ) {
        foreach ( $plugins as $key => $plugin ) {

            $plugindata = explode( ',', $plugin );
            $data = array(
                'slug'      => isset( $plugindata[0] ) ? $plugindata[0] : '',
                'location'  => isset( $plugindata[1] ) ? $plugindata[0].'/'.$plugindata[1] : '',
                'name'      => isset( $plugindata[2] ) ? $plugindata[2] : '',
                'pllink'    => isset( $plugindata[3] ) ? 'https://'.$plugindata[3] : '#',
            );

            if ( ! is_wp_error( $data ) ):
                // Installed but Inactive.
                if ( file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) && is_plugin_inactive( $data['location'] ) ):
                    $button_classes = 'button activate-now button-primary disabled';
                    $button_text    = esc_html__( 'Activate in import', 'bosa-elementor-for-woocommerce' );

                // Not Installed.
                elseif ( ! file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) ):
                    $button_classes = 'button install-now disabled';
                    $button_text    = esc_html__( 'Install Now', 'bosa-elementor-for-woocommerce' );

                // Active.
                else:
                    $button_classes = 'button disabled';
                    $button_text    = esc_html__( 'Activated', 'bosa-elementor-for-woocommerce' );
                endif;

                ?>
                    <li class="bew-elementor-plugin-<?php echo esc_attr($data['slug']); ?>">
                        <span class="plugin-title"><?php echo esc_html($data['name']); ?></span>
                        <?php if ( $type == 'pro' && ! file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) ):
                                echo '<a class="button" href="'.esc_url( $data['pllink'] ).'" target="_blank">'.esc_html__( 'Buy Now', 'bosa-elementor-for-woocommerce' ).'</a>';
                            else: ?>
                            <span class="<?php echo esc_attr($button_classes); ?>" data-pluginopt='<?php echo wp_json_encode( $data ); ?>'><?php echo esc_html($button_text); ?></span>
                        <?php endif; ?>
                    </li>
                <?php

            endif;

        }
    }

}

BEW_Ajax_Import_Template::instance();