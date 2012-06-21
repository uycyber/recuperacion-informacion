<?php

//Separador de directorios, de acuerdo al sistema operativo
$separador= DIRECTORY_SEPARATOR;

//Directorio para repositorios de archivos pdf
$dirRepositorio= "archivossubidos".$separador;
if(!((file_exists($dirRepositorio))&& (is_dir($dirRepositorio))))
    {mkdir($dirRepositorio);}


//Directorio de Archivos limpios
$dirDocLimp= "archivosLimpios".$separador;
if(!((file_exists ( $dirDocLimp ))&& (is_dir ($dirDocLimp))))
    {mkdir($dirDocLimp);}


?>
