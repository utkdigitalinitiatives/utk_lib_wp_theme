/* eslint-disable */

/* Formal */

export default class Formal {

    constructor() {
        this.formalAjaxPopulate();

        // Detect request animation frame
        var scroll = window.requestAnimationFrame ||
            // IE Fallback
            function(callback){ window.setTimeout(callback, 1000/60)};
        var elementsToShow = document.querySelectorAll('.utk-svg');

        function loop() {

            Array.prototype.forEach.call(elementsToShow, function(element){
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

    formalAjaxPopulate () {
        (function($, log) {
            $('article > a.article--trigger').click(function (e) {

                e.preventDefault();

                $('.facetwp-template > article').removeClass('article--trigger-expand');

                var postId = $(this).attr('data-id');
                var postType = $(this).attr('data-type');

                var template = '.facetwp-template';
                var target = '.facetwp-template > .post-' + postId;
                var populate = target + ' .article--populate-' + postId;
                $(template).addClass('facetwp-template-focus');
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
                        $('.facetwp-template > article').css('margin-bottom', 29);
                        $(target).css('margin-bottom', height + 47);
                    },
                });
            });

            $('.article--close').click(function (e) {

                e.preventDefault();
                e.stopPropagation();

                $('.facetwp-template > article').removeClass('article--trigger-expand');
                $('.facetwp-template > article').css('margin-bottom', 29);
            });
        })(jQuery, console.log);
    }
}
