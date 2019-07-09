/* FacetWP */

export default class FacetWP {

    constructor() {
        // this.watchSearches();
    }

    watchSearches() {
        (function($, log, window) {
            $(document).on('facetwp-refresh', function() {
                var searchVal = $('.facetwp-facet-volopedia_search input.facetwp-search').val();
                if (searchVal !== undefined && searchVal !== '') {
                    var url = window.location.origin + '/entries/?fwp_volopedia_search=' + searchVal;
                    window.location.replace(url);
                }
            });
        })(jQuery, console.log, window);
    }
}
