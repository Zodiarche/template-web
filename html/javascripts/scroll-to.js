/**
 * @module ScrollTo
 */

/**
 * Initialise le défilement ajusté en fonction de la hauteur de l'en-tête.
 * @throws {Error} Si la hauteur de l'en-tête ou les éléments de lien ne peuvent pas être trouvés.
 */
const initializeScrollTo = () => {
  const headerHeight = document.getElementById("header").offsetHeight;
  if (!headerHeight) return;

  const elementLinks = document.querySelectorAll(".scrollTo");
  if (!elementLinks) return;

  const href = new URL(window.location.href);

  elementLinks.forEach((elementLink) => {
    elementLink.addEventListener("click", (link) =>
      scrollToTargetAdjustedForHeader(link, null, headerHeight)
    );
  });

  if (!href.hash) return;

  scrollToTargetAdjustedForHeader(null, href.hash, headerHeight);
};

/**
 * Défile la page vers la cible ajustée en fonction de la hauteur de l'en-tête.
 * @param {Event|null} event - L'événement déclencheur qui contient l'élément du clic.
 * @param {string|null} href - L'ancrage de l'URL.
 * @param {number} headerHeight - La hauteur de l'en-tête pour ajuster le défilement.
 */
const scrollToTargetAdjustedForHeader = (event, href, headerHeight) => {
  if (!href) href = event.target.getAttribute("href");

  const sharp = href.indexOf("#");
  if (sharp === -1) return;

  const targetElement = document.querySelector(href.substring(sharp));
  if (!targetElement) return;

  history.pushState(null, null, href);

  const targetPosition =
    targetElement.getBoundingClientRect().top + window.scrollY;

  setTimeout(() => {
    window.scrollTo({
      top: targetPosition - headerHeight,
      left: 0,
      behavior: "smooth",
    });
  }, 1);

  event?.preventDefault();
};

window.addEventListener("load", () => initializeScrollTo());
