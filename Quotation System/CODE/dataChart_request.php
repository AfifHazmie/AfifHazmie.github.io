<?php

//TABLE DATA 
$connect = new PDO("mysql:host=localhost;dbname=qms", "vtektmx1g1n3", "Powerec123");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$query = "SELECT r_servicestatus, COUNT(request_id) AS Total FROM request GROUP BY r_servicestatus";
		$result = $connect->query($query);
		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'r_servicestatus'	=>	$row["r_servicestatus"],
				'total'				=>	$row["Total"],
				'color'				=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data);
	}
}


?>