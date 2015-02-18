<?php

require_once('initialize.php');


$customerID = '';
if(isset($_GET['id'])) {
	$customerID = $_GET['id'];
}


//SQL statement
$insert = '
	INSERT INTO invoice (customer_id) VALUES (:cid)
';

//Create a PDO
$insert_statement = DB::prepare($insert);

$insert_values = [
	':cid' => $customerID,
	

];


//Execute
DB::execute($insert_statement, $insert_values);

$invoice_id = DB::lastInsertId();


print_r($invoice_id);

//reroute back to invoiceDetails
header('Location: /invoiceDetails.php?invoice_id=' . $invoice_id);
exit();


