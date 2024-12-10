<?php

$page_one 	= get_theme_mod( 'featured_pages_one', '' );
$page_two 	= get_theme_mod( 'featured_pages_two', '' );
$page_three = get_theme_mod( 'featured_pages_three', '' );
$page_four 	= get_theme_mod( 'featured_pages_four', '' );

$page_array = array();
$columns_class = '';
$has_page = false;
$columns_num = get_theme_mod( 'featured_pages_columns', 'four_columns' );
if( $columns_num == 'one_column' ){
	$columns_class = 'col-md-12';
	if( !empty( $page_one ) ){
		$has_page = true;
		$page_array['page_one'] = array(
			'ID' => $page_one,
		);
	}
}elseif( $columns_num == 'two_columns' ){
	$columns_class = 'col-md-6';
	if( !empty( $page_one ) ){
		$has_page = true;
		$page_array['page_one'] = array(
			'ID' => $page_one,
		);
	}
	if( !empty( $page_two ) ){
		$has_page = true;
		$page_array['page_two'] = array(
			'ID' => $page_two,
		);
	}
}elseif( $columns_num == 'three_columns' ){
	$columns_class = 'col-md-4';
	if( !empty( $page_one ) ){
		$has_page = true;
		$page_array['page_one'] = array(
			'ID' => $page_one,
		);
	}
	if( !empty( $page_two ) ){
		$has_page = true;
		$page_array['page_two'] = array(
			'ID' => $page_two,
		);
	}
	if( !empty( $page_three ) ){
		$has_page = true;
		$page_array['page_three'] = array(
			'ID' => $page_three,
		);
	}
}elseif( $columns_num == 'four_columns' ){
	$columns_class = 'col-md-3';
	if( !empty( $page_one ) ){
		$has_page = true;
		$page_array['page_one'] = array(
			'ID' => $page_one,
		);
	}
	if( !empty( $page_two ) ){
		$has_page = true;
		$page_array['page_two'] = array(
			'ID' => $page_two,
		);
	}
	if( !empty( $page_three ) ){
		$has_page = true;
		$page_array['page_three'] = array(
			'ID' => $page_three,
		);
	}
	if( !empty( $page_four ) ){
		$has_page = true;
		$page_array['page_four'] = array(
			'ID' => $page_four,
		);
	}
}

if( !get_theme_mod( 'disable_featured_pages_section', false ) && $has_page ){
	$feature_title_desc_align = get_theme_mod( 'featured_pages_section_title_desc_alignment', 'text-left' ); ?>
	<section class="section-feature-pages-area feature-pages-layout-one">
		<?php if( ( !get_theme_mod( 'disable_featured_pages_section_title', true ) && get_theme_mod( 'featured_pages_section_title', '' ) ) || ( !get_theme_mod( 'disable_featured_pages_section_description', true ) && get_theme_mod( 'featured_pages_section_description', '' ) ) ){ ?>
			<div class="section-title-wrap <?php echo esc_attr( $feature_title_desc_align ); ?> ">
				<?php if( !get_theme_mod( 'disable_featured_pages_section_title', true ) && get_theme_mod( 'featured_pages_section_title', '' ) ) { ?>
					<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'featured_pages_section_title', '' ) ); ?></h2>
				<?php } 
				if(  !get_theme_mod( 'disable_featured_pages_section_description', true ) && get_theme_mod( 'featured_pages_section_description', '' ) ){ ?>
					<p><?php echo esc_html( get_theme_mod( 'featured_pages_section_description', '' ) ); ?></p>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="content-wrap">
			<div class="row">
			<?php
				foreach( $page_array as $each_page ){
					$render_feature_pages_image_size 	= get_theme_mod( 'render_feature_pages_image_size', 'bosa-420-300' );
					$image 								= get_the_post_thumbnail_url( $each_page[ 'ID' ], $render_feature_pages_image_size );
					?>
					<div class="<?php echo esc_attr( $columns_class ); ?>">
						<article class="post feature-pages-content-wrap <?php echo esc_attr( get_theme_mod( 'featured_pages_text_alignment', 'text-center' ) ); ?>">
							<div class="feature-pages-image" style="background-image: url( <?php echo esc_url( $image ); ?> );">
								<div class="feature-pages-content">
									<?php if( !get_theme_mod( 'disable_featured_pages_title', false ) ){ ?>
										<h3 class="feature-pages-title">
											<a href="<?php the_permalink( $each_page[ 'ID' ] ); ?>">
												<?php echo get_the_title( $each_page[ 'ID' ] ); ?>
											</a>
										</h3>
									<?php } ?>
								</div>
							</div>
						</article>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>