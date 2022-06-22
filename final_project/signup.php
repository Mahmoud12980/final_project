<?php
include 'server.php';
if(isset($_SESSION['username']))
{
	if($_SESSION['role'] =='dr')
	{
		header('location: instructor.php');
	}
	else
	{
		header('Location: Student.php');
	}

}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Smart University</title>
	<link rel="shortcut icon" href="/images/icon.png" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css'>
</head>

<body class="is-preload">
	<div id="page-wrapper">
		<header id="header">
			<h1 id="logo"><a href="index.html"> <i class="fas fa-house-laptop"></i> VS University</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.php"> <i class="fa fa-home"></i> Home</a></li>
					<li><a href="index.php#four"> <i class="fa fa-envelope"></i> Contact Us</a></li>
					<li><a href="signin.php" class="button primary"> <i class="fas fa-sign-in-alt"></i> Sign In</a>
					</li>
				</ul>
			</nav>
		</header>

		<div class="container ">
			<section id="bg">
				<center>
					<h3 id="h3">Sign Up</h3>
				</center>
				<form action="signup.php" id="signUp" class="form" method="post">
				<?php include 'errors.php';?>

					<div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-xsmall">
							<!-- userNameF -->
							<input type="text" name="fname" id="userNameF" placeholder="First Name" />
						</div>
						<div class="col-6 col-12-xsmall">
							<!-- userNameS -->
							<input type="text" name="lname" id="userNameS" placeholder="Last Name" />
						</div>
						<div class="col-6">
							<!-- jop -->
							<select name="sign_as" id="jop">
								<option value="">- Job -</option>
								<option value="Instructor">Instructor</option>
								<option value="Student">Student</option>
							</select>
						</div>
						<div class="col-6">
							<!-- gender -->
							<select name="gender" id="gender">
								<option value="">- Gender -</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>

						<div class="col-12 col-12-xsmall">
							<!-- email -->
							<input type="email" name="email" id="email" placeholder="Email" />
						</div>
						<div class="col-6 col-12-xsmall">
							<!-- userName -->
							<input type="text" name="username" id="userName" placeholder="User Name" />
						</div>
						<div class="col-6 col-12-xsmall">
							<!-- phone -->
							<input type="text" name="phone" id="phone" placeholder="Phone number" />
						</div>
						<div class="col-6 col-12-xsmall" id="show_hide_password">
							<div class="col-6 col-12-xsmall">
								<!-- password -->
								<input type="password" name="password" id="password" placeholder="Password" />
								<a href="" id="spass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
							</div>
						</div>
						<div class="col-6 col-12-xsmall" id="show_hide_cpassword">
							<div class="col-6 col-12-xsmall">
								<!-- cPass -->
								<input type="password" name="conpassword" id="ConPassword" placeholder="ConPassword" />
								<a href="" id="spass"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
							</div>
						</div>

						<div class="col-12">
							<!-- level -->
							<select name="level" id="gender">
								<option value="">- Level for student -</option>
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
							</select>
						</div>
						<div class="col-12" id="actions">
							<ul class="actions">
								<!-- submit -->
								<li><input type="submit" name="reg_user" value="Register" class="primary"></li>
								<!-- reset -->
								<li><input type="reset" value="Reset" /></li>
							</ul>
						</div>
					</div>
				</form>
			</section>
		</div>








		<script src="scripts/Signup.js" defer></script>
		<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
		<script src='https://use.fontawesome.com/b9bdbd120a.js'></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

</body>

</html>