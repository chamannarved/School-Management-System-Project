<?php
	include "database.php";
	session_start();

    if(isset($_POST["create"])) {
        $tname = $_POST["name"];
        $tpass = $_POST["pass"];
        // Check if username already exists
        $checkSql = "SELECT * FROM staff WHERE TNAME='{$tname}'";
        $checkRes = $db->query($checkSql);
        if($checkRes->num_rows > 0) {
            echo "<div class='error'>Username already exists</div>";
        } else {
            // Create new account
            $sql = "INSERT INTO staff (TNAME, TPASS) VALUES ('{$tname}', '{$tpass}')";
            if($db->query($sql) === TRUE) {
                echo "<div class='success'>Account created successfully. Please login.</div>";
            } else {
                echo "<div class='error'>Error: " . $db->error . "</div>";
            }
        }
    }

	if(isset($_POST["login"])) {
		$sql="select * from staff where TNAME='{$_POST["name"]}' and TPASS='{$_POST["pass"]}'";
		$res=$db->query($sql);
		if($res->num_rows>0) {
			$ro=$res->fetch_assoc();
			$_SESSION["TID"]=$ro["TID"];
			$_SESSION["TNAME"]=$ro["TNAME"];
			echo "<script>window.open('teacher_home.php','_self');</script>";
		} else {
			echo "<div class='error'>Invalid Username or Password</div>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>School Management System - Project</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<?php include"navbar.php";?>
		<img src="img/1.jpg" width="800">
		<div class="login">
			<h1 class="heading">Teacher's Login</h1>
			<div class="log">
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>User Name</label><br>
					<input type="text" name="name" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="pass" required class="input"><br>
					<button type="submit" class="btn" name="login">Login Here</button>
					<button type="submit" class="btn" name="create">Create Account</button>
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
