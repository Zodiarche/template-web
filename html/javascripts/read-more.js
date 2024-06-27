/**
 * @module ReadMore
 */

/**
 * Initialise les boutons "Lire la suite" pour qu'ils puissent afficher ou masquer du contenu supplémentaire.
 */
const initializeReadMore = () => {
  const btns = document.querySelectorAll(".read-more-button");

  btns.forEach((btn) => btn.addEventListener("click", () => toggleBtn(btn)));
};

/**
 * Bascule l'affichage du texte associé au bouton "Lire la suite".
 * @param {HTMLElement} btn - Le bouton qui a été cliqué.
 */
export const toggleBtn = (btn) => {
  if (!btn) return;

  const parentElement = btn.parentElement;
  if (!parentElement) return;

  const textElement = parentElement.querySelector(".read-more-text");
  if (!textElement) return;

  const isPressed = btn.getAttribute("aria-pressed") === "true";

  textElement.classList.toggle("text-limit", isPressed);
  textElement.innerHTML = isPressed
    ? textElement.innerHTML.replace(/.$/, "...")
    : textElement.innerHTML.replace("...", "");
  btn.textContent = isPressed ? "Lire la suite" : "Masquer";
  btn.title = isPressed ? "Lire la suite" : "Masquer";

  btn.setAttribute("aria-pressed", String(!isPressed));
};

window.addEventListener("load", initializeReadMore());
