/**
 * JS WP Query Scripts.
 *
 * Scripts for running and returning returning WP Query
 *
 * @since 1.3.0
 *
 * @package Fusion
 */
 
//AJAX Get Posts
function fsnAjaxGetPosts($args, callback) {
	if ($args == undefined) {
		return false;
	}
	if ($args.post_type == undefined) {
		$args.post_type = 'post';
	}
	if ($args.post_status == undefined) {
		$args.post_status = $args.post_type == 'attachment' ? 'inherit' : 'publish';
	}
	if ($args.posts_per_page == undefined) {
		$args.posts_per_page = 5;
	}
	
	var data = {
		action: 'fsn_ajax_get_post_count',
		post_type : $args.post_type,
		security: fsnQuery.fsnQueryNonce
	};
	var ajaxCountPosts = jQuery.post(fsnQuery.ajaxurl, data, function(response) {
		//check nonce
		if (response == '-1') {
			alert(fsnQuery.fsnQueryError);
			return false;
		}
	}, 'json');
	ajaxCountPosts.done(function(postCountObject) {
		var totalPages = Math.ceil(parseInt(postCountObject[$args.post_status])/$args.posts_per_page);
		var pagesArray = [];
		for (i = 1; i <= totalPages; i++) {
			pagesArray.push(i);
		}
		var promises = [];
		pagesArray = jQuery.map(pagesArray, function(page, index) {
			$args.paged = page;
			var data = {
				action: 'fsn_ajax_get_posts',
				args : $args,
				security: fsnQuery.fsnQueryNonce
			};
			var promise = jQuery.post(fsnQuery.ajaxurl, data, function(response) {
				//check nonce
				if (response == '-1') {
					alert(fsnQuery.fsnQueryError);
					return false;
				}
				pagesArray.push({
					page : page,
					posts : response
				});
			}, 'json');
			promises.push(promise);
		});
		jQuery.when.apply(null, promises).then(function() {
	        pagesArray.sort(function(a, b) {
				return a.page - b.page;
			});
			var $posts = jQuery.map(pagesArray, function(page, index) {
				return page.posts
			});
	        callback($posts);
	    });
	});
}