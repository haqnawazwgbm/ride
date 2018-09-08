<?php
/*if($_SERVER["REQUEST_METHOD"]=="POST"){*/
	include 'ucar_connection.php';
	showStudent();
/*}*/
function showStudent()
{
	global $connect;
	
	$mobile_no = $_POST["mobile_no"];	
	$password = $_POST["password"];
	
	$query = " Select * FROM user WHERE mobile_no = '$mobile_no' AND password = '$password'; ";
	
/*	This Query is for searching 1 AND and 2 OR operators........ It is useful in Search Rides where date must be matched and there where be OR between From and To
	$query = " Select * FROM users WHERE name = 'ali' AND (cnic='' OR mobile_no='0335'); "; */

	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0)
	{
	    while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
			
	   }
	   	$json['message'] = 'Login successful';
	            $json['status'] = true;
	
            	echo json_encode($json);
	}
	else if($number_of_rows == 0)
	{
	      $json['message'] = 'Login not successful';
	            $json['status'] = false;
	
            	echo json_encode($json);
	}
	
	header('Content-Type: application/json');
	

	
//	echo json_encode(array("students"=>$temp_array));
	mysqli_close($connect);
	
}
?>