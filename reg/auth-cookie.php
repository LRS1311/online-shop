<?php
	if ($_SESSION['auth'] != "yes_auth" && $_COOKIE['rememberme']) {
		$str = $_COOKIE['rememberme'];
		$all_len = strlen ($str);
		$email_len = strpos ($str, '+');
		$email = clear_string(substr($str, 0, $email_len));
		$pass = clear_string(substr($str, $email_len + 1, $all_len));
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
		}
	}
?>