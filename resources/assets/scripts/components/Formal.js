/* eslint-disable */

/* Formal */

export default class Formal {

    constructor() {
        this.formalAjaxPopulate();
    }

    formalAjaxPopulate () {
        (function($, log) {
            $('.article--trigger').click(function (e) {

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
        })(jQuery, console.log);
    }
}
