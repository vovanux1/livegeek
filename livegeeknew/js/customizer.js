/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );
}( jQuery ) );
/*---------------------------------------*/
/* Mobile Only Slide Menu                */
/*---------------------------------------*/

$(".sticky-menu i, .toggle-menu i, .slide-menu .close i").on('click', function() {
        $(".mobile-navigation").toggleClass("show");
        $("html").toggleClass("inactive");
        $(".body-fade").fadeToggle(400);

        // Check for an active search form and close it
        if($('.site-header .search-form').hasClass('show-search')) {
           $(".site-header .search-form").slideToggle(300);
           $(".site-header .search-form").toggleClass("show-search");
           // Toggle the close icon
           $('li.search i.fa-search').toggle();
          $('li.search i.fa-close').toggle();
        }
});

// Expand the parent/child menu
$('.site-header ul.primary-nav li.menu-item-has-children > a').on('click', function(event){
    event.preventDefault();
   $(this).next('.sub-menu').slideToggle(200);
   $(this).toggleClass("close");
});

/*---------------------------------------*/
/* Search drop down                      */
/*---------------------------------------*/

  $("li.search i, i.toggle").on('click', function() {
        $(".site-header .search-form").slideToggle(300);
        $(".site-header .search-form").toggleClass("show-search");
        // $(".body-fade").fadeToggle(400);

        // Focus the cursor on the search field when it's visible
        $(".site-header .search-form.show-search .search-field").focus();

        // Remove focus when not visible
        $('.site-header .search-form:not(.show-search) .search-field').blur();

        // Hide the search icon and show the close icon
         $('li.search i.fa-search').toggle();
         $('li.search i.fa-close').toggle();




        // Check for an active slide menu and close it
        if($('.mobile-navigation').hasClass('show')) {
           $(".mobile-navigation").toggleClass("show");
           $(".body-fade").fadeToggle(500);
        }
});

/*---------------------------------------*/
/* ESC key close of open toggle elements */
/*---------------------------------------*/

$(document).keyup(function(e) { 
        if (e.keyCode == 27) { // esc keycode
            if($('.site-header .search-form').hasClass('show-search')) {
               $(".site-header .search-form").slideToggle(300);
               $(".site-header .search-form").toggleClass("show-search");
               $('li.search i.fa-search').toggle();
               $('li.search i.fa-close').toggle();
            }
            if($('.mobile-navigation').hasClass('show')) {
               $(".mobile-navigation").toggleClass("show");
               $(".body-fade").fadeToggle(500);
            }
        }
    });
