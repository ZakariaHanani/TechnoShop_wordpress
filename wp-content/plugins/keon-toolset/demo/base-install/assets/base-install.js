jQuery( document ).ready( function ( $ ) {
	$(".ai-demo-import").click(function(){
		
		var base_html = direct_install.base_html;
		$('body').append( base_html );

	} );
	$(document.body).on('click', '.close-base-notice' ,function(){
		$(".base-install-notice-outer").remove();
	});

	//install base theme
	$(document.body).on('click', '.install-base-theme' ,function(){
		$( this ).addClass( 'updating-message' );
	    $.ajax({
			type: "POST",
			url: direct_install.ajax_url,
			data: {
                action     : 'install_base_theme',
                security   : direct_install.nonce
            },
			success:function() {
                $( this ).removeClass( 'updating-message' );
                $( '.base-install-prompt' ).remove();  
                $( '.base-install-success' ).show();  
			},
			error: function( xhr, ajaxOptions, thrownError ){
				console.log(thrownError);
			}
		});
	});
} );