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
    $fecha_hasta=date("9999-01-01");

    try{

        $consulta=$conexion->prepare("SELECT first_name,employees.emp_no,dept_no FROM employees LEFT JOIN dept_emp ON employees.emp_no=dept_emp.emp_no WHERE employees.emp_no=:numemp AND to_date=:fecha_hasta");
        $consulta->bindParam(":numemp",$numEmp);
        $consulta->bindParam(":fecha_hasta",$fecha_hasta);
        $consulta->execute();
        $datos=$consulta->fetch(PDO::FETCH_ASSOC);

        return $datos!=false? true : false; 
       

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}

function modificarFechaSalario($numEmp, $salario) {

    # Función 'modificarSalario'. 
    # Parámetros: 
    # 	- ($numEmp,$salario)
    #   - $numEmp(número del empleado)
    # Funcionalidad:
    #  Actualiza la fecha de un salario
    #
    # Retorna: true, false o null
    #

    global $conexion;
    $fecha_hasta=date("9999-01-01");
    $fecha_desde=date("Y-m-d");

    try{

        $consulta=$conexion->prepare("UPDATE salaries SET to_date=:fecha_desde WHERE emp_no=:numEmp AND to_date=:fecha_hasta");
        $consulta->bindParam(":numEmp",$numEmp);
        $consulta->bindParam(":fecha_hasta",$fecha_hasta);
        $consulta->bindParam(":fecha_desde",$fecha_desde);
        $consulta->execute();


        
        return insertarSalario($numEmp,$salario);

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al actualizar el salario: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}

function insertarSalario($numEmp,$salario) {

    # Función 'insertarSalario'. 
    # Parámetros: 
    # 	- ($numEmp,$salario)
    #   - $numEmp(número del empleado)
    #   - $salario (nuevo salario)  
    #
    # Funcionalidad:
    #  inserta un nuevo salario del empleado
    #
    # Retorna: true o false 
    #

    global $conexion;
    $fecha_desde=date("Y-m-d");
    $fecha_hasta=date("9999-01-01");

    try {
		$conexion->beginTransaction();

		$insertar = $conexion->prepare("INSERT INTO salaries (emp_no,salary,from_date,to_date) 
        VALUES (:numEmp,:salario,:fecha_desde,:fecha_hasta)");
		$insertar->bindParam(':numEmp', $numEmp);
        $insertar->bindParam(':salario', $salario);
        $insertar->bindParam(':fecha_desde', $fecha_desde);
        $insertar->bindParam(':fecha_hasta', $fecha_hasta);
		$insertar->execute();

		$conexion->commit();
        echo "<p style='color:green;'>Se registrado el nuevo salario para el empleado ".$numEmp."</p>";
        return true;
       		

	} catch (PDOException $ex) {
		echo "<p>Ha ocurrido un error al insertar este nuevo salario: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
		$conexion->rollBack();
		return false;
	}
}
?>