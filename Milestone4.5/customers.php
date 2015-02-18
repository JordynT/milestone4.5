<?php
require('initialize.php');


$query = new CustomerModel;

$results = $query->GetCustomer();

$trows ='';

// Loop array to get each row
foreach ($results as $row) {
	$trows .= '<tr><td>' . $row['first_name'] . ' ' . 
	$row['last_name'] .'</td><td><a href="/insertNewInvoice.php/?id=' . $row['id'] . '">New Invoice</a></td>' . 
	'<td><a href="/editCustomer.php/?id=' . $row['id'] . '">Edit</a></td>' . 
	'<td><a href="/removeCustomer.php/?id=' . $row['id'] . '">Remove</a></td></tr>';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="/">Home</a>
	<h1>Customers</h1><br>
	<table border=1>
		<?php echo $trows; ?>
	</table><br>

	<a href="newCustomer.php">Add Customer</a>
</body>
</html>