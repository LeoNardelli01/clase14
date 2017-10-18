<?php

//Funcion para cargar las clases automaticamente
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});


if (isset($_POST['crearCuenta'])) {
   switch ($_POST['cuenta']) {
      case 'classic':
         $cuentaClassic = new Classic();

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
                  <option value="black">Black</option>

            </select>
            <input type="submit" name="crearCuenta" value="Crear Cuenta">
            <br>

         <?php

         if(isset($_POST['crearCuenta'])){
            $cuenta = $_POST['cuenta'];
            //var_dump($cuenta);
            switch ($cuenta) {
               case 'classic':
               //aca hacer las pruebas de movimientos bancarios
                  $persona = new Persona($cuentaClassic, "leo@gmail.com", "123", "Leonel", "Nardelli", "31175292", "3/9/1984" );
                  $pyme = new Pyme($cuentaClassic, "piccardelli@gmail.com", "123", "123456", "Piccardelli");
                  $multinacional = new Multinacional($cuentaClassic, "picca@gmail.com", "!2345", "12333333", "Ricosur");
                  $cuentaClassic -> imprimir();
                  $cuentaClassic -> acreditar(800);
                  $cuentaClassic -> imprimir();
                  $cuentaClassic -> debitar(1000, 'link');
                  $cuentaClassic -> imprimir();
                  echo "<br><br>";
                  echo "<pre>";
                  var_dump($persona);
                  var_dump($pyme);
                  var_dump($multinacional);


                  break;
               case 'gold':
                  $cuentaGold -> imprimir();
                  $cuentaGold -> acreditar(10000);
                  $cuentaGold -> imprimir();
                  $cuentaGold -> debitar(1000, 'banelco');
                  $cuentaGold -> imprimir();
                  $cuentaGold -> acreditar(1000);
                  $cuentaGold -> imprimir();
                  echo "<br><br>";
                  break;
               case 'platinum':
                  $cuentaPlatinum -> imprimir();
                  $cuentaPlatinum -> acreditar(5000);
                  $cuentaPlatinum -> imprimir();
                  $cuentaPlatinum -> debitar(1000, 'banelco');
                  $cuentaPlatinum -> imprimir();
                  $cuentaPlatinum -> acreditar(1000);
                  $cuentaPlatinum -> imprimir();
                  echo "<br><br>";
                  break;
               case 'black':
                  $cuentaBlack -> imprimir();
                  $cuentaBlack -> acreditar(100000);
                  $cuentaBlack -> imprimir();
                  $cuentaBlack -> debitar(1000, 'banelco');
                  $cuentaBlack -> imprimir();
                  echo "<br><br>";
                  break;
            }


         }
         ?>
         <br><br><br>


      </div>
   </body>
</html>
