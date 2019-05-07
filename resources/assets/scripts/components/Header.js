/* Subsite */

export default class Header {

    constructor() {
        this.headerListener();
    }

    headerListener() {
        var lastScrollTop = 0;
        $(window).scroll(function(){
            console.log('test');
            var st = $(this).scrollTop();
            if (st > lastScrollTop){
                document.body.classList.remove('header-show');
            } else {
                document.body.classList.add('header-show');
            }
            lastScrollTop = st;
        });

        document.addEventListener('scroll', this.trackScrolling);
    }

    static getBounds(el) {
        return el.getBoundingClientRect();
    }

    trackScrolling() {

        let trigger = document.getElementById('utk-trigger-header');
        let triggerBounds = Header.getBounds(trigger);

        /*
         * small checkpoint
         */

        if (triggerBounds.top <= 0) {
            document.body.classList.add('header-scroll-down');
        } else {
            document.body.classList.remove('header-scroll-down');
        }
    }
}
