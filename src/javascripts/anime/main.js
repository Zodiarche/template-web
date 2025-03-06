import { animations } from "./animations.js";

/**
 * Initialise AnimeJS en observant les éléments avec l'attribut data-animation.
 */
const initializeAnimeJS = () => {
  const elements = document.querySelectorAll("[data-animation]");
  const options = {
    root: null,
    rootMargin: "0px",
    threshold: 0.1,
  };

  const observer = new IntersectionObserver(handleIntersect, options);

  elements.forEach((element) => {
    observer.observe(element);
  });
};

/**
 * Fonction appelée lorsqu'une intersection est observée.
 * @param {IntersectionObserverEntry[]} entries - Les entrées observées par l'IntersectionObserver.
 * @param {IntersectionObserver} observer - L'observateur qui appelle cette fonction.
 */
const handleIntersect = (entries, observer) => {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) return;

    const element = entry.target;
    const animationType = element.dataset.animation;

    if (animations[animationType]) {
      animations[animationType](element);
    } else {
      console.warn(`Le type d'animation "${animationType}" n'est pas défini.`);
    }

    // observer.unobserve(element);
  });
};

window.addEventListener("load", initializeAnimeJS());
