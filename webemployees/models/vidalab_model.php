<?php

function vidaLaboral($numEmp) {

    # Función 'vidaLaboral'. 
    # Parámetros: 
    # 	- $numEmp(código del empleado)
    #
    # Funcionalidad:
    # Obtiene todos los datos correspondientes a un empleado
    #
    # Retorna: true, false o null
    #

    global $conexion;
    $datos=array();

    try{

        $consulta=$conexion->prepare("SELECT * FROM employees WHERE emp_no=:numemp");
        $consulta->bindParam(":numemp",$numEmp);
        $consulta->execute();
        $datos["employees"]=$consulta->fetch(PDO::FETCH_ASSOC);

        $consulta=$conexion->prepare("SELECT * FROM salaries WHERE emp_no=:numemp");
        $consulta->bindParam(":numemp",$numEmp);
        $consulta->execute();
        $datos["salaries"]=$consulta->fetchAll(PDO::FETCH_ASSOC);

        $consulta=$conexion->prepare("SELECT * FROM titles WHERE emp_no=:numemp");
        $consulta->bindParam(":numemp",$numEmp);
        $consulta->execute();
        $datos["titles"]=$consulta->fetchAll(PDO::FETCH_ASSOC);

        $consulta=$conexion->prepare("SELECT * FROM dept_emp LEFT JOIN departments ON dept_emp.dept_no=departments.dept_no WHERE emp_no=:numemp");
        $consulta->bindParam(":numemp",$numEmp);
        $consulta->execute();
        $datos["dept_emp"]=$consulta->fetchAll(PDO::FETCH_ASSOC);

        $consulta=$conexion->prepare("SELECT * FROM dept_manager LEFT JOIN departments ON dept_manager.dept_no=departments.dept_no WHERE emp_no=:numemp");
        $consulta->bindParam(":numemp",$numEmp);
        $consulta->execute();
        $datos["dept_manager"]=$consulta->fetchAll(PDO::FETCH_ASSOC);
        return $datos; 
       

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}

?>