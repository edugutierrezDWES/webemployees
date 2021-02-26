<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
	<h1>Iniciar Sesión</h1>
	<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
		<label for="numemp">Usuario:</label>
		<input type="text" name="numemp" required/><br>

		<label for="clave">Clave:</label>
		<input type="text" name="clave" required/><br>

		<input type="submit" value="Iniciar Sesión"/>
	</form>
</body>
</html>