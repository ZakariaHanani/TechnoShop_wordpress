<?php
function advanced_import_allowed_html( $input ) {
	$allowed_html = wp_kses_allowed_html( 'post' );
	$output       = wp_kses( $input, $allowed_html );
	return $output;
}

function advanced_import_current_url() {
	global $pagenow;
	$current_url = $pagenow == 'tools.php' ? admin_url( 'tools.php?page=advanced-import-tool' ) : admin_url( 'themes.php?page=advanced-import' );
	return apply_filters( 'advanced_import_current_url', $current_url, $pagenow );
}

function advanced_import_get_current_theme_author() {
	$current_theme = wp_get_theme();
	return $current_theme->get( 'Author' );
}
function advanced_import_get_current_theme_slug() {
	$current_theme = wp_get_theme();
	return $current_theme->stylesheet;
}
function advanced_import_get_theme_screenshot() {
	$current_theme = wp_get_theme();
	return $current_theme->get_screenshot();
}
function advanced_import_get_theme_name() {
	$current_theme = wp_get_theme();
	return $current_theme->get( 'Name' );
}

function advanced_import_update_option( $option, $value = '' ) {
	$option = apply_filters( 'advanced_import_update_option_' . $option, $option, $value );
	$value  = apply_filters( 'advanced_import_update_value_' . $option, $value, $option );
	update_option( $option, $value );
}


function advanced_import_add_installed_time() {
	$helper_options = json_decode( get_option( 'advanced_import_settings_options' ), true );
	if ( ! isset( $helper_options['installed_time'] ) || ! $helper_options['installed_time'] ) {
		$helper_options['installed_time'] = time();
		update_option(
			'advanced_import_settings_options',
			wp_json_encode( $helper_options )
		);
	}
}

function advanced_import_add_log( $entry, $file = 'advanced-import.log', $mode = 'default' ) {
	// Get WordPress uploads directory.
	$upload_dir = wp_upload_dir();
	$upload_dir = $upload_dir['basedir'];
	// If the entry is array, json_encode.
	if ( is_array( $entry ) ) {
		$entry = json_encode( $entry );
	}
	// Write the log file.
	$file = $upload_dir . '/' . $file;
	if ( 'default' === $mode ) {
		if ( file_exists( $file ) ) {
			$mode = 'a';
		} else {
			$mode = 'w';
		}
	}

	$file  = fopen( $file, $mode );
	$bytes = fwrite( $file, $entry . "\n" );
	fclose( $file );
	return $bytes;
}

function advanced_import_get_post_by_title( $title, $post_type = 'page' ) {
	$args  = array(
		'post_type'      => $post_type,
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'title'          => $title,
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		$query->the_post();
		$post = get_post();
		wp_reset_postdata();
		return $post;
	}
	return false;
}



if ( ! function_exists( 'advanced_import_is_plugin_active' ) ) {
	/**
	 * Checks if a given plugin is active.
	 *
	 * @since 1.0.0
	 *
	 * @param string $plugin Plugin folder with main file e.g., my-plugin/my-plugin.php.
	 * @return bool True if the plugin is active, otherwise false.
	 */
	function advanced_import_is_plugin_active( $plugin ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		return is_plugin_active( $plugin );
	}
}

