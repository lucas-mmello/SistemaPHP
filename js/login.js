// tema selecionado
const root = document.documentElement;
const url = window.location.href;
document.addEventListener("DOMContentLoaded", () => {
  const theme = localStorage.getItem("theme");
  if (theme === "light") {
    root.classList.add("light");
  }
  if (url.includes("erro")) {
    document.querySelectorAll("input").forEach((inp) => {
      inp.classList.add("shake-horizontal");
    });
    setTimeout(() => {
      document.querySelectorAll("input").forEach((inp) => {
        inp.classList.remove("shake-horizontal");
      });
    }, 1200);
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
