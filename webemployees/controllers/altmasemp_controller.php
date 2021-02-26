<?php

 require_once("models/altmasemp_model.php");
 $departamentos=obtenerDepartamentos();
 $cargos=obtenerCargos();
 require_once("views/altmasemp_view.php");

 if (isset($_SESSION) && !empty($_SESSION)) {

    if(!isset($_SESSION["cesta"])){
        $_SESSION["cesta"]=array();
    }

     if (isset($_POST) && !empty($_POST)) {
         if (isset($_POST["annadir"])) {
            if($_POST["nacimiento"]!="" && $_POST["nombre"]!="" && $_POST["apellidos"]!=""
            && $_POST["salario"]!="" && $_POST["genero"]!=""){

            $annadir=array();
            $annadir["nombre"]=procesarCadena($_POST["nombre"]);
            $annadir["apellidos"]=procesarCadena($_POST["apellidos"]);
            $annadir["nacimiento"]=$_POST["nacimiento"];
            $annadir["cargo"]=$_POST["cargo"];
            $annadir["salario"]=$_POST["salario"];
            $annadir["genero"]=$_POST["genero"];
       
            foreach ($departamentos as $departamento) {
                if ($departamento["dept_name"]==$_POST["dpto"]) {
                    $annadir["dpto"]=$departamento;
                }
            }
              
            if(isset($_SESSION["nuevoNum"])) $_SESSION["nuevoNum"]++ ;
            else $_SESSION["nuevoNum"]=nuevoNumEmpleado()  ;

            $annadir["nuevoNum"]=$_SESSION["nuevoNum"];
            
            array_push($_SESSION["cesta"],$annadir);
            imprimirCesta();
            } else {
                echo"<script>alert('Faltan rellenar campos')</script>";
                imprimirCesta();
            } 

         } else if(isset($_POST["limpiar"])){

            $_SESSION["cesta"]=array();
            $_SESSION["nuevoNum"]=null;
            echo"<p style='color:grey;'>Se ha vaciado la cesta</p>";
         } else if(isset($_POST["insertar"]) && isset($_SESSION["cesta"]) && !empty($_SESSION["cesta"])) {

            $bool=altaMasivaEmpleados();
            if($bool){
                echo "<p style='color:grey;'>Operación realizada con éxito</p>";
                imprimirCesta();
                $_SESSION["cesta"]=array();
                $_SESSION["nuevoNum"]=null;
            } else echo "<p style='color:red;'>Error en la operación</p>";
         } else echo "<p style='color:grey;'>La cesta está vacía</p>";
     } 
 } else echo"No has iniciado sesión, vuelve a la página de inicio.";

 

?>