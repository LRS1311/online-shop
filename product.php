<?php 
    include ("db-connect.php");
    session_start();
    include ("reg/auth-cookie.php");
?>
<!DOCTYPE html>
<html>
<head>
    <!--meta-->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="author" content="Ivanova L.V.">
  	<meta name="date" content="Apr 10 2019 14:45 GMT+5">
  	<meta name="description" content=" ">
  	<meta name="keywords" content=" ">
    <!--title-->
    <title>Product</title>
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

    <!--SECTION 1-->
        <!--PRODUCT BLOCK-->
    		<div id="product-section" class="section">
            <!--IMAGE-->
            <div id="product-img">
                <!--small images-->
                <div id="img-crop">
                    <div class="img-crop-block"><img src="img/product/1.1.jpg" alt="" class="img-crop" id="img1"></div>
                    <div class="img-crop-block"><img src="img/product/1.2.jpg" alt="" class="img-crop" id="img2"></div>
                    <div class="img-crop-block"><img src="img/product/1.3.jpg" alt="" class="img-crop" id="img3"></div>
                </div>
                <!--large image-->
                <div id="img">
                    <img src="img/product/1.1.jpg" alt="" id="img-large" class="img-large">
                </div>
            </div> 
            <!--IMAGE-->

        <!--product block-->
            <div id="product-desc">
                <?php
                $product = mysqli_query ($connection, "SELECT * FROM products");
                $prod = mysqli_fetch_assoc ($product) ?>
                <!--title-->
                <p class="title"><b><?php echo $prod['title']; ?></b></p>
                <!--rating-->
                <p>
                    <span class="product-star-rating"><img src="img/star.svg"></span>
                    <span class="product-star-rating"><img src="img/star.svg"></span>
                    <span class="product-star-rating"><img src="img/star.svg"></span>
                    <span class="product-star-rating"><img src="img/star.svg"></span>
                    <span class="product-star-rating"><img src="img/star-empty.svg"></span>
                </p>
                <!--description-->
                <p class="desc"><?php echo $prod['mini-features']; ?></p>
                <div id="count-availability">
                    <!--quantity-->
                    <div class="count">
                        <p>Quantity:
                        <span>-</span>
                        <span>1</span>
                        <span>+</span>
                        </p>
                    </div>
                    <!--availability-->
                    <div class="product-availability <?php echo $prod['availability']; ?>">
                        <span><?php echo $prod['availability-value']; ?></span>
                    </div>
                </div>
                <div class="product-price-like">
                    <!--price-->
                    <div class="product-price">Price: <span><?php echo $prod['price']; ?></span> rub.</div> 
                    <div class="like-match">
                        <!--add to favorites-->
                        <span class="one"><img src="img/heart.png"></span>
                        <!--add for comparison-->
                        <span class="one-2"><img src="img/compare-empty.png"></span>
                    </div>
                </div> 
                <!--buy button--> 
                <div class="buy-button" id="buy-button"><button>Buy</button></div>  
            </div>
        <!--product block-->
        </div> 
        <!--PRODUCT BLOCK-->
    <!--SECTION 1-->

    <!--SECTION 2-->
        <!--RECOMMEND - OWL CAROUSEL-->
        <section>
            <h4>Recommend:</h4><br>
            <div class="owl-carousel owl-theme owl-loaded"> 
                <div class="owl-stage-outer">
                    <!--block--> 
                    <div class="owl-stage">
                        <?php
                        $product = mysqli_query ($connection, "SELECT * FROM products");
                        while ($prod = mysqli_fetch_assoc ($product)) { ?> 
                        <div class="owl-item"> 
                            <div>
                                <a href="">
                                    <!--image-->
                                    <img src=img/<?php echo $prod['img']; ?> alt=""><br>
                                    <!--title-->
                                    <p><?php echo $prod['title']; ?></p>
                                </a>
                            </div>  
                        </div>  
                        <?php } ?>
                    </div> 
                    <!--block-->
                </div> 
            </div>
        </section>
        <!--RECOMMEND - OWL CAROUSEL-->
    <!--SECTION 2-->

    <!--SECTION 3-->
        <!--PRODUCT INFORMATION-->
        <section>
            <h4>Product information:</h4><br>
                <!--tab sections-->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active offers" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h6>Description</h6></a>
                        <a class="nav-item nav-link offers" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h6>Specifications</h6></a>
                        <a class="nav-item nav-link offers" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><h6>Reviwes <span>(0)</span></h6></a>
                    </div>
                </nav>
                <!--tab sections-->
                <div class="tab-content offers-block" id="nav-tabContent">
                    <!--tab description-->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  
                        <?php
                        $product = mysqli_query ($connection, "SELECT * FROM products WHERE id = 1");
                        $prod = mysqli_fetch_assoc ($product) ?>  
                        <p><?php echo $prod['mini-features']; ?></p>               
                    </div>
                    <!--tab specifications-->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php
                        $product = mysqli_query ($connection, "SELECT * FROM products WHERE id = 1");
                        $prod = mysqli_fetch_assoc ($product) ?>  
                        <p><?php echo $prod['mini-features']; ?></p>
                    </div>
                    <!--tab viewes-->
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <?php
                        $product = mysqli_query ($connection, "SELECT * FROM products WHERE id = 1");
                        $prod = mysqli_fetch_assoc ($product) ?>  
                        <p><?php echo $prod['mini-features']; ?></p>                     
                    </div>
                </div>
        </section>
        <!--PRODUCT INFORMATION-->
    <!--SECTION 3-->

    <!--SECTION 4-->
        <!--SIMILAR GOODS - OWL CAROUSEL-->
        <section>
            <h4>Similar goods:</h4><br>                          
            <div class="owl-carousel owl-theme owl-loaded"> 
                <div class="owl-stage-outer">
                    <!--block--> 
                    <div class="owl-stage"> 
                        <?php
                        $product = mysqli_query ($connection, "SELECT * FROM products WHERE id != 5");
                        while ($prod = mysqli_fetch_assoc ($product)) { ?> 
                        <div class="owl-item"> 
                            <div>
                                <a href="">
                                    <!--image-->
                                    <img src=img/<?php echo $prod['img']; ?> alt=""><br>
                                    <!--title-->
                                    <p><?php echo $prod['title']; ?></p>
                                </a>
                            </div>  
                        </div>  
                        <?php } ?>
                    </div> 
                    <!--block-->
                </div> 
            </div>    
        </section>
        <!--SIMILAR GOODS - OWL CAROUSEL-->
    <!--SECTION 4-->

    <!--SECTION 5-->
        <!--LOOKED - OWL CAROUSEL-->
        <section>
            <h4>You looked:</h4><br>
            <div class="owl-carousel owl-theme owl-loaded"> 
                <div class="owl-stage-outer"> 
                    <!--block-->
                    <div class="owl-stage"> 
                        <?php
                        $product = mysqli_query ($connection, "SELECT * FROM products WHERE availability = 'in-stock'");
                        while ($prod = mysqli_fetch_assoc ($product)) { ?> 
                        <div class="owl-item"> 
                            <div>
                                <a href="">
                                    <!--image-->
                                    <img src=img/<?php echo $prod['img']; ?> alt=""><br>
                                    <!--title-->
                                    <p><?php echo $prod['title']; ?></p>
                                </a>
                            </div>  
                        </div>  
                        <?php } ?>
                    </div> 
                    <!--block-->
                </div> 
            </div>
        </section>
        <!--LOOKED - OWL CAROUSEL-->
    <!--SECTION 5-->
  	</main>
	  <footer>
		    <?php include("includes/footer.php"); ?>
	  </footer>
</body>
<!--own js-->
<script src="script.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function(){ 

        /*activates owl carousel. items - sets the number of slides per page*/
        $(".owl-carousel").owlCarousel({items:6}); 

    });

</script>
</html>