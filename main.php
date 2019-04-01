<?php
//----------------------------------
//Dev functions --------------------
//----------------------------------

function testConn() {
	if(connect())
	echo "Conexión correcta!";
	else
	echo "No hay conexión";
}


//-------------------------------
//FUNCIONES ---------------------
//-------------------------------

//Funcion para conectar a la BD
function connect() {
	//Para la DB
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpwd = "";
	$dbname = "cms";
	$conn;

	global $dbhost, $dbuser, $dbpwd, $dbname, $conn;
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
}

//Funcion para recuperar los datos del formulario
function  CatchFromForm() {
	$datosEmpleado = array(
		'nombre' => $_POST['nombre'],
		'sede' => $_POST['sede'],
		'dpto' => $_POST['dpto']
	);

	return $datosEmpleado;
}

//Funcion para recuperar los datos de la BBDD
//funcion por hacer***********
function GetFromDB() {
	if(connect()){
		echo "Conexión correcta!";
	}
}

//----------------------------------------------------------------------
//EJECUCIÓN DEL SCRIPT -------------------------------------------------
//----------------------------------------------------------------------

//Probamos la conexión
testConn();

//Guardamos los datos del formulario en un array
$losdatos = CatchFromForm();

?>
