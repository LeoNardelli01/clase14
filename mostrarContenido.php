<?php
session_start();

?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Dentro del Banco</title>
      <link rel="stylesheet" href="estilos.css">
   </head>
   <body>
      <header>
         <h1>Dentro del banco...</h1>
      </header>
      <section>
         <div class="formulario-cuentas">
            <p>Datos A llenar:</p><br><br><br>
            <form class="" action="mostrarContenido.php" method="post">

               <?php
               $_SESSION = $_POST;
               $tipoCliente = $_SESSION['tipoCliente'];
               $cuenta = $_SESSION['cuenta'];
               switch ($tipoCliente) {
                  case 'persona':
                     echo "TIPO DE CLIENTE: $tipoCliente <br>";
                     echo "TIPO DE CUENTA: $cuenta <br>";
                     echo "Nombre: <input type='text' name='nombre' value=''><br>
                     Apellido: <input type='text' name='apellido' value=''><br>
                     DNI: <input type='text' name='dni' value=''><br>
                     Fecha de Nacimineto: <input type='text' name='fechaNac' value=''><br>
                     E-mail: <input type='email' name='email' value=''><br>
                     Password: <input type='text' name='pass' value=''><br>
                     <input type='submit' name='datos' value='Crear'>";
                     break;

                  case 'pyme':
                     echo "TIPO DE CLIENTE: $tipoCliente <br>";
                     echo "TIPO DE CUENTA: $cuenta <br>";
                     echo "Razon Social: <input type='text' name='nombre' value=''><br>
                     CUIT: <input type='text' name='cuit' value=''><br>
                     E-mail: <input type='email' name='email' value=''><br>
                     Password: <input type='Password' name='pass' value=''><br>
                     <input type='submit' name='datos' value='Crear'>";
                     break;
                  case 'multinacional':

                     break;

               }
               if ($_POST['datos']) {
                  
                  $_SESSION = $_SESSION . $_POST;
               }
               echo "<pre>";
               var_dump($_SESSION);
               //echo $tipoCliente;
               //echo $cuenta;
               ?>
            </form>
         </div>
      </section>
   </body>
</html>
