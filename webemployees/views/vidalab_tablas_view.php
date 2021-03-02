<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<h2>Datos del Empleado</h2>
<table border="1">
<tr>
   <th>Número Empleado</th><th>Nacimiento</th><th>Nombre</th>
   <th>Apellido</th><th>Género</th><th>Fecha Contratación</th>
 </tr>

 <tr>
   <td><?php echo $employees["emp_no"];?></td><td><?php echo $employees["birth_date"];?></td>
   <td><?php echo $employees["first_name"]?></td><td><?php echo $employees["last_name"]?></td>
   <td><?php echo $employees["gender"]?></td><td><?php echo $employees["hire_date"];?></td>
 </tr>
</table>

<h2>Salarios</h2>
<table border="1">
<tr>
   <th>Salario</th><th>Fecha Incio</th><th>Fecha Fin</th>
 </tr>

 <?php
 foreach($salaries as $salary) {
    ?>
 <tr>
   <td><?php echo $salary["salary"]." €";?></td><td><?php echo $salary["from_date"];?></td>
   <td><?php echo $salary["to_date"]?></td>
 </tr>
<?php
 }
 ?>
</table>

<h2>Cargos</h2>
<table border="1">
<tr>
   <th>Cargo</th><th>Fecha Incio</th><th>Fecha Fin</th>
 </tr>

 <?php
 foreach($titles as $title) {
    ?>
 <tr>
   <td><?php echo $title["title"];?></td><td><?php echo $title["from_date"];?></td>
   <td><?php echo $title["to_date"]?></td>
 </tr>
<?php
 }
 ?>
</table>


<h2>Historial Departamentos</h2>
<table border="1">
<tr>
   <th>Código Departamento</th><th>Departamento</th>
   <th>Fecha Incio</th><th>Fecha Fin</th>
 </tr>

 <?php
 foreach($dept_emp as $dept) {
    ?>
 <tr>
   <td><?php echo $dept["dept_no"];?></td><td><?php echo $dept["dept_name"];?></td>
   <td><?php echo $dept["from_date"]?></td><td><?php echo $dept["to_date"]?></td>
 </tr>
 
<?php
 }
?>
 </table>
 <h2>Historial Manager</h2>
 <?php
 if(!empty($dept_manager)){
    ?>
<table border="1">
<tr>
   <th>Código Departamento</th><th>Departamento</th>
   <th>Fecha Incio</th><th>Fecha Fin</th>
 </tr> 

    <?php
    foreach($dept_manager as $manager) {
        ?>
  <tr>
   <td><?php echo $manager["dept_no"];?></td><td><?php echo $manager["dept_name"];?></td>
   <td><?php echo $manager["from_date"]?></td><td><?php echo $manager["to_date"]?></td>
 </tr>

<?php
    }
 } else {
     ?>
<p style="color:grey;">No se ha asignado ningún puesto de Manager a este empleado.</p>
<?php
 }
 ?>
 
</body>
</html>