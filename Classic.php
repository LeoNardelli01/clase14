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



   public function acreditar($monto){
      $this->balance += $monto;
      $this->fechaUltimoMov = parent :: fechaHora();
   }
   public function debitar($monto, $tipoCajero){
      if ($this->balance >= $monto){
         switch ($tipoCajero) {
            case 'banelco':
               $this->balance = $this->balance - ($monto * 1.05);
               break;
            case 'link':
               $this->balance = $this->balance - ($monto * 1.10);
               break;
            case 'caja':
               $this->balance = $this->balance - $monto;
               break;
         }
         $this->fechaUltimoMov = parent :: fechaHora();
      }else{
         echo "Saldo insuficiente. Tu saldo es de $this->balance";
      }

   }

}

?>
