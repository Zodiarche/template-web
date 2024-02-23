document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll("#notre-cabinet > section");
    const menuItems = document.querySelectorAll(".menu-container ul li a");

    const hideSectionsExceptMain = () => {
        sections.forEach(section => {
            if (!section.classList.contains("main-section")) {
                section.style.display = 'none';
            }
        });
    };

    const showDefaultContent = () => {
        const firstContentId = document.querySelector(".menu-container ul li.current-menu-item a").getAttribute('href');
        document.querySelector(firstContentId).style.display = 'block';
    };

    /**
     * @param {string} contentId - The ID of the content to display.
     */
    const updateContentDisplay = (contentId) => {
        hideSectionsExceptMain();
        document.querySelector(contentId).style.display = 'block';
    };

    /**
     * @param {Element} newCurrent - The new current menu item element.
     */
    const updateCurrentMenuItem = (newCurrent) => {
        document.querySelectorAll(".menu-container ul li").forEach(li => li.classList.remove('current-menu-item'));
        newCurrent.classList.add('current-menu-item');
    };

    hideSectionsExceptMain();
    showDefaultContent();

    menuItems.forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();

            const contentId = item.getAttribute('href');
            updateContentDisplay(contentId);
            updateCurrentMenuItem(item.parentNode);
        });
    });
});
