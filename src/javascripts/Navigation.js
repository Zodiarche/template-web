/**
 * Initialise la navigation en ajoutant des écouteurs d'événements sur les liens du menu.
 */
const initializeNavigation = () => {
  const links = document.querySelectorAll(".header-link");
  if (!links || links.length === 0) return;

  links.forEach((link) => {
    link.addEventListener("click", handleMenuLinkClick);
  });

  activateCurrentPageLink(links);
};

/**
 * Ferme le menu burger en désactivant les éléments actifs et en activant le lien cliqué.
 */
const handleMenuLinkClick = () => {
  const menuButton = document.getElementById("menu-button");
  const navigation = document.getElementById("header-nav");
  const body = document.querySelector("body");
  if (!menuButton || !navigation || !body) return;

  if (menuButton.classList.contains("active")) {
    menuButton.classList.remove("active");
    menuButton.setAttribute("aria-pressed", "false");
  }

  if (navigation.classList.contains("active")) {
    navigation.classList.remove("active");
  }

  if (body.classList.contains("active")) {
    body.classList.remove("active");
  }

  activateCurrentPageLink(document.querySelectorAll(".header-link"));
};

/**
 * Active le lien correspondant à la page actuelle en ajoutant la classe "active".
 * @param {NodeListOf<HTMLAnchorElement>} links - Les liens du menu.
 */
const activateCurrentPageLink = (links) => {
  if (!links || links.length === 0) return;

  const currentPage = window.location.href;

  links.forEach((link) =>
    link.classList.toggle("active", link.href === currentPage)
  );
};

window.addEventListener("load", initializeNavigation());
