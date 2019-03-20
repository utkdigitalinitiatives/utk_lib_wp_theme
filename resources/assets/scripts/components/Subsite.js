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

  }
}
