// tema selecionado e erro
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
      window.history.replaceState(null, "", url.replace(/erro.*/, ""));
    }, 1200);
  }
});

//refresh da pagina
window.addEventListener("beforeunload", function (event) {
  if (url.includes("erro")) {
    event.preventDefault();
    window.history.replaceState(null, "", url.replace(/erro.*/, ""));
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
