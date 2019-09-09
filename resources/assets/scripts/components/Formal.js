/* eslint-disable */

/* Formal */

export default class Formal {

    constructor() {
        this.formalAjaxPopulate();
        this.checkSVGs();
        this.watchFacets();
    }

    checkSVGs () {
        // Detect request animation frame
        var scroll = window.requestAnimationFrame ||
            // IE Fallback
            function(callback){ window.setTimeout(callback, 1000/60)};
        var elementsToShow = document.querySelectorAll('.utk-svg');

        function loop() {
            Array.prototype.forEach.call(elementsToShow, function (element) {
                if (isElementInViewport(element)) {
                    element.classList.add('utk-svg-visible');
                } else {
                    element.classList.remove('utk-svg-visible');
                }
            });

            scroll(loop);
        }

        // Call the loop for the first time
        loop();

        // Helper function from: http://stackoverflow.com/a/7557433/274826
        function isElementInViewport(el) {
            // special bonus for those using jQuery
            if (typeof jQuery === "function" && el instanceof jQuery) {
                el = el[0];
            }
            var rect = el.getBoundingClientRect();
            return (
                (rect.top <= 0
                    && rect.bottom >= 0)
                ||
                (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight))
                ||
                (rect.top >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
            );
        }
    }

    static getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    static formalAjaxPopulateProcess(id, type) {

        $('.facetwp-template > article').removeClass('article--trigger-expand');

        var postId = id;
        var postType = type;

        var target = '.facetwp-template > .post-' + postId;
        var populate = target + ' .article--populate-' + postId;
        $('.facetwp-template').addClass('facetwp-template-focus');
        $(target).addClass('article--trigger-expand');

        // eslint-disable-next-line no-undef
        var ajax = ajax_object;

        $.ajax({
            url : ajax.ajax_url,
            data : {
                action: 'getFormalPost',
                security: ajax.ajax_nonce,
                id: postId,
                type: postType,
            },
            type : 'POST',
            beforeSend : function () {
            },
            success : function(response) {
                $(populate).html(response);
            },
            complete: function () {
                var height = $(populate).height();
                $(populate).css('height', height);
                $(populate).find('.utk-svg').addClass('utk-svg-visible');
                $('.facetwp-template > article').css('margin-bottom', 29);
                $(target).css('margin-bottom', height + 47);
            },
        });

    };

    formalAjaxPopulate () {
        (function($, log) {

            $( document ).ready(function() {
                if (Formal.getUrlParameter('populate')) {

                    var populate = Formal.getUrlParameter('populate');
                    var type = Formal.getUrlParameter('type');
                    var scrollto = "#article-formal-" + populate;

                    $('html, body').animate({
                        scrollTop: $(scrollto).offset().top - 199
                    }, 760);

                    Formal.formalAjaxPopulateProcess(populate, type)

                } else {
                    // nada
                }
            });

            $(document).on('click', 'article > a.article--trigger', function(e) {

                e.preventDefault();

                var postId = $(this).attr('data-id');
                var postType = $(this).attr('data-type');

                Formal.formalAjaxPopulateProcess(postId, postType);

            });

            $(document).on('click').on('click', '.article--close', function(e) {

                e.preventDefault();
                e.stopPropagation();

                $('.facetwp-template').removeClass('facetwp-template-focus');
                $('.facetwp-template > article').removeClass('article--trigger-expand');
                $('.facetwp-template > article').css('margin-bottom', 29);
            });
        })(jQuery, console.log);
    }

    watchFacets() {
        (function($) {
            $(document).on('facetwp-refresh', function() {
                $('.facetwp-template').removeClass('facetwp-template-focus');
                $('.facetwp-template > article').removeClass('article--trigger-expand');
                $('.facetwp-template > article').css('margin-bottom', 29);
            });
        })(jQuery);
    }
}
