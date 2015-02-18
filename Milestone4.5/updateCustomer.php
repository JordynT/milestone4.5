<?php
require_once('initialize.php');


$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$id = $_POST['id'];

if(isset($_POST['first_name'])) {
	$first = $_POST['first_name'];
}
if(isset($_POST['last_name'])) {
	$last = $_POST['last_name'];
}
if(isset($_POST['email'])) {
	$email = $_POST['email'];
}
if(isset($_POST['gender'])) {
	$gender = $_POST['gender'];
}
if(isset($_POST['id'])) {
	$id = $_POST['id'];
}


//Mysql command
	$update = '
	UPDATE customer 
	SET first_name = :first,
	last_name = :last,
	email = :email,
	gender = :g
	WHERE id = :id
	';

	//make a PDO
	$update_statement = DB::prepare($update);


	$update_values = [
		':first' => $first,
		':last' => $last,
		':email' => $email,
		':g' => $gender,
		':id' => $id
	];

	//Execute
	DB::execute($update_statement, $update_values);

	//Redirect
	header('Location: /customers.php');
	exit();


	
