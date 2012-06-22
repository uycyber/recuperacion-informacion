<?php
	include_once("plantillas/plantilla.php");//incluir plantilla.
        include_once("utilities.php");
        include_once("configuracion.php");
        include_once("class.pdf2text.php");

	antes_del_contenido();														//invocar mitad uno de la plantilla.
?>
<h1><img alt=""  src="images/pdf.png" align="middle">Carga de Documentos</h1><br>
<h3>Seleccione el archivo .PDF que desea limpiar</h3>
<form name="formexam" action="" method="post" enctype="multipart/form-data"> 
	<p>Nombre del documento: <br/>
               <input type="text" id="nombre" name="nombre" size="20">
               <input type="file" name="archivo" id="archivo">
        </p>
	<p><input type="submit" name="subexam" id="subexam" value="Enviar">
        <input type="reset" id="reset" value="Cancelar"></p>
</form>
<?php
	if(isset($_POST['subexam']))												//si se ha presionado enviar.
	{
		if($_FILES['archivo']['type']=="application/pdf")						//si el archivo es PDF.
		{
                   
			//$destino = 'archivossubidos';   //nombre de carpeta.
                        echo $dirRepositorio;
			copy($_FILES['archivo']['tmp_name'], $dirRepositorio.$_FILES['archivo']['name']);
			$diro = $dirRepositorio.$_FILES['archivo']['name'];					//direccion donde esta ahora el pdf.
			$dird = $dirDocLimp. $_FILES['archivo']['name'] .".txt"; //direccion donde se guarda el txt. El archivo no limpio.
                        
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$a = new PDF2Text();
                        $a->setFilename($diro);
                        $a->decodePDF();
                        
                        /*
                        exec ("pdftotext $diro $dird"); 									//De .pdf a .txt
			$contenido = "";
			$contenido = file_get_contents($dird); 								//leer el archivo .txt
                        if($contenido!= ""){
                            $nomb= $_POST['nombre'];
                            
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
                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        }*/
			
		}
		else
		{
			echo "<font color=\"red\">Error: El archivo debe ser de extension PDF</font>";
		}
	}
?>
<!--
        <br/><h3> Documentos Registrados</h3>
        <?/*
            $consulta= "SELECT * FROM documentopdf";
            $query= mysql_query($consulta);
            if(mysql_num_rows($query)> 0){
        ?>
                    <table width="650px" border="1">
                        <tr align="center">
                            <td>Nombre del docuemento</td>
                            <td>Ruta</td>
                            <td colspan="2">Opciones</td>
                        </tr>

                            <?

                                while ($row = mysql_fetch_row($query)) {
                                    echo "<tr align='center'>";
                                    echo "<td>".$row[1]."</td>" ;
                                    echo "<td>".$row[2]."</td>";
                                    echo "<td> <img src='images/document.png' width='30px' height='30px'> </td>";
                                    echo "<td> <a href= 'eliminar_doc.php?id_doc=$row[0]'>
                                                <img src='images/Delete.png' width='30px' height='30px'> </td></a>";
                                    echo "</tr>";
                                }

                            ?>
                    </table>
        <?
            }
            else
            {
                                echo "<div class= 'error'> No existen Documentos Cargados </div>";

            } */
        ?>
       -->
	<br><h3>Resultado de la Limpieza</h3>
	<!-- imprimir el resultado en un textarea -->
	<textarea name="cleantext" rows="30" cols="80" readonly="readonly"><?php /*echo "$contenido";*/ echo $a->output();?></textarea>
	<br><br>
<?php	
/*
	//lista de palabras unica.
	$contenido = explode(" ", $lista);
	sort($lista);
	$lista = array_unique($lista);
	foreach ($lista as $key => $eval)
	{
		echo $eval.' '."<br>";
	}
*/
despues_del_contenido();														//mitad dos de la plantilla.
?>
