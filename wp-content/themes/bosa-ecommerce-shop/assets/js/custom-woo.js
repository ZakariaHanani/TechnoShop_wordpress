(function( $ ){

/**
* Setting up functionality for woo category menu
*/
function catMenuAccordion( selector ){

  var $ele = selector + ' .header-category-nav .menu-item-has-children > a';
  $( $ele ).each( function(){
    var text = $( this ).text();
    text = text + '<button class="fas fa-angle-down triangle"></button>';
    $( this ).html( text );
  });

  jQuery( document ).on( 'click', $ele + ' .triangle', function( e ){
    e.preventDefault();
    e.stopPropagation();

    $parentLi = $( this ).parent().parent( 'li' );
    $childLi = $parentLi.find( 'li' );

    if( $parentLi.hasClass( 'open' ) ){
      /**
      * Closing all the ul inside and 
      * removing open class for all the li's
      */
      $parentLi.removeClass( 'open' );
      $childLi.removeClass( 'open' );

      $( this ).parent( 'a' ).next().slideUp();
      $( this ).parent( 'a' ).next().find( 'ul' ).slideUp();
    }else{

      $parentLi.addClass( 'open' );
      $( this ).parent( 'a' ).next().slideDown();
    }
  });
};

jQuery( document ).ready( function() {
  catMenuAccordion( '#offcanvas-menu' );
});

})( jQuery );