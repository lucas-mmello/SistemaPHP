// tema selecionado
const root = document.documentElement;
document.addEventListener("DOMContentLoaded", () => {
  const theme = sessionStorage.getItem("theme");
  if (theme === "light") {
    root.classList.add("light");
  }
});
// Altera os temas claro e escuro e as imagens

const themeToggle = document.querySelectorAll(".theme-toggle");

themeToggle.forEach((themeToggle) => {
  themeToggle.addEventListener("click", (e) => {
    e.preventDefault();
    root.classList.toggle("light");
    if (root.classList.contains("light")) {
      sessionStorage.setItem("theme", "light");
    } else {
      sessionStorage.setItem("theme", "dark");
    }
  });
});

//sidebar

const sidebar = document.querySelector(".sidebar");
const sidebarToggle = document.querySelector("#sidebar-toggle");

sidebarToggle.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
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

// //prevent default

// let navlink = document.querySelectorAll(".nav-link");

// navlink.forEach((navlink) => {
//   navlink.addEventListener("click", (e) => {
//     e.preventDefault();
//   });
// });
