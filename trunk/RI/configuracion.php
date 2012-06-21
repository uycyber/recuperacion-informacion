<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//Separador de directorios, de acuerdo al sistema operativo
$separador= DIRECTORY_SEPARATOR;

//Directorio para repositorios de archivos pdf
$dirRepositorio= "archivossubidos".$separador;
if(file_exists ( $dirRepositorio )){}
else{mkdir($dirRepositorio);}


//Directorio de Archivos limpios
$dirDocLimp= "archivosLimpios".$separador;
if(file_exists ( $dirDocLimp )){}
else{mkdir($dirDocLimp);}


?>
