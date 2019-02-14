<?php
	function get_UltimiArrivi()
	{
		$books = json_decode(file_get_contents("book.json"), true);
		
		$count = 0;
		
		foreach($books['book'] as $book)
			if(($book['Category'] == "fumetti") && ($book['Subcategory'] == "Ultimi arrivi"))
				$count++;
			
		return $count;
	}
	
	function get_Discounted()
	{
		$books = json_decode(file_get_contents("book.json"), true);
		$discountedBooks = array();
		
		foreach($books as $book)
			echo($book['Discount']);
		
		/*$orderedBooks = array_sort($books, 'Discount');

		foreach($orderedBooks as  $book)
			if($books["Discount"] != 0)
				array_push($discountedBooks, $book['name']);
			
		return implode(",", $discountedBooks);*/
	}
	
	function get_FromDate($firstDate, $secondDate)
	{
		$books = json_decode(file_get_contents("book.json"), true);
		$verifiedBooks = array();
		$startDate = new DateTime($firstDate);
		$endDate = new DateTime($secondDate);	
		
		foreach($books['book'] as $book)
		{
			$currentDate = new DateTime($book['StorageDate']);
			
			if(date_diff($startDate, $currentDate) <= date_diff($startDate, $endDate))
				array_push($verifiedBooks, $book['name']);
		}

		return implode("-", $verifiedBooks);
	}
	
	function get_Cart($cartCode)
	{
		$users = json_decode(file_get_contents("dbUtenti.json"), true);
		$result = array();
		
		foreach($users as $user)
		{
			if($user['Id'] == $cartCode)
			{
				array_push($result, $user['Email'], $user['Cart']);
				return $result;
			}
		}
	}
	
	
	function array_sort($array, $on, $order=SORT_ASC)
	{
		$new_array = array();
		$sortable_array = array();

		if (count($array) > 0) {
			foreach ($array as $k => $v) {
				if (is_array($v)) {
					foreach ($v as $k2 => $v2) {
						if ($k2 == $on) {
							$sortable_array[$k] = $v2;
						}
					}
				} else {
					$sortable_array[$k] = $v;
				}
			}

			switch ($order) {
				case SORT_ASC:
					asort($sortable_array);
				break;
				case SORT_DESC:
					arsort($sortable_array);
				break;
			}

			foreach ($sortable_array as $k => $v) {
				$new_array[$k] = $array[$k];
			}
		}

		return $new_array;
	}
?>