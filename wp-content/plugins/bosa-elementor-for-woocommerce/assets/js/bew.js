jQuery(document).ready(function($){

    var modal   = jQuery("#ajax-import-modal");
    var btn     = jQuery(".bew-elements-btn-ajax-import");
    var span    = jQuery(".bew-close");

    btn.on('click', function() {
        var freeplugins = $(this).data('freeplugin');
        var theme = $(this).data('theme');
        var tpltitle = $(this).data('title');
        var templateid = $(this).data('templateid');


        var htbtnMarkuplibrary = `<a href="#" class="button button-primary wp-bew-templata-imp-btn" 
                data-btnattr='{"templateid":"${templateid}","templpattitle":"${tpltitle}", "page": "elementor_library", "plugins": "${freeplugins}", "theme": "${theme}"}'
                >Import to Library</a>`;
        var htbtnMarkuppage = `<a href="#" class="button button-primary wp-bew-templata-imp-btn" 
                data-btnattr='{"templateid":"${templateid}","templpattitle":"${tpltitle}", "page": "page", "plugins": "${freeplugins}", "theme": "${theme}"}'
                >Import to Page</a>`;


        // button Dynamic content
        $( ".bew-tpl-import-button-dynamic" ).html( htbtnMarkuplibrary );
        $( ".bew-tpl-import-button-dynamic-page" ).html( htbtnMarkuppage );
        $( "#ajax-import-modal .model-title" ).html( tpltitle );


        $.ajax( {
            url: BEW.ajaxurl,
            type: 'POST',
            data: {
                action: 'bew_ajax_required_plugin',
                plugins: freeplugins,
                reqtheme: theme,
                nonce: BEW.plugin_nonce
            },
            complete: function( data ) {
                $(".bew-importer-message p").html('');
                $(".bew-importer-message").hide();
                $('.bew-importer-page-area').show();

                $( ".bew-elementor-required-plugins" ).html( data.responseText );
                modal.show();
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });

    });

    span.on('click',  function() {
        modal.hide();
    });

    // Import data request
    $('body').on('click', 'a.wp-bew-templata-imp-btn', function(e) {
        e.preventDefault();
        
        var pagetitle = ( $('#ajax-import-page-name').val() ) ? ( $('#ajax-import-page-name').val() ) : '',
            pagetemplate = ( $('#ajax-import-page-template').val() ) ? ( $('#ajax-import-page-template').val() ) : '',
            pagestatus = ( $('#ajax-import-page-status').val() ) ? ( $('#ajax-import-page-status').val() ) : '',
            databtnattr = $(this).data('btnattr');

        $.ajax({
            url: BEW.ajaxurl,
            data: {
                'action'       : 'bew_start_import_template',
                'httemplateid' : databtnattr.templateid,
                'htparentid'   : databtnattr.parentid,
                'httitle'      : databtnattr.templpattitle,
                'pagetitle'    : pagetitle,
                'pagetemplate' : pagetemplate,
                'plugins'      : databtnattr.plugins,
                'theme'        : databtnattr.theme,
                'page'         : databtnattr.page,
                'status'       : pagestatus,
                'nonce'        : BEW.import_nonce
            },
            dataType: 'JSON',
            beforeSend: function(){
                $('.bew-importer-edit').hide();
                $(".bew-importer-message p").html('Installing and activating required plugins, please wait ...');
                $(".bew-importer-message").show();

                $(".bew-importer-spinner").addClass('loading');
                $(".bew-importer-page-area").hide();
            },
            success:function(data) {
                $(".bew-importer-message p").html('Successfully ' + databtnattr.templpattitle +' has been imported.')
                $(".bew-importer-message").show();
                var tmediturl = BEW.adminurl+"post.php?post="+ data.id +"&action=elementor";
                $('.bew-importer-edit').show();
                $('.bew-importer-edit').html('<a class="btn btn-primary" href="'+ tmediturl +'" target="_blank">'+ data.edittxt +'</a>');
            },
            complete:function(data){
                $(".bew-importer-spinner").removeClass('loading');
                $(".bew-importer-message").css( "display","block" );
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });

    });

});