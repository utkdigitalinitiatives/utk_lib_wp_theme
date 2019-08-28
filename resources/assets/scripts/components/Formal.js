/* eslint-disable */

/* Formal */

export default class Formal {

    constructor() {
        this.formalListener();
    }

    formalListener () {

        (function($, log) {
            $('.article--trigger').click(function (e) {
                e.preventDefault();
                $('.facetwp-template > article').css('margin-bottom', 29);
                $('.facetwp-template > article').removeClass('article--trigger-expand');

                var postId = $(this).attr('data-id');
                var template = '.facetwp-template';
                var target = '.facetwp-template > .post-' + postId;
                var populate = target + ' .article--populate-' + postId;
                $(template).addClass('facetwp-template-focus');
                $(target).addClass('article--trigger-expand');

                // eslint-disable-next-line no-undef
                var ajax = ajax_object;

                $.ajax({ // you can also use $.post here
                    url : ajax.ajax_url, // AJAX handler
                    data : {
                        action: 'get_competency_post',
                        security: ajax.ajax_nonce,
                        id: postId,
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
                        $(target).css('margin-bottom', height + 47);
                    },
                });
            });
        })(jQuery, console.log);

    }

}
