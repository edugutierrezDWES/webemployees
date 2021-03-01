<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Salario</title>
</head>
<body>
   <h1>Modificar Salario de un Empleado</h1>
   <form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">

     <label for="empleado">Número de Empleado</label>
     <input type="number" name="numEmp" min="10001" max="60000" required/><br>
      
     <label for="empleado">Nuevo salario</label>
     <input type="number" name="salario" min="38623" max="160000" required/><br><br>

     <input type="submit" name="modificar" value="Modificar Salario"/><br><br>
     <a href="index.php">Volver al Inicio</a>

   </form>
</body>
</html>