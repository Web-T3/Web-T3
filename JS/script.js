var busqueda = () => {
  var input = document.getElementById("searchInput");
  input.style.visibility = "visible";
  input.focus();
}

var buscarLibro = () => {
  input.style.visibility = "hidden";
}


var imgHover = () => {
  const TituloLibro = document.querySelector(".tituloLibro");
  const TituloHover = document.querySelector("#tituloHover");
  const SinopsisHover = document.querySelector("#sinopsisHover");

  console.log("🚀 ~ file: script.js ~ line 14 ~ imgHover ~ TituloLibro", TituloLibro.value);
  console.log("🚀 ~ file: script.js ~ line 15 ~ imgHover ~ TituloHover", TituloHover);
  console.log("🚀 ~ file: script.js ~ line 17 ~ imgHover ~ SinopsisHover", SinopsisHover);
  
}