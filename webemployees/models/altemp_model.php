<?php

function obtenerDepartamentos() {

    # Función 'obtenerDepartamentos'. 
    # Parámetros: 
    # 	- (ninguno)
    #
    # Funcionalidad:
    # Obtener todos los departamentos 
    #
    # Retorna: departamentos o null
    #

    global $conexion;

    try{

        $consulta=$conexion->prepare("SELECT * FROM departments");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}

function obtenerCargos() {

    # Función 'obtenerCargo'. 
    # Parámetros: 
    # 	- (ninguno)
    #
    # Funcionalidad:
    # Obtener todos los departamentos 
    #
    # Retorna: departamentos o null
    #

    global $conexion;

    try{

        $consulta=$conexion->prepare("SELECT DISTINCT title FROM titles");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}

function procesarCadena($cadena){

    # Función 'procesarCadena'. 
    # Parámetros: 
    # 	-$cadena (nombres y apellidos)
    #
    # Funcionalidad:
    # Quitar espacios el principio y al final y 
    # poner la primera letra de cada palabra en mayúsculas
    # Retorna: $cadenaR
    #

    $cadena=strtolower(trim(utf8_decode($cadena)));
    $cadena=explode(" ",$cadena);
    $cadenaR="";
    foreach($cadena as $palabra){
        $cadenaR.=ucfirst($palabra)." ";
    }
    return trim($cadenaR);
} 

function nuevoNumEmpleado(){
    
    # Función 'nuevoNumEmpleado'. 
    # Parámetros: 
    # 	- (ninguno)
    #
    # Funcionalidad:
    # Obtener el siguiente número de empleado
    #
    # Retorna: número de empleado
    #

    global $conexion;

    try{

        $consulta=$conexion->prepare("SELECT MAX(emp_no) as nuevoNum FROM employees");
        $consulta->execute();
        $nuevoNum=$consulta->fetch(PDO::FETCH_ASSOC)["nuevoNum"];
        return $nuevoNum+1;

    } catch(PDOException $ex){
        echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    }
}

function altaEmpleado($nombre,$apellidos,$nacimiento,$cargo,$salario,$genero,$dpto,$nuevoNum){

    # Función 'insertarProducto'. 
# Parámetros: 
# 	- $nombre (nombre del empleado)
# 	- $apellidos (apellidos del emeplado)
# 	- $nacimiento (fecha de nacimiento)
# 	- $cargo (cargo que se le da de alta en la tabla titles)
# 	- $salario (salario que se le da de alta en la tabla salaries)
# 	- $genero(´genero del empleado)
# 	- $dpto (departamento al que va pertenecer este empleado)
#   - $nuevoNum (código del empleado)
#
# Funcionalidad:
# Inserta un nuevo empleado en la tabla employees
#
# Retorna: TRUE / FALSE según si se ha ejecutado correctamente o no
#

    
	global $conexion;
    $fecha=date("Y-m-d");


	try {
		$conexion->beginTransaction();

		$insertar = $conexion->prepare("INSERT INTO employees (emp_no,birth_date,first_name,last_name,gender,hire_date) 
        VALUES (:nuevoNum,:nacimiento,:nombre,:apellidos,:genero,:fecha)");
		$insertar->bindParam(':nuevoNum', $nuevoNum);
		$insertar->bindParam(':nacimiento', $nacimiento);
		$insertar->bindParam(':nombre', $nombre);
		$insertar->bindParam(':apellidos', $apellidos);
        $insertar->bindParam(':genero', $genero);
        $insertar->bindParam(':fecha',$fecha);
		$insertar->execute();

		$conexion->commit();
        echo "<p style='color:grey;'>Se ha dado de alta en la tabla employees</p>";
        $boolsalario=altaEmpleadoTablas($salario,$nuevoNum,"salaries","salary");
        $boolcargo=altaEmpleadoTablas($cargo,$nuevoNum,"titles","title");
        $booldpto_emp=altaEmpleadoTablas($dpto,$nuevoNum,"dept_emp","dept_no");

        return $boolsalario &&  $boolcargo && $booldpto_emp;		

	} catch (PDOException $ex) {
		echo "<p>Ha ocurrido un error al intentar dar de alta aste empleado: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
		$conexion->rollBack();
		return false;
	}
}

function altaEmpleadoTablas($valor,$nuevoNum,$tabla,$campo){

    # Función 'insertarProducto'. 
# Parámetros: 

# 	- $valor  (salario, departamento o cargo que se va a insertar)
# 	- $campo (campo en donde se va insertar el valor )
# 	- $tabla (tabla donde se va a insertar )
#   - $nuevoNum (código del empleado)

# Funcionalidad:
# Inserta un nuevo dato en la tabla correspondiente
#
# Retorna: TRUE / FALSE según si se ha ejecutado correctamente o no
#
	global $conexion;
    $fecha_desde=date("Y-m-d");
    $fecha_hasta=date("9999-01-01");

	try {
		$conexion->beginTransaction();

		$insertar = $conexion->prepare("INSERT INTO ".$tabla." (emp_no, ".$campo.", from_date, to_date) VALUES (:nuevoNum, :valor, :fecha_desde, :fecha_hasta)");
		$insertar->bindParam(':nuevoNum', $nuevoNum);
		$insertar->bindParam(':valor', $valor);
		$insertar->bindParam(':fecha_desde', $fecha_desde);
        $insertar->bindParam(':fecha_hasta', $fecha_hasta);
		$insertar->execute();

		$conexion->commit();
        /* echo "<p style='color:grey;'>Se ha dado de alta en la tabla ".$tabla."</p>"; */
		return true;

	} catch (PDOException $ex) {
		echo "<p>Ha ocurrido un error al intentar dar de alta en la tabla ".$tabla." : <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
		$conexion->rollBack();
		return false;
	}
}

function infoDepartamentos($dept_num){

    # Función 'infoDepartamentos'. 
   # Parámetros: 
   # 	- $dept_num (númerpo del empleado)
   #
   # Funcionalidad:
   # 
   #
   # Retorna: true/false o null
   #

   global $conexion;
   $datos=array();

   try{
       $consulta=$conexion->prepare("SELECT dept_emp.emp_no as numemp, dept_emp.from_date as fecha_desde, dept_emp.to_date as fecha_hasta, first_name, last_name FROM dept_emp LEFT JOIN employees ON dept_emp.emp_no=employees.emp_no WHERE dept_no=:dept_num LIMIT 25");
       $consulta->bindParam(":dept_num",$dept_num);
       $consulta->execute();
       $datos["dept_emp"]=$consulta->fetchAll(PDO::FETCH_ASSOC);

       $consulta=$conexion->prepare("SELECT dept_manager.emp_no as numemp, dept_manager.from_date as fecha_desde, dept_manager.to_date as fecha_hasta, first_name, last_name FROM dept_manager LEFT JOIN employees ON dept_manager.emp_no=employees.emp_no WHERE dept_no=:dept_num");
       $consulta->bindParam(":dept_num",$dept_num);
       $consulta->execute();
       $datos["dept_manager"]=$consulta->fetchAll(PDO::FETCH_ASSOC);
       return $datos; 
      

   } catch(PDOException $ex){
       echo "<p>Ha ocurrido un error al devolver los datos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
       return null;
   }


  }

?>