/* Subsite */

export default class Header {

    constructor() {
        this.headerListener();
    }

    headerListener() {
        document.addEventListener('scroll', this.trackScrolling);
    }

    static getBounds(el) {
        return el.getBoundingClientRect();
    }

    trackScrolling() {

        let detach = document.getElementById('detach-sticky-top');
        let detachBounds = Header.getBounds(detach);
        console.log(detachBounds.top);

        //
        // this was good but just need to be reintegrated differently.
        // if (detachBounds.top < 150) {
        //     document.body.classList.add('subsite-menu-absolute');
        // } else {
        //     document.body.classList.remove('subsite-menu-absolute');
        // }


        // document.getElementById("page-header");
        // let pageHeaderBottom = this.isBottom('page-header-trigger');
        // console.log(pageHeaderBottom);

        // if (this.state.sticky === false && this.state.shortHeader === false) {
        //
        //     if (this.isTop(subsite) < this.isBottom(stickySet) + 10) {
        //
        //         this.setState({sticky: true});
        //         this.setState({shortHeader: false});
        //         document.body.classList.add('subsite-menu-sticky');
        //         document.body.classList.remove('subsite-menu-absolute');
        //         subsite.style.top = this.isBottom(stickySet) + 10  + "px";
        //     }
        //
        // } else if (this.state.sticky === true && this.state.shortHeader === false) {
        //
        //     if (this.isTop(detatchStickyTop) > this.isBottom(stickySet) + 10) {
        //
        //         this.setState({sticky: false});
        //         this.setState({shortHeader: false});
        //         document.body.classList.remove('subsite-menu-sticky');
        //         document.body.classList.remove('subsite-menu-absolute');
        //         subsite.style.top = "auto";
        //     }
        //
        //     if (this.isTop(detatchStickyBottom) < this.isBottom(subsite) + 10) {
        //         this.setState({sticky: false});
        //         this.setState({shortHeader: true});
        //         document.body.classList.remove('subsite-menu-sticky');
        //         document.body.classList.add('subsite-menu-absolute');
        //         subsite.style.top = "auto";
        //     }
        //
        // } else if (this.state.sticky === false && this.state.shortHeader === true) {
        //
        //     if (this.isTop(subsite) > this.isBottom(stickySet) + 58) {
        //         this.setState({sticky: true});
        //         this.setState({shortHeader: false});
        //         document.body.classList.remove('subsite-menu-absolute');
        //         document.body.classList.add('subsite-menu-sticky');
        //         subsite.style.top = this.isBottom(stickySet) + 58 + "px";
        //     }
        //
        // }
    }
}
