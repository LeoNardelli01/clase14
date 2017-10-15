<?php
require_once('Cuenta.php');

class Black extends Cuenta{
   private $balance;
   private $cbu;
   private $fechaUltimoMov;

   public function __construct(){
      $this ->cbu = mt_rand();
   }

   public function acreditar($monto){
      if ($monto >= 1000000) {
         $this->balance += ($monto * 0.96);
      }else {
         $this->balance += $monto;
      }

      $this->fechaUltimoMov = parent :: fechaHora();
   }

   public function debitar($monto, $tipoCajero){
      if ($this->balance >= $monto){
         switch ($tipoCajero) {
            case 'banelco':
               //si debitamos por banelco no se aplican comisiones
               $this->balance = $this->balance - $monto;
               break;
            case 'link':
               //si debitamos por link no se aplican comisiones
               $this->balance = $this->balance - $monto;
               break;
            case 'caja':
               //si retiramos por caja, no se aplica comision
               $this->balance = $this->balance - $monto;
               break;
         }
         $this->fechaUltimoMov = parent :: fechaHora();
      }else{
         echo "Saldo insuficiente. Tu saldo es de $this->balance";
      }

   }

   public function getBalance(){
      return $this ->balance;
   }
   public function getCbu(){
      return $this ->cbu;
   }
   public function getFechaUltimoMov(){
      return $this ->fechaUltimoMov;
   }
}
?>
