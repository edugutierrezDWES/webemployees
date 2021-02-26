<?php

function comprobarEmpleado($numEmp) {

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

        $consulta=$conexion->prepare("SELECT emp_no FROM employees WHERE emp_no=:numEmp");
        $consulta->bindParam(":numEmp",$numEmp);
        $consulta->execute();
        $datos= $consulta->fetch(PDO::FETCH_ASSOC);
        return $datos["emp_no"]!=null? true : false;

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}

function modificarSalario($numEmp, $salario) {

    # Función 'modificarSalario'. 
    # Parámetros: 
    # 	- (ninguno)
    #
    # Funcionalidad:
    #  Cambia el sueldo de un empleado
    #
    # Retorna: true, false o null
    #

    global $conexion;

    try{

        $consulta=$conexion->prepare("UPDATE salaries SET salary=:salario WHERE emp_no=:numEmp");
        $consulta->bindParam(":numEmp",$numEmp);
        $consulta->bindParam(":salario",$salario);
        $consulta->execute();
        return true;

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}



?>