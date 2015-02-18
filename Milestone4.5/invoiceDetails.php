<?php
require_once('initialize.php');

$invoice_id = '';
if(isset($_GET['invoice_id'])) {
	$invoice_id = $_GET['invoice_id'];
} else {
	echo "no id given";
}

$sql = '
SELECT item.name, price, quantity, (quantity*price) as total, invoice_item.invoice_id as invoice_id, invoice_item.item_id as item_id
FROM invoice_item
JOIN item ON(item.id = invoice_item.item_id)
WHERE invoice_id = :ID
';

$sql_values = [
	':ID' => $invoice_id	
];	
	

// Make a PDO statement
$statement = DB::prepare($sql);

// Execute
DB::execute($statement, $sql_values);

// Get all the results of the statement into an array
$results = $statement->fetchAll();

// Loop array to get each row
$trows = '';
$sum =0;
foreach ($results as $row) {
$sum += $row['total'];
$trows .= '</tr><td>' . $row['quantity'] . '</td><td>' . $row['name'] . '</td><td>' .
$row['price'] . '</td><td>' . $row['total'] . '</td><td><a href="/removeInvoiceItem.php?item_id=' . $row['item_id'] . '&invoice_id=' . $row['invoice_id']. '">Remove</a></td></tr>';
};



$query = new ItemModel;
$options = $query->GetItem();

$items = '';
foreach($options as $option) {
	$items .= '<option value="' . $option['id'] . '">' . $option['name'] . '</option>';
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="/">Home</a>
	<h1>Invoice Details</h1><br>
	<table border=1>
	<tr>
		<th>Quantity</th>
		<th>Item</th>
		<th>Price</th>
		<th>Sub-total</th>
		<th>Remove</th>
	</tr>
		<?php echo $trows; ?>
		<td></td>
		<td></td>
		<td><strong>Total</strong></td>
		<td><?php echo $sum; ?></td>
	</table><br>

	<form action="/deleteExistingInvoiceItem.php" method="POST">
		Quantity: <input type="number" min="0" name="quantity" REQUIRED>
		<select name="item_id">

			<?php echo $items;?>

		</select>
		<button>Add</button>
		<input type="hidden" name="invoice_id" value="<?php echo $_GET['invoice_id'];?>">
	</form>
</body>
</html>