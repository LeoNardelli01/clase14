<?php
require_once('Persona.php');
require_once('Pyme.php');
require_once('Multinacional.php');
require_once('Classic.php');

//var_dump($usuario);
//var_dump($empresa);
//var_dump($piccardelli);

$cuentaClassic = new Classic();

echo "<pre>";

var_dump($cuentaClassic);

$cuentaClassic -> acreditar(2000);

var_dump($cuentaClassic);

$cuentaClassic -> debitar(550, "Cajero Automatico");

var_dump($cuentaClassic);
?>
