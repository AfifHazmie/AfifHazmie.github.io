<?php

//TABLE DATA 
$connect = new PDO("mysql:host=localhost;dbname=qms", "vtektmx1g1n3", "Powerec123");
      
if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$query = "SELECT q_status, COUNT(q_no) AS Total FROM quotation GROUP BY q_status";
		$result = $connect->query($query);
		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'q_status'		=>	$row["q_status"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data);
	}
}


?>