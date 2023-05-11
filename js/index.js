// tema selecionado
const root = document.documentElement;
document.addEventListener("DOMContentLoaded", () => {
  const theme = localStorage.getItem("theme");
  const side = localStorage.getItem("sidebar");
  if (theme === "light") {
    root.classList.add("light");
  }
  if (side === "small") {
    sidebar.classList.add("collapsed");
  }
});
// Altera os temas claro e escuro e as imagens

const themeToggle = document.querySelectorAll(".theme-toggle");

themeToggle.forEach((themeToggle) => {
  themeToggle.addEventListener("click", (e) => {
    e.preventDefault();
    root.classList.toggle("light");
    if (root.classList.contains("light")) {
      localStorage.setItem("theme", "light");
    } else {
      localStorage.setItem("theme", "dark");
    }
  });
});

//sidebar

const sidebar = document.querySelector(".sidebar");
const sidebarToggle = document.querySelector("#sidebar-toggle");

sidebarToggle.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
  if (sidebar.classList.contains("collapsed")) {
    localStorage.setItem("sidebar", "small");
  } else {
    localStorage.setItem("sidebar", "big");
  }
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

// olho da senha
document.querySelectorAll(".togglePassword").forEach((toggle) => {
  toggle.addEventListener("click", (ev) => {
    const password = ev.target.nextElementSibling;
    if (password.type === "password") {
      password.type = "text";
      toggle.setAttribute("name", "eye-off-outline");
    } else {
      password.type = "password";
      toggle.setAttribute("name", "eye-outline");
    }
  });
});
