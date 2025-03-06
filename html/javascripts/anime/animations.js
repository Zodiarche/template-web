/**
 * Un ensemble d'animations définies utilisant la bibliothèque Anime.js.
 */
export const animations = {
  /**
   * Anime un élément pour le déplacer de bas en haut.
   * @param {HTMLElement} element - L'élément à animer.
   */
  moveToUp: (element) => {
    anime({
      targets: element,
      opacity: [0, 1],
      translateY: [100, 0],
      duration: 1000,
      easing: "easeOutQuad",
    });
  },

  /**
   * Anime un élément pour le déplacer de haut en bas.
   * @param {HTMLElement} element - L'élément à animer.
   */
  moveToDown: (element) => {
    anime({
      targets: element,
      opacity: [0, 1],
      translateY: [-100, 0],
      duration: 1000,
      easing: "easeOutQuad",
    });
  },

  /**
   * Anime un élément pour le déplacer de gauche à droite.
   * @param {HTMLElement} element - L'élément à animer.
   */
  moveToLeft: (element) => {
    anime({
      targets: element,
      opacity: [0, 1],
      translateX: [100, 0],
      duration: 1000,
      easing: "easeOutQuad",
    });
  },

  /**
   * Anime un élément pour le déplacer de droite à gauche.
   * @param {HTMLElement} element - L'élément à animer.
   */
  moveToRight: (element) => {
    anime({
      targets: element,
      opacity: [0, 1],
      translateX: [-100, 0],
      duration: 1000,
      easing: "easeOutQuad",
    });
  },

  /**
   * Anime un élément pour le faire apparaître progressivement.
   * @param {HTMLElement} element - L'élément à animer.
   */
  fadeIn: (element) => {
    anime({
      targets: element,
      opacity: [0, 1],
      duration: 800,
      easing: "easeInOutQuad",
    });
  },

  /**
   * Anime un élément pour l'agrandir.
   * @param {HTMLElement} element - L'élément à animer.
   */
  scaleUp: (element) => {
    anime({
      targets: element,
      opacity: [0, 1],
      scale: [0.5, 1],
      duration: 1000,
      easing: "easeOutElastic(1, .8)",
    });
  },

  /**
   * Anime un élément pour le réduire.
   * @param {HTMLElement} element - L'élément à animer.
   */
  scaleDown: (element) => {
    anime({
      targets: element,
      opacity: [0, 1],
      scale: [1.5, 1],
      duration: 1000,
      easing: "easeOutElastic(1, .8)",
    });
  },

  /**
   * Anime un élément pour le faire pulser.
   * @param {HTMLElement} element - L'élément à animer.
   */
  pulse: (element) => {
    anime({
      targets: element,
      scale: [1, 1.02, 1],
      duration: 1000,
      easing: "easeInOutSine",
      loop: true,
    });
  },

  /**
   * Anime un élément pour le faire clignoter.
   * @param {HTMLElement} element - L'élément à animer.
   */
  flash: (element) => {
    anime({
      targets: element,
      opacity: [0, 1, 0, 1, 0],
      duration: 2500,
      easing: "easeInOutQuad",
      loop: true,
    });
  },

  /**
   * Anime un élément pour le faire rebondir.
   * @param {HTMLElement} element - L'élément à animer.
   */
  bounce: (element) => {
    anime({
      targets: element,
      translateY: [
        { value: -5, duration: 500 },
        { value: 0, duration: 500 },
      ],
      easing: "easeInOutQuad",
      loop: true,
    });
  },
};
