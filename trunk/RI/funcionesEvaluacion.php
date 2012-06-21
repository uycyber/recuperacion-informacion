<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function precision($itemRelevantes, $itemsRecuperados) {
    $result;
    $result= $itemRelevantes/$itemsRecuperados;
    return result;
}



/*Metricas para medir las diferentes listas de relevancia
 *
 */

 // Sperman's Rank, p= 1- ((6* sumatoria(xi-yi)^2)/(N^2-1))
    /* Dado una lista de documentos con el orden rankeado por el SRI contra otro rankeo de la misma lista
     * de documentos, bien sea del usuario o el rankeo ideal
     */
  function spermansRank( $param ){
      $result=0;
       $di=0;

       //Se calcula la diferencia entre ambos rangos.
      for ($i; $i<count($param); $i++){
           $di += pow(($param[i][0]-$param[i][1]), 2);
      }
      $N=count($param);

      //aplicando la formula
      $resutl= 1-((6*$di)/($N*(pow($N,2)-1)));

      return $result;
  }


?>
