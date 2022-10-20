window.onload = CargaEventos();

function CargaEventos() {
  // Accion al darle click a la lupa
  const LUPA = document.querySelector(".lupa");
  console.log("🚀 ~ file: script.js ~ line 6 ~ CargaEventos ~ LUPA", LUPA);
  LUPA.addEventListener("click", Busqueda);

  // Buscar libro
  const FORMSEARCH = document.querySelector(".search");
  FORMSEARCH.addEventListener("submit", BuscarLibro);

  // Imagen cuando esta el mouse encima
  const IMG = document.querySelector(".libro");
  IMG.addEventListener("mouseover", ImgHover);
  // Imagen vuelta a lo normal
  IMG.addEventListener("mouseout", ImgNormal);

}


var Busqueda = () => {
  var input = document.getElementById("searchInput");
  input.style.visibility = "visible";
  input.focus();
}

var BuscarLibro = () => {
  input.style.visibility = "hidden";
}

var ImgHover = () => {
  const TITULOLIBRO = document.querySelector(".tituloLibro");
  const TITULOHOVER = document.querySelector("#tituloHover");
  const SINOPSISHOVER = document.querySelector("#sinopsisHover");

  TITULOHOVER.innerHTML = TITULOLIBRO.innerHTML;
  SINOPSISHOVER.innerHTML = "";
}


var ImgNormal = () => {
  const TITULOHOVER = document.querySelector("#tituloHover");
  const SINOPSISHOVER = document.querySelector("#sinopsisHover");

  TITULOHOVER.innerHTML = "";
  SINOPSISHOVER.innerHTML = "";
}