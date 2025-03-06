/**
 * Initialise le menu burger en ajoutant des écouteurs d'événements sur les éléments nécessaires.
 */
const initializeBurgerMenu = () => {
  const menuButton = document.getElementById("menu-button");
  if (!menuButton) return;

  menuButton.addEventListener("click", handleMenuButtonClick);
  document.addEventListener("click", handleDocumentClick);
  window.addEventListener("resize", () => handleWindowResize());
};

/**
 * Gère l'événement de clic sur le bouton du menu.
 * @param {Event} event - L'événement de clic qui a déclenché l'appel de cette fonction.
 */
const handleMenuButtonClick = (event) => {
  event.preventDefault();

  const menuButton = event.currentTarget;
  if (!menuButton) return;

  const pressed = menuButton.getAttribute("aria-pressed") === "true";

  menuButton.setAttribute("aria-pressed", String(!pressed));
  menuButton.classList.toggle("active");

  const navigation = document.getElementById("header-nav");
  if (!navigation) return;

  navigation.classList.toggle("active");
  document.body.classList.toggle("active");
};

/**
 * Ferme le menu burger si on clique en dehors de l'élément.
 * @param {Event} event - L'événement de clic qui a déclenché l'appel de cette fonction.
 */
const handleDocumentClick = (event) => {
  const menuButton = document.getElementById("menu-button");
  const navigation = document.getElementById("header-nav");
  const tarteaucitron = document.getElementById("tarteaucitronRoot");

  if (!menuButton || !navigation) return;
  if (
    menuButton.contains(event.target) ||
    navigation.contains(event.target) ||
    tarteaucitron?.contains(event.target)
  )
    return;

  closeMenu();
};

/**
 * Ferme le menu burger si la fenêtre est redimensionnée à une largeur supérieure à 1280px.
 */
const handleWindowResize = () => {
  if (window.innerWidth < 1280) return;

  closeMenu();
};

/**
 * Ferme le menu burger.
 */
const closeMenu = () => {
  const menuButton = document.getElementById("menu-button");
  if (!menuButton) return;

  menuButton.setAttribute("aria-pressed", "false");
  menuButton.classList.remove("active");

  const navigation = document.getElementById("header-nav");
  if (!navigation) return;

  navigation.classList.remove("active");
  document.body.classList.remove("active");
};

window.addEventListener("load", initializeBurgerMenu());
