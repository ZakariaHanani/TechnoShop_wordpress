<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bosa Ecommerce Shop 1.0.0
 */

get_header();
?>
<div id="content" class="site-content">
	<div class="container">
		<section class="wrap-detail-page ">
				<?php
					bosa_blog_page_title();
					if( get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'disable_in_all_pages' || get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
						bosa_breadcrumb_wrap();
					}
				?>
				<div class="row">
					<?php
						$sidebarClass = 'col-lg-8';
						$sidebarColumnClass = 'col-lg-4';
						$masonry_class = '';

						$i = 1;
						$full_end = 2;
						$small_end = 6;
						$increment = 6;
						$on_full = true;
						$on_small = false;

						if( get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid'){
							$masonry_class = 'masonry-wrapper';
						}
						if( get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid' ){
							$layout_class = 'grid-post-wrap';
						}elseif( get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'single' ){
							$layout_class = 'single-post';
						}
						if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){
							if( get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid' || get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid-thumbnail' ){
								if( !is_active_sidebar( 'right-sidebar') ){
									$sidebarClass = "col-12";
									$full_end = 3;
									$small_end = 9;
									$increment = 9;
								}	
							}else{
								if( !is_active_sidebar( 'right-sidebar') ){
									$sidebarClass = "col-lg-8 offset-lg-2";
								}
							}
						}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){
							if( get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid' || get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid-thumbnail' ){
								if( !is_active_sidebar( 'left-sidebar') ){
									$sidebarClass = "col-12";
									$full_end = 3;
									$small_end = 9;
									$increment = 9;
								}	
							}else{
								if( !is_active_sidebar( 'left-sidebar') ){
									$sidebarClass = "col-lg-8 offset-lg-2";
								}
							}
						}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
							$sidebarClass = 'col-lg-6';
							$sidebarColumnClass = 'col-lg-3';
							if( get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid' || get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid-thumbnail' ){
								if( !is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
									$sidebarClass = "col-12";
									$full_end = 3;
									$small_end = 9;
									$increment = 9;
								}	
							}else{
								if(!is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
									$sidebarClass = "col-lg-8 offset-lg-2";
								}
							}
						}
						if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'no-sidebar' || get_theme_mod( 'disable_sidebar_blog_page', false ) ){
							if( get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid' || get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid-thumbnail' ){
								$sidebarClass = "col-12";
								$full_end = 3;
								$small_end = 9;
								$increment = 9;	
							}else{
								$sidebarClass = 'col-lg-8 offset-lg-2';
							}
						}
						if( !get_theme_mod( 'disable_sidebar_blog_page', false ) ){
							if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){ 
								if( is_active_sidebar( 'left-sidebar') ){ ?>
									<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'left-sidebar' ); ?>
									</div>
							<?php }
								}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
									if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
										<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
											<?php dynamic_sidebar( 'left-sidebar' ); ?>
										</div>
							<?php
									}
								}
						} ?>
					
					<div id="primary" class="content-area <?php echo esc_attr( $sidebarClass ); ?>">
						<div class="row <?php echo esc_attr( $masonry_class ); ?>">
						<?php
						if ( have_posts() ) :

							if ( is_home() && !is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								if( get_theme_mod( 'archive_post_layout', 'grid-thumbnail' ) == 'grid-thumbnail'){
									if( $on_full ){
								    	if( $i <= $full_end  ) {
								    		$on_full = true;
								    	}else{
								    		$full_end = $full_end + $increment;
								    		$on_full = false;
								    		$on_small = true;
								    	}
								    }

								    if( $on_small ){
								    	if( $i <= $small_end  ) {
								    		$on_small = true;
								    	}else{
							        		$small_end = $small_end + $increment ;
							        		$on_small = false;
							        		$on_full = true;
							        	}
								    }
								    $args = array(
								    	'on_full' => $on_full,
								    	'on_small' => $on_small,
								    );

								    $i++;
									get_template_part( 'template-parts/grid', 'thumbnail', $args );
								}else{
									get_template_part( 'template-parts/content', get_post_type() );
								}

							endwhile;

						elseif ( !is_sticky() && ! have_posts() ):
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
						</div><!-- #main -->
						<?php
							if( !get_theme_mod( 'disable_pagination', false ) ):
								the_posts_pagination( array(
									'next_text' => '<span>'.esc_html__( 'Next', 'bosa-ecommerce-shop' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Next page', 'bosa-ecommerce-shop' ) . '</span>',
									'prev_text' => '<span>'.esc_html__( 'Prev', 'bosa-ecommerce-shop' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Previous page', 'bosa-ecommerce-shop' ) . '</span>',
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'bosa-ecommerce-shop' ) . ' </span>',
								));
							endif;
						?>
					</div><!-- #primary -->
					<?php
						if( !get_theme_mod( 'disable_sidebar_blog_page', false ) ){
							if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){ 
								if( is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary" class="sidebar right-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'right-sidebar' ); ?>
									</div>
								<?php }
							}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
								if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
									<div id="secondary-sidebar" class="sidebar right-sidebar <?php echo esc_attr( $sidebarColumnClass ); ?>">
										<?php dynamic_sidebar( 'right-sidebar' ); ?>
									</div>
							<?php
								}
							}
						}
					?>
				</div>
		</section>
	</div><!-- #container -->
</div><!-- #content -->	
<?php
get_footer();
