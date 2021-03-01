<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Masiva Empleado</title>
</head>
<body>
<h1>Alta Masiva Empleados</h1>
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
		<label for="dpto">Seleccione un Departamento: </label>
		<select name="dpto" required>
        <?php
           foreach($departamentos as $departamento){
               echo "<option>".$departamento["dept_name"]."</option>";
           }
        ?>
        </select><br>

        <label for="cargo">Seleccione un Cargo: </label>
		<select name="cargo" required>
        <?php
           foreach($cargos as $cargo){
               echo "<option>".$cargo["title"]."</option>";
           }
        ?></select><br>

        <label for="salario">Salario: </label>
		<input type="number" name="salario" min="38623" max="160000"/><br>

        <label for="nacimiento">Fecha de Nacimiento: </label>
		<input type="date" name="nacimiento"/><br>

        <label for="nombre">Nombre: </label>
		<input type="text" name="nombre" pattern="^[A-Za-záéíóúÁÉÍÓÚ][\sa-zA-ZáéíóúÁÉÍÓÚ\-']{1,12}[\sa-zA-ZáéíóúÁÉÍÓÚ]$"
         title="El nombre no puede contener númerosy y solo - como carácter especial"/><br>

        <label for="apellidos">Apellidos: </label>
		<input type="text" name="apellidos"  pattern="^[A-Za-záéíóúÁÉÍÓÚ][\sa-zA-ZáéíóúÁÉÍÓÚ\-']{1,14}[\sa-zA-ZáéíóúÁÉÍÓÚ]$" 
        title="Los apellidos no pueden contener números y solo - como carácter especial"/><br>

        <label for="genero">Género: </label>
		<select type="text" name="genero">
        <option value="M">M</option>
        <option value="F">F</option>
        </select><br><br>
		<input type="submit" name="annadir" value="Añadir Empleado"/><br>
        <input type="submit" id="limpiar" name="limpiar" value="Limpiar Cesta"/><br>
        <input type="submit" id="insertar" name="insertar" value="ALta Masiva"/><br><br>
        <a href="index.php">Volver al Inicio</a><br>
	</form>

   

</body>
</html>