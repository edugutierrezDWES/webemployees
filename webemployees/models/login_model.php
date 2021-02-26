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
    
        try {
            $consulta = $conexion->prepare("SELECT dept_no as deptEmpleado FROM dept_emp WHERE emp_no=:numdept");
            $consulta->bindParam(":numdept", $_SESSION["numemp"]);
            $consulta->execute();
            $datos=$consulta->fetch(PDO::FETCH_ASSOC);
            return $datos["deptEmpleado"]=="d003"? true : false;

        } catch (PDOException $ex) {
            echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
            return null;
        }
    }

function comprobarEmpleados($numemp,$clave){

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
    
    try {
        $consulta = $conexion->prepare("SELECT * FROM employees WHERE emp_no=:numemp AND last_name=:clave");
        $consulta->bindParam(":numemp", $numemp);
        $consulta->bindParam(":clave", $clave);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $ex) {
        echo "<p>Ha ocurrido un error con los datos de usuario: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
} 



    
?>



