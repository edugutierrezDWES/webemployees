<?php
   require_once("models/altemp_model.php");

   $departamentos=obtenerDepartamentos();
   require_once("views/infodptos_view.php");

 if (isset($_POST) && !empty($_POST)) {
  
    foreach ($departamentos as $departamento) {
        if ($departamento["dept_name"]==$_POST["dpto"]) {
            $dpto=$departamento;
        }
    }
    $datos=infoDepartamentos($dpto["dept_no"]);
    
     if($datos!=null){

    
           
         $employees=$datos["dept_emp"];
         $managers=$datos["dept_manager"];
         require_once("views/infodptos_tablas_view.php");
    } 
}




?>