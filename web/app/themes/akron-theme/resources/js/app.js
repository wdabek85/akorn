import './bootstrap/assets';

import { domReady } from './utils/domReady';
import { initMobileMenu } from './components/mobile-menu';

domReady(() => {
  initMobileMenu();
});

console.log('dupa');
