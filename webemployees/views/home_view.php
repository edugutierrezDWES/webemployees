<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Empleados</title>
</head>
<body>
<h1>Portal Empleados</h1>
<h2>Bienvenido <span style="color: gray;"><?php echo $_SESSION["nombre"];?></span></h2>
<ul>
  <li><a href="minomina.php">Mi nómina</a></li>
  <li><a href="histlab.php">Historial Laboral</a></li>
  <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
</ul>
    
</body>
</html>