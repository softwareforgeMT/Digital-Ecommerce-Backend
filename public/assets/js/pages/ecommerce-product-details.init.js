/******/ (() => { // webpackBootstrap
/*!**************************************************************!*\
  !*** ./resources/js/pages/ecommerce-product-details.init.js ***!
  \**************************************************************/
/*

Author: Taimoor Salyhal


File: Ecommerce product Details Js File
*/

var productNavSlider = new Swiper(".product-nav-slider", {
  loop: false,
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true
});
var productThubnailSlider = new Swiper(".product-thumbnail-slider", {
  loop: false,
  spaceBetween: 24,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  thumbs: {
    swiper: productNavSlider
  }
});
/******/ })()
;