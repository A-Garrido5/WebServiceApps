<?php
 

	$response = array();

	require_once __DIR__ . '/db_connect.php';

	 
	// connecting to db

	$db = new DB_CONNECT();
	 
	// include db connect class

	$method = $_SERVER['REQUEST_METHOD'];

	if($method=='POST'){
		$nombre = $_POST["nombre"]; 
		$riesgoPermisos = $_POST["riesgoPermisos"]; 
		$riesgoEncriptacion = $_POST["riesgoEncriptacion"]; 
		$riesgoPublicidad = $_POST["riesgoPublicidad"]; 
		$riesgoTotal = $_POST["riesgoTotal"]; 



		$sql = "INSERT INTO lista_apps (Name,riesgoPermisos,riesgoEncriptacion,riesgoPublicidad,riesgoTotal)
		VALUES ('". $nombre ."','". $riesgoPermisos . "','" . $riesgoEncriptacion . "','" . $riesgoPublicidad . "','" . $riesgoTotal . "')";

		echo $sql;

		$consulta = mysql_query($sql);

		$response["nombre"] = array();

		while ($row = mysql_fetch_array($result)) {
			$product = array();
			$product["nombre"] = $row["nombre"];

			array_push($response["nombre"], $product);
		}


		$response["success"] = 1;

		echo json_encode($response["nombre"]);
	}

	else{

		$response["success"] = 0;

		echo json_encode($response["success"]);

	}


	
?>