<?php
/**
 * @since: 29/03/2023
 */

/**
 * @since: 29/03/2023
 */
/**
 * set the request header
 */
header( "Access-Control-Allow-Origin: *" );
header( "Content-Type: application/json; charset=UTF-8" );
header( "Access-Control-Allow-Methods: DELETE" );

header( "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With" );
/**
 * read single employee record api
 */

include_once '../config/database.php';
include_once '../models/Employee.php';
$database = new Database();
$db       = $database->getConnection();
$item     = new Employee( $db );


$item->id = isset( $_GET['id'] ) ? $_GET['id'] : die();

$item->deleteEmployee();
if ( $item != null ) {

	http_response_code( 200 );
	echo json_encode( "Employee deleted successfully");
} else {
	http_response_code( 404 );
	echo json_encode( "Employee not found." );
}
