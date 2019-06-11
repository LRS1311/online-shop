<?php 
    
    session_start();
    if ($_SESSION['auth'] == "yes_auth") {

    include ("db-connect.php");
    include ("functions/functions.php");
    $passy = "gykdncn";
    $emaily = "jkdvjsdvd@mail,ru";
    if ($_POST['edit_submit']) {
        $_POST['edit_first_name'] = clear_string($_POST['edit_first_name']);
        $_POST['edit_last_name'] = clear_string($_POST['edit_last_name']);
        $_POST['edit_email'] = clear_string($_POST['edit_email']);
        $_POST['edit_phone_num'] = clear_string($_POST['edit_phone_num']);
        $_POST['edit_city'] = clear_string($_POST['edit_city']);
        $_POST['edit_address'] = clear_string($_POST['edit_address']);

            if (strlen($_POST['edit_first_name']) < 3 || strlen($_POST['edit_first_name']) > 15) {
                $error[] = "Specify name from 3 to 15 characters!";
            }
            if (strlen($_POST['edit_last_name']) < 3 || strlen($_POST['edit_last_name']) > 15) {
                $error[] = "Specify surname from 3 to 15 characters!";
            }
            if (strlen($_POST['edit_email']) == 0) {
                $error[] = "Specify email!";
            }
            if (strlen($_POST['edit_phone_num']) == 0) {
                $error[] = "Specify phone number!";
            }
            if (strlen($_POST['edit_city']) == 0) {
                $error[] = "Specify city!";
            }
            if (strlen($_POST['edit_address']) == 0) {
                $error[] = "Specify address!";
            }
        if (count($error)) {
            $_SESSION['msg'] = '<p align="left" id="form-error">'.implode('<br>', $error).'</p>';
        } else {
            $_SESSION['msg'] = '<p align="left" id="form-success">Data saved successfully!</p>';
            $dataquery = "first_name = '".$_POST['edit_first_name']."', last_name = '".$_POST['edit_last_name']."', email = '".$_POST['edit_email']."', phone_number = '".$_POST['edit_phone_number']."', city = '".$_POST['edit_city']."'";
            $update = mysqli_query ($connection, "UPDATE reg_user SET first_name = '$passy' WHERE email = '$emaily'");
            $_SESSION['auth_first_name'] = $_POST['edit_first_name'];
            $_SESSION['auth_last_name'] = $_POST['edit_last_name'];
            $_SESSION['auth_login'] = $_POST['edit_email'];
            $_SESSION['auth_phone_number'] = $_POST['edit_phone_number'];
            $_SESSION['auth_city'] = $_POST['edit_city'];
            $_SESSION['auth_address'] = $_POST['edit_address'];
        }
    }
    /*if ($_POST['edit_submit']) {
        $_POST['edit_first_name'] = clear_string($_POST['edit_first_name']);
        $_POST['edit_last_name'] = clear_string($_POST['edit_last_name']);
        $_POST['edit_email'] = clear_string($_POST['edit_email']);
        $_POST['edit_phone_num'] = clear_string($_POST['edit_phone_num']);
        $_POST['edit_city'] = clear_string($_POST['edit_city']);
        $_POST['edit_address'] = clear_string($_POST['edit_address']);

        $error = array();
        $pass = md5(clear_string($_POST["previous_password"]));
        $pass = strrev($pass);
        $pass = strtolower("9nm2rv8q".$pass."2yo6z");
        if ($_SESSION['auth_pass'] != $pass) {
            $error[] = "Invalid current password!";
        } else {
            if ($_POST['edit_password'] != "") {
                if (strlen($_POST['edit_password']) < 7 || strlen($_POST['edit_password']) > 15) {
                    $error[] = "Specify a new password from 7 to 15 characters!";
                } else {
                    $newpass = md5(clear_string($_POST["edit_password"]));
                    $newpass = strrev($newpass);
                    $newpass = strtolower("9nm2rv8q".$newpass."2yo6z");
                    $newpassquery = "password = '".$newpass."', ";
                }
            }
            if (strlen($_POST['edit_first_name']) < 3 || strlen($_POST['edit_first_name']) > 15) {
                $error[] = "Specify name from 3 to 15 characters!";
            }
            if (strlen($_POST['edit_last_name']) < 3 || strlen($_POST['edit_last_name']) > 15) {
                $error[] = "Specify surname from 3 to 15 characters!";
            }
            if (strlen($_POST['edit_email']) == 0) {
                $error[] = "Specify email!";
            }
            if (strlen($_POST['edit_phone_num']) == 0) {
                $error[] = "Specify phone number!";
            }
            if (strlen($_POST['edit_city']) == 0) {
                $error[] = "Specify city!";
            }
            if (strlen($_POST['edit_address']) == 0) {
                $error[] = "Specify address!";
            }
        }
        if (count($error)) {
            $_SESSION['msg'] = '<p align="left" id="form-error">'.implode('<br>', $error).'</p>';
        } else {
            $_SESSION['msg'] = '<p align="left" id="form-success">Data saved successfully!</p>';
            $dataquery = $newpassquery."first_name = '".$_POST['edit_first_name']."', last_name = '".$_POST['edit_last_name']."', email = '".$_POST['edit_email']."', phone_number = '".$_POST['edit_phone_number']."', city = '".$_POST['edit_city']."'";
            $update = mysqli_query($connection, "UPDATE reg_user SET $dataquery WHERE email = '($_SESSION['auth_email'])'");
            if ($newpass) {$_SESSION['auth_pass'] = $newpass;}
            $_SESSION['auth_first_name'] = $_POST['edit_first_name'];
            $_SESSION['auth_last_name'] = $_POST['edit_last_name'];
            $_SESSION['auth_login'] = $_POST['edit_email'];
            $_SESSION['auth_phone_number'] = $_POST['edit_phone_number'];
            $_SESSION['auth_city'] = $_POST['edit_city'];
            $_SESSION['auth_address'] = $_POST['edit_address'];
        }
    }*/

?>
<!DOCTYPE html>
<html>
<head>
    <!--meta-->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="author" content="Ivanova L.V.">
  	<meta name="date" content="Apr 29 2019 14:34 GMT+5">
  	<meta name="description" content=" ">
  	<meta name="keywords" content=" ">
    <!--title-->
    <title>Profile</title>
    <!--favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!--bootstrap & jquery-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--cookie-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <!--owlcarousel-->
    <link rel="stylesheet" href="script/owlcarousel/assets/owl.carousel.min.css"> 
    <link rel="stylesheet" href="script/owlcarousel/assets/owl.theme.default.min.css"> 
    <script src="script/owlcarousel/owl.carousel.min.js"></script>
    <!--trackbar-->
    <link rel="stylesheet" type="text/css" href="trackbar/trackbar.css">
    <script src="trackbar/trackbar.js" type="text/javascript"></script>
    <!--form validation-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js" integrity="sha256-LddDRH6iUPqbp3x9ClMVGkVEvZTrIemrY613shJ/Jgw=" crossorigin="anonymous"></script>
    <!--own css-->
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	  <header>
		    <?php include("includes/header.php"); ?>
	  </header>
	  <main>
    <!--BREAD CRUMBS-->
		    <div class="bread-crumbs section">
			      <ul>
        				<li><a href=""><img src="img/home.png"></a></li>
        				<li class="bc-arr"><a href="">></a></li>
        				<li><a href="">Profile</a></li>
        				<li class="bc-arr"><a href="">></a></li>
        				<li><a href="">My orders</a></li>
			      </ul>
		    </div>
    <!--BREAD CRUMBS-->
    
    <!--CATALOG-->
		    <div class="product-container">
        <!--FILTERS-->
                <div class="filters section section-color">
        <p class="filters-section">Profile</p>
        <ul>
            <!--href="javascript:void(0);" - ???-->
            <li><a href="javascript:void(0);" id="mobile-index-1"><img src="img/mobile.png" alt="" class="cat-image">My orders</a>
            </li>
            <li><a href="javascript:void(0);" id="mobile-index-2"><img src="img/mobile.png" alt="" class="cat-image">Order status</a>
            </li>
            <li><a href="javascript:void(0);" id="tablet-index-3"><img src="img/tablet.png" alt="" class="cat-image">Edit profile</a>
            </li>
            <li><a href="javascript:void(0);" id="laptop-index-4"><img src="img/laptop.png" alt="" class="cat-image">Change password</a>
            </li>
            <li><a href="javascript:void(0);" id="laptop-index-5" class="logout"><img src="img/laptop.png" alt="" class="cat-image">Exit</a>
            </li>
        </ul>
    </div>
        <!--FILTERS-->
			      <div class="blocks-container" id="bc">
				    <div class="sorting section section-color">
                        <h3 align="center">Edit profile</h3>
                    </div>

            <!--PRODUCTS BLOCKS-->
            		<div class="blocks section">
                        <div id="my-orders-section"></div>
                        <div id="order-status-section"></div>
                        <div id="edit-profile-section lg-su">
                            <p><form action="" method="POST">
                                <h5>Total information</h5>
                                <p id="msg" style="color: red;"></p>
                                <div>
                                    <ul class="edit-info" style="color: black;"> 
                                        <li><input type="text" class="form-control" name="edit_first_name" id="edit_first_name" placeholder="First name" value=<?php echo $_SESSION["auth_first_name"];?>></li>
                                        <li><input type="text" class="form-control" name="edit_last_name" id="edit_last_name" placeholder="Last name" value=<?php echo $_SESSION["auth_last_name"];?>></li>
                                        <hr>
                                        <li><input type="email" class="form-control" name="edit_email" id="edit_email" placeholder="E-mail" value=<?php echo $_SESSION["auth_login"];?>></li>
                                        <li><input type="phone" class="form-control" name="edit_phone_num" id="edit_phone_num" placeholder="Phone number" value=<?php echo $_SESSION["auth_phone_number"];?>></li>
                                        <hr>
                                        <li><input type="text" class="form-control" name="edit_city" id="edit_city" placeholder="City" value=<?php echo $_SESSION["auth_city"];?>></li>
                                        <li><textarea type="text" class="form-control" name="edit_address" id="edit_address" placeholder="Address" value=<?php echo $_SESSION["auth_address"];?>></textarea></li>
                                    </ul>
                                </div>
                                <div><button type="submit" class="btn btn-primary lg-su-but" id="edit_submit" name="edit_submit">Save</button></div>
                            </form></p>
                            <br>
                            <p><form action="" method="POST" id="">
                                <h5 id="change-pass-title">Change password</h5>
                                <p id="" style="color: red;"></p>
                                <div id="">
                                    <ul class="edit-info" style="color: black;"> 
                                        <li><input type="text" class="form-control" name="previous_password" id="previous_password" placeholder="Current password"></li>
                                        <li><input type="text" class="form-control" name="edit_password" id="edit_password" placeholder="New password"><span id="genpass">Generate</span></li>
                                    </ul>
                                </div>
                                <div><button type="submit" class="btn btn-primary lg-su-but" id="edit_pass_submit" name="edit_pass_submit">Save</button></div>
                            </form></p>
                        </div>
                    </div>
            <!--PRODUCTS BLOCKS-->

			      </div>
		    </div>
    <!--CATALOG-->
	  </main>
	  <footer>
		    <?php include("includes/footer.php"); ?>
	  </footer>
</body>
<!--own js-->
<script src="script.js" type="text/javascript"></script>
<script type="text/javascript">



</script>
</html>
<?php 
} else { header("location:index.php"); }
?>