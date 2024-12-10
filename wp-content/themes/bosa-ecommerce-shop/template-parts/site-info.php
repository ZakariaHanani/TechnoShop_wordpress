<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Ecommerce Shop 1.0.0
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-ecommerce-shop' ) ) );
		echo esc_html( date( 'Y' ) );
		printf( esc_html__( ' Bosa Ecommerce Shop. Powered by', 'bosa-ecommerce-shop' ) );
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bosa-ecommerce-shop' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'WordPress', 'bosa-ecommerce-shop' ) );
		?>
	</a>
</div><!-- .site-info -->