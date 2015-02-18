<?php
require_once('initialize.php');


$sql = "
SELECT *
FROM item
WHERE id = :id
";

$statement = DB::prepare($sql);

$sql_values = [
	':id' => $_GET['id'] ];

DB::execute($statement, $sql_values);

$results = $statement->fetchAll();

	$input = '';
foreach($results as $row) {
	$input .= '<div><input type="text" name="id" value="' . $row['id'] . '" hidden></div><div>Item Name: <input type="text" name="name" value="' . $row['name'] . '">
	</div><div>Item Price: <input type="text" name="price" value="' . $row['price'] . '"></div>';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>Edit Item</h1>
<form method="POST" action="/updateItem.php">
	<?php echo $input  ;?><br>
	<button>Update</button>
	<a href="/items.php">cancel</a>
</form>
	
</body>
</html>