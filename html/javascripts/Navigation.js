const closeBurgerMenu = () => {
  const elementsToDeactivate = [
    document.getElementById('menu-button'),
    document.querySelector('#header nav'),
    document.querySelector('body')
  ];

  elementsToDeactivate.forEach((element) => {
    if (element.classList.contains('active')) element.classList.remove('active');
  })

  const menuButton = elementsToDeactivate[0];
  if (menuButton) menuButton.setAttribute('aria-pressed', 'false');
}

const setUpMenuLinks = () => {
  const menuLinks = document.querySelectorAll('#header nav a');

  menuLinks.forEach(link => {
    link.addEventListener('click', closeBurgerMenu);
  });
}

document.addEventListener('DOMContentLoaded', setUpMenuLinks);