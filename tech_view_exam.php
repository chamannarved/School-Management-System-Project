<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
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
	
			<div id="section">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>View Exam</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Exam Date</label><br>
						<select name="edate" required class="input3">
				
						<?php 
							 $sl="SELECT * FROM exam";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["EDATE"]}'>{$ro["EDATE"]}</option>";
										}
									}
						?>
					
					</select>
				</div>
				<div class="rbox">
					<label>Class</label><br>
					<select name="cla" required class="input3">
				
						<?php 
							 $sl="SELECT DISTINCT(CNAME) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
				</div>
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br>
					
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Exam Time Table</h3><br>";
								$sql="select * from exam where EDATE='{$_POST["edate"]}' and CLASS='{$_POST["cla"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
											<tr>
												<th>S.NO</th>
												<th>Date</th>
												<th>Class</th>
												<th>Subject</th>
												<th>Exam Name</th>
												<th>Exam Type</th>
												<th>Session</th>
											</tr>
											';
											
											$i=0;
											while($r=$re->fetch_assoc())
											{
												$i++;
												echo"
													<tr>
														<td>{$i}</td>
														<td>{$r["EDATE"]}</td>
														<td>{$r["CLASS"]}</td>
														<td>{$r["SUB"]}</td>
														<td>{$r["ENAME"]}</td>
														<td>{$r["ETYPE"]}</td>
														<td>{$r["SESSION"]}</td>
													
													</tr>
												
												";
												
												
												
											}
								}
								else
								{
									echo "No Record Found";
								}
								echo "</table>";
								
							}
						
						
						?>
					
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>