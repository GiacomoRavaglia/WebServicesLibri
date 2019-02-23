<?php
// process client request (via URL)
	header ("Content-Type_application/json");
	include ("function.php");
	
	if(!empty($_GET['op']))
	{
		$operation=$_GET['op'];
		
		switch($operation)
		{
			// first query (find every books with "Fumetti" as Category and "Ultimi arrvi" as Subcategory
			case 1:
				deliver_response(get_UltimiArrivi());
				break;
				
			// second query (find every discounted books and order them)
			case 2:
				deliver_response(get_Discounted());
				break;
				
			// third query (find every books stored between two dates)
			case 3:					
				deliver_response(get_FromDate($_GET['d1'], $_GET['d2']));
				break;
				
			// fourth query(find the cart with the specified code and return the username, the books title and the copy number of each books)
			case 4:
				deliver_response(get_Cart($_GET['code']));
				break;
				
			default:
					break;
		}
	}
	else
	{
		//throw invalid request
		deliver_response("Error: no operation code entered!");
	}
	
	function deliver_response($data)
	{
		header("HTTP/1.1");
		$response=$data;
		
		$json_response=json_encode($response);
		echo $json_response;
	}

?>