window.onload = CargaEventos;

function CargaEventos() {

  //Accion al darle click al libro
  const INDEX = document.querySelector(".logo");
  INDEX.addEventListener("click", Index);

  // Accion al darle click a la lupa
  const LUPA = document.querySelector(".lupa");
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

var Index = () => {
  location.href = "../index.php"
}

var Busqueda = () => {
  var input = document.getElementById("searchInput");
  input.style.visibility = "visible";
  input.focus();
}


var BuscarLibro = () => {
  document.querySelector("#searchInput").style.visibility = "hidden";
}

var ImgHover = () => {
  const TITULOLIBRO = document.querySelector(".tituloLibro");

  TITULOLIBRO.style.visibility = "hidden";
  SINOPSISHOVER.innerHTML = "";
}

var ImgNormal = () => {
  const TITULOLIBRO = document.querySelector(".tituloLibro");

  TITULOLIBRO.style.visibility = "visible";
  SINOPSISHOVER.innerHTML = "";
}
