/*global jQuery*/

import Header from '../components/Header'
import Subsite from '../components/Subsite'

export default {
  init() {
    // JavaScript to be fired on all pages
      new Header();
      new Subsite();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
