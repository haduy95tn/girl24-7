<?php include('functions.php') ?>

<!doctype html>
<html>
<head>
<title>Signup-KHV</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="SHORTCUT ICON" href="images/favicon.ico">
<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<!-- /fonts -->
<!-- css -->
<link href="css/font-awesomes.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/styles.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css -->
</head>
<body>
<h1 class="w3ls">Girl For You Signup Form</h1>
<div class="content-w3ls">
	<div class="content-agile1">
		<h2 class="agileits1">Girl 24/7</h2>
		<p class="agileits2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	</div>
	<div class="content-agile2">
			<form method="post" action="register.php">

				<?php echo display_error(); ?>

			<div class="form-control w3layouts"> 
				<input type="text" id="firstname" name="username" value="<?php echo $username; ?>" placeholder="Username" title="Please enter your Username" required="">
			</div>

			<div class="form-control w3layouts">	
				<input type="text" id="email" name="part" placeholder="Part" title="Please enter a valid Part" required="">
			</div>

			<div class="form-control agileinfo">	
				<input type="password" class="lock" name="password_1" placeholder="Password" id="password1" required="">
			</div>	

			<div class="form-control agileinfo">	
				<input type="password" class="lock" name="password_2" placeholder="Confirm Password" id="password2" required="">
			</div>			
			
			<input type="submit"  name="register_btn" class="register" value="Register">
		</form>
		<script type="text/javascript">
			window.onload = function () {
				document.getElementById("password1").onchange = validatePassword;
				document.getElementById("password2").onchange = validatePassword;
			}
			function validatePassword(){
				var pass2=document.getElementById("password2").value;
				var pass1=document.getElementById("password1").value;
				if(pass1!=pass2)
					document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				else
					document.getElementById("password2").setCustomValidity('');	 
					//empty string means no validation error
			}
		</script>
	</div>
	<div class="clear"></div>
</div>
<p class="copyright w3l">© 2020 Girl 24/7 Signup Form. All Rights Reserved | Design by Duy - IT .Need support, please contact hotline 0399203074 or 113. Already a member? |_| <a href="index.php">Sign in</a></p>
</body>
</html>