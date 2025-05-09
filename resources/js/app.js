import Offer from './modules/offer';
new Offer('.swiper');


import Carousel from './modules/carousel';
for (const slide of document.querySelectorAll('.js--slide')) {
    new Carousel(slide);
}

import OfferSelector from './modules/offerSelector';
new OfferSelector();

window.addEventListener('refresh-browser', function() {
    location.reload();
});
