<?php

require_once("models/login_model.php");
if(isset($_SESSION) && !empty($_SESSION) && isset($_SESSION["numemp"])) {
    $boolHHRR =comprobarDepartamento();

    if($boolHHRR) header("location: homeHHRR.php"); 
    else header("location: home.php"); 
} else {

    require_once("views/login_view.php");
    if (isset($_POST) && !empty($_POST)) {

		$usuario = $_POST["numemp"];
		$clave = $_POST["clave"];
		$consulta = iniciarSesion($usuario, $clave);

		if($consulta != null && $consulta!=false){
			$_SESSION["nombre"] = $consulta["first_name"];
            $_SESSION["numemp"] = $consulta["emp_no"];
			header("location: index.php"); 
		} else echo "<br>Datos de sesión erróneos"; 
	}
}

?>