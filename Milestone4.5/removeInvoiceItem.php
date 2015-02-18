<?php 
require_once('initialize.php');

$invoice_id = '';
$item_id = '';

if(isset($_GET['invoice_id'])) {
	$invoice_id = $_GET['invoice_id'];
}
if(isset($_GET['item_id'])) {
	$item_id = $_GET['item_id'];
}

//SQL statement
$sql = "
		DELETE
		FROM invoice_item
		WHERE invoice_id = :invoice_id
		AND item_id = :item_id
		";

$delete_values = [
	':invoice_id' => $invoice_id,
	':item_id' => $item_id
	];

//make a PDO statement
$statement = DB::prepare($sql);

//Execute
DB::execute($statement, $delete_values);


//Reroute
header("Location: invoiceDetails.php?invoice_id=" . $_GET['invoice_id']);
exit();
