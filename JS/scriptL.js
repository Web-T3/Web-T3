window.onload = CargaEventos;

function CargaEventos() {
  //Email
  const EMAILFIELD = document.querySelector("#email");
  EMAILFIELD.addEventListener("blur", ValidarLR);

  // Nickname
  const NICKFIELD = document.querySelector("#nick");
  NICKFIELD.addEventListener("blur", ValidarLR);

  // Nombre
  const NAMEFIELD = document.querySelector("#name");
  NAMEFIELD.addEventListener("blur", ValidarLR);

  // Apellido
  const SURNAMEFIELD = document.querySelector("#surname");
  SURNAMEFIELD.addEventListener("blur", ValidarLR);

  // Edad
  const AGEFIELD = document.querySelector("#age");
  AGEFIELD.addEventListener("blur", ValidarLR);

  // Contraseña
  const PASSFIELD = document.querySelector("#pass");
  PASSFIELD.addEventListener("blur", ValidarLR);

  // Confirmar constraseña
  const PASSCFIELD = document.querySelector("#passC");
  PASSCFIELD.addEventListener("blur", ValidarLR);
}

//Creamos el constructor con 4 parametros
class Persona {
  constructor(em, ni, no, ap) {
    this.email = em;
    this.nick = ni;
    this.name = no;
    this.surname = ap;
  }
}

let usuario = new Persona();

// Funcion para validar los inputs
function ValidarLR(event) {
  //Asignamos valores
  let field = event.target;
  let err = document.getElementById(field.id + "Error");

  // Comprueba que el campo esta vacio 
  if (!field.validity.valueMissing) {
    //Si no esta vacio te comprueba el patron 
    if (!field.validity.patternMismatch) {
      err.innerHTML = ""; //Quitamos la X (de 'ERROR') en el html
      //Recogemos los datos
      let valor = field.value.trim();
      let atr = field.id;

      usuario[atr] = valor; //Añadimos el valor al atributo de la clase 
    } else err.innerHTML = "X"; //Colocamos la X al estar mal el pattern
  } else err.innerHTML = "Balio hutsak"; //Valor introducido es nulo

  //Si el nombre del field empeza por 'passC'
  if (field.id.startsWith("passC")) {
    //Recogemos los datos
    let passSinUltimoC = field.id.substring(0, field.id.length - 1); //Recogemos su valor quitandole la ultima letra
    let pass = document.getElementById(passSinUltimoC).value;
    let passC = document.getElementById(field.id).value;

    //Llamamos a la funcion de validar contraseña con los datos previamente recogidos
    ValidarPass(pass, passC, field.id + "Error");
  }
}

//Funcion para validar las contraseñas
function ValidarPass(pass, cPass, errorLbl) {
  console.log("🚀 ~ file: script.js ~ line 78 ~ ValidarPass ~ errorLbl", errorLbl);
  //Si ambas contraseñas pasadas como parametro NO son iguales
  if (pass != cPass) {
    document.getElementById(errorLbl).innerHTML = "Pasahitz ezberdinak"; //Te lo advertirá en el HTML como error
  } else document.getElementById(errorLbl).innerHTML = "";
}