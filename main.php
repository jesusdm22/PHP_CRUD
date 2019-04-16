<?php
//----------------------------------
//Dev functions --------------------
//----------------------------------

function testConn() {
	$conn=connect();
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Error al conectar a la base de datos. " . mysqli_connect_error();
	  }

	// Perform a query, check for error
	if (!mysqli_query($conn,"INSERT INTO debug (message) VALUES ('ProbandoDB')"))
	  {
	  echo("Descripción del error:  " . mysqli_error($conn));
	  }

	mysqli_close($conn);

}


//-------------------------------
//FUNCIONES ---------------------
//-------------------------------

//Datos de la BD
$dbhost = "localhost";
$dbuser = "prueba";
$dbpwd = "prueba";
$dbname = "crudapp";
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

//Funcion para conectar a la BD
function connect() {
	return  $GLOBALS['conn'];
}

//Funcion para recuperar los datos del formulario
function  CatchFromForm() {
	$datosEmpleado = array(
		0 => $_POST['nombre'],
		1 => $_POST['sede'],
		2 => $_POST['dpto']
	);

	return $datosEmpleado;
}

//Funcion para recuperar los datos de la BBDD
//funcion por hacer***********
function GetFromDB() {
	$conn = connect();

	$sql = "SELECT id, nombre, sede, departamento FROM empleados";

	//La ejecutamos y cazamos los datos
	$ejecutar = $conn->query($sql);
	while ($columna = $ejecutar->fetch_assoc()) {
		echo "<tr>
				<th scope='row'>" . $columna['id'] . "</th>" .
				"<td colspan='2'>" . $columna['nombre'] . "<td>" .
				"<td colspan='2'>" . $columna['sede'] . "<td>" .
				"<td colspan='2'>" . $columna['departamento'] . "<td>" .
			  "</tr>";
	 }
}


//Funcion para crear un empleado
function SetEmpleado(){
	//1º Paso
	//Guardamos los datos del formulario en un array
	$datos = CatchFromForm();

	//Llamamos a la conexión
	$conn = connect();

	//Creamos la query
	$sql = "INSERT INTO empleados (nombre, sede, departamento)
	        VALUES ('$datos[0]', '$datos[1]', '$datos[2]')";

	if (!mysqli_query($conn,$sql)) {
		echo("Descripción del error:  " . mysqli_error($conn));
	}
}

?>
