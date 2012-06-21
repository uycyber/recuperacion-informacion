<?php
include_once 'conexionbd/conexion.php';
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function obtenerDocslimpios(){
    $sql="select ruta_documento from documentos.documentopdf";
    $query= mysql_query($query) or die("error en cunsulta de documentos");
    $i=0;
    while($info = mysql_fetch_row($query))
    {
            $temp = $info[1];
            $urls[$i]=$temp;
            $direccion = $temp . ".txt";
            $listaContenido[$i] = file_get_contents($direccion);
            $i++;
    }
    return $listaContenido;
}

function tf($listaContenido, $Pclaves){
    $nkey= count($Pclaves);
    for($i=0; $i<count($listaContenido); $i++){

        for($j=0; $j<count($Pclaves); $j++)
        {
                //vamos a a buscar lista su i en el contenido
                //echo "buscando ".$lista[$j]." en ".$direccion."<br>";
                //echo preg_match_all("/\b$lista[$j]\b/i", $contenido, $parametro)."<br>";
                //TF
                $tf[$j][$i] = preg_match_all("/\b$Pclaves[$j]\b/i", $listaContenido[$i], $parametro);
        }
    }
    return $tf;
}

function df($listaContenido, $Plaves, $tf){
    	for($i=0; $i<$count($Plaves); $i++)
        {
                $cont = 0;
                for($j=0; $j<$count($listaContenido); $j++)
                {
                        if($tf[$i][$j] > 0)
                                $cont = $cont + 1;
                }
                //DF
                $df[$i] = $cont;
        }
        return $df;
}

function idf($Pclaves, $df, $listaContenido){
    // Calcular IDF
    for($i=0; $i<count($Pclaves); $i++)
    {
            if($df[$i] == 0)
                    $idf[$i] = 0;
            else
                    $idf[$i] = log10(count($listaContenido)/$df[$i]);
    }

    return $idf;
}

function matrizW($listaContenido, $Pclaves, $tf, $idf){
    // Matriz W
    for($i=0; $i<count($listaContenido); $i++)
    {
            for($j=0; $j<count($Pclaves); $j++)
            {
                    $w[$j][$i] = $tf[$j][$i] * $idf[$j];
            }
    }

    //Invertir W
    for($i=0; $i<count($listaContenido); $i++)
    {
            for($j=0; $j<count($Pclaves); $j++)
            {
                    $ww[$i][$j] = $w[$j][$i];
            }
    }
    return $ww;
}

?>
