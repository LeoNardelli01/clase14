<?php
require_once('Cuenta.php');

class Classic extends Cuenta{



   public function acreditar($monto){
      //cuando acreditamos el banco se queda con un 5%
      //por eso multiplico el monto por 0.95

      $this->balance += ($monto * 0.95);
      $this->fechaUltimoMov = parent :: fechaHora();
   }

   public function debitar($monto, $tipoCajero){
      if ($this->balance >= $monto){
         switch ($tipoCajero) {
            case 'banelco':
               //si debitamos por banelco la comision es del 5%
               $this->balance = $this->balance - ($monto * 1.05);
               break;
            case 'link':
               //si debitamos por link, la comision es de 10%
               $this->balance = $this->balance - ($monto * 1.10);
               break;
            case 'caja':
               //si retiramos por caja, no se aplica comision
               $this->balance = $this->balance - $monto;
               break;
         }
         $this->fechaUltimoMov = parent :: fechaHora();
      }else{
         echo "Saldo insuficiente. Tu saldo es de $this->balance <br><br>";
      }

   }
   
}

?>
