/* eslint-disable */

/* FacetWP */

export default class FacetWP {

    constructor() {
        this.toggleFacetModal();
    }

    toggleFacetModal() {
        (function($, log) {
            $(document).on('facetwp-refresh', function() {

                var meta = null;
                var string = null;
                var facets = FWP.facets;

                log(facets);

                if (facets.competency_model.length) {
                    if (facets.competency_model.length !== 0) {
                        meta = '<a data-facet="competency_model"><em>Tagged:</em> ' + facets.competency_model[0] + '</a>';

                    }
                }

                if (facets.filter_competencies.length) {
                    if (facets.filter_competencies !== null  || facets.filter_competencies !== '') {
                        string = '<a data-facet="filter_competencies"><em>Contains:</em> "' + facets.filter_competencies + '"</a>';
                    } else {
                        string = null;
                    }
                }

                if (meta !== null) {
                    $('.utk-facets--label-meta').html(meta);
                }

                if (string !== null) {
                    $('.utk-facets--label-string').html(string);
                }

            });

            $(document).on('click', '.utk-facets--label-data > a', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var facet = $(this).attr('data-facet');
                $(this).html('');

                FWP.facets[facet] = [];
                FWP.fetch_data();
            });

            $(document).on('click', '.utk-facets--reset', function(e) {
                FWP.reset();
                $('.utk-facets--label-meta').html('');
                $('.utk-facets--label-string').html('');
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
