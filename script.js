$(document).ready (function(){

/*HEADER*/
	
	/*change authorization or registration form*/
	$(".reg-title").click (function() {
		$(".reg-title").addClass ('auth-reg-choise');
		$(".auth-title").removeClass ('auth-reg-choise');
		$(".signup-block").show (300);
		$(".login-block").hide (300);
	});
	$(".auth-title").click (function() {
		$(".reg-title").removeClass ('auth-reg-choise');
		$(".auth-title").addClass ('auth-reg-choise');
		$(".signup-block").hide (300);
		$(".login-block").show (300);
	});

	/*change password mode*/
	$(".but-pass-show-hide").click (function() {
 		$(".but-pass-show-hide img").attr ('src','img/eye-open.png');
 		$("#input-login-pass #pass-auth input").attr ('type','text');
 		$(".but-pass-show-hide").click (function() {
 			$(".but-pass-show-hide img").attr ('src','img/eye-close.png');
 			$("#input-login-pass #pass-auth input").attr ('type','password');
 			$(".but-pass-show-hide").off ("click");
 		});
 	});

 	/*authorization*/
 	$("#but_auth").click (function() {
 		var auth_login = $("#auth_login").val ();
 		var auth_pass = $("#auth_pass").val ();

 		if (auth_login == "" || auth_login.length > 30) {
 			$("#auth_login").css ('borderColor', '#FDB6B6');
 			send_login = "no";
 		} else {
 			$("#auth_login").css ('borderColor', '#DBDBDB'); 
 			send_login = "yes";
 		}

 		if (auth_pass == "" || auth_pass.length > 15) {
 			$("#auth_pass").css ('borderColor', '#FDB6B6');
 			send_login = "no";
 		} else {
 			$("#auth_pass").css ('borderColor', '#DBDBDB'); 
 			send_pass = "yes";
 		}

 		if ($("#remember-me").prop('checked')) {
 			auth_rememberme = "yes";
 		} else {
 			auth_rememberme = "no";
 		}

 		if (send_login == "yes" && send_pass == "yes") {
 			$("#but_auth").hide ();
 			$(".auth-loading").show ();
 			$.ajax ({
 				type: "POST",
 				url: "reg/auth.php",
 				data: "email=" + auth_login + "&pass=" + auth_pass + "&rememberme=" + auth_rememberme,
 				dataType: "html",
 				cache: false,
 				success: function(data) {
 					if (data == "yes_auth") {
 						location.reload();
 					} else {
 						$("#messege-auth").show (400);
 						$(".auth-loading").hide ();
 						$("#but_auth").show ();
 					}
 				}
 			});
 		} 

 	});

 	/*password recovery*/
 	$("#remind-pass").click (function() {
 		$(".login-block").fadeOut (200, function() {$(".block-remind").fadeIn (300); });
 		$(".auth-reg-hide").fadeOut (200, function() {$(".remind-title").fadeIn (300); });
 	});
 	$("#prev-auth").click (function() {
 		$(".block-remind").fadeOut (200, function() {$(".login-block").fadeIn (300); });
 		$(".remind-title").fadeOut (200, function() {$(".auth-reg-hide").fadeIn (300); });
 	});
 	/*password recovery check*/
 	$("#but_remind").click (function() {
 		var recall_email = $("#remind-email").val ();
 		if (recall_email == "" || recall_email.lenth > 30) {
 			$("#remind-email").css ('borderColor', '#FDB6B6');
 		} else {
 			$("#remind-email").css ('borderColor', '#DBDBDB');
 			$("#but_remind").hide ();
 			$(".auth-loading").show ();
 			$.ajax ({
 				type: "POST",
 				url: "reg/remind-pass.php",
 				data: "email=" + recall_email,
 				dataType: "html",
 				cache: false,
 				success: function (data) {
 					if (data == "yes") {
 						$(".auth-loading").hide ();
 						$("#but_remind").show ();
 						$("#message-remind").addClass ('reg-message-good').html ("A password has been sent to your email").slideDown (400);
 						setTimeout ('$("#message-remind").html ("").hide (), $(".remind-title").hide (), $(".block-remind").hide (), $(".auth-reg-hide").show (), $(".login-block").show ()', 4000);
 					} else {
 						$(".auth-loading").hide ();
 						$("#but_remind").show ();
 						$("#message-remind").addClass ('reg-message-error').html (data).slideDown (400);
 					}
 				}
 			});
 		}
 	});


	/*generate password*/
	$("#genpass").click (function() {
		$.ajax ({
			type: "POST",
			url: "functions/genpass.php",
			dataType: "html",
			cache: false,
			success: function(data) {
				$("#reg-password").val (data);
			}
		});
	});

	/*registration*/
	$("#form-reg").validate ({
		rules: {
			"reg-email": {
				required: true,
				email: true,
				remote:{
					type: "POST",
					url: "reg/check-login.php"
				}
			},
			"reg-password": {
				required: true,
				minlength: 7,
				maxlength: 15
			},
			"reg-first-name": {
				required: true,
				minlength: 3,
				maxlength: 15
			},
			"reg-last-name": {
				required: true,
				minlength: 3,
				maxlength: 20
			},
			"reg-phone-num": {
				required: true
			},
			"reg-city": {
				required: true
			}
		},
		messages: {
			"reg-email": {
				required: "Specify your E-mail!",
				email: "Uncorrect E-mail!",
				remote: "E-mail busy!"
			},
			"reg-password": {
				required: "Specify password!",
				minlength: "From 7 to 15 characters!",
				maxlength: "From 7 to 15 characters!"
			},
			"reg-first-name": {
				required: "Specify your name!",
				minlength: "From 3 to 15 characters!",
				maxlength: "From 3 to 15 characters!"
			},
			"reg-last-name": {
				required: "Specify your surname!",
				minlength: "From 3 to 20 characters!",
				maxlength: "From 3 to 20 characters!"
			},
			"reg-phone-num": {
				required: "Specify phone number!"
			},
			"reg-city": {
				required: "Specify your city!"
			}
		},
		submitHandler: function (form) {
			$(form).ajaxSubmit ({
				success: function (data) {
					if (data == "Success!") {
						$("#block-form-reg").fadeOut (300, function () {
							$("#reg-message").addClass ("reg-message-good").fadeIn (400).html ("You are successfully registered!");
							$("#reg-submit").hide ();
						}); 
					} else {
						$("#reg-message").addClass ("reg-message-error").fadeIn (400).html (data);
					}
				}
			});
		}
	});

	/*profile*/
	$(".auth-user").hover (function() {
		$(".auth-user-menu").slideToggle (400);
	});

	/*log out*/
	$(".logout").click (function() {
		$.ajax ({
			type: "POST",
			url: "reg/log-out.php",
			dataType: "html",
			cache: false,
			success: function(data) {
				if (data == "logout") {
					location.reload();
				}
			}
		});
	});


/*HEADER MOB*/

	/*menu mob*/
	/*on click, it smoothly opens header mob SECTIONS menu and collapses it on the second click*/
	$(".menu-icon").click (function() {
		$("#wrap-menu").slideToggle (400);
	});
	/*connection and work time mob*/
	/*on click, it smoothly opens contact information and collapses it on the second click*/
	$("#connection-work-time-icons").click (function() {
		$("#connection-work-time").slideToggle (400);
	});
	/*catalog mob*/
	/*on click, it smoothly opens header mob CATALOG menu and collapses it on the second click*/
	$(".catalog").click (function() {
		$("#wrap-catalog").slideToggle (400);
	});



/*CATALOG*/

    /*product categories*/
	/*when you click on one of the categories, the menu of brands of this particular item appears, 
	and with the second click it smoothly disappears*/
	$(".filters > ul > li > a").click (function() {
		/*open the submenu*/
		/*if the pressed category doesn't have the class="active", then ...*/
		if ($(this).attr ('class') != 'active') {
			/*hide all submenus, if they're open*/
			$(".filters > ul > li > ul").slideUp (400);
			/*and at the same time open the submenu of the category that is pressed*/
			$(this).next ().slideToggle (400);
			/*remove the class="active" in all categories, if any have it*/
			$(".filters > ul > li > a").removeClass ('active');
			/*and at the same time substitute class="active" to categoty that is pressed*/
			$(this).addClass ('active');
			/*remember the user's choice in the event of a page reload, do it by id*/
			$.cookie ('select_cat', $(this).attr ('id'));
		/*close all submenus*/
		/*if the one of categiries have the class="active" ...*/
		} else {
			/*remove the class="active" in all categories, if any have it*/
			$(".filters > ul > li > a").removeClass ('active');
			/*hide all submenus, if they're open*/
			$(".filters > ul > li > ul").slideUp (400);
			/*remember the user's choice in the event of a page reload*/
			$.cookie ('select_cat', '');
		}
	});
	/**/
	if ($.cookie ('select_cat') != '') {
		$(".filters > ul > li > #"+$.cookie("select_cat")).addClass('active').next ().show ();
	}

	/*sorting*/
	/*on click, it smoothly opens sorting list and collapses it on the second click*/
	$("#select-sort").click (function() {
		$("#sorting-list").slideToggle (400);
	});


/*PRODUCT*/
	
	/*product photos*/
	/*changes the attribute of the large product image if click on one of the small */
    $(".img-crop").hover (function() {
        $("#img-large").attr('src', $(this).attr('src'));
    });

});


	