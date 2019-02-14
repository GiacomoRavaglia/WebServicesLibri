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
				deliver_response(200, "Operation completed", get_UltimiArrivi());
				break;
				
			case 2:
				// TO DO FIX 
				//deliver_response(200, "Operation completed", get_Discounted());
				break;
				
			case 3:					
				deliver_response(200, "Operation completed", get_FromDate($_GET['d1'], $_GET['d2']));
				break;
				
			case 4:
				$code = $_GET['code'];
				$result = get_Cart($code);
				
				$books = $result['Cart'];
							
				deliver_response(200, "Operation completed", implode("-", $books));
				break;
				
			default:
					break;
		}
	}
	else
	{
		//throw invalid request
		deliver_response(400,"Invalid request", NULL);
	}
	
	function deliver_response($status, $status_message, $data)
	{
		header("HTTP/1.1 $status $status_message");
		$response['data']=$data;
		
		$json_response=json_encode($response);
		echo $json_response;
	}

?>