<?php 

require_once('initialize.php');

$insert = '
	insert into customer(first_name, last_name, email, gender) values (:first, :last, :email, :g)
	';

$insert_statement = DB::prepare($insert);

DB::execute($insert_statement, [
	':first' =>$_POST['first'],
	':last' =>$_POST['last'],
	':email' => $_POST['email'],
	':g' => $_POST['gender']
	]);
header('Location: /customers.php');
exit();




