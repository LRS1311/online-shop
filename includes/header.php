<!--HEADER WEB-->
<div id="header-web">
	<!--advertisement-->
	<div class="ad"><a href=""><img src="img/ad1.jpg"></a></div>
	<div class="header">
		<div id="header-1">
			<!--logo-->
			<div id="logo"><a href="index.php"><img src="img/logo.svg"></a></div>
			<!--work time-->
			<div class="work-time">
				<div>24/7</div>&nbsp;
				<div><img src="img/clock3.png"></div>
				<span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span><span>S</span>
			</div>
		</div>
		<div id="header-2">
			<!--site sections menu-->
			<nav>
				<ul>
					<li><a href="about.php">About</a></li>
					<li><a href="payment.php">Payment</a></li>
					<li><a href="shipping.php">Shipping & delivery</a></li>
					<li><a href="catalog.php">Catalog</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="deals.php">Deals</a></li>
					<li><a href="contacts.php">Contacts</a></li>
					<!--order status button-->
					<li id="order-status"><a href="order-status.php"><img src="img/bunny.png">&nbsp;Order Status</a></li>
				</ul>
			</nav>
			<div id="search-connection">
				<!--search form-->
				<div id="search">
					<form action="search.php?q=" method="GET">
						<p>
							<input type="text" name="q" placeholder=" Search" id="input-search">
							<button type="submit" id="button-search"><img src="img/search.png"></button>
						</p>
					</form>
				</div>
				<div class="connection">
					<!--phone number-->
					<div>
						<a href=""><img src="img/phone.png">+7 (000) 000 00 00</a>
					</div>
					<!--back call-->
					<span><a href="">request a call back</a></span>
					<!--email-->
					<div class="email"><a href=""><img src="img/e-mail.png"> emailemail@mail.ru</a></div>
				</div>
			</div>
		</div>
		<div id="header-3">
			<!--personal area-->
			<table class="like-icons">
				<tr>
					<!--viewed-->
					<td align="center"><a href=""><span class="header-counter">0</span><img src="img/view.png"></a></td>
					<!--favorites-->
					<td align="center"><a href=""><span class="header-counter">0</span><img src="img/like.png"></a></td>
				</tr>
				<tr>
					<!--selected for comparison-->
					<td align="center"><a href=""><span class="header-counter">0</span><img src="img/compare.png"></a></td>
					<!--shopping basket-->
					<td align="center" id="block-basket"><a href=""><span class="header-counter">0</span><img src="img/cart.png"></a></td>
				</tr>
				<!--log in-->
				<tr id="log-in">
					<?php
        				if ($_SESSION['auth'] == "yes_auth") {
        					echo '
								<td colspan="2" align="center" class="auth-user">
									<a href="javascript:void(0);"><img src="img/user.png">&nbsp;'.$_SESSION["auth_first_name"].'</a>
					<div class="auth-user-menu">
        				<span class="white-corn"><img src="img/white-corner.png" alt=""></span>
        				<ul style="color: black;">
        					<li><a href="profile.php" class="reg-user-href" style="color:black;">Profile</a></li>
        					<li><a href="javascript:void(0);" class="reg-user-href logout" style="color:black;">Exit</a></li>
        				</ul>
        			</div> 
								</td>

        					';
        				} else {
        					echo '
								<td colspan="2" align="center" data-toggle="modal" data-target="#exampleModalLong">
									<a href="javascript:void(0);"><img src="img/user.png">&nbsp;Log in</a> 
								</td>
        					';
        				}
        			?>
					<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  						<div class="modal-dialog" role="document">
    						<div class="modal-content">
      							<div class="modal-body">
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          								<span aria-hidden="true">&times;</span>
        							</button>
        							<div id="login-header">
                                        <p align="center">
                                        	<span class="auth-title auth-reg-choise auth-reg-hide">Authorization</span>
                                        	<span class="reg-title auth-reg-hide">Registration</span>
                                        	<span class="remind-title auth-reg-choise">Password recovery</span>
                                        </p>
                                    </div>
        							<div class="login-block lg-su">
        								<p><form action="" method="POST">
        									<div>
        								 		<ul id="input-login-pass" style="color: black;"> 
        								 			<p id="message-auth" style="color: black;">Invalid login or(and) password !</p>
        								 			<li><input type="text" class="form-control" name="auth_login" id="auth_login" placeholder="Login or email"></li>
        								 			<li id="pass-auth"><input type="password" class="form-control" name="auth_pass" id="auth_pass" placeholder="Password"><span class="but-pass-show-hide"><img src="img/eye-close.png" alt=""></span></li>
        								 			<ul id="list-auth">
        								 				<li><input type="checkbox" name="remember_me" id="remember-me"><label for="remember-me">&nbsp;Remember me</label></li>
        								 				<li class="forgot-pass"><p><a id="remind-pass" href="javascript:void(0);">Forgot password ?</a></p></li>
        								 			</ul>
        								 		</ul>
        								 	</div>
        								 	<div class="but-block">
        								 		<button type="button" class="btn btn-primary lg-su-but" id="but_auth" name="but_auth">Log in</button>
        								 		<div class="spinner-grow text-primary auth-loading" role="status">
  	                                            	<span class="sr-only">Loading...</span>
												</div>
        								 	</div>
           								</form></p>
        							</div>
        							<div class="block-remind lg-su">
        								<p id="message-remind"></p>
        								<p><input type="text" id="remind-email" class="form-control"  placeholder="Your email"></p>
        								<div class="but-block-remind">
        									<p id="prev-auth"><a href="javascript:void(0);">Go back</p>
        									<button type="button" class="btn btn-primary lg-su-but" id="but_remind" name="but_remind">Ok</button>
        									<div class="spinner-grow text-primary auth-loading" role="status">
  	                                        	<span class="sr-only">Loading...</span>
											</div>
        								</div>
        							</div>
        							<div class="signup-block lg-su">
        								<form action="reg/handler-reg.php" method="POST" id="form-reg">
        									<p id="reg-message"></p>
        									<div id="block-form-reg">
        								 		<ul id="form-reg" style="color: black;"> 
        								 			<li><input type="email" class="form-control" name="reg_email" id="reg-email" placeholder="E-mail"></li>
               							 			<li><input type="text" class="form-control" name="reg_password" id="reg-password" placeholder="Password"><span id="genpass">Generate</span></li>
        								 			<li><input type="text" class="form-control" name="reg_first_name" id="reg-first-name" placeholder="First name"></li>
        								 			<li><input type="text" class="form-control" name="reg_last_name" id="reg-last-name" placeholder="Last name"></li>
        								 			<li><input type="phone" class="form-control" name="reg_phone_num" id="reg-phone-num" placeholder="Phone number"></li>
        								 			<li><input type="text" class="form-control" name="reg_city" id="reg-city" placeholder="City"></li>
        								 		</ul>
        								 	</div>
        								 	<div class="but-block"><button type="submit" class="btn btn-primary lg-su-but" id="reg-submit" name="reg_submit">Sign up</button></div>
        								</form>
        							</div>
      							</div>
    						</div>
  						</div>
					</div>
				</tr>
			</table>
		</div>
	</div>
	<!--brand menu-->
	<nav id="nav">
		<ul>
			<li><a href=""><img src="img/apple.png"> Apple</a></li>
			<li><a href=""><img src="img/samsung.png"> Samsung</a></li>
			<li><a href=""><img src="img/xiaomi.png"> Xiaomi</a></li>
			<li><a href=""><img src="img/huawei.png"> Huawei</a></li>
			<li><a href=""><img src="img/meizu.png"> Meizu</a></li>
			<li><a href=""><img src="img/nokia.png"> Nokia</a></li>
			<li><a href=""><img src="img/lenovo.png"> Lenovo</a></li>
			<li><a href=""><img src="img/asus.png"> ASUS</a></li>
			<li><a href=""><img src="img/lg.png"> LG</a></li>
			<li><a href=""><img src="img/sony.png"> Sony</a></li>
			<li id="else"><a>Else <img src="img/arr-down.png"></a>
				<ul>
					<li><a href=""><img src="img/htc.png"> HTC</a></li>
					<li><a href=""><img src="img/philips.png"> Phillips</a></li>
					<li><a href=""><img src="img/fly.png"> Fly</a></li>
					<li id="viewall"><a href=""><img src="img/icon.png"> View all</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<!--HEADER MOB-->
