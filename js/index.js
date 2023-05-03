// Altera os temas claro e escuro e as imagens

const themeToggle = document.querySelectorAll(".theme-toggle");
const root = document.documentElement;

themeToggle.forEach((themeToggle) => {
  themeToggle.addEventListener("click", (e) => {
    e.preventDefault();
    root.classList.toggle("light");
  });
});

//icone menu
let menuIcon = document.querySelector("#menu-icon");
let navbar = document.querySelector(".nav");

menuIcon.onclick = () => {
  menuIcon.classList.toggle("bx-x");
  navbar.classList.toggle("active");
};

window.onscroll = () => {
  menuIcon.classList.remove("bx-x");
  navbar.classList.remove("active");
};
