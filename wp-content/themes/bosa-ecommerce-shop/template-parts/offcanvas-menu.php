<?php
/** 
* Template for Off canvas Menu
* @since Bosa Ecommerce Shop 1.0.0
*/
?>
<div id="offcanvas-menu" class="offcanvas-menu-wrap">
	<div class="close-offcanvas-menu">
		<button class="fas fa-times"></button>
	</div>
	<div class="offcanvas-menu-inner">
		<div class="offcanvas-menu-content">
			<?php if( get_theme_mod( 'header_layout', 'header_four' ) == 'header_four' ){ ?>
				<?php if ( !get_theme_mod( 'disable_header_woo_cat_menu', false ) && !get_theme_mod( 'disable_mobile_header_woo_cat_menu', false ) ) {
					if ( has_nav_menu( 'menu-4' ) ) { ?>
						<nav class="header-category-nav d-lg-none">
				            <ul class="nav navbar-nav navbar-left">
				                <li class="menu-item menu-item-has-children">
				                    <a href="#">
				                    	<i class="fas fa-bars"></i>
				                        <?php esc_html_e( 'Categories', 'bosa-ecommerce-shop' ); ?>
				                    </a>
				                    <?php
				                    wp_nav_menu(array(
				                        'container'      => '',
										'theme_location' => 'menu-4',
										'menu_id'        => 'woo-cat-menu',
										'menu_class' => 'dropdown-menu',
				                    ));
				                    ?>
				                </li>
				            </ul>
				        </nav>
            		<?php } else {
            			if( class_exists( 'WooCommerce' ) ){
            				$categories = get_categories( 'taxonomy=product_cat' );
            				if( is_array( $categories ) && !empty( $categories ) ){ ?>
				                <nav class="header-category-nav d-lg-none">
				                	<ul class="nav navbar-nav navbar-left">
						                <li class="menu-item menu-item-has-children">
						                    <a href="#">
						                    	<i class="fas fa-bars"></i>
						                        <?php esc_html_e( 'Categories', 'bosa-ecommerce-shop' ); ?>
						                    </a>
						                    <ul class="menu-categories-menu dropdown-menu">
						                        <?php
						                        foreach( $categories as $category ) {
						                            $category_permalink = get_category_link( $category->cat_ID ); ?>
						                            <li class="menu-item <?php echo esc_attr( $category->category_nicename ); ?>">
						                            	<a href="<?php echo esc_url( $category_permalink ); ?>">
						                            		<?php echo esc_html( $category->cat_name ); ?>
						                            	</a>
						                            </li>  
						                        <?php } ?>
						                    </ul>
						                </li>
						            </ul>
				                </nav>
			        		<?php } ?>
			        	<?php } ?>
			        <?php } ?>
		        <?php } ?>
				<!-- woocommerce search form -->
			    <?php if( !get_theme_mod( 'disable_search_icon', false ) && !get_theme_mod( 'disable_mobile_search_icon', false ) ){
			    	if ( class_exists('WooCommerce' ) && function_exists( 'header_wooCom_cat_search' ) ) { ?>
			    		<div class="d-lg-none">
				    		<?php header_wooCom_cat_search(); ?>
				    	</div>
		    		 <?php }else{ ?>
		    			<div class="header-search-wrap d-lg-none">
		    				<?php get_search_form(); ?>
		    			</div>
		    		<?php }
			    } ?>
			<?php } ?>
			<?php if( get_theme_mod( 'header_layout', 'header_four' ) == 'header_four' ){
			    if( get_theme_mod( 'header_advertisement_banner', '' ) != '' && !get_theme_mod( 'disable_mobile_ad_banner', false ) ){ ?>
				    <div class="d-md-none"> 
				    	<?php bosa_header_advertisement_banner(); ?> 
				    </div>
				<?php } ?>
			<?php } ?>
			<!-- header secondary menu -->
			<?php if( !get_theme_mod( 'disable_secondary_menu', false ) ){ ?>
				<?php if( get_theme_mod( 'header_layout', 'header_four' ) == 'header_three' || get_theme_mod( 'header_layout', 'header_four' ) == 'header_four' ){ ?>
					<?php if( has_nav_menu( 'menu-3') ){ ?>
						<nav class="header-navigation d-lg-none">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'secondary-menu',
							) );
							?>
						</nav><!-- #site-navigation -->
					<?php } ?>
				<?php } ?>
			<?php } ?>
			<!-- header search field -->
			<?php if( !get_theme_mod( 'disable_search_icon', false ) && !get_theme_mod( 'disable_mobile_search_icon', false ) ) { ?>
				<?php if( get_theme_mod( 'header_layout', 'header_four' ) !== 'header_four' ){ ?>
					<div class="header-search-wrap d-lg-none">
			 			<?php get_search_form();  ?>
					</div>
			<?php } } ?>
			<!-- header callback button -->
			<?php
			if ( !get_theme_mod( 'disable_header_button', false ) && !get_theme_mod( 'disable_mobile_header_buttons', false ) ){
				if( get_theme_mod( 'header_layout', 'header_four' ) == 'header_one' ){ 
					$header_btn_defaults = array(
						array(
							'header_btn_type' 			=> 'button-outline',
							'header_btn_bg_color'		=> '#EB5A3E',
							'header_btn_border_color'	=> '#1a1a1a',
							'header_btn_text_color'		=> '#1a1a1a',
							'header_btn_hover_color'	=> '#086abd',
							'header_btn_text' 			=> '',
							'header_btn_link' 			=> '',
							'header_btn_target'			=> true,
							'header_btn_radius'			=> 0,
						),	
					);
				
					$header_buttons = get_theme_mod( 'header_button_repeater', $header_btn_defaults );
					$has_header_btn = false;
					if ( is_array( $header_buttons ) ){
						foreach( $header_buttons as $value ){
							if( !empty( $value['header_btn_text'] ) ){
								$has_header_btn = true;
								break;
							}
						}
					}
					if( $has_header_btn ){ ?>
						<div class="header-btn-wrap d-lg-none">
							<div class="header-btn">
								<?php	
									$i = 1;
					            	foreach( $header_buttons as $value ){
					            		if( !empty( $value['header_btn_text'] ) ){
					            			$link_target = '';
											if( $value['header_btn_target'] ){
												$link_target = '_blank';
											}else {
												$link_target = '';
											} ?>
											<a href="<?php echo esc_url( $value['header_btn_link'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="header-btn-<?php echo $i.' '.esc_attr( $value['header_btn_type'] ); ?>">
												<?php echo esc_html( $value['header_btn_text'] ); ?>
											</a>
										<?php
					            		}
					            		$i++;
					            	}
					            ?>
					        </div>
		            	 </div>
		            <?php	 
		            }
		    	} 
		    	if( get_theme_mod( 'header_layout', 'header_four' ) == 'header_two' ){
					$transparent_header_btn_defaults = array(
						array(
							'transparent_header_btn_type' 				=> 'button-outline',
							'transparent_header_home_btn_bg_color'		=> '#EB5A3E',
							'transparent_header_home_btn_border_color'	=> '#ffffff',
							'transparent_header_home_btn_text_color'	=> '#ffffff',
							'transparent_header_btn_bg_color'			=> '#EB5A3E',
							'transparent_header_btn_border_color'		=> '#1a1a1a',
							'transparent_header_btn_text_color'			=> '#1a1a1a',
							'transparent_header_btn_hover_color'		=> '#086abd',
							'transparent_header_btn_text' 				=> '',
							'transparent_header_btn_link' 				=> '',
							'transparent_header_btn_target'				=> true,
							'transparent_header_btn_radius'				=> 0,
						),	
					);
				
					$transparent_header_buttons = get_theme_mod( 'transparent_header_button_repeater', $transparent_header_btn_defaults );
					$has_header_btn = false;
					if ( is_array( $transparent_header_buttons ) ){
						foreach( $transparent_header_buttons as $value ){
							if( !empty( $value['transparent_header_btn_text'] ) ){
								$has_header_btn = true;
								break;
							}
						}
					}
					if( $has_header_btn ){ ?>
						<div class="header-btn-wrap d-lg-none">
							<div class="header-btn">
								<?php	
									$i = 1;
					            	foreach( $transparent_header_buttons as $value ){
					            		if( !empty( $value['transparent_header_btn_text'] ) ){
					            			$link_target = '';
											if( $value['transparent_header_btn_target'] ){
												$link_target = '_blank';
											}else {
												$link_target = '';
											} ?>
											<a href="<?php echo esc_url( $value['transparent_header_btn_link'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="header-btn-<?php echo $i.' '.esc_attr( $value['transparent_header_btn_type'] ); ?>">
												<?php echo esc_html( $value['transparent_header_btn_text'] ); ?>
											</a>
										<?php
					            		}
					            		$i++;
					            	}
					            ?>
					        </div>
		            	 </div>
		            <?php	 
		            }
		   	 	}
		   	} ?>

		    <!-- header contact details -->
		    <?php if ( !get_theme_mod( 'disable_contact_detail', false ) && !get_theme_mod( 'disable_mobile_contact_details', false ) && ( get_theme_mod( 'contact_phone', '' )  || get_theme_mod( 'contact_email', '' )  || get_theme_mod( 'contact_address', '' ) ) ){ ?>
			    <?php if( get_theme_mod( 'header_layout', 'header_four' ) == 'header_one' || get_theme_mod( 'header_layout', 'header_four' ) == 'header_two' ){ ?>
					<div class="d-lg-none">
						<?php get_template_part( 'template-parts/header', 'contact' ); ?>
					</div>
				<?php } ?>
			<?php } ?>
			<?php if( !get_theme_mod( 'disable_header_social_links', false ) && !get_theme_mod( 'disable_mobile_social_icons_header', false ) && bosa_has_social() ){
				echo '<div class="social-profile d-lg-none">';
					bosa_social();
				echo '</div>'; 
			} ?>
			<!-- header social icons -->		
		</div>
		<!-- header sidebar -->
		<?php if( is_active_sidebar( 'menu-sidebar' ) ){ ?>
			<div class="header-sidebar">
				<?php dynamic_sidebar( 'menu-sidebar' ); ?>
			</div>
		<?php } ?>	
	</div>
</div>