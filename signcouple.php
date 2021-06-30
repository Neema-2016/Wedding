<?php
session_start();
include'include/config.php';
if(isset($_POST['send'])){

	$spouse1=$_POST['one_name'];
	$spouse2=$_POST['two_name'];
	$email=$_POST['couple_email'];
	$phone=$_POST['couple_phone'];
	$location=$_POST['couple_location'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['password2'];
	
	

	
	//validate Email Adress
	 if (empty($_POST["couple_email"])) {
    $email_err = "Email is required";
  } else {
    $email = trim($_POST["couple_email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format";
    }
    $sql2=mysqli_query($conn,"SELECT * FROM users WHERE user_email='$email' ");
		 if($sql2){
    $num_rows = mysqli_num_rows($sql2);
					if($num_rows > 0){
    $email_err ="A user account has already been registered with this email address.";
  }
  }
	 }
	
	//validate Copule names
	
	

               
    //Validate Phone Number
	
	$sql3=mysqli_query($conn,"SELECT * FROM users WHERE user_phone='$phone'");
	if($sql3){
		$numb8=mysqli_num_rows($sql3);
		if($numb8 > 0){
			$phone_err="This Phone number had been previously used to register an account.";
		}
	}
	
	//validate password
	if(empty($_POST['password'])){
		$password_err='Enter a Password';
	}else{
		if(strlen(trim($_POST["password"])) < 4){
		$password_err='Your password should be more than 4 characters';
	}elseif(($password)!=($confirmpassword)){
		$password_err='Passwords do not Match';
	}else{
		$password=trim($_POST['password']);
	} 
	}
	
	//v
                 
           
	//
	if(empty($email_err)&&(empty($phone_err))&&(empty($phone_err)) && (empty($password_err))){
	 
	
	$sql=mysqli_query($conn,"INSERT INTO couples (spouse_one,spouse_two,couple_email,couple_phone,couple_location) VALUES('$spouse1','$spouse2','$email','$phone','$location')");
		$sql2=mysqli_query($conn,"INSERT into users (user_name,user_email,user_phone,user_location,role,password) VALUES ('$spouse1','$email','$phone','$location','Couple','$password')");
		
	if($sql && $sql2){
		
	//Send Mail to verify Email Adress
		/*
$email_from = 'rigiggz98@gmail.com';   // sender address
$email_subject = "VERIFICATION OF EMAIL ACCOUNT";
$email_body = "Dear $name,\n Thank you for signing up with Merime events. Use this  One Time Password  $otp  , to create a password to your account\n
Click the link below to create your login credentials:\n
https://localhost/vendorsignup.php\n".
    
$to = "To: $email \n";// receiving addresss
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
//Send the email!
$y=mail($to,$email_subject,$email_body,$headers);*/
 echo '<script type="text/javascript">'; 
    echo 'alert("SignUp was succesful.");'; 
    echo '</script>';
}
 
	
	}else{
	
    
            
              echo '<script type="text/javascript">'; 
    echo 'alert("An Error occured during submision: '."$phone_err".' '."$email_err".' '."$password_err".' '."$phone_err".'");'; 
    echo '</script>';       

   
		
	}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Merime Events</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: Day - v4.1.0
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Top Bar ======= -->
	<section id="topbar" class="d-flex align-items-center">
		<div class="container d-flex justify-content-center justify-content-md-between">
			<div class="contact-info d-flex align-items-center">
				<i class="bi bi-envelope-fill"></i><a href="mailto:contactus@merime.com">contactus@merimesolutions.com</a>
				<i class="bi bi-phone-fill phone-icon"></i><a href="tel: +254757414345">+254757414345</a>
			</div>
			<div class="social-links d-none d-md-block">
				<a href="" class="twitter"><i class="bi bi-twitter"></i></a>
				<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
				<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
				<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
			</div>
		</div>
	</section>

	<!-- ======= Header ======= -->
	<header id="header" class="d-flex align-items-center">
		<div class="container d-flex align-items-center justify-content-between">

			<h1 class="logo"><a href="index.html">MERIME EVENTS</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link" href="index.php">Home</a></li>
					<li class="dropdown"><a href="#"><span>Vendors</span> <i class="bi bi-chevron-down"></i></a>
						<ul>
							<li><a href="#">DJs</a></li>
							<li><a href="#">Bands</a>

							<li><a href="#">Wedding Planners</a></li>
							<li><a href="#">Florists</a></li>
							<li class="dropdown"><a href="#"><span>Salons</span><i class="bi bi-chevron-right"></i></a>
								<ul>
									<li><a href="#">Nail Salons</a></li>
									<li><a href="#">Hair Salons</a></li>
									<li><a href="#">Barber Shops</a></li>
								</ul>
							</li>
							<li><a href="#">Jewellers</a></li>
							<li><a href="#">Cake</a></li>
							<li><a href='#'>Videographers</a></li>
							<li><a href="#">Dresses and Suits</a></li>
							<li><a href='#'>Videographers</a></li>
							<li class="dropdown"><a href="#"><span>Venues</span><i class="bi bi-chevron-right"></i></a>
								<ul>
									<li><a href="#">Botanical Gardens</a></li>
									<li><a href="#">Churches,Mosqus etc...</a></li>
									<li><a href="#">Social Halls</a></li>
								</ul>
							</li>




							<li><a href="#">More Vendors</a></li>
						</ul>
					</li>
					<li><a class="nav-link scrollto" href="registry.php">Registry</a></li>
					<li><a class="nav-link scrollto" href="">About</a></li>
					<li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
					<li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
					<li><a class="nav-link scrollto" href="#team">Team</a></li>

					<li class="nav-link active"><a href="signup.php"><span>Signup</span></a>

					</li>
					<li><a class="nav-link" href="login.php">Login</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->
	<!--Main--->
	<main>
		<div class="section-title">
			<span>SIGNUP</span>
			<h2>Couple Sign Up Form</h2>
		</div>
		<center>

			<div class="container col-lg-8 col-md-8 col-sm-8 mt-3 mb-5 py-2 mx-auto" style="background-color: #c1828B" data-aos="fade-up">
				<form method="POST" action="signcouple.php" class="py-5 px-5">


					<div class="row col-lg-12 col-md-12 col-sm-12 mb-2">
						<div class="row">
							<div class="form-group col-lg-6 col-md-6 col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
									</div>
									<input type="text" class="form-control" name="one_name" placeholder="Enter Spouse Name" Required>
								</div>
							</div>

							<div class="form-group col-lg-6 col-md-6 col-sm-6 mt-2 mb-2">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
									</div>
									<input type="text" class="form-control" name="two_name" placeholder="Enter Spouse Name" Required>
								</div>
							</div>
						</div>


						<div class="form-group col-lg-12 col-md-12 col-sm-12 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-mail-bulk"></i></span>
								</div>
								<input type="text" class="form-control" name="couple_email" placeholder="Enter Email Adress" Required>
							</div>
						</div>
						<!--TEMP TILL WE GET AN EMAIL ADRESS-->
						<div class="form-group col-lg-12 col-md-12 col-sm-12 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" class="form-control" name="password" placeholder="Enter Password" Required>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-sm-12 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" class="form-control" name="password2" placeholder="Confirm Password" Required>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-sm-12 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-map"></i></span>
								</div>
								<input type="text" class="form-control" name="couple_location" placeholder="Enter Location" Required>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-sm-12 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
								</div>
								<input type="text" class="form-control" name="couple_phone" placeholder="Enter Phone Number" Required>
							</div>
						</div>

						<center><button class="btn btn-primary btn-block" name="send" type="submit">Submit</button></center>


					</div>
				</form>
			</div>
		</center>
	</main>




	<!-----End of Main---------------->
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-lg-4 col-md-6">
						<div class="footer-info">
							<h3>Day</h3>
							<p>
								A108 Adam Street <br>
								NY 535022, USA<br><br>
								<strong>Phone:</strong> +1 5589 55488 55<br>
								<strong>Email:</strong> info@example.com<br>
							</p>
							<div class="social-links mt-3">
								<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
								<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
								<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
								<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
								<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-md-6 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
						</ul>
					</div>

					<div class="col-lg-2 col-md-6 footer-links">
						<h4>Our Services</h4>
						<ul>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
						</ul>
					</div>

					<div class="col-lg-4 col-md-6 footer-newsletter">
						<h4>Our Newsletter</h4>
						<p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
						<form action="" method="post">
							<input type="email" name="email"><input type="submit" value="Subscribe">
						</form>

					</div>

				</div>
			</div>
		</div>

		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong><span>Day</span></strong>. All Rights Reserved
			</div>
			<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
				Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>

</body>

</html>
