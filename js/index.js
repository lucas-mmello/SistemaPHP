// Altera os temas claro e escuro e as imagens

const themeToggle = document.getElementById("theme-toggle");
const root = document.documentElement;

themeToggle.addEventListener("click", (e) => {
  e.preventDefault();
  root.classList.toggle("light");
});
