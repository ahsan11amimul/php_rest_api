<?php
/**
 * @since: 29/03/2023
 */

header( "Access-Control-Allow-Origin: *" );
header( "Content-Type: application/json; charset=UTF-8" );
header( "Access-Control-Allow-Methods: POST" );
header( "Access-Control-Max-Age: 3600" );
header( "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With" );

include_once '../config/database.php';
include_once '../models/Employee.php';

$database = new Database();
$db       = $database->getConnection();
$item = new Employee( $db );

$data = json_decode( file_get_contents( "php://input" ) );
//print_r($data);


// employee values
$item->id = $data->id;
$item->name        = $data->name;
$item->email       = $data->email;
$item->age         = $data->age;
$item->designation = $data->designation;
$item->phone     =   $data->phone;

if ( $item->updateEmployee() ) {
	http_response_code( 200 );
	echo json_encode( "Employee data updated." );
} else {
	echo json_encode( "Data could not be updated" );
}
