<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign - Girl For You</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<link rel="SHORTCUT ICON" href="images/favicon.ico">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
				
		<div class="submit-agileits">
			<form action="./sign.php" method="">
				<input type="submit" value="Sign Visitor" >
			</form>
		</div>
		<!--header-->
		<div class="header-w3l">
			<h1>Login Form</h1>

		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>Fill out the form below to login</h2>
							<form action="index.php" method="post">
									<?php echo display_error(); ?>
								<div class="form-sub-w3">
									<input type="text" name="username" placeholder="Username " required="" />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="password" placeholder="Password" required="" />
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
								</div>
								<label class="anim">
								<input type="checkbox" class="checkbox">
									<span>Remember Me</span> 
								</label> 
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="submit" name="login_btn" value="Login"><br>

								</div><br>
								<p>
									Not yet a member? <a href="register.php">Sign up</a>
								</p>
							</form>


						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<<p class="copyright w3l">© 2020 Girl 24/7 Signup Form. All Rights Reserved | Design by Duy - IT .Need support, please contact hotline 0399203074 or 113. </p>
		</div>
		<!--//footer-->
</body>
</html>