<?php

require_once("models/vidalab_model.php");
require_once("models/modsalario_model.php");
require_once("views/vidalab_view.php");

if (isset($_POST) && !empty($_POST) && isset($_POST["vidalaboral"])) {

    $numEmp=$_POST["numEmp"];
    $bool=comprobarEmpleado($numEmp);
    if($bool){

      $datos=vidaLaboral($numEmp);
      if($datos!=null){

        $employees=$datos["employees"];
        $salaries=$datos["salaries"];
        $titles=$datos["titles"];
        $dept_emp=$datos["dept_emp"];
        $dept_manager=$datos["dept_manager"];

          require("views/vidalab_tablas_view.php"); 

      } 

    } else echo "<p style='color:red;'>No se ha encontrado este empleado. Compruebe el número</p>"; 
}



?>