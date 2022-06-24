<!DOCTYPE html>
<html>
<head>
	<title>Arknight DSS</title>
	<link rel="stylesheet" type="text/css" href="css/mainstyle.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
	<!----hero Section start---->

	<div class="hero">
		<nav>
			<a href="../admin" class="logo"><h2 class="logo">Ar<span>knight</span></h2></a>
			<ul>
			</ul>
			<?php
			
				include 'config.php';

				session_start();
				if (isset($_SESSION['username'])) {
					?> 
					<a href="../login/logout.php" class="btn">Logout</a>
					<?php
				} else{
				?>
					<a href="../login/" class="btn">Login</a>
					<?php
				}
			?>
			
		</nav>

	<!-----service section start----------->
	<div class="service">
		<div class="title">
			<h2>Arknight Operator Recommendation</h2>
		</div>

		<div class="box">
			<div class="card">
				<i class="fas fa-bars"></i>
				<h5>Self-Research</h5>
				<div class="pra">
					<p></p>
					<p style="text-align: center;">
						<a class="button" href="userData.php">Start</a>
					</p>
				</div>
			</div>

			<div class="card">
				<i class="far fa-user"></i>
				<h5>Classes</h5>
				<div class="pra">
					<p></p>
					<p style="text-align: center;">
						<a class="button" href="classSelection.php">Choose</a>
					</p>
				</div>
			</div>

			<div class="card">
				<i class="far fa-bell"></i>
				<h5>Method That We Use</h5>
				<div class="pra">
					<p>We are using TOPSIS method</p>

					<p style="text-align: center;">
						<a class="button" href="https://en.wikipedia.org/wiki/TOPSIS#:~:text=It%20is%20a%20method%20of,best%20score%20in%20each%20criterion.">Read More</a>
					</p>
				</div>
			</div>
		</div>
	</div>


	<!------footer start--------->
	<footer>
		<p>Member:</p>
		<p>Meuti Zari Annisa - 1941720088 <br>Radithya Iqbal Prasaja - 1941720072 </p>
		
		<!-- <div class="social">
			<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-dribbble"></i></a>
		</div> -->
		<p class="end">This template is copy right by Tahmid Ahmed</p>
	</footer>
</body>
</html>