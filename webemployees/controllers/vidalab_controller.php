<?php

require_once("models/vidalab_model.php");
require_once("models/modsalario_model.php");
require_once("views/vidalab_view.php");

if (isset($_POST) && !empty($_POST) && isset($_POST["vidalaboral"])) {

    $numEmp=$_POST["numEmp"];
    $bool=comprobarEmpleado($numEmp);
    var_dump($bool);
      if($bool){

      $datos=vidaLaboral($numEmp);
     /*  if($bool2) echo "<p style='color:green;'>Operación realizada con éxito</p>";
      else echo "<p style='color:red;'>Ha ocurrido un error al actualizar el salario</p>";  */

    } else echo "<p style='color:red;'>No se ha encontrado este empleado. Compruebe el número</p>"; 
}



?>