<?php

abstract class Cuenta{
   //private $cbu;
   //private $balance;
   //private $fechaUltimoMov;



   protected abstract function debitar($monto, $tipoCajero);
   protected abstract function acreditar($monto);
   protected abstract function ultimoMovimiento();

}

?>
