<?php

function vidaLaboral($numEmp) {

    # Función 'comprobarEmpleado'. 
    # Parámetros: 
    # 	- (ninguno)
    #
    # Funcionalidad:
    # Comprueba si existe un empleado con el número dado
    #
    # Retorna: true, false o null
    #

    global $conexion;


    try{

        $consulta=$conexion->prepare("SELECT * FROM employees,salaries,titles,dept_emp,dept_manager WHERE emp_no=:numemp");
        $consulta->bindParam(":numemp",$numEmp);
        $consulta->execute();
        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
        var_dump($datos);

        //return $datos!=false? true : false; 
       

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}

  



?>