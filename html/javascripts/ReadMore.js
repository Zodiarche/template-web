const btns = document.querySelectorAll('.swiper-slide button');

/**
* @param {HTMLElement} btn - Le bouton qui a été cliqué.
*/
const toggleBtn = (btn) => {
  const slideElement = btn.closest('.swiper-slide');
  const textElement = slideElement.querySelector('p');
  const isPressed = btn.getAttribute("aria-pressed") === "true";

  textElement.classList.toggle("text-limit", isPressed);
  textElement.innerHTML = isPressed ? textElement.innerHTML.replace(/.$/, "...") : textElement.innerHTML.replace("...", "");
  btn.textContent = isPressed ? 'Lire la suite' : 'Masquer';
  btn.title = isPressed ? 'Lire la suite' : 'Masquer';

  // const arrow = slideElement.querySelector("svg");
  // arrow.classList.toggle("rotate", !isPressed);

  btn.setAttribute("aria-pressed", String(!isPressed));
}

btns.forEach(btn => btn.addEventListener('click', () => toggleBtn(btn)));