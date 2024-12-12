jQuery(document).ready(function($) {
    function handlePluginAction(pluginSlug, action) {
        let activetext = '';
        if (action == 'install') {
            activetext = 'Installing...';
        }
        else{
            activetext = 'Activating...';
        }
        $('.ts-themehunk-custom-section span.text').text(activetext);
        $('.ts-themehunk-custom-section .th-loader').css("display", "inline-block");
        $.ajax({
            url: theme_data_customizer.ajax_url,
            type: 'POST',
            data: {
                action: 'big_store_install_and_activate_callback',
                security: theme_data_customizer.security,
                plugin_slug: pluginSlug
            },
            success: function(response) {
                if (response) {
                    $('#go-to-starter-sites').prop('disabled', false);
                     // $('#go-to-starter-sites').show();
                     // $('.ts-themehunk-custom-section button:nth-of-type(1)').prop('disabled', true).hide();
                         if (pluginSlug == 'themehunk-customizer') {
                                window.location.href = theme_data_customizer.redirectUrl;
                            }
                            else{
                                window.location.href = theme_data_customizer.redirectUrlPro;
                            }
                     // window.location.href = theme_data_customizer.redirectUrl;
                     $('.ts-themehunk-custom-section .th-loader').hide();
                } else {
                    alert('Error: ' + response.data.message);
                }
            },
            error: function(xhr, status, error) {
                $('.ts-themehunk-custom-section .th-loader').hide();
                console.error('Error:', error);
            }
        });
    }

    $('#activate-big-store-pro').on('click', function(event) {
        event.preventDefault();
        var pluginSlug = $(this).data('slug');
        handlePluginAction(pluginSlug, 'activate');
    });

    $('#activate-themehunk-customizer').on('click', function(event) {
        event.preventDefault();
        var pluginSlug = $(this).data('slug');
        handlePluginAction(pluginSlug, 'activate');
    });

    $('#install-themehunk-customizer').on('click', function(event) {
        event.preventDefault();
        var pluginSlug = $(this).data('slug');
        handlePluginAction(pluginSlug, 'install');
    });

   $('#go-to-starter-sites').on('click', function() {
        var pluginSlug = $(this).data('slug');
        if (pluginSlug == 'themehunk-customizer') {
        window.location.href = theme_data.redirectUrl;
    }
    else{
        window.location.href = theme_data.redirectUrlPro;
    }
    });
});


