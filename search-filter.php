<?php 

    include ("db-connect.php");
    include ("functions/functions.php");

    session_start();
    include ("reg/auth-cookie.php");

    /*FILTERS product categories*/
    /*we get values of product category and brand from the browser string + using the function of clearing a string of unnecessary characters*/
    $cat = clear_string($_GET["cat"]);
    $type = clear_string($_GET["type"]);

?>
<!DOCTYPE html>
<html>
<head>
    <!--meta-->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="author" content="Ivanova L.V.">
  	<meta name="date" content="Apr 04 2019 18:30 GMT+5">
  	<meta name="description" content=" ">
  	<meta name="keywords" content=" ">
    <!--title-->
    <title>Catalog 3</title>
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
        				<li><a href="">Catalog</a></li>
        				<li class="bc-arr"><a href="">></a></li>
        				<li><a href="">Xiaomi</a></li>
			      </ul>
		    </div>
    <!--BREAD CRUMBS-->
    
    <!--CATALOG-->
		    <div class="product-container">
        <!--FILTERS-->
            <?php include ("includes/filters.php"); ?>
        <!--FILTERS-->
                
                <?php
                        
                        if ($_GET["brand"]) {
                            $check_brand = implode (',', $_GET["brand"]);
                        }
                        $start_price = (int)$_GET["start_price"];
                        $end_price = (int)$_GET["end_price"];
                        if (!empty($check_brand) && !empty($end_price)) {
                            if (!empty($check_brand)) $query_brand = "WHERE brand_id IN($check_brand)";
                            if (!empty($end_price)) $query_price = "AND price BETWEEN $start_price AND $end_price";
                        }
                        if (empty($check_brand) && !empty($end_price)) {
                            if (!empty($end_price)) $query_price = "WHERE price BETWEEN $start_price AND $end_price";
                        }


                        $product = mysqli_query ($connection, "SELECT * FROM products $query_brand $query_price ORDER BY id DESC");
                        $row = mysqli_num_rows($product);
                        /*if there is at least one item...*/
                        if (mysqli_num_rows($product) > 0) { 
                        ?>  

			    <div class="blocks-container" id="bc">
				    <div class="sorting section section-color">
                <!--sorting-->
              		<div>
                        <ul>
                            <li><p>Sort by:</p></li>
                            <li id="select-sort"><?php echo $sort_name;?>
                                <!--wrapped sorting menu-->
                                <ul id="sorting-list">
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=price-asc>cheap to expensive</a></li>
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=price-desc>expensive to cheap</a></li>
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=popular>popular</a></li>
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=news>news</a></li>
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=brand>a to z</a></li>
                                </ul>
                            </li>
                        </ul>     
                    </div>
                <!--quantity-->
              		<div class="prod-quantity"><p>Number of goods: <?php echo $row;?></p></div>
                </div>

            <!--PRODUCTS BLOCKS-->
            		<div class="blocks section">
                <!--product block-->
            			<div class="row">
                        <?php 
                        /*...display goods*/
                        while ($prod = mysqli_fetch_assoc ($product)) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 product-block">
                            <a href="product.php">
                                <!--image-->
                                <img src=img/<?php echo $prod['img']; ?>>
                                <!--title-->
                                <h6><?php echo $prod['title']; ?></h6>
                            </a>
                            <div class="rating-availability">
                                <!--rating-->
                                <div class="star-rating">
                                    <span><img src="img/star.svg"></span>
                                    <span><img src="img/star.svg"></span>
                                    <span><img src="img/star.svg"></span>
                                    <span><img src="img/star.svg"></span>
                                    <span><img src="img/star-empty.svg"></span>
                                </div>
                                <!--availability-->
                                <div class="availability <?php echo $prod['availability']; ?>">
                                    <span><?php echo $prod['availability-value']; ?></span>
                                </div>
                            </div>
                            <!--hidden specifications-->
                            <p class="brief-prod-desc"><?php echo $prod['mini-features']; ?></p>
                            <div class="price-like">
                                <!--price-->
                                <div class="price">Price: <span><?php echo $prod['price']; ?></span> rub.</div> 
                                <div class="like-match">
                                    <!--add to favorites-->
                                    <span class="one"><img src="img/heart.png"></span>
                                    <!--add for comparison-->
                                    <span class="one-2"><img src="img/compare-empty.png"></span>
                                </div>
                            </div>  
                            <!--buy button-->
                            <div class="buy-button"><button>Buy</button></div>
                        </div>
                        <?php } ?>
                  	    </div>
                <!--product block-->
            		</div>
            <!--PRODUCTS BLOCKS-->

            
			      </div>
                  <!--if there is no any product, then display the next alert. moreover, if it's displayed, then the sorting field and the panavigation are hidden-->
                <?php } else {
                            echo '<div class="blocks-container"><br><h3 align="center">Category unavailable or not created !</h3><br></div>';
                        } ?>
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