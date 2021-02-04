<?php
include "database.php";
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>School Management System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<?php include "includes/navbar.php"; ?>
	<img src="img/b1.jpg" class="w-full">

	<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
		<div class="max-w-md w-full space-y-8">
			<div>
				<img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
				<h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
					Login to your account
				</h2>

			</div>
			<form class="mt-8 space-y-6" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
				<input type="hidden" name="remember" value="true">
				<div class="rounded-md shadow-sm -space-y-px">
					<div>
						<label for="email-address" class="sr-only">User Name</label>
						<input id="email-address" name="aname" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="User Name">
					</div>
					<div>
						<label for="password" class="sr-only">Password</label>
						<input id="password" name="apass" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
					</div>
				</div>

				<div class="flex items-center justify-between">
					<div class="flex items-center">
						<input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
						<label for="remember_me" class="ml-2 block text-sm text-gray-900">
							Remember me
						</label>
					</div>

					<div class="text-sm">
						<a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
							Forgot your password?
						</a>
					</div>
				</div>

				<div>
					<?php
					if (isset($_POST["login"])) {
						$sql = "select * from admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
						$res = $db->query($sql);
						if ($res->num_rows > 0) {
							$ro = $res->fetch_assoc();
							$_SESSION["AID"] = $ro["AID"];
							$_SESSION["ANAME"] = $ro["ANAME"];
							echo "<script>window.open('admin_home.php','_self');</script>";
						} else {
							echo "<div class='error'>Invalid Username or Password</div>";
						}
					}
					if (isset($_GET["mes"])) {
						echo "<div class='error'>{$_GET["mes"]}</div>";
					}

					?>
					<button type="submit" name="login" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						<span class="absolute left-0 inset-y-0 flex items-center pl-3">
							<!-- Heroicon name: solid/lock-closed -->
							<svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
							</svg>
						</span>
						Login
					</button>
				</div>
			</form>
		</div>
	</div>
	<div class="footer">
		<footer>
			<p>Copyright &copy; Tutor Joe's </p>
		</footer>
	</div>
	<script src="js/jquery.js"></script>
	<script>
		$(document).ready(function() {
			$(".error").fadeTo(1000, 100).slideUp(1000, function() {
				$(".error").slideUp(1000);
			});

			$(".success").fadeTo(1000, 100).slideUp(1000, function() {
				$(".success").slideUp(1000);
			});
		});
	</script>



</body>

</html>