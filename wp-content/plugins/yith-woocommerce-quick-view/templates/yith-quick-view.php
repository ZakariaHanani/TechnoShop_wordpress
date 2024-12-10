<?php
/**
 * Quick view bone.
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'YITH_WCQV' ) || exit; // Exit if accessed directly.

?>

<div id="yith-quick-view-modal" class="yith-quick-view yith-modal">
	<div class="yith-quick-view-overlay"></div>
	<div id=""class="yith-wcqv-wrapper">
		<div class="yith-wcqv-main">
			<div class="yith-wcqv-head">
				<a href="#" class="yith-quick-view-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </a>
			</div>
			<div id="yith-quick-view-content" class="yith-quick-view-content woocommerce single-product"></div>
		</div>
	</div>
</div>
<?php
