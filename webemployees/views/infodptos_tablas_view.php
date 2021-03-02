<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<h2><span style="color:grey;"><?php echo $dpto["dept_name"];?> : <?php echo $dpto["dept_no"];?> </span></h2> 
<h2>Empleados</h2>
<table border="1">
<tr>
   <th>Código empleado</th><th>Nombre</th><th>Apellidos</th>
   <th>Fecha Incio</th><th>Fecha Fin</th>
 </tr>

 <?php
 foreach($employees as $employee) {
    ?>
 <tr>
   <td><?php echo $employee["numemp"];?></td><td><?php echo $employee["first_name"];?></td>
   <td><?php echo $employee["last_name"]?></td><td><?php echo $employee["fecha_desde"]?></td>
   <td><?php echo $employee["fecha_hasta"]?></td>
 </tr>
<?php
 }
 ?>
</table>

<h2>Managers</h2>
<table border="1">
<tr>
   <th>Código empleado</th><th>Nombre</th><th>Apellidos</th>
   <th>Fecha Incio</th><th>Fecha Fin</th>
 </tr>

 <?php
 foreach($managers as $manager) {
    ?>
 <tr>
   <td><?php echo $manager["numemp"];?></td><td><?php echo $manager["first_name"];?></td>
   <td><?php echo $manager["last_name"]?></td><td><?php echo $manager["fecha_desde"]?></td>
   <td><?php echo $manager["fecha_hasta"]?></td>
 </tr>
<?php
 }
 ?>
</table>



 
</body>
</html>