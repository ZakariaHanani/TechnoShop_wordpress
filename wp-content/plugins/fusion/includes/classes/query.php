<?php
/**
 * @package Fusion
 */

/**
 * FusionCoreQuery class.
 *
 * Class for getting querying the WordPress database using AJAX
 *
 * @since 1.3.0
 */

class FusionCoreQuery	{
		
	public function __construct() {
		
		//get post count
		add_action( 'wp_ajax_nopriv_fsn_ajax_get_post_count', array($this, 'ajax_get_post_count') );
		add_action( 'wp_ajax_fsn_ajax_get_post_count', array($this, 'ajax_get_post_count') );
		
		//get posts
		add_action( 'wp_ajax_nopriv_fsn_ajax_get_posts', array($this, 'ajax_get_posts') );
		add_action( 'wp_ajax_fsn_ajax_get_posts', array($this, 'ajax_get_posts') );
	}
	
	/**
	 * AJAX Get Post Count
	 *
	 * @since 1.3.0
	 *
	 */
	
	public function ajax_get_post_count() {
		//verify nonce
		check_ajax_referer( 'fsn-query', 'security' );
		
		$post_type = !empty($_POST['post_type']) ? $_POST['post_type'] : 'post';
		
		$post_count_object = wp_count_posts($post_type);
		
		wp_send_json($post_count_object);
	}
	
	/**
	 * AJAX Get Posts
	 *
	 * @since 1.3.0
	 *
	 */
	
	public function ajax_get_posts() {
		//verify nonce
		check_ajax_referer( 'fsn-query', 'security' );
		
		$get_posts = get_posts($_POST['args']);
		
		wp_send_json($get_posts);
	}

}

$fsn_core_query = new FusionCoreQuery();

?>