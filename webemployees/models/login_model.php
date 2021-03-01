<?php

function comprobarDepartamento() {
    # Función 'comprobarClientes'. 
    # Parámetros: 
    # 	- (ninguno)
    #
    # Funcionalidad:
    # Comrpueba si el empleado pertenece al departamento de HHRR.
    #
    # Retorna: true/false o null
    #
      
        global $conexion;
        $fecha_hasta=date("9999-01-01");
    
        try {
            $consulta = $conexion->prepare("SELECT dept_no as deptEmpleado FROM dept_emp WHERE emp_no=:numdept and to_date=:fecha_hasta");
            $consulta->bindParam(":numdept", $_SESSION["numemp"]);
            $consulta->bindParam(":fecha_hasta", $fecha_hasta);
            $consulta->execute();

            $datos=$consulta->fetch(PDO::FETCH_ASSOC);
            return $datos["deptEmpleado"]=="d003"? true : false;

        } catch (PDOException $ex) {
            echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
            return null;
        }
    }

function iniciarSesion($numero,$clave){

     # Función 'comprobarEmpleados'. 
    # Parámetros: 
    # 	- ($numemp,$clave)
    #
    # Funcionalidad:
    # Comrpueba si el empleado está en la BBDD
    #
    # Retorna: datos del usuario o null
    #
   
    global $conexion;
    $fecha_hasta=date("9999-01-01");
    
    try {
        $consulta = $conexion->prepare("SELECT first_name,employees.emp_no,dept_no FROM employees LEFT JOIN dept_emp ON employees.emp_no=dept_emp.emp_no WHERE employees.emp_no=:numemp AND last_name=:clave AND to_date=:fecha_hasta");
        $consulta->bindParam(":numemp", $numero);
        $consulta->bindParam(":clave", $clave);
        $consulta->bindParam(":fecha_hasta", $fecha_hasta);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $ex) {
        echo "<p>Ha ocurrido un error con los datos de usuario: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
} 

?>



