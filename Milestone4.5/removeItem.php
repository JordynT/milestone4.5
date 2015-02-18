<?php 
require_once('initialize.php');


$sql = "
		DELETE
		FROM item
		WHERE id = :id
		";

$remove_values = [
	':id' => $_GET['id']
	];

$statement = DB::prepare($sql);
DB::execute($statement, $remove_values);
header('Location: /items.php');
exit();