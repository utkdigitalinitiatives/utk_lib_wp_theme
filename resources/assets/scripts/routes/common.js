/*global jQuery*/

import Header from '../components/Header'
import Subsite from '../components/Subsite'
import Formal from '../components/Formal'
import Story from '../components/Story'
import FacetWP from '../components/FacetWP'
import Volumes from '../components/Volumes'

export default {
    init() {
        // JavaScript to be fired on all pages
        new Header();
        new Subsite();
        new Formal();
        new Story();
        new FacetWP();
        new Volumes();
    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
    },
};
