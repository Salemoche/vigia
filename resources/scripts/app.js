import {domReady} from '@roots/sage/client';

// Modules
import {swiperScript} from './modules/swiper';
import { interactions } from './modules/interactions';
import { automatic } from './modules/automatic';

window.vigia = {};

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
  swiperScript();
  interactions();
  automatic();
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
