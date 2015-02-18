<?php
require_once('initialize.php');


//Mysql command
	$update = '
	UPDATE item 
	SET name = :name,
	price = :price
	WHERE id = :id
	';

	//make a PDO
	$update_statement = DB::prepare($update);


	$update_values = [
		':name' => $_POST['name'],
		':price' => $_POST['price'],
		':id' => $_POST['id']
	];

	//Execute
	DB::execute($update_statement, $update_values);

	//Redirect
	header('Location: /items.php');
	exit();
