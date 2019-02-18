<?php
	// method for the first query
	function get_UltimiArrivi()
	{
		// local variables
		$books = json_decode(file_get_contents("book.json"), true);				// array which contains every book into the database
		$count = 0;																// variable which count how many books respect the conditions
		
		// searching
		foreach($books['book'] as $book)
			if(($book['Category'] == "fumetti") && ($book['Subcategory'] == "Ultimi arrivi"))
				$count++;
			
		return $count;
	}
	
	// method for the second query
	function get_Discounted()
	{
		// local variables
		$books = json_decode(file_get_contents("book.json"), true);				// array which contains every book into the database
		$discountedBooks = array();												// array which contains only the discounted books
		
		// searching
		foreach($books['book'] as $book)
			if($book['Discount'] != "0")
				$discountedBooks[$book['Discount']] = $book['name'];
			
		// array sorting by discount
		ksort($discountedBooks);
		
		return $discountedBooks;
	}
	
	// method for the third query
	function get_FromDate($firstDate, $secondDate)
	{
		// local variables
		$books = json_decode(file_get_contents("book.json"), true);				// array which contains every book into the database
		$verifiedBooks = array();												// array which contains only the books stored between the two dates
		$startDate = new DateTime($firstDate);									// the start date
		$endDate = new DateTime($secondDate);									// the end date
		
		// searching
		foreach($books['book'] as $book)
		{
			$currentDate = new DateTime($book['StorageDate']);
			
			if(date_diff($startDate, $currentDate) <= date_diff($startDate, $endDate))
				array_push($verifiedBooks, $book['name']);
		}

		return implode("-", $verifiedBooks);
	}
	
	// method for the fourth query
	function get_Cart($cartCode)
	{
		// local variables
		$users = json_decode(file_get_contents("dbUtenti.json"), true);			// array which contains every book into the database
		$result = array();														// array which contains all the required data
		
		// seaching the correct user and the cart
		foreach($users as $user)
		{
			if($user['Id'] == $cartCode)
			{
				$result['username'] = $user['Email'];
				
				$cart = $user['Cart'];			
			}
		}
		
		return $result;
	}
?>