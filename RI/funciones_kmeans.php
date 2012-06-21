
<?php 	
	//Inicializar centros de forma aleatoria.
	function initkmeans($k,$w,$urls)
	{
		//Cantidad de documentos.
		$max=count($w);
		//$centro = centros iniciales.
		$centro = array();
		$x = array();
		for($i=0;$i<$k;$i++)
		{
			//Inserta centros aleatorios en $centro.
			$temp = rand(0,$max-1);
			if(!in_array($temp, $x))
			{
				$x[$i] = $temp;
				$centro[]=$w[$x[$i]]; 
			}
			else
				$i--;
		}
		asignarGrupos($centro,$w,$urls);
	}
	
	function asignarGrupos($centros,$w,$urls)
	{
		//$grupos son los clusters que contienen los puntos, es decir, los docs.
		$grupos = array();
		//iniciliazar para un/cada centro asigna un array vacio.
		foreach($centros as $centroKey => $centro)
		{
			$grupos[$centroKey] = array();
		}
		//      $w          $i         $w[$i]
		foreach($w as $documentKey => $document)
		{
			//El minimo es el primer centro.
			$min=distance($document,$centroid[0]);
			//El id del centro minimo actual.
			$minId=0;
			
			//Buscar el centro mas cercano al doc actual.
			foreach($centros as $centroKey => $centro)
			{
				$aux = distance($document,$centro);
				if($aux<$min)
				{
					$minId=$centroKey;
					$min = $aux;
				}
			}
			//array_push pone un elemento al final del array.
			//Conexion entre un doc y su centro.
			array_push($grupos[$minId],$document);
/*
			echo $minId." ";
			foreach($document as $term){
					echo $term." ";
				}
			echo "<br>";
*/
		}
		$nuevosCentros = array();
		//Recalcula los centros de cada grupo.
		foreach($grupos as $grupo)
		{
			$nuevosCentros[]=recalcularCentro($grupo);
		}
/*
		echo "<br>Centros: <br>";
		print_r($centros);
		echo "<br>Nuevos Centro: <br>";
		print_r($nuevosCentros);
*/
		//Bandera de parada.
		$band=true;
		//Cantidad de centros (valores).
		$tam=count($nuevosCentros);
		//recorro los centros para ver si cambiaron.
		for($i=0;$i<$tam && $band ;$i++)
		{
			//veo si cambio de centro.
			if($centros[$i] != $nuevosCentros[$i])
			{
				$band=false;
			}
		}
		//si cambio, recalcular con los centros nuevos.
		if(!$band)
		{
			asignarGrupos($nuevosCentros,$w,$urls);
		}
		else
		{
			//imprimir los grupos.
			//echo "<br><br> Grupos: <br>";
			//print_r($grupos);
			echo "<h1>Grupos Kmeans</h1>";
			foreach($grupos as $gruposKey => $grupo)
			{
				echo "<br><br><h2>Grupo $gruposKey </h2>";
				foreach($grupo as $grupoKey => $doc)
				{
					//echo "<br><br><br>grupokey: $gruposKey <br>";
					//print_r($doc);
					//echo "<br><br><br>array serach!!<br>";
					$u = array_search($doc, $w);
					//echo "<br> Esto es U: $u<br>";
					$enlace = substr($urls[$u],16);
					echo "Documento: <a href=\"$urls[$u]\">$enlace</a><br>";
					//echo "<br><br><br><br>URLSssssssssssssssssssssssss";
					print_r($urls);					
				}
			}
		}
	}
		
	//recalcula centro por cada grupo.
	function recalcularCentro($grupo)
	{
		//Cuantos grupos tengo armados.
		$tam=count($grupo);
		//cuantos documentos hay en ese grupo.
		$z=count($grupo[0]);
		$total=array();
		//Inicializar $total con ceros
		for($i=0;$i<$z;$i++)
		{
			$total[$i]=0;
		}
		//Calcula la suma de vectores para calcular el promedio.
		foreach($grupo as $elemento)
		{
			for($i=0;$i<$z;$i++)
			{
				$total[$i]+=$elemento[$i];
			}
		}
/*
		echo "suma<br>";
		print_r($total);
		echo "$tam <br>";
*/
		//Calcular promedio.
		for($i=0;$i<$z;$i++)
		{
			$total[$i]/=$tam;
		}
		return $total;
	}
		
	//Calcula la distancia entre dos vectores.
	function distance($vector1,$vector2)
	{
		$max=count($vector1);
		$distance=($vector1[0]-$vector2[0])*($vector1[0]-$vector2[0]);
		for($i=1;$i<$max;$i++)
		{
			$distance+=($vector1[$i]-$vector2[$i])*($vector1[$i]-$vector2[$i]);
		}
		return sqrt($distance);
	}
		
?>
