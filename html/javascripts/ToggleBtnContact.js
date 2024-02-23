const toggleContactBtn = () => {
    const width = 1280;
    const isBtnActive = window.innerWidth <= width;
    const contactElement = document.getElementById("contactLink")
    const klass = contactElement.classList

    if (isBtnActive) {
        klass.add("navLink");
        klass.remove("btn");
    } else {
        klass.add("btn");
        klass.remove("navLink");
    }
}

window.addEventListener("load", toggleContactBtn);
window.addEventListener("resize", toggleContactBtn);