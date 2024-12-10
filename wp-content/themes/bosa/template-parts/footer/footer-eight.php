<div class="bottom-footer">
	<div class="container">
		<!-- social links area -->
		<?php
		$no_content = 'col-lg-12 text-center';
		$align_class = '';
		if( ( has_nav_menu( 'menu-2' ) && !get_theme_mod( 'disable_footer_menu', false ) ) || get_theme_mod( 'bottom_footer_image', '' ) ){
			$no_content = 'col-lg-5';
			$align_class = 'text-right';
		} 
	 	if( !get_theme_mod( 'disable_footer_social_links', false ) && bosa_has_social() ){
			echo '<div class="social-profile">';
				bosa_social();
			echo '</div>'; 
		} ?> <!-- social links area -->
		<div class="copyright-wrap <?php echo esc_attr( $align_class ); ?>">
			<div class="row align-items-center">
				<?php
				if ( has_nav_menu( 'menu-2' ) && !get_theme_mod( 'disable_footer_menu', false )){ ?>
					<div class="col-lg-5">
						<div class="footer-menu"><!-- Footer Menu-->
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu',
								'depth'          => 1,
							) );
							?>
						</div><!-- footer Menu-->				
					</div>
				<?php } ?>
				<?php if( get_theme_mod( 'bottom_footer_image', '' ) ){ ?>
					<div class="col-lg-2">
						<?php bosa_footer_image(); ?>
					</div>
				<?php } ?>
				<div class="<?php echo esc_attr( $no_content ); ?>">
					<?php get_template_part( 'template-parts/site', 'info' ); ?>
				</div>
			</div>
		</div>
	</div> 
</div>