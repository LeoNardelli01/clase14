<?php

//Funcion para cargar las clases automaticamente
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

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
            Tipo de Cliente: <select class="" name="tipoCliente">
                  <option value="">Seleccione</option>
                  <option value="persona">Persona</option>
                  <option value="pyme">Pyme</option>
                  <option value="multinacional">Multinacional</option>
            </select>
            <br><br>
            Tipo de cuenta: <select class="" name="cuenta">
                  <option value="">Seleccione</option>
                  <option value="classic">Classic</option>
                  <option value="gold">Gold</option>
                  <option value="platinum">Platinum</option>
                  <option value="black">Black</option>

            </select>

            <br>
            <input type="submit" name="crearCuenta" value="Crear Cuenta">
            <br>

         <?php

         if(isset($_POST['crearCuenta'])){
            $cuenta = $_POST['cuenta'];
            $tipoCliente = $_POST['tipoCliente'];


            switch ($cuenta) {
               case 'classic':

                  switch ($tipoCliente) {
                     case 'persona':
                        $persona = new Persona(new Classic,
                                             "leo@gmail.com",
                                             "123",
                                             "Leonel",
                                             "Nardelli",
                                             "31175292",
                                             "3/9/1984" );

                     break;

                     case 'pyme':
                        $pyme = new Pyme(new Classic,
                                       "piccardelli@gmail.com",
                                       "123",
                                       "123456",
                                       "Piccardelli");
                     break;

                     case 'multinacional':
                        $multinacional = new Multinacional(new Classic,
                                                         "picca@gmail.com",
                                                         "2345",
                                                         "12333333",
                                                         "Ricosur");

                     break;
               }
               break;
               case 'gold':
                  switch ($tipoCliente) {
                     case 'persona':
                        $persona = new Persona(new Gold,
                                             "leo@gmail.com",
                                             "123",
                                             "Leonel",
                                             "Nardelli",
                                             "31175292",
                                             "3/9/1984" );

                     break;

                     case 'pyme':
                        $pyme = new Pyme(new Gold,
                                       "piccardelli@gmail.com",
                                       "123",
                                       "123456",
                                       "Piccardelli");
                     break;

                     case 'multinacional':
                        $multinacional = new Multinacional(new Gold,
                                                         "picca@gmail.com",
                                                         "2345",
                                                         "12333333",
                                                         "Ricosur");

                     break;
               }
               break;
               case 'platinum':
                  switch ($tipoCliente) {
                     case 'persona':
                        $persona = new Persona(new Platinum,
                                             "leo@gmail.com",
                                             "123",
                                             "Leonel",
                                             "Nardelli",
                                             "31175292",
                                             "3/9/1984" );

                     break;

                     case 'pyme':
                        $pyme = new Pyme(new Platinum,
                                       "piccardelli@gmail.com",
                                       "123",
                                       "123456",
                                       "Piccardelli");
                     break;

                     case 'multinacional':
                        $multinacional = new Multinacional(new Platinum,
                                                         "picca@gmail.com",
                                                         "2345",
                                                         "12333333",
                                                         "Ricosur");

                     break;
               }
               break;
               case 'black':
                  switch ($tipoCliente) {
                     case 'persona':
                        $persona = new Persona(new Black,
                                             "leo@gmail.com",
                                             "123",
                                             "Leonel",
                                             "Nardelli",
                                             "31175292",
                                             "3/9/1984" );

                     break;

                     case 'pyme':
                        $pyme = new Pyme(new Black,
                                       "piccardelli@gmail.com",
                                       "123",
                                       "123456",
                                       "Piccardelli");
                     break;

                     case 'multinacional':
                        $multinacional = new Multinacional(new Black,
                                                         "picca@gmail.com",
                                                         "2345",
                                                         "12333333",
                                                         "Ricosur");

                     break;
                  }
               }

               // PRUEBAS ACA!!!

               echo "<pre>";
               if(isset($persona)){
                  echo "<br>";
                  echo $persona -> mostrar();
                  echo "<br>";
                  $persona -> getCuentaAsociada() -> imprimir();
                  $persona -> getCuentaAsociada() -> acreditar(1000);
                  $persona -> getCuentaAsociada() -> imprimir();
                  $persona -> getCuentaAsociada() -> debitar(200, 'link');
                  $persona -> getCuentaAsociada() -> imprimir();
               }elseif (isset($pyme)) {
                  echo "<br>";
                  echo $pyme -> mostrar();
                  echo "<br>";
                  $pyme -> getCuentaAsociada() -> imprimir();
                  $pyme -> getCuentaAsociada() -> acreditar(1000);
                  $pyme -> getCuentaAsociada() -> imprimir();
                  $pyme -> getCuentaAsociada() -> debitar(200, 'link');
                  $pyme -> getCuentaAsociada() -> imprimir();
               }else{
                  echo "<br>";
                  echo $multinacional -> mostrar();
                  echo "<br>";
                  $multinacional -> getCuentaAsociada() -> imprimir();
                  $multinacional -> getCuentaAsociada() -> acreditar(1000);
                  $multinacional -> getCuentaAsociada() -> imprimir();
                  $multinacional -> getCuentaAsociada() -> debitar(200, 'link');
                  $multinacional -> getCuentaAsociada() -> imprimir();
               }

         }


         ?>
         <br><br><br>


      </div>
   </body>
</html>
