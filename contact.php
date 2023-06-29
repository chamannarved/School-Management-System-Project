<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>School Management System - Project 2023</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<?php include"navbar.php";?>
		<img src="img/1.jpg" width="800">
		
		<div class="login">
			<h1 class="heading">Contact Us</h1>
			<div class="cont">
			
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
				Project COMPUTER EDUCATION<BR>
The Bund,<BR>
Zhongshan Road,<BR>
Shanghai, China - 200002<BR>
Mail - myEmail@gmail.com<br>Phone - 90430-17689

				</form>
			</div>
		</div>
		<div class="footer">
			<footer><p>Copyright &copy; Project </p></footer>
		</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
		
	
		
	</body>
</html>