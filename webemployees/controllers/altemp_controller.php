<?php
  
 require_once("models/altemp_model.php");
 $departamentos=obtenerDepartamentos();
 $cargos=obtenerCargos();
 require("views/altemp_view.php");
 

 if (isset($_POST) && !empty($_POST)) {
     $nombre=procesarCadena($_POST["nombre"]);
     $apellidos=procesarCadena($_POST["apellidos"]);
     $nacimiento=$_POST["nacimiento"];
     $cargo=$_POST["cargo"];
     $salario=$_POST["salario"];
     $genero=utf8_decode($_POST["genero"]);

     foreach ($departamentos as $departamento) {
         if ($departamento["dept_name"]==$_POST["dpto"]) {
             $dpto=$departamento;
         }
     }
     $nuevoNum=nuevoNumEmpleado();
    
     $bool=altaEmpleado($nombre, $apellidos, $nacimiento, $cargo, $salario, $genero, $dpto["dept_no"], $nuevoNum);
     if($bool){
         require_once("views/altemp_exito.php");
     }
 }
