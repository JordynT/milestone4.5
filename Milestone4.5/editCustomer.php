<?php
require_once('initialize.php');


$id = '';

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}


$sql = "
SELECT *
FROM customer
WHERE id = :id
";

$statement = DB::prepare($sql);

$sql_values = [
	':id' => $id ];

DB::execute($statement, $sql_values);

$results = $statement->fetchAll();

$inputs ='';
$male = '';
$female = '';
foreach ($results as $row) {
	$gender = $row['gender'];

	if($gender == 'male') {
		$male = 'selected';
	} else {
		$female = 'selected';
	}

	$inputs .= '<input type="text" name="id" value="' . $row['id'] . '" hidden>' . 
	'<div>First Name: <input type="text" name="first_name" value="' . $row['first_name'] . '">' . 
	'</div><div>Last Name: <input type="text" name="last_name" value="' . $row['last_name'] . '">' . 
	'</div><div>Email: <input type="text" name="email" value="' . $row['email'] . '">' . 
	'</div>Gender: <select name="gender"> <option value="male"' . $male . '>Male</option>' . 
	'<option value="female"' . $female . '>Female</option></select>';
};



// if($_SERVER['REQUEST_METHOD'] == "POST") {
// 	header('Location: updateCustomer.php?id=' .$_GET['id']. '&firstname=' . $_GET['first_name']. '&lastname=' . 
// 	$_GET['last_name'] . '&email=' . $_GET['email'] . '&gender=' . $_GET['gender'] );
// 	exit();
// };

// $first ='';
// $last = '';
// $email = '';
// $gender = '';

// if(isset($_POST['first'])) {
// 	$first = $_POST['first'];
// }
// if(isset($_POST['last'])) {
// 	$last = $_POST['last'];
// }
// if(isset($_POST['email'])) {
// 	$email = $_POST['email'];
// }
// if(isset($_POST['gender'])) {
// 	$gender = $_POST['gender'];
// }


// try {
// if($_SERVER['REQUEST_METHOD'] == "POST") {
// 	DB::init();
// 	$update = '
// 	UPDATE customer 
// 	SET first_name = ":first",
// 	last_name = ":last",
// 	email = ":email",
// 	gender = ":g"
// 	WHERE id = ":id"
// 	';
// 	$update_statement = DB::prepare($update);
// 	$update_values = [
// 		':first' => $_POST['first_name'],
// 		':last' => $_POST['last_name'],
// 		':email' => $_POST['email'],
// 		':g' =>$_POST['gender'],
// 		':id' => $_POST['id']
// 	];
// 	DB::execute($update_statement, $update_values);
// 	header('Location: /customers.php?');
// 	exit();
// 	print_r($update_values);
// } 

// } catch(Exception $e) {

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>Edit Customer</h1>
<form method="POST" action="/updateCustomer.php">
	<?php echo $inputs  ;?><br>
	<button>Update</button>
	<a href="/customers.php">cancel</a>
</form>
	
</body>
</html>


