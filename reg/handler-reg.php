<?php
	session_start();

	include ("../db-connect.php");
	include ("../functions/functions.php");

	$error = array();

	$email = strtolower (clear_string ($_POST['reg_email']));
	$pass = strtolower (clear_string ($_POST['reg_password']));
	$first_name = strtolower (clear_string ($_POST['reg_first_name']));
	$last_name = strtolower (clear_string ($_POST['reg_last_name']));
	$phone = strtolower (clear_string ($_POST['reg_phone_num']));
	$city = strtolower (clear_string ($_POST['reg_city']));

	if (empty($email)) {
		$error[] = "Specify email!";
	} else {
		if ($result = mysqli_query ($connection, "SELECT email FROM reg_user WHERE email = '$email'")) {
			if (mysqli_num_rows($result) > 0) {
				$error[] = "Email busy!";
			}
		}
	}
	if (strlen($pass) < 7 or strlen($pass) > 15) $error[] = "Specify password from 7 to 15 characters!";
	if (strlen($first_name) < 3 or strlen($first_name) > 20) $error[] = "Specify name from 3 to 20 characters!";
	if (strlen($last_name) < 3 or strlen($last_name) > 15) $error[] = "Specify surname from 3 to 15 characters!";
	//
	if (!$phone) $error[] = "Specify phone number!";
	if (!$city) $error[] = "You must specify the city!";
	if (count ($error)) {
		echo implode('<br>', $error);
	} else {
		$pass = md5($pass);
		$pass = strrev($pass);
		$pass = "9nm2rv8q".$pass."2yo6z";

		$ip = $_SERVER['REMOTE_ADDR'];

		mysqli_query ($connection, "INSERT INTO `reg_user` (`email`, `password`, `first_name`, `last_name`, `phone_number`, `city`, `datetime`, `ip`) VALUES ('".$email."', '".$pass."', '".$first_name."', '".$last_name."', '".$phone."', '".$city."', NOW(), '".$ip."')");

		echo "Success!";
	}
?>