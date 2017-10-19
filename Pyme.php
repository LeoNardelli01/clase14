<?php
require_once('cliente.php');

class Pyme extends cliente implements Liquidable, Imprimible{
   private $cuit;
   private $razonSocial;

   public function __construct(Cuenta $cuenta, $email, $pass, $cuit, $razonSocial){
      parent::__construct($cuenta, $email, $pass);
      $this->cuit = $cuit;
      $this->razonSocial = $razonSocial;

   }
   public function mostrar(){
      return $this->razonSocial;
   }
   public function liquidarHaberes($persona, $monto){
      
   }

   public function getCuit(){
      return $this->cuit;
   }
   public function setCuit($cuit){
      $this->cuit = $cuit;
   }
   public function getRazonSocial(){
      return $this->razonSocial;
   }
   public function setRazonSocial($razonSocial){
      $this->razonSocial = $razonSocial;
   }


}

?>
