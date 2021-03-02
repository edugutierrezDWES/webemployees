<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Departamento</title>
</head>
<body>

<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
<label for="dpto">Seleccione un Departamento: </label>
		<select name="dpto" required>
        <?php
           foreach($departamentos as $departamento){
               echo "<option>".$departamento["dept_name"]."</option>";
           }
        ?>
        </select><br>


		<input type="submit" value="Obtener Información"/>
	</form>
    
</body>
</html>