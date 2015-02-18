<?php

require_once('initialize.php');


$insert = '
	INSERT into item (name, price) values (:name, :price)
	';
$insert_statement = DB::prepare($insert);
DB::execute($insert_statement, [
	':name' =>$_POST['name'],
	':price' =>$_POST['price']
	]);
header('Location: /items.php');
exit();