window.onload = CargarDatos;

function CargarDatos() {
 //Accion al darle click al boton Descargas
 const DOWNLOAD = document.querySelector("#exportarCSV");
 DOWNLOAD.addEventListener("click", Download);

 //Accion al darle click al boton Descargas
 const ATRAS = document.querySelector(".atrasAdmin");
 ATRAS.addEventListener("click", Download);
}

//Funcion para saber de que boton le estamos llamando
function Download(event) {
 if (event.target.id.startsWith('e')) { //Si comienza con la 'e'
 Visibilidad("#menuRoot", "none");
 Visibilidad("#menuDescargas", "block");
 } else {
 Visibilidad("#menuDescargas", "none");
 Visibilidad("#menuRoot", "block");
 }
}

//Funcion para cambiar la visibilidad del id que los pasas como parametro
function Visibilidad(id, visibilidad) {
 //Si el nombre del field empeza por 'd'
 document.querySelector(id).style.display = visibilidad;
}