<?php

  require_once("models/modsalario_model.php");
  require_once("views/modsalario_view.php");
  if (isset($_POST) && !empty($_POST) && isset($_POST["modificar"])) {

       $numEmp=$_POST["numEmp"];
       $salario=$_POST["salario"];
       $bool=comprobarEmpleado($numEmp);
        if($bool){

         $bool2=modificarFechaSalario($numEmp,$salario);
         if($bool2) echo "<p style='color:green;'>Operación realizada con éxito</p>";
         else echo "<p style='color:red;'>Ha ocurrido un error al actualizar el salario</p>"; 

       } 
       else echo "<p style='color:red;'>No se ha encontrado este empleado. Compruebe el número</p>";
  }



?>