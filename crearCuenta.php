<?php
require_once('Persona.php');
require_once('Pyme.php');
require_once('Multinacional.php');
require_once('Classic.php');
require_once('Gold.php');
require_once('Platinum.php');
require_once('Black.php');

$cuentaClassic;
$cuentaGold;
$cuentaPlatinum;
$cuentaBlack;

//funciones
 function imprimir($datos){
   echo "<label for=''>Datos de Cuenta: </label><br><br>";
   echo "Tipo de Cuenta: " . get_class($datos) . "<br><br>";
   echo "CBU: " . $datos -> getCbu() . "<br>";
   echo "Balance : " . $datos -> getBalance() . "<br>";
   echo "Fecha Ultimo Movimiento: " . $datos -> getFechaUltimoMov() . "<br>";
}


if (isset($_POST['crearCuenta'])) {
   //echo "<pre>";
   //var_dump($_POST);
   switch ($_POST['cuenta']) {
      case 'classic':
         $cuentaClassic = new Classic();
         //$cuentaClassic -> acreditar(11000);

         break;
      case 'gold':
         $cuentaGold = new Gold();
         break;
      case 'platinum':
         $cuentaPlatinum = new Platinum();
         break;
      case 'black':
         $cuentaBlack = new Black();
         break;

   }
   if(isset($_POST['btnAcreditar'])){
      echo "aprete boton acreditar";
   }
}
//echo "<pre>";
//var_dump($_POST);
//var_dump($cuentaClassic);

?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="estilos.css">
      <meta charset="utf-8">
      <title>Banco</title>
   </head>
   <body>
      <header>
         <h1>Banco Digital House</h1>
         <h3>Tipo de cuentas</h3>
      </header>

      <div class="container">
         <div class="classic">
            <h2>Classic</h2>
            <p>El banco cobrara una comision del 5% por deposito</p>
            <p>Extraccion por Caja: No tiene comision</p>
            <p>Extraccion por Banelco : comision del 5%</p>
            <p>Extraccion por Link: comision del 10%</p>

         </div>
         <div class="gold">
            <h2>Gold</h2>
            <p>Depositos mayores o iguales a $25.000 no habra comision</p>
            <p>Los montos inferiores a $25.000 tendran una comision del 3%</p>
            <p>Extracciones por Banelco y Caja: no habra comisiones</p>
            <p>Extracciones por Link: comision del 5%</p>

         </div>
         <div class="platinum">
            <h2>Platinum</h2>
            <p>Los depositos no tienen Comision</p>
            <p>Si el Saldo en su cuenta es mayor o igual a $5.000 no habra comisiones por Extracciones</p>
            <p>Si el saldo en su cuenta es menor a $5.000, las extracciones tendran una comision del 5% (Banelco, Link, Caja)</p>

         </div>
         <div class="black">
            <h2>Black</h2>
            <p>Los depositos no tendran comision salvo que sean mayores a $1.000.000, en cuyo caso la comision por deposito es del 4%</p>
            <p>Las extracciones no tienen comision</p>

         </div>
      </div>
      <div class="formulario">
         <form class="" action="crearCuenta.php" method="post">
            Elige un tipo de cuenta: <select class="" name="cuenta">
                  <option value="">Seleccione</option>
                  <option value="classic">Classic</option>
                  <option value="gold">Gold</option>
                  <option value="platinum">Platinum</option>
                  <option value="black">BLack</option>

            </select>
            <input type="submit" name="crearCuenta" value="Crear Cuenta">
            <br>
            Acreditar Saldo : <input type="number" name="acreditar" value="">
            <input type="submit" name="btnAcreditar" value="Acreditar">
            <br>
            Debitar Saldo : <input type="number" name="debitar" value="">
            <input type="submit" name="btnDebitar" value="Debitar">
         </form>
      </div>
      <div class="mostrar-datos">
         <?php

         if(isset($_POST['crearCuenta'])){
            $cuenta = $_POST['cuenta'];
            //var_dump($cuenta);
            switch ($cuenta) {
               case 'classic':
                  imprimir($cuentaClassic);
                  break;
               case 'gold':
                  imprimir($cuentaGold);
                  break;
               case 'platinum':
                  imprimir($cuentaPlatinum);
                  break;
               case 'black':
                  imprimir($cuentaBlack);
                  break;
            }

         }
         ?>
         <br><br><br>


      </div>
   </body>
</html>
