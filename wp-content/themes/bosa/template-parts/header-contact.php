<?php
/**
 * Template part for displaying header contact.
 *
 * @since Bosa 1.0.0
 */

?>

<?php if( !get_theme_mod( 'disable_contact_detail', false ) ){ ?>
	<div class="header-contact">
		<ul>
			<li>
				<?php if( get_theme_mod( 'contact_phone', '' ) ){ ?>
					<a href="<?php echo esc_url( 'tel:' . get_theme_mod( 'contact_phone', '' ) ); ?>"><i class="fas fa-phone-alt"></i>
						<?php
						if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_thirteen' ){ ?>
							<span><?php echo esc_html( get_theme_mod( 'header_phone_label', '' ) ); ?></span>
							<?php
							}
						?>
						<?php echo esc_html( get_theme_mod( 'contact_phone', '' ) ); ?>
					</a>
				<?php } ?>
			</li>
			<li>
				<?php if( get_theme_mod( 'contact_email', '' ) ){ ?>
					<a href="<?php echo esc_url( 'mailto:' . get_theme_mod( 'contact_email', '' ) ); ?>"><i class="fas fa-envelope"></i>
						<?php
						if(  get_theme_mod( 'header_layout', 'header_one' ) == 'header_thirteen' ){ ?>
							<span><?php echo esc_html( get_theme_mod( 'header_email_label', '' ) ); ?></span>
							<?php
							}
						?>
					<?php echo esc_html( get_theme_mod( 'contact_email', '' ) ); ?>
					</a>
				<?php } ?>
			</li>
			<li>
				<?php if( get_theme_mod( 'contact_address', '' ) ){ ?>
					<i class="fas fa-map-marker-alt"></i>
					<?php
					if( get_theme_mod( 'header_layout', 'header_one' ) == 'header_thirteen' ){ ?>
						<span><?php echo esc_html( get_theme_mod( 'header_address_label', '' ) ); ?></span>
						<?php
						}
					?>
					<?php echo esc_html( get_theme_mod( 'contact_address', '' ) ); ?>
				<?php } ?>
			</li>
		</ul>
	</div>
<?php } ?>