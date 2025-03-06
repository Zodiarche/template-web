/**
 * Fonction qui bascule la classe du bouton de contact en fonction de la largeur de la fenêtre.
 * Ajoute ou supprime la classe "btn-contact" si la largeur de la fenêtre est supérieure à 1280 pixels.
 */
const toggleContactBtn = () => {
  const contactElement = document.getElementById("btn-contact");
  if (!contactElement) return;

  contactElement.classList.toggle("btn-contact", window.innerWidth > 1280);
};

window.addEventListener("load", toggleContactBtn);
window.addEventListener("resize", () => toggleContactBtn());
