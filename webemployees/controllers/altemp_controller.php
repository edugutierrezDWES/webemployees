<?php
  
 require_once("models/altemp_model.php");
 $departamentos=obtenerDepartamentos();
 $cargos=obtenerCargos();
 require_once("views/altemp_view.php");

 if (isset($_POST) && !empty($_POST)) {
     $nombre=procesarCadena($_POST["nombre"]);
     $apellidos=procesarCadena($_POST["apellidos"]);
     $nacimiento=$_POST["nacimiento"];
     $cargo=$_POST["cargo"];
     $salario=$_POST["salario"];
     $genero=utf8_decode($_POST["genero"]);

     foreach ($departamentos as $departamento) {
         if ($departamento["dept_name"]==$_POST["dpto"]) {
             $dpto=$departamento["dept_no"];
         }
     }
     $nuevoNum=nuevoNumEmpleado();
    
     $bool=altaEmpleado($nombre, $apellidos, $nacimiento, $cargo, $salario, $genero, $dpto, $nuevoNum);

     if ($bool) {
         echo "<br>Se ha realizado la operación con éxito<br>";
         echo'<table border="1">
        <tr>
          <th>Nombre</th><th>Apellidos</th><th>Código Empleado</th>
          <th>Nacimiento</th><th>Cargo</th><th>Salario</th>
          <th>Género</th><th>Departamento</th>
        </tr>
        <tr>
          <td>'.$nombre.'</td><td>'.$apellidos.'</td><td>'.$nuevoNum.'</td>
          <td>'.$nacimiento.'</td><td>'.$cargo.'</td><td>'.$salario.'</td>
          <td>'.$genero.'</td><td>'.$_POST["dpto"].'</td>
        </tr>';
     } else echo "Ha ocurrido un error";
 }
