<?php

include_once('altemp_model.php');
/* function imprimirCesta()
{

    # Función 'mostrarEmpleado'.
    # Parámetros:
    # 	- (ninguno)
    #
    # Funcionalidad:
    # Imprime la cesta de los empleados
    #
    # Retorna: none
    #
    $cesta = $_SESSION["cesta"];
    echo'<table border="1">
    <tr>
      <th>Nombre</th><th>Apellidos</th><th>Código Empleado</th>
      <th>Nacimiento</th><th>Cargo</th><th>Salario</th>
      <th>Género</th><th>Departamento</th>
    </tr>';

    foreach ($cesta as $empleado) {
        echo '<tr>
             <td>'.$empleado["nombre"].'</td>
             <td>'.$empleado["apellidos"].'</td>
             <td>'.$empleado["nuevoNum"].'</td>
             <td>'.$empleado["nacimiento"].'</td>
             <td>'.$empleado["cargo"].'</td>
             <td>'.$empleado["salario"].'</td>
             <td>'.$empleado["genero"].'</td>
             <td>'.$empleado["dpto"]["dept_name"].'</td>
            
          </tr>';
    }
    echo '</table>';
} */

function altaMasivaEmpleados(){

    # Función 'altaMasivaEmpleados'.
    # Parámetros:
    # 	- (ninguno)
    #
    # Funcionalidad:
    # Insertar todos los empleados de la cesta
    #
    # Retorna: none
    #
    global $conexion;
    $cesta = $_SESSION["cesta"];
    $fecha=date("Y-m-d");
    
        try {

         foreach ($cesta as $empleado) {
             $conexion->beginTransaction();

             $insertar = $conexion->prepare("INSERT INTO employees (emp_no,birth_date,first_name,last_name,gender,hire_date) 
        VALUES (:nuevoNum,:nacimiento,:nombre,:apellidos,:genero,:fecha)");
             $insertar->bindParam(':nuevoNum', $empleado["nuevoNum"]);
             $insertar->bindParam(':nacimiento', $empleado["nacimiento"]);
             $insertar->bindParam(':nombre', $empleado["nombre"]);
             $insertar->bindParam(':apellidos', $empleado["apellidos"]);
             $insertar->bindParam(':genero', $empleado["genero"]);
             $insertar->bindParam(':fecha', $fecha);
             $insertar->execute();

             $conexion->commit();
             /*  echo "<p style='color:grey;'>Se ha dado de alta en la tabla employees</p>"; */
             $boolsalario=altaEmpleadoTablas($empleado["salario"], $empleado["nuevoNum"], "salaries", "salary");
             $boolcargo=altaEmpleadoTablas($empleado["cargo"], $empleado["nuevoNum"], "titles", "title");
             $booldpto_emp=altaEmpleadoTablas($empleado["dpto"]["dept_no"], $empleado["nuevoNum"], "dept_emp", "dept_no");
         }

            return $boolsalario &&  $boolcargo && $booldpto_emp;
        } catch (PDOException $ex) {
            echo "<p>Ha ocurrido un error al intentar dar de alta aste empleado: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
            $conexion->rollBack();
            return false;
        }
    }

