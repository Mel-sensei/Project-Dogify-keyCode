<?php

include "config.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);
$message = array();

$name = $data['name']; 
$image = 	$data['image'];
$address = 	$data['address'];
$email = 	$data['email'];
$fb_acc = 	$data['fb_acc'];
$other_sm =	$data['other_sm'];
$username = $data['username']; 
$password = $data['password']; 




$query = mysqli_query($con ,"INSERT INTO `user_table` (`name`,`image`,`address`,`email`,`fb_acc`,`other_sm`,`username`,`password`) 
										  VALUES(`$name`,`$image`,`$address`,`$email`,`$fb_acc`,`$other_sm`,`$username`,`$password`) ");

	if($query){
		http_response_code(201);
		$message['status'] = "Success";
	}else{
		http_response_code(422);
		$message['status'] = "Error";
	}


	echo json_decode($message);
	echo mysqli_error($con);

?>