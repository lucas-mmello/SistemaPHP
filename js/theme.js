// tema selecionado
(function () {
  const theme = localStorage.getItem("theme");
  const root = document.documentElement;
  const content = document.getElementById("content");

  if (theme === "light") {
    root.classList.add("light");
  }
  alert("aqui1");
  if (window.location.href.includes("index.php") === false) {
    const side = localStorage.getItem("sidebar");
    if (side === "small") {
      document.querySelector(".sidebar").classList.add("collapsed");
    }
  }
  content.classList.remove("hidden");
})();
