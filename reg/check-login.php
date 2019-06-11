<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include ("../db-connect.php");
		include ("../functions/functions.php");
		$email = clear_string($_POST['reg_email']);
		$result = mysqli_query($connection, "SELECT email FROM reg_user WHERE email = '$email'");
		if (mysqli_num_rows($result) > 0) {
			echo 'false';
		} else {
			echo 'true';
		}
	}
?>