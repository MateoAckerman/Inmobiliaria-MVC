document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
});

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", navegacionTab);
}

function navegacionTab() {
  const navegacion = document.querySelector(".n1");

  navegacion.classList.toggle("mostrar");
}
