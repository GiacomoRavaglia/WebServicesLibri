<?php
	function get_price($find){
		/* $books=array(
		 "java"=>299,
		 "c"=>348,
		 "php"=>267
		 );*/
		$tmp = "book.json";
		$str = file_get_contents($tmp);
		$books = json_decode($str, true); 
		// echo '<pre>' . print_r($books, true) . '</pre>';
		/* foreach($books as $book=>$price)
		 {
			 if($book==$find)
			 {
				 return $price;
				 break;
			 }
		 }*/
		 
		 foreach($books['book'] as $book)
		 {
			 if($book['name']==$find)
			 {
				 return $book['price'];
				 break;
			 }
		 }
	 }

	 
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
		
		$orderedBooks = array_sort($books, "Discount");
		
		foreach($orderedBooks as $book)
			if($book['Discount'] != 0)
				array_push($discountedBooks, $book['name']);
			
		return "ok";
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