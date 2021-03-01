<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<p style='color:green;'>Operación realizada con éxito</p>
<?php

$cesta = $_SESSION["cesta"];
?>
<table border="1">
<tr>
  <th>Nombre</th><th>Apellidos</th><th>Código Empleado</th>
  <th>Nacimiento</th><th>Cargo</th><th>Salario</th>
  <th>Género</th><th>Departamento</th>
</tr>
<?php
foreach ($cesta as $empleado) {
    ?>
     <tr>
         <td><?php echo $empleado["nombre"];?></td>
         <td><?php echo $empleado["apellidos"];?></td>
         <td><?php echo $empleado["nuevoNum"];?></td>
         <td><?php echo $empleado["nacimiento"];?></td>
         <td><?php echo $empleado["cargo"];?></td>
         <td><?php echo $empleado["salario"];?></td>
         <td><?php echo $empleado["genero"];?></td>
         <td><?php echo $empleado["dpto"]["dept_name"];?></td>
  
      </tr>
      <?php
     }
?>
 </table>






    
</body>
</html>