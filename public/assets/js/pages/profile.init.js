/******/ (() => { // webpackBootstrap
/*!********************************************!*\
  !*** ./resources/js/pages/profile.init.js ***!
  \********************************************/
/*

Author: Taimoor Salyhal


File: Profile init js
*/

// project-swiper
var swiper = new Swiper(".project-swiper", {
  slidesPerView: 1,
  spaceBetween: 24,
  navigation: {
    nextEl: ".slider-button-next",
    prevEl: ".slider-button-prev"
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 15
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 25
    }
  }
});
/******/ })()
;