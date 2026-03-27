import './bootstrap/assets';

import { domReady } from './utils/domReady';
import { initMobileMenu } from './components/mobile-menu';
import accordion from './components/accordion';
import portfolio from './components/portfolio';
import dragScroll from './components/drag-scroll';
import forms from './components/forms';
import megaMenu from './components/mega-menu';
import stickyBar from './components/sticky-bar';

domReady(() => {
  initMobileMenu();
  accordion();
  portfolio();
  dragScroll();
  forms();
  megaMenu();
  stickyBar();
});

console.log('dupa');
