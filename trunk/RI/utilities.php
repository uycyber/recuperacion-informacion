<?php
    include_once("configuracion.php");

function listar_directorios_ruta($ruta){
   // abrir un directorio y listarlo recursivo
   $docs=null;
   if (is_dir($ruta)) {
       $dh = opendir($ruta);
      if ($dh) {
          $i=0;
         while (($file = readdir($dh)) !== false) {
            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
            //mostraría tanto archivos como directorios
            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file);
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){
               //solo si el archivo es un directorio, distinto que "." y ".."
               listar_directorios_ruta($ruta . $file . "/");
            }
            if($file!="." && $file!=".."){
                $docs[i]=$file;
            }
            $i++;
         }
      closedir($dh);
      }
   }else{
      echo "<br>No es ruta valida";

   }
   return docs;
}



function stop_words($contenido, $stopwords_file)
{
    //Se carga la lista de stopwords desde un archivo de texto
    $stopword = file($stopwords_file);
    $total = count($stopword);
    for ($i=0; $i< $total; $i++)
    {
        $stopword[$i] = trim(strtolower($stopword[$i]));
    }

    //lista todas las palabras del contenido del texto
    $_terms = explode(" ", $contenido);

        foreach ($_terms as $line) //busca y remplaza las stopwords dentro del contenido del texto
        {
            if (in_array(strtolower(trim($line)), $stopword))
            {
                $removeKey = array_search($line, $_terms);
                unset($_terms[$removeKey]);
            }
            else
            {
                $clean_term = " ".$line;
            }
        }
        return $clean_term;
}

function quitar_espacios_dobles($cadena)
{
	$limpia    = '';
    $parts    = array();
    // dividir la cadena con todos los espacios que exista
    $parts = mb_split(' ',$cadena);
    foreach($parts as $subcadena)
    {
        // de cada subcadena elimino sus espacios a los lados
        $subcadena = trim($subcadena);
        // Unimos con un espacio para rearmar la cadena pero omitiendo los que sean espacio en blanco
        if($subcadena!='')
        {
            $limpia .= $subcadena.' ';
        }
    }
    $limpia = trim($limpia);
    return $limpia;
}

function limpiar_docs($dir)
{
	$dird = $dir . ".txt";
	exec ("pdftotext $dir $dird");
	$contenido = "";
	$contenido = file_get_contents($dird); 								//leer el archivo .txt
	$contenido = strtolower($contenido); 								//a minusculas
	$p = array('/À/','/Â/','/Ã/','/Ä/','/Å/','/È/','/Ê/','/Ë/','/Ì/','/Î/','/Ï/','/Ò/','/Ô/','/Õ/','/Ö/','/Ø/','/Ù/','/Û/','/Ü/','/Á/','/É/','/Í/','/Ó/','/Ú/','/á/','/é/','/í/','/ó/','/ú/','/à/','/è/','/ì/','/ò/','/ù/','/â/','/ê/','/î/','/ô/','/û/','/ä/','/ë/','/ï/','/ö/','/ü/','/ã/','/å/','/õ/','/ø/','/ç/','/ÿ/','/Ñ/', '//', '/1/', '/2/', '/3/', '/4/', '/5/', '/6/', '/7/', '/8/', '/9/', '/0/');
	$r = array('a','a','a','a','a','e','e','e','i','i','i','o','o','o','o','o','u','u','u','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u','a','a','o','o','c','y','ñ', '', '', '', '', '', '', '', '', '', '', '');
	$contenido = preg_replace($p, $r, $contenido); 						//reemplazar vocales con acentos, entre otros.
	$contenido = ereg_replace("[^A-Za-z0-9 '\n'ñ]","",$contenido);		//quitar caracteres especiales.
	$stopwords_file = "stopwords.txt";
	//a esta funcion se le pasa la variable con el contenido limpio y el archivo que contiene las stopwords.
	$contenido = stop_words($contenido, $stopwords_file);				//funcion que elimina todas las stopwords

	$contenido = str_replace("\n", " ", $contenido);
	$contenido = str_replace("\r", " ", $contenido);
	$contenido = str_replace("\b", " ", $contenido);
	$contenido = str_replace("\t", " ", $contenido);

	$contenido = quitar_espacios_dobles($contenido);

	//Se reemplaza el archivo que tenia el texto sin limpiar, con el texto limpio.
	$fp = fopen($dird, 'w');
	fwrite($fp, $contenido, strlen($contenido));
	fclose($fp);
}

function cargarContenido (){
 $listadocs= listar_directorios_ruta($dirDocLimp);
 for($i=0; $i< count($listadocs);$i++){
     $listacontenido[$i]= file_get_contents($value);
 }
 return $listacontenido;
}
?>
