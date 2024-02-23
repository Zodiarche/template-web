let swiperInstance1 = null;

// let swiperNavigation = null;
// let swiperPagination = null;
// let swiperAutoplay = null;

const swiperSelectors = ['.mySwiper1'];

/**
 * Initialise une nouvelle instance de Swiper.
 * @param {string} selector - Le sélecteur CSS de l'élément Swiper.
 * @returns {Swiper} - L'instance de Swiper créée.
 */
const initSwiper = (selector) => {
  return new Swiper(selector, {
    spaceBetween: 100,
    autoHeight: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
}

/**
 * @param {string} selector - Le sélecteur CSS de l'élément Swiper.
 * @param {string} id - L'ID CSS de l'élément Swiper.
 * @returns {Swiper} - L'instance de Swiper créée.
 */
const initSwiperPagination = (selector, id) => {
  return new Swiper(selector, {
    spaceBetween: 100,
    speed: 400,
    pagination: {
      el: id,
      clickable: true,
    },
    // Reset le texte étendu avec Lire la Suite quand on change d'élément du swiper
    // on: {
    //   slideChange: function() {
    //     resetReadMoreButtons(this);
    //   }
    // }
  });
}

/**
 * @param {string} selector - Le sélecteur CSS de l'élément Swiper.
 * @param {string} idNext - L'ID Next CSS de l'élément Swiper.
 * @param {string} idPrev - L'ID Previous CSS de l'élément Swiper.
 * @returns {Swiper} - L'instance de Swiper créée.
 */
const initSwiperNavigation = (selector, idNext, idPrev) => {
  return new Swiper(selector, {
    spaceBetween: 100,
    speed: 400,
    navigation: {
      nextEl: idNext,
      prevEl: idPrev,
    },
    // Reset le texte étendu avec Lire la Suite quand on change d'élément du swiper
    // on: {
    //   slideChange: function() {
    //     resetReadMoreButtons(this);
    //   }
    // }
  });
}

/**
 * @param {string} selector - Le sélecteur CSS de l'élément Swiper.
 * @param {string} id - L'ID CSS de l'élément Swiper.
 * @param {string} idNext - L'ID Next CSS de l'élément Swiper.
 * @param {string} idPrev - L'ID Previous CSS de l'élément Swiper.
 * @returns {Swiper} - L'instance de Swiper créée.
 */
const initSwiperAutoplay = (selector, id, idNext, idPrev) => {
  const progressCircle = document.querySelector(".autoplay-progress svg");
  // const progressContent = document.querySelector(".autoplay-progress span");

  return new Swiper(selector, {
    spaceBetween: 100,
    speed: 400,
    centeredSlides: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    },
    pagination: {
      el: id,
      clickable: true
    },
    // navigation: {
    //   nextEl: idNext,
    //   prevEl: idPrev,
    // },
    // on: {
    //   autoplayTimeLeft(s, time, progress) {
    //     progressCircle.style.setProperty("--progress", 1 - progress);
    //     // progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    //   }
    // }
  });
}

/**
 * @param {Swiper} swiperInstance - L'instance de Swiper.
 */
const resetReadMoreButtons = (swiperInstance) => {
  const slidesElement = swiperInstance.slides;

  slidesElement.forEach(slideElement => {
    const btn = slideElement.querySelector("button");
    const isPressed = btn.getAttribute("aria-pressed") === "true";
    const isSlideActive = slideElement.classList.contains(".swiper-slide-active");

    if (isPressed && !isSlideActive) return toggleBtn(btn);
  })
}

/**
 * Active les éléments Swiper en ajoutant les classes actives et en supprimant les classes inactives.
 * @param {Element} swiperElement - L'élément Swiper à activer.
 */
const activateSwiperElements = (swiperElement) => {
  if (!swiperElement) return;

  const swiperWrapper = swiperElement.querySelector('.swiper-wrapper-inactive');
  const swiperSlides = swiperElement.querySelectorAll('.swiper-slide-inactive');
  const swiperPagination = swiperElement.querySelector('.swiper-pagination-inactive');

  swiperElement.classList.add('swiper');
  swiperElement.classList.remove('swiper-inactive');

  swiperWrapper?.classList.add('swiper-wrapper');
  swiperWrapper?.classList.remove('swiper-wrapper-inactive');

  swiperSlides.forEach(slide => {
    slide?.classList.add('swiper-slide');
    slide?.classList.remove('swiper-slide-inactive');
  });

  swiperPagination?.classList.add('swiper-pagination');
  swiperPagination?.classList.remove('swiper-pagination-inactive');
};

/**
 * Désactive les éléments Swiper en supprimant les classes actives et en ajoutant les classes inactives.
 * @param {Element} swiperElement - L'élément Swiper à désactiver.
 */
const desactivateSwiperElements = (swiperElement) => {
  if (!swiperElement) return;

  const swiperWrapper = swiperElement.querySelector('.swiper-wrapper');
  const swiperSlides = swiperElement.querySelectorAll('.swiper-slide');
  const swiperPagination = swiperElement.querySelector('.swiper-pagination');

  swiperElement.classList.add('swiper-inactive');
  swiperElement.classList.remove('swiper');

  swiperWrapper?.classList.add('swiper-wrapper-inactive');
  swiperWrapper?.classList.remove('swiper-wrapper');

  swiperSlides.forEach(slide => {
    slide?.classList.add('swiper-slide-inactive');
    slide?.classList.remove('swiper-slide');
  });

  swiperPagination?.classList.add('swiper-pagination-inactive');
  swiperPagination?.classList.remove('swiper-pagination');
};

/**
 * Met à jour les classes des éléments Swiper en fonction de la largeur d'écran.
 * @param {boolean} isSwiperActive - Indique si Swiper doit être actif.
 */
const updateSwiperClasses = (isSwiperActive) => {
  swiperSelectors.forEach((selector) => {
    const swiperElement = document.querySelector(selector);

    isSwiperActive ? activateSwiperElements(swiperElement) : desactivateSwiperElements(swiperElement);
  });
};


/**
 * Gère l'initialisation ou la destruction d'une instance de Swiper.
 * @param {string} selector - Le sélecteur CSS de l'élément Swiper.
 * @param {boolean} isSwiperActive - Indique si Swiper doit être actif.
 * @param {Swiper} swiperInstance - Référence à l'instance Swiper actuelle.
 * @returns {Swiper|null} - Retourne l'instance de Swiper mise à jour ou null.
 */
const handleSwiperInstance = (selector, isSwiperActive, swiperInstance) => {
  // Activation
  if (isSwiperActive && !swiperInstance) {
    updateSwiperClasses(isSwiperActive);

    return initSwiper(selector);
  }
  // Destruction
  else if (!isSwiperActive && swiperInstance) {
    updateSwiperClasses(isSwiperActive);
    swiperInstance.destroy();

    return null;
  }
  // Ajustements des classes lors du chargement de page
  else if (!isSwiperActive && !swiperInstance) {
    updateSwiperClasses(isSwiperActive);

    return null;
  }

  return swiperInstance;
};

/**
 * Gère l'activation ou la désactivation des instances Swiper en fonction de la largeur de la fenêtre.
 */
const handleSwiper = () => {
  const width = 992;
  const isSwiperActive = window.innerWidth < width;

  swiperInstance1 = handleSwiperInstance('.mySwiper1', isSwiperActive, swiperInstance1);
};

window.addEventListener('DOMContentLoaded', handleSwiper);
window.addEventListener('resize', handleSwiper);
