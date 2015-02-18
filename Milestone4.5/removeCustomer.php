<?php 
require_once('initialize.php');


$sql = "
		DELETE
		FROM customer
		WHERE id = :id
		";

$remove_values = [
	':id' => $_GET['id']
	];

$statement = DB::prepare($sql);
DB::execute($statement, $remove_values);
header('Location: /customers.php');
exit();