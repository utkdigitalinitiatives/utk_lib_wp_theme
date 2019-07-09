/*global jQuery*/

import Header from '../components/Header'
import Subsite from '../components/Subsite'
import FacetWP from '../components/FacetWP'

export default {
  init() {
    // JavaScript to be fired on all pages
      new Header();
      new Subsite();
      new FacetWP();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
