/* eslint-disable */

/* FacetWP */

export default class FacetWP {

    constructor() {
        this.toggleFacetModal();
    }

    toggleFacetModal() {
        (function($, log) {
            $(document).on('click', '.utk-facets--reset', function(e) {
                FWP.reset();
            });

            $(document).on('click', '.utk-facets--toggle', function(e) {
                $('.utk-facets--modal').addClass('utk-facets--modal-active');
                $('body').addClass('utk-modal-open');
            });

            $(document).on('click', '.utk-facets--close', function(e) {
                $('.utk-facets--modal').removeClass('utk-facets--modal-active');
                $('body').removeClass('utk-modal-open');
            });

            $(document).on('click', '.utk-modal-overlay', function(e) {
                $('.utk-facets--modal').removeClass('utk-facets--modal-active');
                $('body').removeClass('utk-modal-open');
            });
        })(jQuery, console.log);
    }
}
