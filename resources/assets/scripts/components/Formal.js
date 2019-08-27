/* Formal */

export default class Formal {

    constructor() {
        this.formalListener();
    }

    formalListener () {

        $('.article--trigger').click(function (e) {
            e.preventDefault();
            $('.facetwp-template > article').removeClass('article--trigger-expand');
            var postId = $(this).attr('data-id');
            var target = '.facetwp-template > .post-' + postId;
            $(target).addClass('article--trigger-expand');

            // eslint-disable-next-line no-undef
            var ajax_url = ajax_object.ajax_url;

            $.ajax({ // you can also use $.post here
                url : ajax_url, // AJAX handler
                data : {},
                type : 'POST',
                beforeSend : function () {
                    // alert('hi');
                },
                success : function() {
                    // alert('high');
                },
            });
        });
    }

}
