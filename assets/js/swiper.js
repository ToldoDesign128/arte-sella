// Swiper

var SwiperGallery = new Swiper(".SwiperGallery", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 3000,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1280: {
      slidesPerView: 3.5,
    }
  }
});

var SwiperTextImg = new Swiper(".SwiperTextImg", {
  slidesPerView: 1,
  spaceBetween: 30,
});