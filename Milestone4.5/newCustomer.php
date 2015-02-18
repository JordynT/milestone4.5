	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<a href="/">Home</a>
<h1>New Customer</h1>
<form action="insertNewCustomer.php" method="POST">
	First Name: <input type="text" name="first">
	Last Name: <input type="text" name="last">
	Email: <input type="text" name="email">
	Gender: <select name="gender">
		<option value="male">Male</option>
		<option value="female">Female</option>
	</select>
	<button>Create</button>
	<a href="customers.php">Cancel</a>
</form>
	
</body>
</html>