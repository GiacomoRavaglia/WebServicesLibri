<?php
	// method for the first query
	function get_UltimiArrivi()
	{
		// local variables
		$books = json_decode(file_get_contents("dbLibri.json"), true);				// array which contains every book into the database
		$count = 0;																// variable which count how many books respect the conditions
		
		// searching
		foreach($books['book'] as $book)
			if(($book['Category'] == "Fumetti") && ($book['Subcategory'] == "Ultimi arrivi"))
				$count++;
			
		return $count;
	}
	
	// method for the second query
	function get_Discounted()
	{
		// local variables
		$books = json_decode(file_get_contents("dbLibri.json"), true);				// array which contains every book into the database
		$discountedBooks = array();												// array which contains only the discounted books
		
		// searching
		foreach($books['book'] as $book)
			if($book['Discount'] != "0")
				$discountedBooks[$book['Title']] = " ".$book['Discount'];
			
		// array sorting by discount
		asort($discountedBooks);
		
		return $discountedBooks;
	}
	
	// method for the third query
	function get_FromDate($firstDate, $secondDate)
	{
		// local variables
		$books = json_decode(file_get_contents("dbLibri.json"), true);			// array which contains every book into the database
		$verifiedBooks = array();												// array which contains only the books stored between the two dates
		$startDate = new DateTime($firstDate);									// the start date
		$endDate = new DateTime($secondDate);									// the end date
		
		// searching
		foreach($books['book'] as $book)
		{
			$currentDate = new DateTime($book['StorageDate']);
			
			if(date_diff($startDate, $currentDate)->format('%R%a') > 0)
				if ((date_diff($startDate, $currentDate)->format('%R%a')) <= (date_diff($startDate, $endDate)->format('%R%a')))
					array_push($verifiedBooks, $book['Title']);
		}

		return implode("#", $verifiedBooks);
	}
	
	// method for the fourth query
	function get_Cart($cartCode)
	{
		// local arrays
		$users = json_decode(file_get_contents("dbUsers.json"), true);			// array which contains every book into the database	
		$result = array();														// array which contains the books contained into the cart
		$convertedResult = array();												// array which contains the converted the result
		
		// seaching the correct user and the cart
		foreach($users as $user)
			if($user['Id'] == $cartCode)
			{
				array_push($convertedResult, $user['Email']);

				foreach($user['Cart'] as $book)
					array_push($result, array("Title" => getTitle($book['BookId']), "Amount" => $book['Amount']));
			}
		
		// conversion of array into string
		foreach($result as $book)
			array_push($convertedResult, implode("-", $book));
			
		return implode("#", $convertedResult);
	}
	
	// method that return the book's title from the book's id
	function getTitle($bookId)
	{
		$books = json_decode(file_get_contents("dbLibri.json"), true);			// array which contains every book into the database
		
		foreach($books['book'] as $book)
			if($book['Id'] == $bookId)
				return $book['Title'];
			
		return "Not found";
	}
?>