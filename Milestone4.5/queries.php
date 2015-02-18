<?php 




class CustomerModel {


	public function GetCustomer(){

	$sql =  "
	SELECT *
	FROM customer
	";

	//Make PDO statement
	$statement = DB::prepare($sql);

	//Execute
	DB::execute($statement);

	//Get all the results into an array
	$results = $statement->fetchAll();

	$items = [];

	foreach($results as $key => $row) {
		$items[$key] = $row;
	}
	return $items;

	}

}






class ItemModel {


	public function GetItem() {
		//sql statement
		$sql = "
		SELECT *
		FROM item
		";

		//make PDO statement
		$statement = DB::prepare($sql);

		//Execute
		DB::execute($statement);

		// Get all the results of the statement into an array
		$results = $statement->fetchAll();

		$items =[];

		foreach($results as $key => $row) {
			$items[$key] = $row;
		}
		return $items;

	}

}

// $sql = '';

// $items= [];

// foreach ($results as $row) {
// 	$items[] = $row;
// }
// return $items;

