/* Subsite */

export default class Subsite {
  constructor() {
    this.subsiteListener();
  }

  subsiteListener () {

    $( "#page-header-subsite-menu" ).mouseenter(function() {
      $( "body" ).addClass( "subsite-menu-dropdown-expand" );
    });

    $( "#page-header-subsite-menu" ).mouseleave(function() {
      $( "body" ).removeClass( "subsite-menu-dropdown-expand" );
    });

    $( "#page-header-subsite-menu-mobile-expand" ).click(function() {
      $( "body" ).addClass( "subsite-menu-mobile-expand" );
    });

    $( "#page-header-subsite-menu-mobile-close" ).click(function() {
      $( "body" ).removeClass( "subsite-menu-mobile-expand" );
    });

  }
}
