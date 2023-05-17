// tema selecionado
(function () {
  const theme = localStorage.getItem("theme");
  const side = localStorage.getItem("sidebar");
  const root = document.documentElement;
  const content = document.getElementById("content");

  if (theme === "light") {
    root.classList.add("light");
  }

  if (side === "small") {
    document.querySelector(".sidebar").classList.add("collapsed");
  }

  content.classList.remove("hidden");
})();
