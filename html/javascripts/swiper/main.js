import * as utils from "./utils.js";
import { resetReadMoreButtons } from "./events.js";

export let swiperTemplateNavigation = null;
export let swiperTemplatePagination = null;
export let swiperTemplateAutoplay = null;
export let swiperTemplateScrollbar = null;

/**
 * @module SwiperJS/Main
 */

/**
 * Gère l'initialisation, la destruction et les changements d'état d'une instance de Swiper.
 * @param {Swiper} swiperInstance - Référence à l'instance Swiper actuelle.
 * @param {string} selector - Le sélecteur CSS de l'élément Swiper.
 * @param {Object.<string, string|boolean|number>} params - Un objet permettant contenant tous les paramètres du Swiper.
 * @returns {Swiper|null}
 */
const handleSwiperInstance = (swiperInstance, selector, params = {}) => {
  const selectorElement = document.querySelector(selector);
  const isSwiperActive = utils.isSwiperActive(selectorElement);

  utils.updateSwiperClasses(selector, isSwiperActive);

  if (isSwiperActive && !swiperInstance) {
    return utils.activateSwiper(selector, params);
  } else if (!isSwiperActive && swiperInstance) {
    return utils.destroySwiper(swiperInstance);
  } else if (!isSwiperActive && !swiperInstance) {
    return null;
  } else {
    return swiperInstance;
  }
};

/**
 * Gère l'activation ou la désactivation des instances Swiper en fonction de la largeur de la fenêtre.
 */
const initializeSwiperJS = () => {
  swiperTemplateNavigation = handleSwiperInstance(
    swiperTemplateNavigation,
    "#templateNavigation",
    {
      centeredSlides: true,
      autoHeight: true,
      spaceBetween: 100,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    }
  );

  swiperTemplatePagination = handleSwiperInstance(
    swiperTemplatePagination,
    "#templatePagination",
    {
      centeredSlides: true,
      autoHeight: true,
      spaceBetween: 100,
      pagination: {
        el: ".swiper-pagination",
      },
    }
  );

  swiperTemplateAutoplay = handleSwiperInstance(
    swiperTemplateAutoplay,
    "#templateAutoplay",
    {
      centeredSlides: true,
      spaceBetween: 100,
      autoHeight: true,
      slidesPerView: 1,
      loop: true,
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
      breakpoints: {
        992: {
          slidesPerView: 2,
        },
        1280: {
          slidesPerView: 3,
        },
      },
    }
  );

  swiperTemplateScrollbar = handleSwiperInstance(
    swiperTemplateScrollbar,
    "#templateScrollbar",
    {
      centeredSlides: true,
      autoHeight: true,
      spaceBetween: 100,
      scrollbar: {
        el: ".swiper-scrollbar",
      },
    }
  );
};

document.addEventListener("DOMContentLoaded", initializeSwiperJS());
window.addEventListener("resize", () => initializeSwiperJS());
