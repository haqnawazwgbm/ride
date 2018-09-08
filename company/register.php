<?php
/*if($_SERVER["REQUEST_METHOD"]=="POST"){*/
	require 'connection.php';
	createStudent();
/*}*/
function createStudent()
{
	global $connect;
	
	$name = $_POST["name"];	
	$mobile_no = $_POST["mobile_no"];
	$email = $_POST["email"];
	$cnic = $_POST["cnic"];	
	$gender = $_POST["gender"];
	$password = $_POST["password"];
	$invitation_code = $_POST["invitation_code"];
	
	$query = " Insert into users(name,mobile_no,email,cnic,gender,password,invitaton_code) values('$name','$mobile_no','$email','$cnic','$gender','$password','$invitation_code');";
	
	$run_query = mysqli_query($connect, $query) or die (mysqli_error($connect));
	
//	$query_final = mysqli_query($connect, $query) or die (mysqli_error($connect));
	
	if($run_query)
	{
	    $json['message'] = 'Registration successful';
	    $json['status'] = true;
	    $json['data'] = true;
		echo json_encode($json);
	}
	else
	{
	    $json['message'] = 'Registration Failed';
	    $json['status'] = false;
	    $json['data'] = false;
	
        echo json_encode($json);
	}
	mysqli_close($connect);
	
}
?>