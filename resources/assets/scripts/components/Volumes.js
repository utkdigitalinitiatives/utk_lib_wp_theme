/* eslint-disable */

/* Formal */
import Header from '../components/Header'

export default class Volumes {

    constructor() {
        this.fadeHeader();
    }

    fadeHeader () {
        (function($, log) {
            $(window).scroll(function() {
                let trigger = document.getElementById('utk-trigger-header');
                let triggerBounds = Header.getBounds(trigger);

                $('.utk-entity-volumes .page-header--title-wrap').css({
                    opacity: function() {
                        return triggerBounds.top / 100;
                    }
                });

                $('.utk-entity-volumes .page-header-truncate .page-header--float .page-header--float--optional-overlay').css({
                    opacity: function() {
                        return triggerBounds.top / 100;
                    }
                });

                $('.utk-entity-volumes #menu-subsite-dropdown-wrap').css({
                    opacity: function() {
                        return triggerBounds.top / 100;
                    }
                });
            });

            $(document).ready(function() {
                let trigger = document.getElementById('utk-trigger-header');
                let triggerBounds = Header.getBounds(trigger);

                $('.utk-entity-volumes .page-header--title-wrap').css({
                    opacity: function() {
                        return triggerBounds.top / 200;
                    }
                });

                $('.utk-entity-volumes .page-header-truncate .page-header--float .page-header--float--optional-overlay').css({
                    opacity: function() {
                        return triggerBounds.top / 200;
                    }
                });

                $('.utk-entity-volumes #menu-subsite-dropdown-wrap').css({
                    opacity: function() {
                        return triggerBounds.top / 200;
                    }
                });
            });
        })(jQuery, console.log);
    }
}
