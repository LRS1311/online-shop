<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include ("../db-connect.php");
		include ("../functions/functions.php");
		$email = clear_string($_POST["email"]);
		$pass = md5(clear_string($_POST["pass"]));
		$pass = strrev($pass);
		$pass = strtolower("9nm2rv8q".$pass."2yo6z");
		if ($_POST["rememberme"] == "yes") {
			setcookie('rememberme', $email.'+'.$pass, time()+3600*24*31, "/");
		}
		$result = mysqli_query($connection, "SELECT * FROM reg_user WHERE email = '$email' AND password = '$pass'");
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			session_start();
			$_SESSION['auth'] = "yes_auth";
			$_SESSION['auth_pass'] = $row['pass'];
			$_SESSION['auth_email'] = $row['email'];
			$_SESSION['auth_first_name'] = $row['first_name'];
			$_SESSION['auth_last_name'] = $row['last_name'];
			$_SESSION['auth_phone_number'] = $row['phone_number'];
			$_SESSION['auth_city'] = $row['city'];
			$_SESSION['auth_address'] = $row['address'];
			echo "yes_auth";
		} else {
			echo "no_auth";
		}
	}
?>