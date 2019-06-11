<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include ("../db-connect.php");
		include ("../functions/functions.php");
		$email = clear_string($_POST["email"]);
		if ($email != "") {
			$result = mysqli_query($connection, "SELECT email FROM reg_user WHERE email = '$email'");
			if (mysqli_num_rows($result) > 0) {
				$newpass = fungenpass();
				$pass = md5($newpass);
				$pass = strrev($pass);
				$pass = strtolower("9nm2rv8q".$pass."2yo6z");
				$update = mysqli_query($connection, "UPDATE reg_user SET password = '$pass' WHERE email = '$email'");
				send_mail (
					"test@mail",
					$email,
					"New password for the site",
					"Your password: ".$newpass
				);
				echo "yes";
			} else {
				echo "This email wasn't found!";
			}
		} else {
			
		}
	}
?>