<div id="header-mob">
	<div id="header-mob-lv-1">
		<!--logo mob-->
		<div id="logo-mob"><a href=""><img src="img/logo.svg"></a></div>
		<!--menu icon mob-->
		<div id="menu-icon"><img src="img/menu.png" class="menu-icon"></div>
	</div>
	<!--wrapped menu mob-->
	<div id="wrap-menu">
		<nav>
			<ul>
				<!--mob first level containing search input, contacts icon and work time icon clicking on which the second hidden level unfoldes with work time and contacts-->
				<li id="first-list-con-wt-search">
					<div id="connection-work-time-search">
						<div id="connection-work-time-icons">
							<!--mob contacts icon opening line with work time and contacts-->
							<div><img src="img/phone.png"></div>
							<!--mob work time icon opening line with work time and contacts-->
							<div><img src="img/clock3.png"></div>
						</div>
						<!--search form mob-->
						<div id="search-mob">
							<form action="" method="">
								<p>
									<input type="search" name="" placeholder=" Search">
									<button type="submit" id=""><img src="img/search.png"></button>
								</p>
							</form>
						</div>
					</div>
				</li>
				<!--mob second wrapped level containing work time and contacts-->
				<li id="connection-work-time">
					<div class="work-time">
						<div>24/7</div>&nbsp;
						<div><img src="img/clock3.png"></div>
						<span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span><span>S</span>
					</div>
					<div class="connection">
						<div>
							<a href=""><img src="img/phone.png">+7 (000) 000 00 00</a>
						</div>
						<span><a href="">request a call back</a></span>
					</div>
					<div class="email"><a href=""><img src="img/e-mail.png"> emailemail@mail.ru</a></div>
				</li>
				<!--order status mob-->
				<li id="order-status"><a href=""><img src="img/bunny.png">&nbsp;Order Status</a></li>
				<!--site sections menu mob-->
				<li><a href="">About</a></li>
				<li><a href="">Payment</a></li>
				<li><a href="">Shipping & delivery</a></li>
				<li><a href="">Catalog</a></li>
				<li><a href="">News</a></li>
				<li><a href="">Deals</a></li>
				<li><a href="">Contacts</a></li>
			</ul>
		</nav>
	</div>
	<!--catalog icon mob-->
	<div id="header-mob-lv-2" class="catalog">
		<p align="center"> Catalog </p>
	</div>
	<!--wrapped catalog brand menu mob-->
	<div id="wrap-catalog">
		<nav>
			<ul>
				<li id="all"><a href=""><img src="img/icon.png"> All categories</a></li>
				<li><a href=""><img src="img/apple.png"> Apple</a></li>
				<li><a href=""><img src="img/samsung.png"> Samsung</a></li>
				<li><a href=""><img src="img/xiaomi.png"> Xiaomi</a></li>
				<li><a href=""><img src="img/huawei.png"> Huawei</a></li>
				<li><a href=""><img src="img/meizu.png"> Meizu</a></li>
				<li><a href=""><img src="img/nokia.png"> Nokia</a></li>
				<li><a href=""><img src="img/lenovo.png"> Lenovo</a></li>
				<li><a href=""><img src="img/asus.png"> ASUS</a></li>
				<li><a href=""><img src="img/lg.png"> LG</a></li>
				<li><a href=""><img src="img/sony.png"> Sony</a></li>
				<li><a href=""><img src="img/htc.png"> HTC</a></li>
				<li><a href=""><img src="img/philips.png"> Phillips</a></li>
				<li><a href=""><img src="img/fly.png"> Fly</a></li>
			</ul>
		</nav>
	</div>
	<!--personal area mob-->
	<div id="header-mob-lv-3">
		<table class="like-icons">
			<tr>
				<!--viewed mob-->
				<td align="center"><a href=""><span>0</span><img src="img/view.png"></a></td>
				<!--favorites mob-->
				<td align="center"><a href=""><span>0</span><img src="img/like.png"></a></td>
				<!--selected for comparison mob-->
				<td align="center"><a href=""><span>0</span><img src="img/compare.png"></a></td>
				<!--shopping basket mob-->
				<td align="center"><a href=""><span>0</span><img src="img/cart.png"></a></td>
				<!--log in mob-->
				<td colspan="2" align="center"><a href=""><img src="img/user.png">&nbsp;Log in</a></td>
			</tr>
		</table>
	</div>
</div>	