<?php
/**
 * @since: 29/03/2023
 * generated by Amimul Ahsan
 *
 */
/**
 * this is get all the employees records
 */

header( "Access-Control-Allow-Origin: *" );
header( "Content-Type: application/json; charset=UTF-8" );

include_once '../config/database.php';
include_once '../models/Employee.php';
$database  = new Database();
$db        = $database->getConnection();
$items     = new Employee( $db );
$stmt      = $items->getEmployees();
$itemCount = $stmt->rowCount();

//echo json_encode( $itemCount );
if ( $itemCount > 0 ) {

	$employeeArr              = array();
	$employeeArr["body"]      = array();
	$employeeArr["itemCount"] = $itemCount;
	while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
		extract( $row );
		$e = array(
			"id"          => $row['id'],
			"name"        => $row['name'],
			"email"       => $row['email'],
			"age"         => $row['age'],
			"designation" => $row['designation'],
			"phone"     => $row['phone']
		);
		array_push( $employeeArr["body"], $e );
	}
	http_response_code( 200 );
	echo json_encode( $employeeArr );
} else {
	http_response_code( 404 );
	echo json_encode(
		array( "message" => "No record found." )
	);
}