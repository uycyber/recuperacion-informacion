<script language="javascript">
	// Se valida que solo se intraduzcan numeros en un campo del formulario.
    var nav4 = window.Event ? true : false;
</script>

<?php

	include_once("plantillas/plantilla.php");
	include_once("conexionbd/conexion.php");
	include_once("utilities.php");
	include_once("funciones_kmeans.php");
        include_once("tf-idf.php");
	antes_del_contenido();
	
	if(!isset($_POST['subCargarConsulta']))
	{
?>
	<h1><img src="images/folder.png" align="middle"> Algoritmo de Agrupamiento K-means</h1><br>
	<form name="formCargarConsulta" action="<?=$PHP_SELF?>" method="post" onsubmit="return validar_consulta();">
		<table>
			<tr>
				<td><h3>Ingrese el numero de grupos:</h3></td>
			</tr>
			<tr>
				<td><input type="text" name="clusters" id="clusters" size="4" onkeypress="return IsNumber(event);"></td>
			</tr>
			<tr>
				<td><h3>Ingrese la palabras clave:</h3></td>
			</tr>
			<tr>
				<td><textarea name="txtConsulta" id="txtConsulta" rows="5" cols="60"></textarea></td>
			</tr>
			<tr>
				<td><h4>Ejemplo: «palabra1, palabra2, palabra3 con palabra4, palabra5»</h4></td>
			</tr>
			<tr>
				<td><input type="submit" name="subCargarConsulta" value="Enviar"></td>
			</tr>
		</table>	
	</form>
<?php
	}
	else
	{
		if(isset($_POST['subCargarConsulta']))
		{
			//$consulta = "select * from documentopdf";
			//$query = mysql_query($consulta) or die ("Error: Se produjo un error en la consulta: $consulta");
			//$ndocs = mysql_num_rows($query);
                        $repositorio= listar_directorios_ruta("archivossubidos");
                        $ndocs= count($repositorio);
			//echo "<br>Numero de documentos = $ndocs<br>";
			$numclusters= $_POST['clusters'];
			
			if($numclusters <= $ndocs)
			{
				//Limpiar palabras clave.
				$stopwords_file = "stopwords.txt";
				$lista = explode(",", $_POST['txtConsulta']);
				$nkey= count($lista);
				
				for($i=0; $i<$nkey; $i++)
					$lista[$i] = strtolower($lista[$i]);
					
				$p = array('/À/','/Â/','/Ã/','/Ä/','/Å/','/È/','/Ê/','/Ë/','/Ì/','/Î/','/Ï/','/Ò/','/Ô/','/Õ/','/Ö/','/Ø/','/Ù/','/Û/','/Ü/','/Á/','/É/','/Í/','/Ó/','/Ú/','/á/','/é/','/í/','/ó/','/ú/','/à/','/è/','/ì/','/ò/','/ù/','/â/','/ê/','/î/','/ô/','/û/','/ä/','/ë/','/ï/','/ö/','/ü/','/ã/','/å/','/õ/','/ø/','/ç/','/ÿ/','/Ñ/', '//', '/1/', '/2/', '/3/', '/4/', '/5/', '/6/', '/7/', '/8/', '/9/', '/0/');
				$r = array('a','a','a','a','a','e','e','e','i','i','i','o','o','o','o','o','u','u','u','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u','a','a','o','o','c','y','ñ', '', '', '', '', '', '', '', '', '', '', '');
				
				for($i=0; $i<$nkey; $i++)
				{
					$lista[$i] = preg_replace($p, $r, $lista[$i]);
					$lista[$i] = ereg_replace("[^A-Za-z0-9 '\n'ñ]","",$lista[$i]);
					$lista[$i] = str_replace("\n", " ", $lista[$i]);
					$lista[$i] = str_replace("\r", " ", $lista[$i]);
					$lista[$i] = str_replace("\b", " ", $lista[$i]);
					$lista[$i] = str_replace("\t", " ", $lista[$i]);
					$lista[$i] = stop_words($lista[$i], $stopwords_file);
					$lista[$i] = quitar_espacios_dobles($lista[$i]);
				}
				
				//Quitar los espacios que quedan cuando en la consulta un palabra clave es un stopword.
				for($i=0; $i<$nkey; $i++)
					if($lista[$i]  == "")
						unset($lista[$i]);
						
				$lista = array_values($lista);
	/*
				//Mostar resultado de la lista
				echo "Lista de palabras claves<br>";
				for($i=0; $i<count($lista); $i++)
					echo "Palabra[".$i."]= ".$lista[$i]."<br>";
					
				echo "<br>numero de grupos".$numclusters;
	*/
				//TFIDF!! /////////////////////////////////////////////////////////////////////////////////////
				$listacontenido=  cargarContenido();
                                
                                $tf= tf($listacontenido,$lista);




                                $i=0;
				
				//Construir matriz de documentos TF
				//Mientras hayan documentos...
				while($info = mysql_fetch_row($query))
				{
					//Obtener el dontenido limpio de cada docuemento.
					$temp = $info[2];
					$urls[$i]=$temp;
					$direccion = $temp . ".txt";
					$contenido = file_get_contents($direccion);
					//contar los elementos de la lista.
					$nkey= count($lista);
					for($j=0; $j<$nkey; $j++)
					{
						//vamos a a buscar lista su i en el contenido
						//echo "buscando ".$lista[$j]." en ".$direccion."<br>";
						//echo preg_match_all("/\b$lista[$j]\b/i", $contenido, $parametro)."<br>";
						//TF
						$tf[$j][$i] = preg_match_all("/\b$lista[$j]\b/i", $contenido, $parametro);
					}
					$i++;//paso al siguiente documento.
				}
	/*
				//Mostrar matriz de documentos TF
				echo "<br>matriz TF<br>";
				for($i=0; $i<$nkey; $i++)
				{
					for($j=0; $j<$ndocs; $j++)
						echo $tf[$i][$j]." ";
						
					echo "<br>";
				}
				//echo "Numero de doc = $ndocs Numero de claves = $nkey";
	*/
				//Calcular DF
				for($i=0; $i<$nkey; $i++)
				{
					$cont = 0;
					//para cada ...
					for($j=0; $j<$ndocs; $j++)
					{
						if($tf[$i][$j] > 0)
							$cont = $cont + 1;
					}
					//DF
					$df[$i] = $cont;
				}
	/*
				//Mostrar DF
				echo "<br>Vector DF<br>";
				for($i=0; $i<$nkey; $i++)
				{
					echo $df[$i]; 
				}
	*/					
				// Calcular IDF
				for($i=0; $i<$nkey; $i++)
				{
					if($df[$i] == 0)
						$idf[$i] = 0;
					else
						$idf[$i] = log10($ndocs/$df[$i]);
				}
	/*
				//Mostrar IDF
				echo "<br>Vector IDF<br>";
				for($i=0; $i<$nkey; $i++)
				{
					echo $idf[$i] . "  "; 
				}
	*/
				// Matriz W
				for($i=0; $i<$ndocs; $i++)
				{
					for($j=0; $j<$nkey; $j++)
					{
						$w[$j][$i] = $tf[$j][$i] * $idf[$j];
					}
				}		
	/*
				//Mostrar matriz de documentos W
				echo "<br>matriz W<br>";
				for($i=0; $i<$nkey; $i++)
				{
					for($j=0; $j<$ndocs; $j++)
						echo $w[$i][$j] . "   " ;
						
					echo "<br>";
				}
	*/
				//echo "<br><br> W[0]";
				//print_r($w[0]);
				
				//Invertir W
				for($i=0; $i<$ndocs; $i++)
				{
					for($j=0; $j<$nkey; $j++)
					{
						$ww[$i][$j] = $w[$j][$i];
					}
				}	
	/*
				//MOstrar WW
				echo "<br>matriz WW<br>";
				for($i=0; $i<$ndocs; $i++)
				{
					for($j=0; $j<$nkey; $j++)
						echo $ww[$i][$j] . "   " ;
						
					echo "<br>";
				}
	*/
				//Llamada a Kmeans.
				initkmeans($numclusters,$ww,$urls);
			}
			else
			{
				echo "<h1>Disculpe ha ocurrido un Error</h1>";
				echo "<h3>Ha excedido la cantidad de grupos permitidos. La cantidad de grupos no puede ser mayor a la cantidad de documentos, Por favor intente de nuevo.</h3>";
				echo "
				<table>
				<tr>
					<td><a href=\"obtenerKeyWords.php\"><img src=\"images/back24x24.png\" border=\"0\" title=\"Regresar\"></a></td>
					<td><h3>Regresar</h3></td>
				</tr>
				</table>
				";
			}
		}
		
	}
	despues_del_contenido();												
?>
