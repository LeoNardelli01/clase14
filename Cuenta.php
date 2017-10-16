<?php

abstract class Cuenta{
   //private $cbu;
   //private $balance;
   //private $fechaUltimoMov;

   protected abstract function debitar($monto, $tipoCajero);
   protected abstract function acreditar($monto);

   public function fechaHora(){

      $getTiempo = getdate();
      $horaActual = ($getTiempo['hours']-5) . ":" . $getTiempo['minutes'] . ":" . $getTiempo['seconds'];
      $fechaActual = ($getTiempo['mday'] . "/" . $getTiempo['mon'] . "/" . $getTiempo['year']);

      return $fechaActual . " " . $horaActual;
   }
   

}

?>
