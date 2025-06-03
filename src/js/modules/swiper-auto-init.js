/**
 * 
 * This script handle the configuration of swipers.
 * The goal is to offer the possibility to handle the configuration of swipers in a generic and flexible way
 * 
 */

import Swiper from "swiper"
import { Pagination, Navigation, EffectFade} from "swiper/modules"
import 'swiper/scss';

Swiper.use([Pagination, Navigation]);

/**
 * This function transforms a string like "42px" to the number 42
 * It's usefull if your theme's values are in string
 * 
 * @param {string} str the vstring value (e.g. "13px")
 * @returns {number} the number value
 */
function pxStringToInt(str) {
  return parseInt(str.replace("px", ""));
}

/******************************************************************** CONFIGS *****************/
//  You can create as many configs as needed
//  The ultimate goal is that the generic config offers enough options to handle every case, but it's often quicker to create a dedicated config for a specific case

/**
 * 
 * @param {string} paginationClass classname (with dot) of the pagination element
 * @param {string} navigationPrevClass classname (with dot) of the 'previous' button element
 * @param {string} navigationNextClass classname (with dot) of the 'next' button element
 * @returns 
 */
const getGenericConfig = (paginationClass, navigationPrevClass, navigationNextClass) => {
  return {
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: {
      el: paginationClass,
      clickable: true
    },
    navigation: {
      prevEl: navigationPrevClass,
      nextEl: navigationNextClass,
    },
  
    breakpoints: {
  
      [pxStringToInt(CUSTOM_THEME.screens.md)]: {
        slidesPerView: 1,
      },
  
      [pxStringToInt(CUSTOM_THEME.screens.lg)]: {
        slidesPerView: 1,
      }
  
    },
  }
}
const getHeroConfig = (paginationClass) => {
  return {
    slidesPerView: 1,
    spaceBetween: 0,

    direction:"horizontal",

    pagination: {
      el: paginationClass,
      clickable: true
    },

  
    breakpoints: {
  
      [pxStringToInt(CUSTOM_THEME.screens.md)]: {
        slidesPerView: 1,
      },
  
      [pxStringToInt(CUSTOM_THEME.screens.lg)]: {
        slidesPerView: 1,
      }
  
    },
  }
}


/******************************** INITIATE THE SWIPERS *****************/
// This array will contain every initiated swipers
const initiatedSwipers = []
// The increment is used to generate unique classnames
let i = 1


/* CREATE EVERY GENERIC SWIPERS */
window.addEventListener('load',()=>{
const swipersContainer = document.querySelectorAll(".swiper");

swipersContainer.forEach(swiper => {
  // Get elements
  const paginationContainer = swiper.querySelector(".swiper-pagination");
  const navigationPrev = swiper.querySelector(".swiper-button-prev");
  const navigationNext = swiper.querySelector(".swiper-button-next");
  const dataConfig = swiper.dataset?.config;

  // Create unique classnames
  const swiperClass = `swiper-container-${i}`;
  const paginationClass = `swiper-pagination-${i}`;
  const navigationPrevClass = `swiper-button-prev-${i}`;
  const navigationNextClass = `swiper-button-next-${i}`;

  // Assign unique classnames
  swiper.classList.add(swiperClass);
  if(paginationContainer) paginationContainer.classList.add(paginationClass);
  if(navigationPrev) navigationPrev.classList.add(navigationPrevClass);
  if(navigationNext) navigationNext.classList.add(navigationNextClass);

  // If you want to create other config, add a data-config attribute on your .swiper element and add a case to the switch condition.
  switch(dataConfig) {
    case("hero-swiper"):
      initiatedSwipers.push( new Swiper("."+swiperClass, getHeroConfig("."+paginationClass)) );
      break;
    default:
      initiatedSwipers.push( new Swiper("."+swiperClass, getGenericConfig("."+paginationClass, "."+navigationPrevClass, "."+navigationNextClass)) );
      break;
  }
  console.log(initiatedSwipers)
  ++i
})
})