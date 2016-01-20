<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';

 
// connecting to db
$db = new DB_CONNECT();
 
// get all products from products table
$result = mysql_query("SELECT *FROM lista_apps") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["nombre"] = array();
 
    while ($row = mysql_fetch_array($result)) {
	
        // temp user array
        $product = array();
        $product["Name"] = $row["Name"];
    	$product["riesgoPermisos"] = $row["riesgoPermisos"];
    	$product["riesgoEncriptacion"] = $row["riesgoEncriptacion"];
    	$product["riesgoPublicidad"] = $row["riesgoPublicidad"];
    	$product["riesgoTotal"] = $row["riesgoTotal"];
	
		
        // push single product into final response array
        array_push($response["nombre"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>