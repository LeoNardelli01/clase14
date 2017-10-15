<?php
require_once('Persona.php');
require_once('Pyme.php');
require_once('Multinacional.php');
require_once('Classic.php');
require_once('Gold.php');
require_once('Platinum.php');
require_once('Black.php');

echo "<pre>";
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
$cuentaBlack -> acreditar(1000000);
var_dump($cuentaBlack);
?>
