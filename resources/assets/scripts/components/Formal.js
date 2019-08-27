/* Formal */

export default class Formal {

    constructor() {
        this.formalListener();
    }

    formalListener () {

        (function($, log) {
            $('.article--trigger').click(function (e) {
                e.preventDefault();
                $('.facetwp-template > article').removeClass('article--trigger-expand');
                var postId = $(this).attr('data-id');
                var target = '.facetwp-template > .post-' + postId;
                $(target).addClass('article--trigger-expand');

                // eslint-disable-next-line no-undef
                var ajax = ajax_object;

                log(postId);

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
                        log(response);
                    },
                });
            });
        })(jQuery, console.log);

    }

}
