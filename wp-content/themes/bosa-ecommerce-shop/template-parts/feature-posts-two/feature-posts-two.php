<?php
$feature_posts_two_id = get_theme_mod( 'feature_posts_two_category', '' );

$query = new WP_Query( apply_filters( 'bosa_feature_posts_two_args', array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 5,
	'cat'                 => $feature_posts_two_id,
	'offset'              => 0,
	'ignore_sticky_posts' => 1
)));

$posts_array = $query->get_posts();
$show_feature_posts_two = count( $posts_array ) > 0 && is_home();

if( !get_theme_mod( 'disable_feature_posts_two_section', false ) && $show_feature_posts_two ){ ?>
	<section class="section-feature-posts-two-area">
		<?php if( ( !get_theme_mod( 'disable_feature_posts_two_section_title', true ) && get_theme_mod( 'feature_posts_two_section_title', '' ) ) || ( !get_theme_mod( 'disable_feature_posts_two_section_description', true ) && get_theme_mod( 'feature_posts_two_section_description', '' ) ) ){ ?>
			<div class="section-title-wrap <?php echo esc_attr( get_theme_mod( 'feature_posts_two_section_title_desc_alignment', 'text-left' ) ); ?> ">
				<?php if( !get_theme_mod( 'disable_feature_posts_two_section_title', true ) && get_theme_mod( 'feature_posts_two_section_title', '' ) ) { ?>
					<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'feature_posts_two_section_title', '' ) ); ?></h2>
				<?php } 
				if(  !get_theme_mod( 'disable_feature_posts_two_section_description', true ) && get_theme_mod( 'feature_posts_two_section_description', '' ) ){ ?>
					<p><?php echo esc_html( get_theme_mod( 'feature_posts_two_section_description', '' ) ); ?></p>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="row">
		<?php
			$main_post = true;
			$i 		   = 1;
			while ( $query->have_posts() ) : $query->the_post();
			$render_feature_posts_two_image_size = get_theme_mod( 'render_feature_posts_two_image_size', 'bosa-420-300' );
			$image 							= get_the_post_thumbnail_url( get_the_ID(), $render_feature_posts_two_image_size );

			if( $main_post ){ $main_post = false; ?>
				<div class="col-md-12 col-lg-5">
			        <article class="post feature-posts-content-wrap feature-big-posts <?php echo esc_attr( get_theme_mod( 'feature_posts_two_horizontal_alignment', 'text-left' ) ); ?>">
			        	<div class="feature-posts-image" style="background-image: url( <?php echo esc_url( $image ); ?> );">
				        	<div class="feature-posts-content">
					          	<?php if( 'post' == get_post_type() ): 
									$categories_list = get_the_category_list( ' ' );
									if( $categories_list && !get_theme_mod( 'hide_feature_posts_two_category', false ) ):
									printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list );
								endif; endif; ?>
					            <?php if( !get_theme_mod( 'disable_feature_posts_two_title', false ) ){ ?>
									 <h3 class="feature-posts-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
								<?php } ?>
					            <div class="entry-meta">
									<?php if( !get_theme_mod( 'hide_feature_posts_two_date', false ) ): ?>
										<span class="posted-on">
											<a href="<?php echo esc_url( bosa_get_day_link() ); ?>" >
												<?php echo esc_html(get_the_date('M j, Y')); ?>
											</a>
										</span>
									<?php endif; 
									if( !get_theme_mod( 'hide_feature_posts_two_author', false ) ): ?>
										<span class="byline">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
												<?php echo get_the_author(); ?>
											</a>
										</span>
									<?php endif; 
									if( !get_theme_mod( 'hide_feature_posts_two_comment', false ) ): ?>
										<span class="comments-link">
											<a href="<?php comments_link(); ?>">
												<?php echo absint( wp_count_comments( get_the_ID() )->approved ); ?>
											</a>
										</span>
									<?php endif; ?>
								</div>
				        	</div>
			        	</div>
			        </article>
			    </div>
			<?php }else{
				if( $i == 2 ){ ?>
				<div class="col-md-12 col-lg-7">
			        <div class="row">
			        <?php } ?>
			        	<div class="col-md-6">
				            <article class="post feature-posts-content-wrap <?php echo esc_attr( get_theme_mod( 'feature_posts_two_horizontal_alignment', 'text-left' ) ); ?>">
				            	<div class="feature-posts-image" style="background-image: url( <?php echo esc_url( $image ); ?> );">
					            	<div class="feature-posts-content">
							          	<?php if( 'post' == get_post_type() ): 
											$categories_list = get_the_category_list( ' ' );
											if( $categories_list && !get_theme_mod( 'hide_feature_posts_two_category', false ) ):
											printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list );
										endif; endif; ?>
							            <?php if( !get_theme_mod( 'disable_feature_posts_two_title', false ) ){ ?>
											 <h3 class="feature-posts-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
										<?php } ?>
							            <div class="entry-meta">
											<?php if( !get_theme_mod( 'hide_feature_posts_two_date', false ) ): ?>
												<span class="posted-on">
													<a href="<?php echo esc_url( bosa_get_day_link() ); ?>" >
														<?php echo esc_html(get_the_date('M j, Y')); ?>
													</a>
												</span>
											<?php endif; 
											if( !get_theme_mod( 'hide_feature_posts_two_author', false ) ): ?>
												<span class="byline">
													<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
														<?php echo get_the_author(); ?>
													</a>
												</span>
											<?php endif; 
											if( !get_theme_mod( 'hide_feature_posts_two_comment', false ) ): ?>
												<span class="comments-link">
													<a href="<?php comments_link(); ?>">
														<?php echo absint( wp_count_comments( get_the_ID() )->approved ); ?>
													</a>
												</span>
											<?php endif; ?>
										</div>
						        	</div>
					        	</div>
				            </article>
			        	</div>
			        <?php if( count( $posts_array ) == $i ){ ?>
			        </div>
			    </div>
				<?php } ?>
			<?php } ?>
			<?php
			$i++;
			endwhile; 
			wp_reset_postdata();
		?>
		</div>
	</section>
<?php } ?>