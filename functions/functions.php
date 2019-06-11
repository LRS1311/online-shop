<?php


/*string clearing function*/
function clear_string ($cl_str) {
	$connection = mysqli_connect ('127.0.0.1', 'admin', '1', 'online-shop');
	/*strip_tags - function clears from html and php tags*/
	$cl_str = strip_tags($cl_str);
	/*mysqli_real_escape_string - function clears from special characters*/
	$cl_str = mysqli_real_escape_string($connection, $cl_str);
	/*trim - function removes spaces*/
	$cl_str = trim($cl_str);
	/*return the value*/
	return $cl_str;
}

function fungenpass () {
	$number = 7;
	$arr = array ('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','x','y','z','1','2','3','4','5','6','7','8','9','0');
	$pass = "";
	for ($i = 0; $i < $number; $i++) {
		$index = rand (0, count($arr) - 1);
		$pass .= $arr[$index];
	}
	return $pass;
}

function send_mail ($from, $to, $subject, $body) {
	$charset = "utf-8";
	mb_language("en");
	$headers = "MIME-Version: 1.0 \n";
	$headers .= "From: <".$from."> \n";
	$headers .= "Reply-To: <".$from."> \n";
	$headers .= "Content-Type: text/html; charset = $charset \n";
	$subject = "=?".$charset."?B?".base64_encode($subject)."?=";
	mail($to, $subject, $body, $headers);
}

?>