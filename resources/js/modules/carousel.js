import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

class Carousel {
  constructor() {
    this.init();
  }

  init() {
    console.log('init');
    this.swiper = new Swiper('.swiper', {
        slidesPerView: "auto",
        spaceBetween: 30,
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
  }
}

export default Carousel;