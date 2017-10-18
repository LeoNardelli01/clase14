<?php

abstract class Cuenta{
   protected $cbu;
   protected $balance = 0;
   protected $fechaUltimoMov;

   protected abstract function debitar($monto, $tipoCajero);
   protected abstract function acreditar($monto);

   public function __construct(){
      $this ->cbu = mt_rand();
   }

   public function fechaHora(){

      $getTiempo = getdate();
      $horaActual = ($getTiempo['hours']-5) . ":" . $getTiempo['minutes'] . ":" . $getTiempo['seconds'];
      $fechaActual = ($getTiempo['mday'] . "/" . $getTiempo['mon'] . "/" . $getTiempo['year']);

      return $fechaActual . " " . $horaActual;
   }


   public function imprimir($datos){
      echo "<br><br>";
     echo "<label for=''>DATOS DE LA CUENTA: </label><br><br>";
     echo "Tipo de Cuenta: " . get_class($datos) . "<br>";
     echo "CBU: " . ($datos -> getCbu()) . "<br>";
     echo "Balance : " . number_format($datos -> getBalance(),2,',','.' ) . "<br>";
     echo "Fecha Ultimo Movimiento: " . $datos -> getFechaUltimoMov() . "<br>";
  }

  public function getCbu(){
    return $this ->cbu;
  }
  public function getBalance(){
    return $this->balance;
  }
  public function getFechaUltimoMov(){
     return $this->fechaUltimoMov;
 }
}

?>
