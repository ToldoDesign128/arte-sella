

// Swiper

var SwiperGallery = new Swiper(".SwiperGallery", {
  slidesPerView: 3.5,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 3000,
  },
});

var SwiperTextImg = new Swiper(".SwiperTextImg", {
  slidesPerView: 1,
  spaceBetween: 30,
});

// import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe/dist/photoswipe-lightbox.esm.js';

// const lightbox = new PhotoSwipeLightbox({
//   gallery: '#hgblu-gallery',
//   children: 'a',
//   pswpModule: () => import('https://unpkg.com/photoswipe'),
// });

// lightbox.init();
// singleLightbox.init();