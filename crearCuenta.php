<?php
require_once('Persona.php');
require_once('Pyme.php');
require_once('Multinacional.php');
require_once('Classic.php');
require_once('Gold.php');
require_once('Platinum.php');
require_once('Black.php');

//echo "<pre>";
/*
echo "---CLASSIC---";
echo "<br><br>";

$cuentaClassic = new Classic();
var_dump($cuentaClassic);
$cuentaClassic -> acreditar(2500);
var_dump($cuentaClassic);
$cuentaClassic -> debitar(300, "caja");
var_dump($cuentaClassic);

echo "---GOLD---";
echo "<br><br>";

$cuentaGold = new Gold();
var_dump($cuentaGold);
$cuentaGold -> acreditar(11728);
var_dump($cuentaGold);
$cuentaGold -> debitar(300, "caja");
var_dump($cuentaGold);

echo "---PLATINUM---";
echo "<br><br>";

$cuentaPlatinum = new Platinum();
var_dump($cuentaPlatinum);
$cuentaPlatinum -> acreditar(15000);
var_dump($cuentaPlatinum);
$cuentaPlatinum -> debitar(300, "banelco");
var_dump($cuentaPlatinum);

echo "---BLACK---";
echo "<br><br>";

$cuentaBlack = new Black();
var_dump($cuentaBlack);
$cuentaBlack -> acreditar(999999);
var_dump($cuentaBlack);
*/
$cuentaClassic;
$cuentaGold;
$cuentaPlatinum;
$cuentaBlack;


if (isset($_POST['crearCuenta'])) {
   //echo "<pre>";
   //var_dump($_POST);
   switch ($_POST['cuenta']) {
      case 'classic':
         $cuentaClassic = new Classic();
         $cuentaClassic -> acreditar(11000);

         break;
      case 'gold':
         $cuentaGold = new Gold();
         break;
      case 'platinum':
         $cuentaPatinum = new Platinum();
         break;
      case 'black':
         $cuentaBlack = new Black();
         break;

   }
}

var_dump($_POST);

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

            echo "<label for=''>Datos de Cuenta: </label><br><br>";
            echo "Tipo de Cuenta: " . get_class($cuentaClassic) . "<br><br>";
            echo "CBU: " . $cuentaClassic -> getCbu() . "<br>";
            echo "Balance : " . $cuentaClassic -> getBalance() . "<br>";
            echo "Fecha Ultimo Movimiento: " . $cuentaClassic -> getFechaUltimoMov() . "<br>";

            if(isset($_POST['acreditar'])){
               echo "Probando acreditar";
            }

         }
         ?>
         <br><br><br>


      </div>
   </body>
</html>
