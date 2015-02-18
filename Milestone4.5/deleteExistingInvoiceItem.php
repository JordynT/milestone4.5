<?php
require_once('initialize.php');


$invoice_id = '';
$item_id = '';
$quantity = '';

if(isset($_POST['invoice_id']) && isset($_POST['item_id'])) {
	$invoice_id = $_POST['invoice_id'];
	$item_id = $_POST['item_id'];
	$quantity = $_POST['quantity'];


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

$statement = DB::prepare($sql);
DB::execute($statement, $delete_values);
header("Location: /insertNewInvoiceDetail.php?invoice_id=" . $invoice_id . "&item_id=" . $item_id . "&quantity=" . $quantity);
exit();
} else {
	header('Location: /invoiceDetails.php');
	exit();
}

