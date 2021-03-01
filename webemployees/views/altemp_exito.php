<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

  <p style="color: green;">Se ha realizado la operación con éxito</p>
 <table border="1">
 <tr>
   <th>Nombre</th><th>Apellidos</th><th>Código Empleado</th>
   <th>Nacimiento</th><th>Cargo</th><th>Salario</th>
   <th>Género</th><th>Departamento</th>
 </tr>
 <tr>
   <td><?php echo $nombre;?></td><td><?php echo $apellidos;?></td><td><?php echo $nuevoNum;?></td>
   <td><?php echo $nacimiento;?></td><td><?php echo $cargo;?></td><td><?php echo $salario;?></td>
   <td><?php echo $genero;?></td><td><?php echo $dpto["dept_name"];?></td>
 </tr>

</body>
</html>