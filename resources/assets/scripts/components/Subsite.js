/* Subsite */

export default class Subsite {

  constructor() {
    this.subsiteListener();
  }

  subsiteListener () {

    var subsiteContainer = document.getElementsByClassName("subsite-menu-wrap");

    for (var i = 0; i < subsiteContainer.length; i++) {
      subsiteContainer[i].addEventListener('scroll', this.trackScrollingSubsite, false);
    }

    $('#subsite-menu-top').click(function() {
      $('.subsite-menu-wrap').animate(
          { scrollTop: 0 }, 290
      );
    });

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

  static getBounds(el) {
    return el.getBoundingClientRect();
  }

  trackScrollingSubsite() {

    let subsiteScroll = document.getElementById('subsite-scroll-trigger');
    let subsiteScrollBounds = Subsite.getBounds(subsiteScroll);

    let help = document.getElementById('subsite-menu-help');
    let helpTop = document.getElementById('subsite-menu-top');
    let helpBounds = Subsite.getBounds(help);

    if (helpBounds.top > subsiteScrollBounds.top) {
      $( help ).addClass( "subsite-menu-help--scrolled" );
      $( helpTop ).addClass( "subsite-menu-help--scrolled" );
    } else {
      $( help ).removeClass( "subsite-menu-help--scrolled" );
      $( helpTop ).removeClass( "subsite-menu-help--scrolled" );
    }
  }
}
