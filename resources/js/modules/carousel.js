import Swiper from 'swiper';
// import { Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

class Carousel {
  constructor(slideContainer) {
    this.slideContainer = slideContainer;
    this.slide = this.slideContainer.querySelector('.swiper');
    this.prev = this.slideContainer.querySelector('.js--slide-prev');
    this.next = this.slideContainer.querySelector('.js--slide-next');

    this.init();
    this.addEvents();
  }

  init() {
    
    this.swiper = new Swiper(this.slide, {
        slidesPerView: parseFloat(this.slideContainer.getAttribute('data-mobile-slides-per-view')) ?? 1,
        autoHeight: true,
        spaceBetween: 9,
        grabCursor: true,
        breakpoints: {
            768: {
              spaceBetween: 20,
              slidesPerView: parseInt(this.slideContainer.getAttribute('data-slides-per-view')),
            }
        }
    });

      this.checkPagination();
  }

  addEvents() {
    if ( this.prev === null || this.next === null) {
      return;
    }

    this.prev.addEventListener('click', () => {
      this.swiper.slidePrev();
    });

    this.next.addEventListener('click', () => {
      this.swiper.slideNext();
    });

    this.swiper.on('slideChange', () => {
      this.checkPagination();
    });
  }

  checkPagination() {
    if ( this.prev === null || this.next === null) {
      return;
    }

    if (this.swiper.activeIndex === 0) {
      this.prev.classList.add('!hidden');
    } else {
      this.prev.classList.remove('!hidden');
      this.next.classList.remove('!hidden');
    }

    if (this.swiper.activeIndex === this.swiper.slides.length - 1) {
      this.next.classList.add('!hidden');
    }
  }
}

export default Carousel;