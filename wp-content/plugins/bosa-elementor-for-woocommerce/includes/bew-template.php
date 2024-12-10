<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<!-- or -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<div class="wrap bew-admin-import">
    <!-- impoter search form html -->
    <div id="bew-search-section" class="bew-search-section">
        <form action="javascript:void(0)" class="bew-search-form">
            <div class="row">
                <div class="col-md-auto col">
                    <div class="bew-demos-select">
                        <select>
                            <option value=".templates"><?php esc_html_e('Templates', 'bosa-elementor-for-woocommerce'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-auto col">
                    <div class="bew-builder-select">
                        <select>
                            <option value=".all"><?php esc_html_e('All Builders', 'bosa-elementor-for-woocommerce'); ?></option>
                            <option value=".elementor"><?php esc_html_e('Elementor', 'bosa-elementor-for-woocommerce'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-auto mr-auto">
                    <input id="bew-search-field" type="text" placeholder="Search..">
                </div>
                <div class="col-auto">
                    <div class="bew-type-select">
                        <select>
                            <option value="*"><?php esc_html_e('All', 'bosa-elementor-for-woocommerce'); ?></option>
                            <option value=".bew-template-free"><?php esc_html_e('Free', 'bosa-elementor-for-woocommerce'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- impoter search form html -->
    <div class="bew-grid-templates-container">
        <div class="bew-row bew-grid-templates bew-column-4">
            <?php if( $bew_elmentor_templates_list ):
                foreach($bew_elmentor_templates_list as $template):
                    $defaults = array(
                        'image'=>'',
                        'title'=>'',
                        'theme'=>'',
                        'template_id' => '',
                        'preview' => '#',
                        'plugins' => array(),
                        'pro' => false,
                        'buy_link' => '',

                    );
                    
                    $template = array_merge($defaults, $template);

                    $plugins = $template['plugins'];
                    $plugin_list = "";
                    if( is_array($plugins) and count($plugins) > 0):
                        $couter = 1;
                        $length = count($plugins);
                        
                        foreach($plugins as $plugin):
                            $plugin_list .= implode(",",array_values($plugin));
                            
                            if( $couter != $length)
                                $plugin_list .= ";";
                            $couter ++;
                        endforeach;
                    endif;
                    ?>
                    <div class="col-md-4 bew-grid-templates-item <?php if($template['pro'] == true ) echo 'bew-template-pro'; else echo 'bew-template-free' ?>">
                        <div class="card">
                            <a class="template-image" target="_blank" href="<?php echo esc_url( $template['preview']); ?>">
                                <img src="<?php echo esc_url($template['image']); ?>" class="card-img-top" alt="<?php echo esc_attr($template['title']); ?>">
                                <?php if($template['pro'] == true ): ?> 
                                    <span class="bew-pro-tag"><?php esc_html_e('Pro', 'bosa-elementor-for-woocommerce'); ?></span>
                                <?php endif; ?>
                            </a>
                            <div class="card-body">
                                <div class="card-btn-wrap">
                                    <a target="_blank" href="<?php echo esc_url( $template['preview']); ?>" class="btn button-primary btn-primary btn-preview"><span class="dashicons dashicons-visibility"></span><?php esc_html_e('Preview', 'bosa-elementor-for-woocommerce'); ?></a>
                                    <?php if($template['pro'] == true ): ?> 
                                        <a href="<?php echo esc_url($template['buy_link']); ?>" class="btn button-secondary btn-secondary new-pro-tag" target="_blank">
                                            <span class="dashicons dashicons-cart"></span><?php esc_html_e('Buy Now', 'bosa-elementor-for-woocommerce'); ?>
                                        </a>
                                    <?php else : ?>
                                        <a class="btn button-secondary btn-secondary bew-elements-btn-ajax-import"
                                            data-templateid="<?php echo esc_attr($template['template_id']); ?>" 
                                            data-title="<?php echo esc_attr($template['title']); ?>" 
                                            data-freeplugin="<?php echo esc_attr($plugin_list); ?>"
                                            data-theme="<?php echo esc_attr($template['theme']); ?>"
                                            >
                                            <span class="dashicons dashicons-plus"></span><?php esc_html_e('Import', 'bosa-elementor-for-woocommerce'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <h5 class="card-title">
                                    <?php echo esc_html($template['title']); ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                endif;
                ?>
        </div>
    </div>
    <div class="bew-admin-import-modal">
        <div id="ajax-import-modal" class="modal">
            <div class="modal-content">
                <span class="bew-close">&times;</span>
                <div class="model-title"></div>
                
                <div class="bew-template-importer-msg">
                    <div class="bew-importer-message" style="display: none;">
                        <span class="bew-importer-edit"></span>
                    </div>
                    <div class='bew-importer-spinner'></div>
                </div>
                    
                <div class="bew-importer-page-area">
                    <div class="bew-elementor-required-plugins-wrap">
                        <p class="text-label"><?php esc_html_e('Required plugins', 'bosa-elementor-for-woocommerce'); ?></p>
                        <ul class="bew-elementor-required-plugins"></ul>
                        <div class="bew-elementor-plugin-notice">
                            <p><?php esc_html_e('Note: Required plugins are automatically installed & activated while importing...', 'bosa-elementor-for-woocommerce'); ?></p>
                        </div>
                    </div>
                    <div class="bew-template-form-wrap">
                        <p class="text-label"><?php esc_html_e('Import options for the template', 'bosa-elementor-for-woocommerce'); ?></p>
                        <div class="bew-create-template-form">
                            <input id="ajax-import-page-name" type="text" name="ajax-import-page-name" placeholder="<?php echo esc_attr_x('Enter a Page Name (Optional)', 'placeholder', 'bosa-elementor-for-woocommerce'); ?>">
                            <select name="ajax-import-page-template" id="ajax-import-page-template">
                                <option value="Select"><?php esc_html_e('Select Page Template', 'bosa-elementor-for-woocommerce'); ?></option>
                                <?php 
                                    $templates = wp_get_theme()->get_page_templates();
                                    foreach ($templates as $key => $val) { ?>
                                        <option value="<?php echo esc_attr( $key ); ?>"> <?php echo esc_html( $val) ?> </option>
                                <?php } ?>
                            </select>
                            <select name="ajax-import-page-status" id="ajax-import-page-status">
                                <option value="draft"><?php esc_html_e('Draft', 'bosa-elementor-for-woocommerce'); ?></option>
                                <option value="publish"><?php esc_html_e('Publish', 'bosa-elementor-for-woocommerce'); ?></option>
                            </select>
                            <span class="bew-tpl-import-button-dynamic-page"></span>
                            <span class="bew-tpl-import-button-dynamic"></span>
                        </div class="bew-create-template-form">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($){
        // quick search regex
        var qsRegex;

        // init Isotope
        var $grid = $('.bew-grid-templates').isotope({
            itemSelector: '.bew-grid-templates-item',
            layoutMode: 'fitRows',
            
            filter: function () {
                return qsRegex ? $(this).text().match(qsRegex) : true;
            }
        });

        $('.bew-type-select select, .bew-builder-select select, .bew-demos-select select').on('change', function(){
            setCustomFilter();
        })

        // use value of search field to filter
        var $quicksearch = $('#bew-search-field').keyup( debounce( function() {
            setCustomFilter();            
        }, 200 ) );


        // debounce so filtering doesn't happen every millisecond
        function debounce( fn, threshold ) {
            var timeout;
            threshold = threshold || 100;
            return function debounced() {
                clearTimeout( timeout );
                var args = arguments;
                var _this = this;

                function delayed() {
                    fn.apply( _this, args );
                }
                timeout = setTimeout( delayed, threshold );
            };
        }



        function setCustomFilter() {
            var qsRegex = $('#bew-search-field').val();
            console.log("qsregex:" + qsRegex.toLowerCase());
            $('.bew-grid-templates-item').removeClass('show');
            
            searchFilter = '';
            $('.bew-grid-templates-item').each(function (index) {
                if (qsRegex.toLowerCase() == '') {
                    $('.bew-grid-templates-item').eq(index).addClass('show');
                    searchFilter = '.show';
                } else  if ( $(this).text().toLowerCase().indexOf(qsRegex) >= 0) {
                    $('.bew-grid-templates-item').eq(index).addClass('show');
                    searchFilter = '.show';
                }

            });

            var selectFilters = [];
            // get checked checkboxes values
            var selected = $('.bew-type-select select').val();
            selectFilters.push(selected);
            var selected = $('.bew-demos-select select').val();
            selectFilters.push(selected);
            var selected = $('.bew-builder-select select').val();
            selectFilters.push(selected);
            
            var filter = [];
            if (selectFilters.length > 0) {
                for (var selectFilter in selectFilters) {
                    filter.push(selectFilters[selectFilter] + searchFilter);
                }
                filter = filter.join(', ');
            } else {
                filter = buttonFilter + '.show';
            }
            // console.log( filter );
            $grid.isotope({
                filter: filter
            });
        }
    })
</script>