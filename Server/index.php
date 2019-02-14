<?php
// process client request (via URL)
	header ("Content-Type_application/json");
	include ("function.php");
	
	if(!empty($_GET['op']))
	{
		$operation=$_GET['op'];
		
		switch($operation)
		{
			case 1:
				deliver_response(200, "Operation completed", get_UltimiArrivi());
				break;
				
			case 2:
				deliver_response(200, "Operation completed", get_Discounted());
				break;
				
			case 3:
				$d1 = $_GET['d1'];
				$d2 = $_GET['d2'];
					
				deliver_response(200, "Operation completed", get_FromDate($d1, $d2));
				break;
				
			case 4:
				break;
				
			default:
					break;
		}
		//$price=get_price($name);
	/*
		if(empty($price))
		//book not found
			deliver_response(200,"book not found", NULL);
		else
			//respond book price
			deliver_response(200,"book found", $price);*/
	}
	else
	{
		//throw invalid request
		deliver_response(400,"Invalid request", NULL);
	}
	
	function deliver_response($status, $status_message, $data)
	{
		header("HTTP/1.1 $status $status_message");
		
		$response ['status']=$status;
		$response['status_message']=$status_message;
		$response['data']=$data;
		
		$json_response=json_encode($response);
		echo $json_response;
	}

?>