<?php
require_once('Cuenta.php');
require_once('ObtenerFecha.php');


class Classic extends Cuenta{

   private $balance;
   private $cbu;
   private $fechaUltimoMov;

   public function __construct(){
      $this ->cbu = mt_rand();

   }

   private function fechaHora(){

      $getTiempo = getdate();
      $horaActual = ($getTiempo['hours']-5) . ":" . $getTiempo['minutes'] . ":" . $getTiempo['seconds'];
      $fechaActual = ($getTiempo['mday'] . "/" . $getTiempo['mon'] . "/" . $getTiempo['year']);

      return $fechaActual . " " . $horaActual;
   }

   public function acreditar($monto){
      $this->balance += $monto;
      $this->fechaUltimoMov = fechaHora();
   }
   public function debitar($monto, $tipoCajero){
      if ($this->balance >= $monto){
         $this->balance = $this->balance -  $monto;
      }else{
         echo "Saldo insuficiente. Tu saldo es de $this->balance";
      }
      $this->fechaUltimoMov = fechaHora();
   }

   //public function UltimoMovimiento(){
   //   $this->fechaUltimoMov = fechaHora();

   //}


}

?>
