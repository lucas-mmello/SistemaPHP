// tema selecionado
const root = document.documentElement;
document.addEventListener("DOMContentLoaded", () => {
  const theme = localStorage.getItem("theme");
  if (theme === "light") {
    root.classList.add("light");
  }
});

// olho da senha
document.querySelector("#togglePassword").addEventListener("click", () => {
  const password = document.querySelector("#senha");
  const toggle = document.querySelector("#togglePassword");
  if (password.type === "password") {
    password.type = "text";
    toggle.setAttribute("name", "eye-off-outline");
  } else {
    password.type = "password";
    toggle.setAttribute("name", "eye-outline");
  }
});
