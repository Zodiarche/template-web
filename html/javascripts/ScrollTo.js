/**
 * @param {Event} event - L'événement déclencheur qui contient l'élément du clic.
 * @param {number} headerHeight - La hauteur de l'en-tête pour ajuster le défilement.
 */
const scrollToTargetAdjustedForHeader = (event, headerHeight) => {
  event.preventDefault();

  const href = event.target.getAttribute('href');
  if (!href.startsWith('#')) return;

  const targetElement = document.querySelector(href);
  if (!targetElement) return;

  const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
  window.scrollTo({ top: targetPosition - headerHeight, left: 0, behavior: "smooth" });

  return false;
}

document.addEventListener("DOMContentLoaded", () => {
  const headerHeight = document.querySelector('header').offsetHeight;
  const elementLinks = document.querySelectorAll('.scrollTo');

  elementLinks.forEach(elementLink => {
    elementLink.addEventListener("click", (event) => scrollToTargetAdjustedForHeader(event, headerHeight));
  });
});
