<?php
	include "database.php";
	session_start();

    if(isset($_POST["create"])) {
        $aname = $_POST["aname"];
        $apass = $_POST["apass"];
        // Check if username already exists
        $checkSql = "SELECT * FROM admin WHERE ANAME='{$aname}'";
        $checkRes = $db->query($checkSql);
        if($checkRes->num_rows > 0) {
            echo "<div class='error'>Username already exists</div>";
        } else {
            // Create new account
            $sql = "INSERT INTO admin (ANAME, APASS) VALUES ('{$aname}', '{$apass}')";
            if($db->query($sql) === TRUE) {
                echo "<div class='success'>Account created successfully. Please login.</div>";
            } else {
                echo "<div class='error'>Error: " . $db->error . "</div>";
            }
        }
    }

    if(isset($_POST["login"])) {
        $sql="select * from admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
        $res=$db->query($sql);
        if($res->num_rows>0) {
            $ro=$res->fetch_assoc();
            $_SESSION["AID"]=$ro["AID"];
            $_SESSION["ANAME"]=$ro["ANAME"];
            echo "<script>window.open('admin_home.php','_self');</script>";
        } else {
            echo "<div class='error'>Invalid Username or Password</div>";
        }
    }

    if(isset($_GET["mes"])) {
        echo "<div class='error'>{$_GET["mes"]}</div>";
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
			<h1 class="heading">Admin Login / Create Account</h1>
			<div class="log">
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
	<label>User Name</label><br>
	<input type="text" name="aname" required class="input"><br><br>
	<label>Password </label><br>
	<input type="password" name="apass" required class="input"><br>
	<a href="forgot_pass.php" class="forgot">Forgot password?</a><br>
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
