/**
 * @module ShowHide
 */

let url = new URL(window.location.href);

/**
 * Initialise les fonctionnalités de masquage/affichage et met à jour le contenu et le menu.
 */
const initializeShowHide = () => {
  hideSections();
  showDefaultContent();
  updateCurrentMenuItem();

  const menuItems = document.querySelectorAll(".show-hide-button");

  menuItems.forEach((item) => {
    item.addEventListener("click", (event) => {
      event.preventDefault();

      const href = item.getAttribute("href");
      const sharp = href.indexOf("#");
      if (sharp === -1) return;

      history.pushState(null, null, href.substring(sharp));
      url = new URL(window.location.href);

      updateContentDisplay();
      updateCurrentMenuItem();
    });
  });
};

/**
 * Cache toutes les sections qui ont la classe hide.
 */
const hideSections = () => {
  const sections = document.querySelectorAll("main > section");

  sections.forEach((section) => {
    if (section.classList.contains("hide")) {
      section.style.display = "none";
      section.style.opacity = "0";
    }
  });
};

/**
 * Affiche le contenu de la section correspondant à l'ancrage dans l'URL.
 */
const showDefaultContent = () => {
  url = new URL(window.location.href);
  if (!url.hash) return;

  const targetSection = document.querySelector(`${url.hash}`);
  if (!targetSection) return;

  targetSection.style.display = "block";
  targetSection.style.opacity = "1";
};

/**
 * Met à jour l'affichage des sections en cachant toutes les sections et en montrant celle correspondant à l'ancrage dans l'URL.
 */
const updateContentDisplay = () => {
  hideSections();
  showDefaultContent();
};

/**
 * Met à jour l'état des boutons du menu pour refléter la section actuellement affichée.
 */
const updateCurrentMenuItem = () => {
  const linkElements = document.querySelectorAll(".show-hide-button");

  linkElements.forEach((linkElement) => {
    linkElement.classList.toggle(
      "active",
      linkElement.getAttribute("href") === url.hash
    );
  });
};

window.addEventListener("load", () => initializeShowHide());
