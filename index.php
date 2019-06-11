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
	<meta name="date" content="Mar 28 2019 12:13 GMT+5">
	<meta name="description" content=" ">
	<meta name="keywords" content=" ">
	<!--title-->
	<title>Home</title>
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
	<!--SECTION 1-->
		<!--CAROUSEL-->
		<div class="bd-example">
  			<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  				<!--indicators-->
    			<ol class="carousel-indicators">
      				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<!--first slide-->
				  	<div class="carousel-item active">
				      	<img src="img/1.jpeg" class="d-block w-100" alt="...">
				       	<div class="carousel-caption d-none d-md-block">
				          	<h5>First slide label</h5>
				          	<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				       	</div>
				   	</div>
				   	<!--second slide-->
				   	<div class="carousel-item">
				       	<img src="img/2.jpg" class="d-block w-100" alt="...">
			        	<div class="carousel-caption d-none d-md-block">
			          		<h5>Second slide label</h5>
			          		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			        	</div>
				    </div>
				    <!--third slide-->
				    <div class="carousel-item">
				        <img src="img/3.jpg" class="d-block w-100" alt="...">
				        <div class="carousel-caption d-none d-md-block">
				          	<h5>Third slide label</h5>
				          	<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
				        </div>
				    </div>
				</div>
				<!--previous - left arrow-->
    			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
      				<span class="sr-only">Previous</span>
    			</a>
    			<!--next - right arrow-->
    			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
  			</div>
		</div>
		<!--CAROUSEL-->
	<!--SECTION 1-->

	<!--SECTION 2-->
		<!--CATEGORIES-->
		<div class="section" id="categories">
			<div class="cat-lv-1" id="cat-1">
				<div class="cat-lv-2">
					<!--categoty 1-->
					<div class="cat">
						<a href="">
							<img src="img/ex.jpg">
							<div class="cat-name">Category 1</div>
						</a>
					</div>
					<!--categoty 2-->
					<div class="cat">
						<a href="">
							<img src="img/ex.jpg">
							<div class="cat-name">Category 2</div>
						</a>
					</div>
				</div>
				<div class="cat-lv-2">
					<!--categoty 3-->
					<div class="cat">
						<a href="">
							<img src="img/ex.jpg">
							<div class="cat-name">Category 3</div>
						</a>
					</div>
					<!--categoty 4-->
					<div class="cat">
						<a href="">
							<img src="img/ex.jpg">
							<div class="cat-name">Category 4</div>
						</a>
					</div>
				</div>
			</div>
			<div class="cat-lv-1" id="cat-2">
				<div class="cat-lv-2">
					<!--categoty 5-->
					<div class="cat">
						<a href="">
							<img src="img/ex.jpg">
							<div class="cat-name">Category 5</div>
						</a>
					</div>
					<!--categoty 6-->
					<div class="cat">
						<a href="">
							<img src="img/ex.jpg">
							<div class="cat-name">Category 6</div>
						</a>
					</div>
				</div>
				<div class="cat-lv-2">
					<!--categoty 7-->
					<div class="cat">
						<a href="">
							<img src="img/ex.jpg">
							<div class="cat-name">Category 7</div>
						</a>
					</div>
					<!--categoty 8-->
					<div class="cat">
						<a href="">
							<img src="img/ex.jpg">
							<div class="cat-name">Category 8</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--CATEGORIES-->
	<!--SECTION 2-->

	<!--SECTION 3-->
		<!--OFFERS-->
		<section>
			<!--tab sections-->
			<nav>
  				<div class="nav nav-tabs" id="nav-tab" role="tablist">
    				<a class="nav-item nav-link active offers" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h6>New</h6></a>
    				<a class="nav-item nav-link offers" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h6>Popular</h6></a>
    				<a class="nav-item nav-link offers" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><h6>Discounts</h6></a>
  				</div>
			</nav>
			<!--tab sections-->
			<div class="tab-content offers-block" id="nav-tabContent">
				<!--tab new-->
  				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  				<!--product block-->
  					<div class="row">
          				<?php
                  		$product = mysqli_query ($connection, "SELECT * FROM products WHERE new = 1");
                  		while ($prod = mysqli_fetch_assoc ($product)) { ?>  
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

  				<!--tab popular-->
  				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  				<!--product block-->
  					<div class="row">
  		  				<?php
                  		$product = mysqli_query ($connection, "SELECT * FROM products WHERE leader = 1");
                  		while ($prod = mysqli_fetch_assoc ($product)) { ?>  
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

  				<!--tab discounts-->
  				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  				<!--product block-->
  					<div class="row">
  						<?php
                  		$product = mysqli_query ($connection, "SELECT * FROM products WHERE sale = 1");
                  		while ($prod = mysqli_fetch_assoc ($product)) { ?>  
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
			</div>
		</section>
		<!--OFFERS-->
	<!--SECTION 3-->

	<!--SECTION 4-->
		<!--NEWS-->
		<section>
			<h3 align="center">News</h3>
			<div id="news">
				<?php
				$news = mysqli_query ($connection, 'SELECT * FROM news ORDER BY news_date DESC LIMIT 3');
				while ($n = mysqli_fetch_assoc ($news)) { ?>
				<!--news block-->
				<div class="news-block">
					<a href="">
						<div class="date"><img src="img/clock3.png"><time><?php echo $n['news_date'];?></time></div>
						<img src=img/<?php echo $n['img'];?> id="news-img">
						<div class="news-desc-block">
							<h6><?php echo $n['title'];?></h6>
							<p><?php echo $n['text'];?></p>
						</div>
					</a>
				</div>
				<? } ?>
			</div>
		</section>
		<!--NEWS-->
	<!--SECTION 4-->

	<!--SECTION 5-->
		<!--BRANDS - OWL CAROUSEL-->
		<section>
			<div class="brand-slider">
				<h3 align="center">Brands</h3>
				<div class="owl-carousel owl-theme owl-loaded"> 
					<div class="owl-stage-outer"> 
						<div class="owl-stage"> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/apple.png" alt=""></a></div>  
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/samsung.png" alt=""></a></div>
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/vivo.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/xiaomi.png" alt=""></a></div> 
							</div>
							<div class="owl-item"> 
								<div><a href=""><img src="img/meizu.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/huawei.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/nokia.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/lenovo.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/asus.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/lg.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/philips.png" alt=""></a></div>
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/htc.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/sony.png" alt=""></a></div> 
							</div> 
							<div class="owl-item"> 
								<div><a href=""><img src="img/fly.png" alt=""></a></div> 
							</div> 
						</div> 
					</div> 
				</div>
			</div>
		</section>
		<!--BRANDS - OWL CAROUSEL-->
	<!--SECTION 5-->
	</main>
	<footer>
		<?php include("includes/footer.php"); ?>
	</footer>
</body>
<!--own js-->
<script src="script.js" type="text/javascript"></script>
<script type="text/javascript">
	
	/*activates owl carousel. items - sets the number of slides per page*/
	$(document).ready(function(){ 
        $(".owl-carousel").owlCarousel({items:10}); 
    });

</script>
</html>