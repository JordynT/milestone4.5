<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<a href="/">Home</a>
<h1>New Item</h1>
<form action="insertNewItem.php" method="POST">
	Name: <input type="text" name="name">
	Price: <input type="text" name="price">
	
	<button>Add</button>
	<a href="items.php">Cancel</a>
</form>
	
</body>
</html>