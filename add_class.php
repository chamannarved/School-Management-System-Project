<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Project</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
		<img src="img/1.jpg" style="margin-left:90px;" class="sha">
			<div id="section">
				<?php include"sidebar.php";?><br>
				<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content1">
					
						<h3 > Add Class Details</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into class(CNAME,CSEC) values('{$_POST["cname"]}','{$_POST["sec"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert failed..</div>";
							}
							
							
						}
					
					?>
						
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>Class Name</label><br>
				<select name="cname"  required class="input2">
						<option value="">Select</option>
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
						<option value="VI">VI</option>
						<option value="VII">VII</option>
						<option value="VIII">VIII</option>
						<option value="IX">IX</option>
						<option value="X">X</option>
						
					</select><br><br>
					<label>Section </label><br>
					<select name="sec"  required class="input2">
						<option value="">Select</option>
						<option value="-">-</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
						<option value="E">E</option>
						<option value="F">F</option>
					
					</select>
					<br>
					<button type="submit" class="btn" name="submit">Add Class Details</button>
				</form>
				
				
				</div>
				
				
				<div class="tbox">
					<h3 style="margin-top:30px;"> Class Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Class Name</th>
							<th>Section</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from class";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "
										<tr>
											<td>{$i}</td>
											<td>{$r["CNAME"]}</td>
											<td>{$r["CSEC"]}</td>
											<td><a href='delete.php?id={$r["CID"]}' class='btnr'>Delete</a></td>
										</tr>
										";
									
								}
								
							}
						?>
					
					</table>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>