<?php
require_once('Cuenta.php');

class Gold extends Cuenta{
   

   public function acreditar($monto){
      if($monto >=25000){
      $this->balance += $monto;
      }else {
      $this->balance += ($monto * 0.97);
      }
      $this->fechaUltimoMov = parent :: fechaHora();
   }

   public function debitar($monto, $tipoCajero){
      if ($this->balance >= $monto){
         switch ($tipoCajero) {
            case 'banelco':
               //si debitamos por banelco, no se aplica comision
               $this->balance = $this->balance - $monto;
               break;
            case 'link':
               //si debitamos por link, la comision es de 5%
               $this->balance = $this->balance - ($monto * 1.05);
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
