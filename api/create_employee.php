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
$database          = new Database();
$db                = $database->getConnection();
$item              = new Employee( $db );
$data              = json_decode( file_get_contents( "php://input" ) );
$item->name        = $data->name;
$item->email       = $data->email;
$item->age         = $data->age;
$item->designation = $data->designation;
$item->phone     =   $data->phone;

if ( $item->createEmployee() ) {
	http_response_code( 201 );
	echo 'Employee created successfully.';
} else {
	echo 'Employee could not be created.';
}
