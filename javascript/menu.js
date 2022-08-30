const menu = document.getElementById("burger");
const navbar = document.getElementById("navbar");

menu.addEventListener("click", () => {
  menu.classList.toggle("active");
  navbar.classList.toggle("active");
});
