<?php

abstract class Cuenta implements Imprimible{
   protected $cbu;
   protected $balance;
   protected $fechaUltimoMov;


   protected abstract function debitar($monto, $tipoCajero);
   protected abstract function acreditar($monto);

   public function __construct(){
      $this ->cbu = mt_rand();
   }
   public function mostrar(){
      return $this ->balance;
   }

   public function fechaHora(){

      $getTiempo = getdate();
      $horaActual = ($getTiempo['hours']-5) . ":" . $getTiempo['minutes'] . ":" . $getTiempo['seconds'];
      $fechaActual = ($getTiempo['mday'] . "/" . $getTiempo['mon'] . "/" . $getTiempo['year']);

      return $fechaActual . " " . $horaActual;
   }


   public function imprimir(){
      echo "<br><br>";
     echo "<label for=''>DATOS DE LA CUENTA: </label><br><br>";
     echo "Tipo de Cuenta: " . get_class($this) . "<br>";
     echo "CBU: " . ($this -> getCbu()) . "<br>";
     echo "Balance : " . number_format($this -> getBalance(),2,',','.' ) . "<br>";
     echo "Fecha Ultimo Movimiento: " . $this -> getFechaUltimoMov() . "<br>";
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
