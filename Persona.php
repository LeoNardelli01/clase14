<?php
require_once('cliente.php');

class Persona extends Cliente implements Imprimible{

   Private $nombre;
   Private $apellido;
   Private $documento;
   Private $nacimiento;

   public function __construct(Cuenta $cuenta, $email, $pass, $nombre, $apellido, $documento, $nacimiento){
      parent::__construct($cuenta, $email, $pass);

      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->documento = $documento;
      $this->nacimiento = $nacimiento;
   }

   public function mostrar(){
      return $this->nombre . " " . $this->apellido;
   }

   public function setNombre($nombre){
     $this->nombre = $nombre;
   }
   public function getNombre(){
     return $this->nombre;
   }
   public function setApellido($apellido){
     $this->apellido = $apellido;
   }
   public function getApellido(){
     return $this->apellido;
   }
   public function setDocumento($documento){
     $this->documento = $documento;
   }
   public function getDocumento(){
     return $this->documento;
   }
   public function setNacimiento($nacimiento){
     $this->nacimiento = $nacimiento;
   }
   public function getNacimiento(){
     return $this->nacimiento;
   }


}
?>
