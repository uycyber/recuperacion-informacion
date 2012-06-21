<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//Separador de directorios, de acuerdo al sistema operativo
$separador= DIRECTORY_SEPARATOR;

//Directorio para repositorios de archivos pdf
$dirRepositorio= "archivossubidos".$separador;
mkdir($dirRepositorio);


//Directorio de Archivos limpios
$dirDocLimp= "archivosLimpios".$separador;
mkdir($dirDocLimp);


?>
