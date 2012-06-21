function validar_subir()
{
	if (document.formsubird.nombre.value == '' || document.formsubird.archivo.value == '')
	{
		alert('Por favor ingrese todos datos requeridos');
		document.formsubird.nombre.focus();
		return false;
	}
        else
            return true;
}

function validarEntero(valor)
{
      //intento convertir a entero.
     //si era un entero no le afecta, si no lo era lo intenta convertir
     valor = parseInt(valor)

      //Compruebo si es un valor numérico
      if (isNaN(valor)) {
            //entonces (no es numero) devuelvo el valor cadena vacia
			alert('no es un numero');
            return false;
      }else{
            //En caso contrario (Si era un número) devuelvo el valor
            return valor
      }
}
function validar_consulta()
{
	if (document.formCargarConsulta.clusters.value == '' || document.formCargarConsulta.txtConsulta.value == '')
	{
		alert('Por favor ingrese todos datos requeridos');
		document.formCargarConsulta.clusters.focus();
		return false;
	}
        else return true;
}

function IsNumber(evt)
{
// Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46
	var key = nav4 ? evt.which : evt.keyCode;
	return (key <= 13 || (key >= 48 && key <= 57 && key != 46));
}
