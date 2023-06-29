<?php
	include "database.php";
	session_start();

	if(isset($_POST["recover"])) {
		$aname = $_POST["aname"];
		$apass = $_POST["apass"];
		// Check if the username exists
		$checkSql = "SELECT * FROM admin WHERE ANAME='{$aname}'";
		$checkRes = $db->query($checkSql);
		if($checkRes->num_rows > 0) {
			// Change the password
			$sql = "UPDATE admin SET APASS='{$apass}' WHERE ANAME='{$aname}'";
			if($db->query($sql) === TRUE) {
				$_SESSION["message"] = "Password updated successfully. Please login.";
				header("Location: index.php"); // with the actual login page
				exit();
			} else {
				echo "<div class='error'>Error: " . $db->error . "</div>";
			}
		} else {
			echo "<div class='error'>Username not found</div>";
		}
	}
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
			<h1 class="heading">Recover Password</h1>
			<div class="log">
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>User Name</label><br>
					<input type="text" name="aname" required class="input"><br><br>
					<label>New Password </label><br>
					<input type="password" name="apass" required class="input"><br>
					<button type="submit" class="btn" name="recover">Recover Password</button>
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
