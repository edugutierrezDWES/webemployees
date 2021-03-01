<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Laboral</title>
</head>
<body>
<h1>Vida Laboral</h1>
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">

<label for="empleado">Número de Empleado</label>
     <input type="number" name="numEmp" min="10001" max="60000" required/><br>
    
     <input type="submit" name="vidalaboral" value="Obtener Vida Laboral"/><br><br>
     <a href="index.php">Volver al Inicio</a>

</form>
    
</body>
</html>