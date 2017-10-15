<?php
require_once('Cuenta.php');

class Gold extends Cuenta{
   
   public function debitar($monto, $tipoCajero){
      if ($this->balance >=$monto) {
         $this->balance -= $monto;
      }else{
         echo "Saldo insuficiente. Tu saldo es de $this->balance";
      }
   }
}
?>
