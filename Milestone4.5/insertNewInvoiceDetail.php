<?php
require_once('initialize.php');

$invoice_id = '';
$item_id = '';
$quantity = '';
if(isset($_GET['item_id'])) {
	$item_id = $_GET['item_id'];
}
if(isset($_GET['invoice_id'])) {
	$invoice_id = $_GET['invoice_id'];
}
if(isset($_GET['quantity'])) {
	$quantity = $_GET['quantity'];
}

$sql = '
	INSERT INTO invoice_item(invoice_id, item_id, quantity) VALUES (:invoice_id, :item_id, :quantity)
';
$sql_values = [
	':invoice_id' => $_GET['invoice_id'],
	':item_id' => $_GET['item_id'],
	':quantity' => $_GET['quantity']	
];

print_r($sql_values);
$statement = DB::prepare($sql);

DB::execute($statement, $sql_values);


header('Location:invoiceDetails.php?invoice_id=' . $_GET['invoice_id']);
exit();
