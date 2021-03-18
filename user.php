<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="home.css" type="text/css">
	<link rel="SHORTCUT ICON" href="css/image/favicon.ico">
</head>
<body>
	<div id="logo">
        	<a href="#"> <img src="image/KHVATEC.png" alt=""></a>    
    	</div>
	<div class="header">
		
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>_</i>
						<i  style="color: #888;"><?php echo ucfirst($_SESSION['user']['part']); ?>)</i>  
						<br>
						<a href="user.php?logout='1'" style="color: red;">logout</a>
					</small>
				<?php endif ?>
			</div>
					<div id="list_job">
			<h3>Menu</h3><br>
			<a href="sign.php" target="_blank">Sign Visitor</a>
		</div>
		</div>

	</div>
</body>
</html>