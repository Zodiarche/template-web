const toggleMobileMenu = () => {
    const menuButton = document.getElementById('menu-button');

    menuButton.addEventListener('click', handleMenuButtonClick);
}

/**
 * @param {Event} event - L'événement de clic qui a déclenché l'appel de cette fonction.
 */
function handleMenuButtonClick(event) {
    const pressed = this.getAttribute('aria-pressed') === 'true';

    this.setAttribute('aria-pressed', String(!pressed));
    this.classList.toggle('active');

    const nav = document.querySelector('#header nav');
    nav.classList.toggle('active');
    document.body.classList.toggle('active');

    event.preventDefault();
}

toggleMobileMenu();