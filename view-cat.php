<?php 

    include ("db-connect.php");
    include ("functions/functions.php");

    session_start();
    include ("reg/auth-cookie.php");

    /*FILTERS product categories*/
    /*we get values of product category and brand from the browser string + using the function of clearing a string of unnecessary characters*/
    $cat = clear_string($_GET["cat"]);
    $type = clear_string($_GET["type"]);

    /*SORTING display of goods*/
    /*we get the value of sort from the browser string*/
    $sorting = $_GET["sort"];
    switch ($sorting) {
        /*after you have chosen the sorting this case compaires the link and the selected name and substitutes the necessary $sorting and $sort_name on the page based on the value $sort, obtained earlier*/
        case 'price-asc'; $sorting = 'price ASC'; $sort_name = 'cheap to expensive'; $sort = 'price-asc'; break;
        case 'price-desc'; $sorting = 'price DESC'; $sort_name = 'expensive to cheap'; $sort = 'price-desc'; break;
        case 'popular'; $sorting = 'count DESC'; $sort_name = 'popular'; $sort = 'popular'; break;
        case 'news'; $sorting = 'datetime DESC'; $sort_name = 'news'; $sort = 'news'; break;
        case 'brand'; $sorting = 'brand ASC'; $sort_name = 'a to z'; $sort = 'brand'; break;
        /*on the initial page sorting by id is called without sorting. $sorting substitute into the query string in the DB. $sort_name substitute into sorting block*/
        default : 
            $sorting = 'id DESC'; 
            $sort_name = 'without sorting'; 
        break;
    }
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
    <title>Catalog 2</title>
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
                        /*check if variables $cat and $type exist together*/
                        if (!empty($cat) && !empty($type)) {
                            /*if $cat and $type exist substitute $querycat into DB*/
                            $querycat = "WHERE brand = '$cat' AND type = '$type'";
                            /*$catlink substitute into the browser string to sort*/
                            $catlink = "cat=$cat&";
                        /*if variables don't exist or there's only one of them*/
                        } else {
                            /*if only $type exist substitute $querycat into DB*/
                            if (!empty($type)) {
                                $querycat = "WHERE type = '$type'";
                            /*if doesn't exist substitute empty $querycat into DB*/
                            } else {
                                $querycat = "";
                            }
                            /*if $cat exist substitute $catlink into the browser string to sort*/
                            if (!empty($cat)) {
                                $catlink = "cat = '$cat'&";
                            /*if doesn't exist substitute empty $catlink into the sorting string*/
                            } else {
                                $catlink = "";
                            }
                        }

                    /*Panavigation code*/
                        /*specify the number of displayed goods on the page*/
                        $num = 4;
                        /*get value from the browser sting*/
                        $page = (int)$_GET['page'];
                        /*using the function COUNT(*) we get the total number of goods*/
                        $count = mysqli_query ($connection, "SELECT COUNT(*) FROM products $querycat");
                        $temp = mysqli_fetch_array ($count);
                        /*and if this value is greater then 0...*/
                        if ($temp[0] > 0) {
                            $tempcount = $temp[0];
                            /*get the total number of pages*/
                            $total = (($tempcount - 1) / $num) + 1;
                            /*intval - function rounds numbers to lower value*/
                            $total = intval ($total);
                            $page = intval ($page);
                            /*if there isn't page value in the browser string or this value is less then 0 then make the page value equql to 1*/
                            if (empty($page) || $page < 0) $page = 1;
                            /*if the page value is greater then the total number of pages then make the page value equal to the total number of pages value*/
                            if ($page > $total) $page = $total;
                            /*calculate from what product to start displaying*/
                            $start = $page * $num - $num;
                            /*prepare values for a BD*/
                            $query_start_num = " LIMIT $start, $num";
                        }
                    /*Panavigation code*/

                        $product_num = mysqli_query ($connection, "SELECT * FROM products  $querycat ORDER BY $sorting");
                        $row = mysqli_num_rows($product_num);

                        $product = mysqli_query ($connection, "SELECT * FROM products $querycat ORDER BY $sorting $query_start_num");
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
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=price-asc#bc>cheap to expensive</a></li>
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=price-desc#bc>expensive to cheap</a></li>
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=popular#bc>popular</a></li>
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=news#bc>news</a></li>
                                    <li><a href=view-cat.php?<?php echo $catlink;?>type=<?php echo $type;?>&sort=brand#bc>a to z</a></li>
                                </ul>
                            </li>
                        </ul>     
                    </div>
                <!--quantity-->
              		<div class="prod-quantity"><p>Number of goods: <?php if ($start + 4 < $row) echo $start + 4; if ($start + 4 >= $row) echo $row;?>/<?php echo $row;?></p></div>
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

            <!--PAGINATION-->
                    
                    <div class="pagination section section-color pagenav">
                            <!--previous-->
                                        <?php if ($page != 1) { $pstr_prev = '<li class="page-item"><a class="page-link" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.($page - 1).'#bc" aria-label="Previous"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>' ;} ?>
                            <!--next-->
                                        <?php if ($page != $total) { $pstr_next = '<li class="page-item">
                                            <a class="page-link" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.($page + 1).'#bc" aria-label="Next"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>' ;} ?>
                            <!--pages-->
                                        <?php 
                                        
                                        if ($page - 3 > 0) $page3left = '<li class="page-item"><a class="page-link" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.($page - 3).'#bc">'.($page - 3).'</a></li>' ; 
                                        if ($page - 2 > 0) $page2left = '<li class="page-item"><a class="page-link" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.($page - 2).'#bc">'.($page - 2).'</a></li>' ;
                                        if ($page - 1 > 0) $page1left = '<li class="page-item"><a class="page-link" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.($page - 1).'#bc">'.($page - 1).'</a></li>' ; 
                                        
                                        
                                        if ($page + 3 <= $total) $page3right = '<li class="page-item"><a class="page-link" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.($page + 3).'#bc">'.($page + 3).'</a></li>' ; 
                                        if ($page + 2 <= $total) $page2right = '<li class="page-item"><a class="page-link" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.($page + 2).'#bc">'.($page + 2).'</a></li>' ; 
                                        if ($page + 1 <= $total) $page1right = '<li class="page-item"><a class="page-link" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.($page + 1).'#bc">'.($page + 1).'</a></li>' ; 

                                        if ($page + 3 > $total) {
                                            $strtotal = '<li><p class="nav-point">...</p></li><li><a href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.$total.'">'.$total.'</a></li>';
                                        } else {
                                            $strtotal = "";
                                        }
                                        if ($total > 1) {
                                            echo '<nav aria-label="Page navigation example"><ul class="pagination">'.$pstr_prev.$page3left.$page2left.$page1left.'<li class="page-item"><a class="page-link active-page" href="view-cat.php?sort='.$sort.'&cat='.$cat.'&type='.$type.'&page='.$page.'#bc">'.$page.'</a></li>'.$page1right.$page2right.$page3right.$pstr_next.'</ul></nav>';  }
                                        ?>
                                    
                            </nav>
                    </div>
                    
            <!--PAGINATION-->
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