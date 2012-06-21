<?php
include_once("plantillas/plantilla.php");
antes_del_contenido();

echo "<br><h1 class='link_azul_bold'>Bienvenido</h1>";

echo "<table cellpadding='1' cellspacing='1' style=\"text-align:justify\">
		  <tr>
			  <td class='cont_bold'> Este es un sistema de informaci&oacute;n para la extracci&oacute;n y limpieza de informaci&oacute;n de documentos en formato PDF, desarrollado bajo software libre con:<br><br>
					&raquo; Apache, como manejador del servidor Web. <br/>
					&raquo; PHP, como lenguaje de programaci&oacute;n para los modulos funcionales.<br/>
					&raquo; HTML, para interfaz de usuario.<br/>
					&raquo; Pdftotext, como herramienta para la lectura del documento PDF.<br/><br/>
					&raquo; MySQL, como sistema de gestion de bases de datos.<br/><br/>
				</td>
		  </tr>
		  
		  <tr>
			  <td class='link_azul_bold'> Funcionamiento: <br><br></td>
		  </tr>
		  
		  <tr>
			  <td class='cont_bold'> En el menu de &quot;Limpieza&quot; se cuenta con un explorador de archivos en el cual se selecciona el archivo en formato PDF del que se desea realizar la extracci&oacute;n, seguidamente se hace click en el boton &quot;Enviar&quot; generando en el cuadro de texto el resultado. Efectivamente el texto plano resultante presenta la informacion extra&iacute;da del documento PDF seleccionado previamente. <br><br>
			  La limpieza se lleva a cabo suguiendo estos pasos:<br><br>
			  
			  Paso 1: Transformar el texto completo a letras min&uacute;sculas.<br>
			  Paso 2: Eliminar los acentos de las letras vocales.<br>
			  Paso 3: Eliminar caracteres especiales.<br>
			  Paso 4: Extraer las stopwords.<br><br> 
			  Al finalizar la limpieza se obtiene la informaci&oacute;n clara y libre de elementos que no contribuyen en la recuperacion.<br/><br/>
			  
			  El el menu &quot;Subir Documentos&quot; se presenta una interfaz para cargar documentos en el servidor.
			  Luego de cargar un documento, el sistema automaticamente procede a ejecutar la limpieza sobre dicho documento, creando asi y archivo en formato .txt que contiene el texto limpio procedente del documento.
			  Finalmente ciertos atributos del documento como el nombre y la ruta de acceso son almacenados en la base de datos para su posterior consulta.<br/><br/>
			  
			  El el menu &quot;Kmeans&quot; se presenta una interfaz que muestra un formulario en el cual el usuario debe ingresar el numero de grupos que desea formar y las palabras clave.
			  Luego de ejecutar el algoritmo, se presenta al usuario los grupos formados, junto con el respectivo enlace de cada documento perteneciente a cada grupo. <br/><br/></td>
		  </tr>
		  
		  <tr>
			  <td class='link_azul_bold'>Restricciones de la Limpieza: <br><br> </td>
		  </tr>
		  
		  <tr>
			  <td class='cont_bold'>
				&raquo; El programa funcionar&aacute; &uacute;nicamente para el tratamiento de archivos PDF.<br/>
				&raquo; La extranci&oacute;n y limpieza se realiza solo en documentos escritos en indioma espa&ntilde;ol.<br/>
				&raquo; Los modulos funcionales del sistema estan limitados a ejecutarse en un servidor Linux.<br/>
				&raquo; El sistema no sera funcional para los siguientes casos: <br><br>
					a.- Cuando el tamaño del documento es muy extenso, aproximadamente m&aacute;s de 20 p&aacute;ginas.<br/>
					b.- Cuando en alguna parte del documento existe una p&aacute;gina en blanco intermedia, la aplicaci&oacute;n toma esta p&aacute;gina en blanco como el final del documento.<br/>
					c.- Cuando los documentos fueron creados en Latex, tomando en cuenta que el acento se escribe de una manera diferente a la usual, toma la vocal acentuada como un caracter especial y lo elemina del texto.<br><br>
				&raquo; El sistema toma el archivo PDF seleccionado y lo copia en una carpeta donde se encuentran los archivos del servidor en que este corriendo el sistema, por lo cual es necesario que se cuente con la permisologia adecuada poder copiar el archivo en el sevidor y llevar a cabo la extraccion.<br>
				</td>
		  </tr>
	  </table>";
	  echo "<br><br>";
despues_del_contenido();
?>
