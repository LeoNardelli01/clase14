<?php
require_once('Cuenta.php');

class Platinum extends Cuenta{
   private $balance;
   private $cbu;
   private $fechaUltimoMov;

   public function __construct(){
      $this ->cbu = mt_rand();
   }

   public function acreditar($monto){
      $this->balance += $monto;
      $this->fechaUltimoMov = parent :: fechaHora();
   }

   public function debitar($monto, $tipoCajero){
      if ($this->balance >= $monto){
         if ($this->balance <=5000) {
            switch ($tipoCajero) {
               case 'banelco':
               //si debitamos por banelco, la comision es de 5%
               $this->balance = $this->balance - ($monto * 1.05);
                  break;
               case 'link':
                  //si debitamos por link, la comision es de 5%
                  $this->balance = $this->balance - ($monto * 1.05);
                  break;
               case 'caja':
               //si debitamos por caja, la comision es de 5%
               $this->balance = $this->balance - ($monto * 1.05);
                  break;
            }
            $this->fechaUltimoMov = parent :: fechaHora();
         }else {
            $this ->balance -= $monto;
         }

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
