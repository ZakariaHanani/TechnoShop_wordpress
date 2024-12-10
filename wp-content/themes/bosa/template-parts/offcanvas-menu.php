<?php
/** 
* Template for Off canvas Menu
* @since Bosa 1.0.0
*/
?>
<div id="offcanvas-menu" class="offcanvas-menu-wrap">
	<div class="close-offcanvas-menu">
		<button class="fas fa-times"></button>
	</div>
	<div class="offcanvas-menu-inner">
		<div class="offcanvas-menu-content">
			<?php if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_fifteen' ){ ?>
				<?php if ( !get_theme_mod( 'disable_header_woo_cat_menu', true ) && !get_theme_mod( 'disable_mobile_header_woo_cat_menu', false ) ) {
					if ( has_nav_menu( 'menu-4' ) ) { ?>
						<nav class="header-category-nav d-lg-none">
				            <ul class="nav navbar-nav navbar-left">
				                <li class="menu-item menu-item-has-children">
				                    <a href="#">
				                    	<i class="fas fa-bars"></i>
				                        <?php esc_html_e( 'Categories', 'bosa' ); ?>
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
						                        <?php esc_html_e( 'Categories', 'bosa' ); ?>
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
		        <?php
		        if( !get_theme_mod( 'disable_header_advertisement_text', false ) && !get_theme_mod( 'disable_mobile_header_advertisement_text', false ) ){
					$header_advertisement_text = get_theme_mod( 'header_advertisement_text', '' );
					if( !empty( $header_advertisement_text ) ){
					?>
						<div class="header-text d-lg-none"><?php echo esc_html( $header_advertisement_text ); ?></div>
					<?php } ?>
				<?php
				}
		    }
		    ?>
			<?php if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_eleven' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_fifteen' ){ ?>
				<!-- woocommerce search form -->
			    <?php if ( class_exists('WooCommerce' )) {
			    	if( !get_theme_mod( 'disable_search_icon', false ) && !get_theme_mod( 'disable_mobile_search_icon', false ) ){
			    		if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_eleven' ){
			    			$search_class = 'd-md-none';
			    		}else{
			    			$search_class = 'd-lg-none';
			    		}
			    	?>
			    	<form class="header-search-form <?php echo esc_attr( $search_class ); ?>" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    	                <input type="hidden" name="post_type" value="product" />
    	                <input class="header-search-input" name="s" type="text" placeholder="<?php esc_attr_e('Search products...', 'bosa'); ?>"/>
    	                <div class="d-inline-block"> 
    	                	<select class="header-search-select" name="product_cat">
	    	                    <option value=""><?php esc_html_e('All Categories', 'bosa'); ?></option> 
	    	                    <?php
	    	                    $categories = get_categories('taxonomy=product_cat');
	    	                    foreach ($categories as $category) {
	    	                        $option = '<option value="' . esc_attr($category->category_nicename) . '">';
	    	                        $option .= esc_html($category->cat_name);
	    	                        $option .= ' (' . absint($category->category_count) . ')';
	    	                        $option .= '</option>';
	    	                        echo $option; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	    	                    }
	    	                    ?>
	    	                </select>
    	                </div>
    	                <button class="header-search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    	            </form>
		    	<?php }
			    } ?>
			<?php } ?>
			<?php if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_twelve' ){
				if( !get_theme_mod( 'disable_header_date', false ) && !get_theme_mod( 'disable_mobile_date', false ) ){ ?>
					<span class="header-date d-lg-none">
			        	<?php echo wp_kses_post(date_i18n(get_option('date_format'))); ?>
			        </span>
			    <?php } ?>
			    <?php if( get_theme_mod( 'header_advertisement_banner', '' ) != '' && !get_theme_mod( 'disable_mobile_ad_banner', false ) ){ ?>
				    <div class="d-md-none"> 
				    	<?php bosa_header_advertisement_banner(); ?> 
				    </div>
				<?php } ?>
			<?php } ?>
			<?php if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_fifteen' ){
			    if( get_theme_mod( 'header_advertisement_banner', '' ) != '' && !get_theme_mod( 'disable_mobile_ad_banner', false ) ){ ?>
				    <div class="d-md-none"> 
				    	<?php bosa_header_advertisement_banner(); ?> 
				    </div>
				<?php } ?>
			<?php } ?>
			<?php if( !get_theme_mod( 'disable_secondary_menu', false ) ){ ?>
				<!-- header secondary menu -->
				<?php if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_three' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_six' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_seven' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_eleven' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_twelve' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_fifteen' ){ ?>
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
			<?php if( !get_theme_mod( 'disable_search_icon', false ) && !get_theme_mod( 'disable_mobile_search_icon', false ) ) { ?>
				<!-- header search field -->
				<?php if( get_theme_mod( 'header_layout', 'header_one' ) !== 'header_eleven' && get_theme_mod( 'header_layout', 'header_one' ) !== 'header_fifteen' ){ ?>
					<div class="header-search-wrap d-lg-none">
				 		<?php get_search_form();  ?>
					</div>
			<?php } } ?>
			<?php
			if ( !get_theme_mod( 'disable_header_button', false ) && !get_theme_mod( 'disable_mobile_header_buttons', false ) ){
				if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_one' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_ten' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_thirteen' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_fourteen' ){ 
					if( bosa_has_header_buttons() ){ 
						echo '<div class="header-btn-wrap d-lg-none">';
							echo '<div class="header-btn">';
								bosa_header_buttons();
							echo '</div>';
		            	echo ' </div>';	 
		            }
		    	}
		    	if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_two' ){
					if( bosa_has_transparent_buttons() ){
						echo '<div class="header-btn-wrap d-lg-none">';
							echo '<div class="header-btn">';
								bosa_transparent_buttons();
							echo '</div>';
						echo '</div>';	 
		            }
		   	 	}
		   	} ?>

		    <?php if ( !get_theme_mod( 'disable_contact_detail', false ) && !get_theme_mod( 'disable_mobile_contact_details', false ) && ( get_theme_mod( 'contact_phone', '' )  || get_theme_mod( 'contact_email', '' )  || get_theme_mod( 'contact_address', '' ) ) ){ ?>
			    <?php if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_one' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_two' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_seven' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_ten' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_eleven' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_thirteen' || get_theme_mod( 'header_layout', 'header_one' ) == 'header_fourteen' ){ ?>
			    	<!-- header contact details -->
					<div class="d-lg-none">
						<?php get_template_part( 'template-parts/header', 'contact' ); ?>
					</div>
				<?php } ?>
			<?php } ?>
			<?php if( !get_theme_mod( 'disable_header_social_links', false ) && !get_theme_mod( 'disable_mobile_social_icons_header', false ) && bosa_has_social() ){
				echo '<div class="social-profile d-lg-none">';
					bosa_social();
				echo '</div>'; 
			} ?> <!-- header social icons -->		
		</div>
		<?php if( is_active_sidebar( 'menu-sidebar' ) ){ ?>
			<!-- header sidebar -->
			<div class="header-sidebar">
				<?php dynamic_sidebar( 'menu-sidebar' ); ?>
			</div>
		<?php } ?>	
	</div>
</div>