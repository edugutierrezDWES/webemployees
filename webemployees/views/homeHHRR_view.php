<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Empleados (Recursos Humanos)</title>
</head>
<body>
<h1>Portal Empleados (Recursos Humanos)</h1>
<h2>Bienvenido <span style="color: gray;"><?php echo $_SESSION["nombre"];?></span></h2>

<ul>
  <li><a href="altemp.php">Alta de un Empleado</a><br></li>
  <li><a href="altmasemp.php">Alta masiva de Empleados</a></li>
  <li><a href="modsalario.php">Modificar Salario</a></li>
  <li><a href="vidalaboral.php">Vida Laboral</a></li>
  <li><a href="infodptos.php">Info Departamentos</a></li>
  <li><a href="cambiardpto.php">Cambio Departamento</a></li>
  <li><a href="nuevojefe.php">Nuevo Jefe Departamento</a></li>
  <li><a href="bajaemp.php">Baja Empleado</a></li>
  <li><a href="minomina.php">Mi nómina</a></li>
  <li><a href="histlab.php">Historial Laboral</a></li>
  <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
</ul>
</body>
</html>