<<<<<<< HEAD
window.onload = CargaEventos();

function CargaEventos() {
  // Accion al darle click a la lupa
  const LUPA = document.querySelector(".lupa");
  console.log("🚀 ~ file: script.js ~ line 6 ~ CargaEventos ~ LUPA", LUPA);
=======
window.onload = CargaEventos;

function CargaEventos() {

  //Accion al darle click al libro
  const INDEX = document.querySelector(".logo");
  INDEX.addEventListener("click", Index);

  // Accion al darle click a la lupa
  const LUPA = document.querySelector(".lupa");
>>>>>>> origin/HEAD
  LUPA.addEventListener("click", Busqueda);

  // Buscar libro
  const FORMSEARCH = document.querySelector(".search");
  FORMSEARCH.addEventListener("submit", BuscarLibro);

  // Imagen cuando esta el mouse encima
  const IMG = document.querySelector(".libro");
  IMG.addEventListener("mouseover", ImgHover);
<<<<<<< HEAD
=======
  
>>>>>>> origin/HEAD
  // Imagen vuelta a lo normal
  IMG.addEventListener("mouseout", ImgNormal);

}

<<<<<<< HEAD
=======
var Index = () => {
  location.href = "../index.html"
}
>>>>>>> origin/HEAD

var Busqueda = () => {
  var input = document.getElementById("searchInput");
  input.style.visibility = "visible";
  input.focus();
}

var BuscarLibro = () => {
<<<<<<< HEAD
  input.style.visibility = "hidden";
=======
  document.querySelector("#searchInput").style.visibility = "hidden";
>>>>>>> origin/HEAD
}

var ImgHover = () => {
  const TITULOLIBRO = document.querySelector(".tituloLibro");
<<<<<<< HEAD
  const TITULOHOVER = document.querySelector("#tituloHover");
  const SINOPSISHOVER = document.querySelector("#sinopsisHover");

  TITULOHOVER.innerHTML = TITULOLIBRO.innerHTML;
  SINOPSISHOVER.innerHTML = "";
}


var ImgNormal = () => {
  const TITULOHOVER = document.querySelector("#tituloHover");
  const SINOPSISHOVER = document.querySelector("#sinopsisHover");

  TITULOHOVER.innerHTML = "";
=======

  TITULOLIBRO.style.visibility = "hidden";
  SINOPSISHOVER.innerHTML = "";
}

var ImgNormal = () => {
  const TITULOLIBRO = document.querySelector(".tituloLibro");

  TITULOLIBRO.style.visibility = "visible";
>>>>>>> origin/HEAD
  SINOPSISHOVER.innerHTML = "";
}