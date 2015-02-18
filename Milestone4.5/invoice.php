<?php 
require_once('initialize.php');


// $sql = '
// SELECT invoice_id, first_name, last_name, (quantity*price) as total
// FROM customer
// JOIN invoice ON (customer.id = invoice.customer_id)
// JOIN invoice_item ON (invoice.id = invoice_item.invoice_id)
// JOIN item ON (invoice_item.item_id = item.id)
//  '	;


 $sql = '
 SELECT customer.first_name,
 customer.last_name,
 invoice_id, 
 invoice_item.item_id,
 SUM(invoice_item.quantity * item.price) AS total 
 FROM invoice
 JOIN customer ON(customer.id = invoice.customer_id)
 JOIN invoice_item ON(invoice_item.invoice_id = invoice.id)
 JOIN item ON(item.id = invoice_item.item_id)
 GROUP BY invoice_id
 ';



// Make a PDO statement
$statement = DB::prepare($sql);

// Execute
DB::execute($statement);


// Get all the results of the statement into an array
$results = $statement->fetchAll();

$trows = '';
// Loop array to get each row
foreach ($results as $row) {
 	$trows .= '<tr><td>' 
 	  . $row['invoice_id'] 
 	  . '</td><td>' 
 	  . $row['first_name'] . ' ' . $row['last_name'] 
 	  . '</td><td>' 
      . $row['total'] 
      . '</td><td>' 
      . '<a href="/invoiceDetails.php/?invoice_id=' . $row['invoice_id'] . '">Details</a></td></tr>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Invoices</title>
</head>
<body>
 <a href="/">Home</a>
 <h1>Invoices</h1>
 <table border="1">
 	<tr>
 	<th>#</th>
 	<th>Customer Name</th>
 	<th>Total</th>
 	<th>Details</th> 
 	</tr>
 	<?php echo $trows; ?>
 </table>
</body>
</html>

