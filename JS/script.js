window.onload = CargaEventos;

function CargaEventos() {
  // Accion al darle click a la lupa
  const LUPA = document.querySelector(".lupa");
  LUPA.addEventListener("click", Busqueda);

  // Buscar libro
  const FORMSEARCH = document.querySelector(".search");
  FORMSEARCH.addEventListener("submit", BuscarLibro);

}


var Busqueda = () => {
  var input = document.getElementById("searchInput");
  input.style.visibility = "visible";
  input.focus();
}


var BuscarLibro = () => {
  document.querySelector("#searchInput").style.visibility = "hidden";
}

