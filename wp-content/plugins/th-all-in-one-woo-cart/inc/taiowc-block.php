<?php if ( ! defined( 'ABSPATH' ) ) exit;

/****************/
//Block registered
/****************/

function taiowc_register_blocks() {
    $blocks = array(
        array(
            'name'           => 'taiowc/taiowc',
            'script_handle'  => 'taiowc',
            'editor_style'   => 'taiowc-editor-style',
            'frontend_style' => 'taiowc-frontend-style',
            'render_callback' => 'taiowc_blocks_render_callback',
            'localize_data'  => array(
                'adminUrltaiowc' => admin_url('admin.php?page=taiowc'),
            ),
        ),
    );
  
    foreach ( $blocks as $block ) {
        // Register JavaScript file
        wp_register_script(
            $block['script_handle'],
            TAIOWC_PLUGIN_URI . 'build/' . $block['script_handle'] . '.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor' ),
            filemtime( TAIOWC_PLUGIN_PATH . '/build/' . $block['script_handle'] . '.js' )
        );
  
        // Register editor style
        wp_register_style(
            $block['editor_style'],
            TAIOWC_PLUGIN_URI . 'build/' . $block['script_handle'] . '.css',
            array( 'wp-edit-blocks' ),
            filemtime( TAIOWC_PLUGIN_PATH . '/build/' . $block['script_handle'] . '.css' )
        );
  
        // Register front end block style
        wp_register_style(
            $block['frontend_style'],
            TAIOWC_PLUGIN_URI . 'build/style-' . $block['script_handle'] . '.css',
            array(),
            filemtime( TAIOWC_PLUGIN_PATH . '/build/style-' . $block['script_handle'] . '.css' )
        );
  
        // Localize the script with data
        if ( isset( $block['localize_data'] ) && ! is_null( $block['localize_data'] ) ) {
            wp_localize_script(
                $block['script_handle'],
                'ThBlockDatataiowc',
                $block['localize_data']
            );
        }
  
        // Prepare the arguments for registering the block
        $block_args = array(
            'editor_script'   => $block['script_handle'],
            'editor_style'    => $block['editor_style'],
            'style'           => $block['frontend_style'],
        );
  
        // Check if the render callback is set and not null
        if ( isset( $block['render_callback'] ) && ! is_null( $block['render_callback'] ) ) {
            $block_args['render_callback'] = $block['render_callback'];
           
        }
  
        // Register each block
        register_block_type( $block['name'], $block_args );
    }
    
  }
  
  add_action( 'init', 'taiowc_register_blocks' );
  
  function taiowc_blocks_categories( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'taiowc',
                'title' => __( 'All In One Woo Cart', 'taiowc' ),
            ],
        ]
    );
  }
  add_filter( 'block_categories_all', 'taiowc_blocks_categories', 11, 2);
  
  function taiowc_blocks_editor_assets(){
    if ( is_admin() ) {
    wp_enqueue_script(
        'taiowc-data-block',
        TAIOWC_PLUGIN_URI . 'build/taiowc-data.js',
        array(),
        TAIOWC_VERSION,
        true
    );
    wp_localize_script(
        'taiowc-data-block',
        'thnkblock',
        array(
            'homeUrl' => plugins_url( '/', __FILE__ ),
            'showOnboarding' => '',
        )
    );
    wp_enqueue_style(
        'taiowcp-component-editor-css',
        TAIOWC_PLUGIN_URI . 'build/component-editor.css',
         array(),
         TAIOWC_VERSION,
    );
   }
   
    wp_enqueue_style(
        'taiowc-th-icon-css',
        TAIOWC_PLUGIN_URI . 'th-icon/style.css',
        array(),
        TAIOWC_VERSION
    );
    
      
  }
  add_action( 'enqueue_block_assets', 'taiowc_blocks_editor_assets' );
  
  
   function taiowc_blocks_render_callback( $attr ) {
  
   if ( function_exists( 'get_current_screen' ) && get_current_screen()->is_block_editor() ) {
      return;
   } 
   $taiowBlockStyle = '';
    $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
    $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
    
    // desktop
    if (isset($attr['paddingType']) && 'unlinked' === $attr['paddingType']) {
        
        $paddingTop = isset($attr['paddingTop']) ? $attr['paddingTop'] : 0;
        $paddingRight = isset($attr['paddingRight']) ? $attr['paddingRight'] : 0;
        $paddingBottom = isset($attr['paddingBottom']) ? $attr['paddingBottom'] : 0;
        $paddingLeft = isset($attr['paddingLeft']) ? $attr['paddingLeft'] : 0;
        $taiowBlockStyle .= "
            --taiowc-padding-top: {$paddingTop}{$paddingUnit};
            --taiowc-padding-bottom: {$paddingBottom}{$paddingUnit};
            --taiowc-padding-left: {$paddingLeft}{$paddingUnit};
            --taiowc-padding-right: {$paddingRight}{$paddingUnit};
            ";
    } else {
        $padding = isset($attr['padding']) ? $attr['padding'] : 0;
        
        $taiowBlockStyle .= "
            --taiowc-padding-top: {$padding}{$paddingUnit};
            --taiowc-padding-bottom: {$padding}{$paddingUnit};
            --taiowc-padding-left: {$padding}{$paddingUnit};
            --taiowc-padding-right: {$padding}{$paddingUnit};
            ";
            
    }
    if (isset($attr['iconfontSize'])) {
        $iconfontSizeUnit = isset($attr['iconfontSizeUnit']) ? $attr['iconfontSizeUnit'] : 'px';
        $taiowBlockStyle .= "--taiowc-iconfontSize: {$attr['iconfontSize']}{$iconfontSizeUnit}; ";
    }
    if (isset($attr['pricefontSize'])) {
        $pricefontSizeUnit = isset($attr['pricefontSizeUnit']) ? $attr['pricefontSizeUnit'] : 'px';
        $taiowBlockStyle .= "--taiowc-pricefontSize: {$attr['pricefontSize']}{$pricefontSizeUnit}; ";
    }

    if (isset($attr['countSize'])) {
        $countSizeUnit = isset($attr['countSizeUnit']) ? $attr['countSizeUnit'] : 'px';
        $taiowBlockStyle .= "--taiowc-countSize: {$attr['countSize']}{$countSizeUnit}; ";
    }
    if (isset($attr['countFontSize'])) {
        $countFontSizeUnit = isset($attr['countFontSizeUnit']) ? $attr['countFontSizeUnit'] : 'px';
        $taiowBlockStyle .= "--taiowc-countFontSize: {$attr['countFontSize']}{$countFontSizeUnit}; ";
    }
    if (isset($attr['borderRadius'])) {
        $borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
        $taiowBlockStyle .= "--taiowc-borderRadius: {$attr['borderRadius']}{$borderRadiusUnit}; ";
    }
    // margin
    if (isset($attr['marginType']) && 'unlinked' === $attr['marginType']) {

        $marginTop = isset($attr['marginTop']) ? $attr['marginTop'] : 0;
        $marginRight = isset($attr['marginRight']) ? $attr['marginRight'] : 0;
        $marginBottom = isset($attr['marginBottom']) ? $attr['marginBottom'] : 0;
        $marginLeft = isset($attr['marginLeft']) ? $attr['marginLeft'] : 0;
    
        $taiowBlockStyle .= "
            --taiowc-margin-top: {$marginTop}{$marginUnit};
            --taiowc-margin-bottom: {$marginBottom}{$marginUnit};
            --taiowc-margin-left: {$marginLeft}{$marginUnit};
            --taiowc-margin-right: {$marginRight}{$marginUnit};
            ";
    } else {
        $margin = isset($attr['margin']) ? $attr['margin'] : 0;
    
        $taiowBlockStyle .= "
            --taiowc-margin-top: {$margin}{$marginUnit};
            --taiowc-margin-bottom: {$margin}{$marginUnit};
            --taiowc-margin-left: {$margin}{$marginUnit};
            --taiowc-margin-right: {$margin}{$marginUnit};
            ";
    
    }
    //tablet
    if (isset($attr['paddingTypeTablet']) && 'unlinked' === $attr['paddingType']) {
       
        $paddingTopTablet = isset($attr['paddingTopTablet']) ? $attr['paddingTopTablet'] : 0;
        $paddingRightTablet = isset($attr['paddingRightTablet']) ? $attr['paddingRightTablet'] : 0;
        $paddingBottomTablet = isset($attr['paddingBottomTablet']) ? $attr['paddingBottomTablet'] : 0;
        $paddingLeftTablet = isset($attr['paddingLeftTablet']) ? $attr['paddingLeftTablet'] : 0;
        $taiowBlockStyle .= "
            --taiowc-padding-top-tablet: {$paddingTopTablet}{$paddingUnit};
            --taiowc-padding-bottom-tablet: {$paddingBottomTablet}{$paddingUnit};
            --taiowc-padding-left-tablet: {$paddingLeftTablet}{$paddingUnit};
            --taiowc-padding-right-tablet: {$paddingRightTablet}{$paddingUnit};
            ";
    } else {
        $paddingTablet = isset($attr['paddingTablet']) ? $attr['paddingTablet'] : 0;
       
        $taiowBlockStyle .= "
            --taiowc-padding-top-tablet: {$paddingTablet}{$paddingUnit};
            --taiowc-padding-bottom-tablet: {$paddingTablet}{$paddingUnit};
            --taiowc-padding-left-tablet: {$paddingTablet}{$paddingUnit};
            --taiowc-padding-right-tablet: {$paddingTablet}{$paddingUnit};
            ";
            
    }
    // margin
    if (isset($attr['marginTypeTablet']) && 'unlinked' === $attr['marginTypeTablet']) {

        $marginTopTablet = isset($attr['marginTopTablet']) ? $attr['marginTopTablet'] : 0;
        $marginRightTablet = isset($attr['marginRightTablet']) ? $attr['marginRightTablet'] : 0;
        $marginBottomTablet = isset($attr['marginBottomTablet']) ? $attr['marginBottomTablet'] : 0;
        $marginLeftTablet = isset($attr['marginLeftTablet']) ? $attr['marginLeftTablet'] : 0;
    
        $taiowBlockStyle .= "
            --taiowc-margin-top-tablet: {$marginTopTablet}{$marginUnit};
            --taiowc-margin-bottom-tablet: {$marginBottomTablet}{$marginUnit};
            --taiowc-margin-left-tablet: {$marginLeftTablet}{$marginUnit};
            --taiowc-margin-right-tablet: {$marginRightTablet}{$marginUnit};
            ";
    } else {
        $marginTablet = isset($attr['marginTablet']) ? $attr['marginTablet'] : 0;
    
        $taiowBlockStyle .= "
            --taiowc-margin-top-tablet: {$marginTablet}{$marginUnit};
            --taiowc-margin-bottom-tablet: {$marginTablet}{$marginUnit};
            --taiowc-margin-left-tablet: {$marginTablet}{$marginUnit};
            --taiowc-margin-right-tablet: {$marginTablet}{$marginUnit};
            ";
    
    }
    if (isset($attr['iconfontSizeTablet'])) {
        $taiowBlockStyle .= "--taiowc-iconfontSizeTablet: {$attr['iconfontSizeTablet']}{$iconfontSizeUnit}; ";
    }
    if (isset($attr['pricefontSizeTablet'])) {
        $taiowBlockStyle .= "--taiowc-pricefontSizeTablet: {$attr['pricefontSizeTablet']}{$pricefontSizeUnit}; ";
    }

    if (isset($attr['countSizeTablet'])) {
        $taiowBlockStyle .= "--taiowc-countSizeTablet: {$attr['countSizeTablet']}{$countSizeUnit}; ";
    }
    if (isset($attr['countFontSizeTablet'])) {
        $taiowBlockStyle .= "--taiowc-countFontSizeTablet: {$attr['countFontSizeTablet']}{$countFontSizeUnit}; ";
    }

    if (isset($attr['borderRadiusTablet'])) {
        $borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
        $taiowBlockStyle .= "--taiowc-borderRadiusTablet: {$attr['borderRadiusTablet']}{$borderRadiusUnit}; ";
    }
    //mobile

        if (isset($attr['paddingTypeMobile']) && 'unlinked' === $attr['paddingTypeMobile']) {

            $paddingTopMobile = isset($attr['paddingTopMobile']) ? $attr['paddingTopMobile'] : 0;
            $paddingRightMobile = isset($attr['paddingRightMobile']) ? $attr['paddingRightMobile'] : 0;
            $paddingBottomMobile = isset($attr['paddingBottomMobile']) ? $attr['paddingBottomMobile'] : 0;
            $paddingLeftMobile = isset($attr['paddingLeftMobile']) ? $attr['paddingLeftMobile'] : 0;

            $taiowBlockStyle .= "
                --taiowc-padding-top-mobile: {$paddingTopMobile}{$paddingUnit};
                --taiowc-padding-bottom-mobile: {$paddingBottomMobile}{$paddingUnit};
                --taiowc-padding-left-mobile: {$paddingLeftMobile}{$paddingUnit};
                --taiowc-padding-right-mobile: {$paddingRightMobile}{$paddingUnit};
                ";
        } else {
            $paddingMobile = isset($attr['paddingMobile']) ? $attr['paddingMobile'] : 0;

            $taiowBlockStyle .= "
                --taiowc-padding-top-mobile: {$paddingMobile}{$paddingUnit};
                --taiowc-padding-bottom-mobile: {$paddingMobile}{$paddingUnit};
                --taiowc-padding-left-mobile: {$paddingMobile}{$paddingUnit};
                --taiowc-padding-right-mobile: {$paddingMobile}{$paddingUnit};
                ";
        }

        // margin
        if (isset($attr['marginTypeMobile']) && 'unlinked' === $attr['marginTypeMobile']) {

            $marginTopMobile = isset($attr['marginTopMobile']) ? $attr['marginTopMobile'] : 0;
            $marginRightMobile = isset($attr['marginRightMobile']) ? $attr['marginRightMobile'] : 0;
            $marginBottomMobile = isset($attr['marginBottomMobile']) ? $attr['marginBottomMobile'] : 0;
            $marginLeftMobile = isset($attr['marginLeftMobile']) ? $attr['marginLeftMobile'] : 0;
        
            $taiowBlockStyle .= "
                --taiowc-margin-top-mobile: {$marginTopMobile}{$marginUnit};
                --taiowc-margin-bottom-mobile: {$marginBottomMobile}{$marginUnit};
                --taiowc-margin-left-mobile: {$marginLeftMobile}{$marginUnit};
                --taiowc-margin-right-mobile: {$marginRightMobile}{$marginUnit};
                ";
        } else {
            $marginMobile = isset($attr['marginMobile']) ? $attr['marginMobile'] : 0;
        
            $taiowBlockStyle .= "
                --taiowc-margin-top-mobile: {$marginMobile}{$marginUnit};
                --taiowc-margin-bottom-mobile: {$marginMobile}{$marginUnit};
                --taiowc-margin-left-mobile: {$marginMobile}{$marginUnit};
                --taiowc-margin-right-mobile: {$marginMobile}{$marginUnit};
                ";
        }

        if (isset($attr['iconfontSizeMobile'])) {
            $taiowBlockStyle .= "--taiowc-iconfontSizeMobile: {$attr['iconfontSizeMobile']}{$iconfontSizeUnit}; ";
        }
        if (isset($attr['pricefontSizeMobile'])) {
            $taiowBlockStyle .= "--taiowc-pricefontSizeMobile: {$attr['pricefontSizeMobile']}{$pricefontSizeUnit}; ";
        }
        if (isset($attr['countSizeMobile'])) {
            $taiowBlockStyle .= "--taiowc-countSizeMobile: {$attr['countSizeMobile']}{$countSizeUnit}; ";
        }
        if (isset($attr['countFontSizeMobile'])) {
            $taiowBlockStyle .= "--taiowc-countFontSizeMobile: {$attr['countFontSizeMobile']}{$countFontSizeUnit}; ";
        }
        if (isset($attr['borderRadiusMobile'])) {
            $borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
            $taiowBlockStyle .= "--taiowc-borderRadiusMobile: {$attr['borderRadiusMobile']}{$borderRadiusUnit}; ";
        }


    if (isset($attr['cartBgClr'])) {
     $taiowBlockStyle .= "--taiowc-cartBgClr:{$attr['cartBgClr']};";
    }

    $iconClr    = isset($attr['iconClr']) ? $attr['iconClr'] : '#111';
    $priceClr   = isset($attr['priceClr']) ? $attr['priceClr'] : '#111';
    $countClr   = isset($attr['countClr']) ? $attr['countClr'] : '#fff';
    $countBgClr   = isset($attr['countBgClr']) ? $attr['countBgClr'] : '#111';

    $taiowBlockStyle .= "
       
        --taiowc-iconClr:{$iconClr};
        --taiowc-priceClr:{$priceClr};
        --taiowc-countClr:{$countClr};
        --taiowc-countBgClr:{$countBgClr};
                ";
    // class
    if (!isset($attr['cartPrice'])) {
        $taiowcPriceShow = "th-showprice";
    }else{
        $taiowcPriceShow = "";
    }
    if (!isset($attr['cartCount'])) {
    $taiowcCountShow = "th-showcount";
    }  else{
        $taiowcCountShow = "";   
    }
    
    $countPosition    = isset($attr['countPosition']) ? $attr['countPosition'] : 'left';
    $taiowBlockStyle = preg_replace('/\s+/', ' ', trim($taiowBlockStyle));
     
    $block_content = '<div id="wp-block-taiowc-' . esc_attr($attr['uniqueID']) . '"  class="wp-block-taiowc ' . esc_attr($taiowcPriceShow) . ' ' . esc_attr($taiowcCountShow) . '  '.esc_attr($countPosition).'" style="'.esc_attr($taiowBlockStyle).'">';
    
    $cartStyle = isset($attr['cartStyle']) ? $attr['cartStyle'] : '[taiowc]';
  
    $block_content .= ''.do_shortcode($cartStyle).'</div>';
    
    return $block_content;
    
  }
  