if ( ! function_exists( 'advanced_import_install_plugin' ) ) {
	/**
	 * Install and activate a WordPress plugin.
	 *
	 * @param array $plugin_info Plugin information array containing 'name', 'slug', 'plugin', and 'source'(optional).
	 * @return array Associative array with 'success' boolean and 'message' string.
	 */
	function advanced_import_install_plugin( $plugin_info ) {
		if ( ! isset( $plugin_info ['name'] ) || ! isset( $plugin_info ['slug'] ) || ! isset( $plugin_info ['plugin'] ) ) {
			// Not enough plugin info.
			return array(
				'code'    => 203,
				'success' => false,
				'message' => sprintf(
					/* translators: %s the plugin info */
					esc_html__( 'Not enough information about plugin. Plugin info %s', 'advanced-import' ),
					esc_html( wp_json_encode( $plugin_info ) )
				),
			);
		}

		$name   = sanitize_text_field( $plugin_info['name'] );
		$slug   = sanitize_key( $plugin_info['slug'] );
		$plugin = sanitize_text_field( $plugin_info['plugin'] );
		$source = isset( $plugin_info['source'] ) ? esc_url_raw( $plugin_info['source'] ) : '';

		include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		include_once ABSPATH . 'wp-admin/includes/plugin.php';

		if ( advanced_import_is_plugin_active( $plugin ) ) {
			// Plugin is already active.
			return array(
				'code'    => 200,
				'success' => true,
				'message' => sprintf(
					/* translators: %s is the plugin name */
					esc_html__( 'Plugin "%s" is already active.', 'advanced-import' ),
					esc_html( $name )
				),
			);
		}

		// The plugin is installed, but not active.
		if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin ) ) {
			$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );

			if ( advanced_import_is_plugin_active( $plugin ) ) {
				// Plugin is already active.
				return array(
					'code'    => 200,
					'success' => true,
					'message' => sprintf(
						/* translators: %s is the plugin name */
						esc_html__( 'Plugin "%s" is already active.', 'advanced-import' ),
						esc_html( $name )
					),
				);
			}
			if ( current_user_can( 'activate_plugin', $plugin ) ) {
				$result = activate_plugin( $plugin );

				if ( is_wp_error( $result ) ) {
					// Plugin is already active.
					return array(
						'code'    => $result->get_error_code(),
						'success' => false,
						'message' => sprintf(
							/* translators: %1$s is the plugin name, %2$s is error message */
							esc_html__( 'Error activating plugin "%1$s": %2$s', 'advanced-import' ),
							esc_html( $name ),
							esc_html( $result->get_error_message() )
						),
					);
				}

				return array(
					'code'    => 200,
					'success' => true,
					'message' => sprintf(
						/* translators: %s is the plugin name.*/
						esc_html__( 'Plugin "%s" activated successfully.', 'advanced-import' ),
						esc_html( $name ),
					),
				);
			} else {
				return array(
					'code'    => 403,
					'success' => false,
					'message' => sprintf(
						/* translators: %s is the plugin name.*/
						esc_html__( 'You don\'t have permission to activate the plugin "%s".', 'advanced-import' ),
						esc_html( $name ),
					),
				);
			}
		}

		if ( ! current_user_can( 'install_plugins' ) ) {
			return array(
				'code'    => 403,
				'success' => false,
				'message' => sprintf(
					/* translators: %s is the plugin name.*/
					esc_html__( 'You don\'t have permission to install the plugin "%s".', 'advanced-import' ),
					esc_html( $name ),
				),
			);
		}

		if ( $source ) {
			// Install plugin from external source.
			$download_link = $source;
		} else {
			// Install plugin from WordPress repository.
			$api = plugins_api(
				'plugin_information',
				array(
					'slug'   => $slug,
					'fields' => array( 'sections' => false ),
				)
			);

			if ( is_wp_error( $api ) ) {
				return array(
					'code'    => $api->get_error_code(),
					'success' => false,
					'message' => sprintf(
						/* translators: %1$s is the plugin name, %2$s is error message */
						esc_html__( 'Error retrieving information for plugin "%1$s": %2$s', 'advanced-import' ),
						esc_html( $name ),
						esc_html( $result->get_error_message() )
					),
				);
			}
			$name          = ! $name ? $api->name : $name;
			$download_link = $api->download_link;
		}

		$skin     = new WP_Ajax_Upgrader_Skin();
		$upgrader = new Plugin_Upgrader( $skin );
		$result   = $upgrader->install( $download_link );

		if ( is_wp_error( $result ) ) {
			return array(
				'code'    => $result->get_error_code(),
				'success' => false,
				'message' => sprintf(
					/* translators: %1$s is the plugin name, %2$s is error message */
					esc_html__( 'Error installing plugin "%1$s": %2$s', 'advanced-import' ),
					esc_html( $name ),
					esc_html( $result->get_error_message() )
				),
			);
		} elseif ( is_wp_error( $skin->result ) ) {
			return array(
				'code'    => $skin->result->get_error_code(),
				'success' => false,
				'message' => sprintf(
					/* translators: %1$s is the plugin name, %2$s is error message */
					esc_html__( 'Error installing plugin "%1$s": %2$s', 'advanced-import' ),
					esc_html( $name ),
					esc_html( $skin->result->get_error_message() )
				),
			);
		} elseif ( $skin->get_errors()->get_error_code() ) {
			return array(
				'code'    => $skin->et_error_code(),
				'success' => false,
				'message' => sprintf(
					/* translators: %1$s is the plugin name, %2$s is error message */
					esc_html__( 'Error installing plugin "%1$s": %2$s', 'advanced-import' ),
					esc_html( $name ),
					esc_html( $skin->get_error_messages() )
				),
			);
		} elseif ( is_null( $result ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
			WP_Filesystem();
			global $wp_filesystem;

			$error_message = __( 'Unable to connect to the filesystem. Please confirm your credentials.', 'advanced-import' );

			if ( $wp_filesystem instanceof WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->get_error_code() ) {
				$error_message = $wp_filesystem->errors->get_error_message();
			}

			return array(
				'code'    => 501,
				'success' => false,
				'message' => sprintf(
					/* translators: %1$s is the plugin name, %2$s is error message */
					esc_html__( 'Error installing plugin "%1$s": %2$s', 'advanced-import' ),
					esc_html( $name ),
					esc_html( $error_message )
				),
			);
		}

		if ( advanced_import_is_plugin_active( $plugin ) ) {
			// Plugin is already active.
			return array(
				'code'    => 200,
				'success' => true,
				'message' => sprintf(
					/* translators: %s is the plugin name.*/
					esc_html__( 'Plugin "%s" activated successfully.', 'advanced-import' ),
					esc_html( $name ),
				),
			);
		}

		if ( current_user_can( 'activate_plugin', $plugin ) ) {
			$result = activate_plugin( $plugin );

			if ( is_wp_error( $result ) ) {
				return array(
					'code'    => $result->get_error_code(),
					'success' => false,
					'message' => sprintf(
					/* translators: %1$s is the plugin name, %2$s is error message */
						esc_html__( 'Error activating plugin "%1$s": %2$s', 'advanced-import' ),
						esc_html( $name ),
						esc_html( $result->get_error_message() )
					),
				);
			}
		} else {
			return array(
				'code'    => 401,
				'success' => false,
				'message' => sprintf(
					/* translators: %s is the plugin name.*/
					esc_html__( 'You don\'t have permission to activate the plugin "%s".', 'advanced-import' ),
					esc_html( $name ),
				),
			);
		}

		return array(
			'success' => true,
			'code'    => 200,
			'message' => sprintf(
				/* translators: %s is the plugin name.*/
				esc_html__( 'Plugin "%s" installed and activated successfully.', 'advanced-import' ),
				esc_html( $name ),
			),
		);
	}
}
