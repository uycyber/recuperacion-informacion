<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'conexionbd/conexion.php';

     function eliminar_doc($id){
            $query= "SELECT * FROM documentopdf WHERE id_documento='$id'";
            $result= mysql_query($query);
            $row= mysql_fetch_array($result);
            $dir= $row[2];
            $dir2= $dir.".txt";
            if(file_exists($dir) and file_exists($dir2)) // se verifica la existencia del archivo
            {
                unlink($dir);
                unlink($dir2);
                $query2= "DELETE FROM documentopdf WHERE id_documento= '$id'";
                $result= mysql_query($query2) or die ("<script>alert('ERROR: no se pudo eliminar de la base de datos');setTimeout(\"location.href='carga_documento.php'\");</script>");
                return true;

            }else false;
     }

     $id=  $_GET[id_doc];
     if(eliminar_doc($id))
     {
         echo "<script> alert('Se ha eliminado el documento'); setTimeout(\"location.href='carga_documento.php'\");</script>";

     }
     else{
       echo "<script>alert('ERROR: no se pudo eliminar');setTimeout(\"location.href='carga_documento.php'\");</script>";
     }


     
?>

