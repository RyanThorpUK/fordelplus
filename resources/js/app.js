import Offer from './modules/offer';
new Offer('.swiper');


import Carousel from './modules/carousel';
for (const slide of document.querySelectorAll('.js--slide')) {
    new Carousel(slide);
}

import OfferSelector from './modules/offerSelector';
new OfferSelector();

import Navigation from './modules/navigation';
new Navigation();

import UserTypeSelector from './modules/userTypeSelector';
new UserTypeSelector();

import Wysiwyg from './modules/wysiwyg';
new Wysiwyg();

import Modal from './modules/modal';
new Modal();

window.addEventListener('refresh-browser', function() {
    location.reload();
});
