/**
 * @module Utils
 */

/**
 * Crée un élément HTML avec des propriétés données.
 * @param {string} element - Le nom de la balise de l'élément à créer.
 * @param {Object} options - Un objet contenant les options pour l'élément.
 * @returns {HTMLElement} L'élément créé.
 */
export const createElementWithProps = (element, options = {}) => {
  const el = document.createElement(element);

  Object.keys(options).forEach((key) => {
    if (options[key] !== undefined) {
      el[key] = options[key];
    }
  });

  return el;
};
