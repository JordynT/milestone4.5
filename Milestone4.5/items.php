<?php 
require_once("initialize.php");


$query = new ItemModel;

$results = $query->GetItem();

$trows ='';

foreach ($results as $row) {
	$trows .= '<tr><td>' . $row['name'] . '</td><td>' . $row['price'] . 
	'</td><td><a href="editItem.php?id=' . $row['id'] . '">Edit</a></td>' . 
	'<td><a href="removeItem.php?id=' . $row['id'] . '">Remove</a>' . '</td></tr>';	
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
<h1>Items</h1>

<table border=1>
	<?php echo $trows ;?>
</table>

<a href="newItem.php">add an Item</a>
	
</body>
</html>