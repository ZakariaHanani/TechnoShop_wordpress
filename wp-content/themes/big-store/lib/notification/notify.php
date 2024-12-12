<?php
include_once(ABSPATH . 'wp-admin/includes/plugin.php');

function big_store_set_cookie() { 
 
       $expire_time = time() + (86400 * 7); // 7 days in seconds

    if (!isset($_COOKIE['big_store_thms_time'])) {
        // Set a cookie for 7 days
        setcookie('big_store_thms_time', $expire_time, $expire_time, COOKIEPATH, COOKIE_DOMAIN);
    }
 
    }
    function big_store_unset_cookie(){

            $visit_time = time();
    if (isset($_COOKIE['big_store_thms_time']) && $_COOKIE['big_store_thms_time'] < $visit_time) {
        setcookie('big_store_thms_time', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
    }
    }

    function big_store_clear_notice_cookie() {
    // Clear the cookie when the theme is switched
    if (isset($_COOKIE['big_store_thms_time'])) {
        setcookie('big_store_thms_time', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
    }
}

    if(isset($_GET['notice-disable']) && $_GET['notice-disable'] == true){
        add_action('admin_init', 'big_store_set_cookie');
        }


        if(!isset($_COOKIE['big_store_thms_time'])) {
             add_action('admin_notices', 'big_store_display_admin_notice');

        }

        if(isset($_COOKIE['big_store_thms_time'])) {
            add_action( 'admin_notices', 'big_store_unset_cookie');
        }
    // add_action('admin_notices', 'big_store_display_admin_notice');

// Display admin notice
function big_store_display_admin_notice() {
    // clearstatcache();
     $allowed_pages = array(
        'dashboard',             // index.php
        'themes',                // themes.php
        'plugins',               // plugins.php
        'users',
        'appearance_page_thunk_started' // appearance_page_thunk_started
    );

    // Get the current screen
    $current_screen = get_current_screen();

    // Check if the current screen is one of the allowed pages
    if (!in_array($current_screen->base, $allowed_pages)) {
        return; // Exit if not on an allowed page
    }
    
     global $current_user;
    $user_id   = $current_user->ID;
    $theme_data  = wp_get_theme();

    if ( get_user_meta( $user_id, esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ) ) {
        return;
    }

 // Retrieve the theme support data
    $plugin_data = get_theme_support('recommend-plugins');
    $plugin_data = $plugin_data[0];

    // Get the specific plugin data
    $plugin_pro_slug = isset($plugin_data['big-store-pro']['slug']) ? $plugin_data['big-store-pro']['slug'] : 'big-store-pro';
    $plugin_pro_file = isset($plugin_data['th-shop-mania-pro']['init']) ? $plugin_data['th-shop-mania-pro']['init'] : 'big-store-pro/big-store-pro.php';
    $plugin_companion_slug = isset($plugin_data['themehunk-customizer']['slug']) ? $plugin_data['themehunk-customizer']['slug'] : 'themehunk-customizer';
    $plugin_companion_file = isset($plugin_data['themehunk-customizer']['active_filename']) ? $plugin_data['themehunk-customizer']['active_filename'] : 'themehunk-customizer/themehunk-customizer.php';

    $one_click_demo_import = isset($plugin_data['one-click-demo-import']['slug']) ? $plugin_data['one-click-demo-import']['slug'] : 'one-click-demo-import';
    $one_click_demo_import_file = isset($plugin_data['one-click-demo-import']['active_filename']) ? $plugin_data['one-click-demo-import']['active_filename'] : 'one-click-demo-import/one-click-demo-import.php';

    // Check if plugins are installed and activated
    $plugin_pro_exists = file_exists(WP_PLUGIN_DIR . '/' . $plugin_pro_file);
    $plugin_pro_installed = is_plugin_active($plugin_pro_file);
    $plugin_companion_exists = file_exists(WP_PLUGIN_DIR . '/' . $plugin_companion_file);
    $plugin_companion_installed = is_plugin_active($plugin_companion_file);
    $one_click_demo_import_exists = file_exists(WP_PLUGIN_DIR . '/' . $one_click_demo_import_file);
    $one_click_demo_import_installed = is_plugin_active($one_click_demo_import_file);

 if ((isset($_GET['page']) && $_GET['page'] == 'thunk_started' ) || ((!$plugin_pro_exists && !$plugin_companion_exists) ||($plugin_pro_exists && !$plugin_pro_installed) || (!$plugin_pro_exists && $plugin_companion_exists && !$plugin_companion_installed) || (!$one_click_demo_import_installed || !$plugin_companion_installed) ) ) {

    if ($plugin_pro_exists) {
        // 'th-shop-mania-pro' is installed
        if ($plugin_pro_installed) {
            // Plugin is activated
            echo '<div class="notice notice-info th-shop-mania-wrapper-banner is-dismissible">
                <div class="left"><h2 class="title">
                     '.sprintf( esc_html__( 'Thank you for installing %1$s - Version %2$s', 'big-store' ), esc_html( $theme_data->Name ), esc_html( $theme_data->Version ) ).'</h2>
                    <p>' . esc_html__('To take full advantage of all the features this theme has to offer, please install and activate the ', 'big-store') . '<strong>Big Store Pro</strong></p>
                    <button class="button button-primary" id="go-to-starter-sites" data-slug="' . esc_attr($plugin_pro_slug) . '">' . esc_html__('Go to Ready To Import website Templates ', 'big-store') . '</button>
                </div>
                <div class="right">
                    <img src="' . esc_url(get_template_directory_uri() . '/lib/notification/banner.png') . '" />
                </div>
            </div>';
        } else {
            // Plugin is installed but not activated
            echo '<div class="notice notice-info th-shop-mania-wrapper-banner is-dismissible">
                <div class="left">
                    <h2 class="title">
                     '.sprintf( esc_html__( 'Thank you for installing %1$s - Version %2$s', 'big-store' ), esc_html( $theme_data->Name ), esc_html( $theme_data->Version ) ).'</h2>
                    <p>' . esc_html__('To take full advantage of all the features this theme has to offer, please install and activate the ', 'big-store') . '<strong>Big Store Pro</strong></p>
                    <button class="button button-primary" id="activate-big-store-pro" data-slug="' . esc_attr($plugin_pro_slug) . '"><span>' . esc_html__('Activate', 'big-store') . '</span><span class="dashicons dashicons-update loader"></span></button>
                     <button class="button button-primary" id="go-to-starter-sites" data-slug="' . esc_attr($plugin_pro_slug) . '" disabled>' . esc_html__('Go to Ready To Import website Templates ', 'big-store') . '</button>
                </div>
                <div class="right">
                    <img src="' . esc_url(get_template_directory_uri() . '/lib/notification/banner.png') . '" />
                </div>
            </div>';
        }
    } else {

// Get the plugin data
$plugin_data = get_theme_support('lite-demo-plugins');
$plugin_data = $plugin_data[0];

// Initialize flags
$all_installed = true;
$all_activated = true;

// Check each plugin's installation and activation status
foreach ($plugin_data as $plugin_slug => $plugin_info) {
    // Check if the plugin is installed
    if (!file_exists(WP_PLUGIN_DIR . '/' . $plugin_info['active_filename'])) {
        $all_installed = false;
        break;
    }

    // Check if the plugin is activated
    if (!is_plugin_active($plugin_info['active_filename'])) {
        $all_activated = false;
    }
}


        // 'th-shop-mania-pro' is not installed, check 'hunk-companion'
        $plugin_companion_installed = is_plugin_active($plugin_companion_file);
        $plugin_companion_exists = file_exists(WP_PLUGIN_DIR . '/' . $plugin_companion_file);

        echo '<div class="notice notice-info th-shop-mania-wrapper-banner is-dismissible">
            <div class="left">
                  <h2 class="title">
                     '.sprintf( esc_html__( 'Thank you for installing %1$s - Version %2$s', 'big-store' ), esc_html( $theme_data->Name ), esc_html( $theme_data->Version ) ).'</h2>
                    <p>' . esc_html__('To take full advantage of all the features this theme has to offer, please install and activate the ', 'big-store') . '<strong>ThemeHunk Customizer & One Click Demo Import</strong></p>';

        if ($all_installed) {
            if ($all_activated) {
                echo '<button class="button button-primary" id="go-to-starter-sites" data-slug="' . esc_attr($plugin_companion_slug) . '">' . esc_html__('Go to Ready To Import website Templates ', 'big-store') . '<span class="dashicons dashicons-update loader"></span></button>';
            } else {
                echo '<button class="button button-primary" id="activate-themehunk-customizer" data-slug="' . esc_attr($plugin_companion_slug) . '"><span>' . esc_html__('Activate', 'big-store') . '</span><span class="dashicons dashicons-update loader"></span></button> <button class="button button-primary" id="go-to-starter-sites" data-slug="' . esc_attr($plugin_companion_slug) . '" disabled>' . esc_html__('Go to Ready To Import website Templates ', 'big-store') . '</button>';
            }
        } else {
            echo '<button class="button button-primary" id="install-themehunk-customizer" data-slug="' . esc_attr($plugin_companion_slug) . '"><span>' . esc_html__('Install', 'big-store') . '</span><span class="dashicons dashicons-update loader"></span></button><button class="button button-primary" id="go-to-starter-sites" data-slug="' . esc_attr($plugin_companion_slug) . '"disabled >' . esc_html__('Go to Ready To Import website Templates ', 'big-store') . '</button>';
        }

        echo '</div>
            <div class="right">
                <img src="' . esc_url(get_template_directory_uri() . '/lib/notification/banner.png') . '" />
            </div>
            <a href="?notice-disable=1" class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>
        </div>';
    }
}
}
// add below line containg anchor a tag indise the banner wrapper if you want to use hide banner if clicks on banner close button permanently.
// <a href="?notice-disable=1"  class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>

function big_store_install_custom_plugin($plugin_slug) {
    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

    $plugin_info = plugins_api('plugin_information', array('slug' => $plugin_slug));

    if (is_wp_error($plugin_info)) {
        return $plugin_info->get_error_message();
    }

    $upgrader = new Plugin_Upgrader(new Plugin_Installer_Skin(array(
        'api' => $plugin_info,
    )));

    $result = $upgrader->install($plugin_info->download_link);

    if (is_wp_error($result)) {
        return $result->get_error_message();
    }

    return "success";
}

// AJAX handler for installing and activating plugins
add_action('wp_ajax_big_store_install_and_activate_callback', 'big_store_install_and_activate_callback');

// Callback function to install and activate plugins
function big_store_install_and_activate_callback() {
    // Check nonce for security
    check_ajax_referer('thactivatenonce', 'security');

    // Retrieve plugin slug from AJAX request
    $plugin_slug = isset($_POST['plugin_slug']) ? sanitize_text_field($_POST['plugin_slug']) : '';

    if (empty($plugin_slug)) {
        wp_send_json_error(array('message' => 'Plugin slug is missing.'));
        return;
    }

    // Determine which plugins to install based on the slug
    $pluginArray = array();

    if ($plugin_slug == 'big-store-pro') {
        $pluginArray = array('big-store-pro');
    } else {
        $pluginArray = array('themehunk-customizer', 'one-click-demo-import');
    }

    foreach ($pluginArray as $slug) {
        $plugin_file = WP_PLUGIN_DIR . '/' . $slug . '/' . $slug . '.php';

        // Install the plugin if it's not already installed
        if (!file_exists($plugin_file)) {
            // Start output buffering to capture the plugin installation output
            ob_start();

            $status = big_store_install_custom_plugin($slug);

            // Get the buffered content
            $install_output = ob_get_clean();

            if ($status !== "success") {
                wp_send_json_error(array('message' => $status, 'install_output' => $install_output));
                return;
            }

            // Check if the plugin file exists after installation
            if (!file_exists($plugin_file)) {
                wp_send_json_error(array('message' => 'Plugin file does not exist after installation for ' . $slug, 'install_output' => $install_output));
                return;
            }
        }

        // Activate the plugin if it's not already activated
        if (!is_plugin_active($plugin_file)) {
            $status = activate_plugin($plugin_file);
            if (is_wp_error($status)) {
                wp_send_json_error(array('message' => $status->get_error_message()));
                return;
            }
        }
    }

    wp_send_json_success(array('message' => 'Plugins installed and activated successfully.'));
}



function big_store_admin_script($hook_suffix) {
    // Define the pages where the script should be enqueued
    $allowed_pages = array(
        'index.php',
        'themes.php',
        'plugins.php',
        'users.php',
        'appearance_page_thunk_started'
    );

    // Check if the current page is one of the allowed pages
    if (!in_array($hook_suffix, $allowed_pages)) {
        return;
    }

    // Enqueue styles and scripts only on the allowed pages
    wp_enqueue_style('big-store-admin-css', get_template_directory_uri() . '/lib/notification/css/admin.css', array(), BIG_STORE_THEME_VERSION, 'all');
    wp_enqueue_script('big-store-notifyjs', get_template_directory_uri() . '/lib/notification/js/notify.js', array('jquery'), BIG_STORE_THEME_VERSION, true);

    // Pass AJAX URL to the script
    wp_localize_script('big-store-notifyjs', 'theme_data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('thactivatenonce'), // Create nonce for security
        'redirectUrl' => esc_url(admin_url('themes.php?page=one-click-demo-import')), 
        'redirectUrlPro' => esc_url(admin_url('themes.php?page=themehunk-site-library'))
    ));
}
add_action('admin_enqueue_scripts', 'big_store_admin_script');


// Hook the function to clear the cookie when the theme is switched to
add_action('after_switch_theme', 'big_store_clear_notice_cookie');
?>

