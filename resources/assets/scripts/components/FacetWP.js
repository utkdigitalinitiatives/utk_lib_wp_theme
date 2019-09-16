/* eslint-disable */

/* FacetWP */

export default class FacetWP {

    constructor() {
        this.toggleFacetModal();
    }

    toggleFacetModal() {
        (function($, log) {
            $(document).on('facetwp-refresh', function() {

                var meta = ' all ';
                var string = null;
                var facets = FWP.facets;

                if (typeof facets.competency_model != "undefined") {
                    if (facets.competency_model.length !== 0) {
                        meta = '<a data-facet="competency_model">' + facets.competency_model[0] + '</a>';
                    }
                }

                if (typeof facets.filter_competencies != "undefined") {
                    log(facets.filter_competencies);
                    if (facets.filter_competencies.length !== 0) {
                        string = 'referencing <a data-facet="filter_competencies">"' + facets.filter_competencies + '"</a>';
                    } else {
                        string = null;
                    }
                }

                $('.utk-facets--label-meta').html(meta);
                $('.utk-facets--label-string').html(string);
            });

            $(document).on('click', '.utk-facets--label-data > a', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var facet = $(this).attr('data-facet');

                if ($(this).parent().hasClass('utk-facets--label-meta')) {
                    $('.utk-facets--label-meta').html('all');
                } else if ($(this).parent().hasClass('utk-facets--label-string')) {
                    $('.utk-facets--label-string').html('');
                }

                FWP.facets[facet] = [];
                FWP.fetch_data();
                $(this).remove();
            });

            $(document).on('click', '.utk-facets--reset', function(e) {
                FWP.reset();
                $('.utk-facets--label-meta').html('all');
                $('.utk-facets--label-string').html('');
            });

            $(document).on('click', '.utk-facets--toggle', function(e) {
                $('.utk-facets--modal').addClass('utk-facets--modal-active');
                $('body').addClass('utk-modal-open-xs');

                var facetsEl = '.page-body--aside--facets';
                var modalEl = '.utk-facets--modal';
                var height = $(modalEl).height() + 36 + 47;

                $(facetsEl).css('height', height);
            });

            $(document).on('click', '.utk-facets--close', function(e) {
                $('.utk-facets--modal').removeClass('utk-facets--modal-active');
                $('body').removeClass('utk-modal-open-xs utk-modal-open');

                var facetsEl = '.page-body--aside--facets';
                var height = 47;

                $(facetsEl).css('height', height);
            });

            $(document).on('click', '.utk-modal-overlay', function(e) {
                $('.utk-modal-populate').removeClass('loaded loading');
                $('.utk-modal-populate .article--populate--inner').remove();

                $('.utk-facets--modal').removeClass('utk-facets--modal-active');
                $('body').removeClass('utk-modal-open-xs utk-modal-open');
            });
        })(jQuery, console.log);
    }
}
