<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"library");
	$book_name = "";
	$author = "";
	$category = "";
	$book_no = "";
	$price = "";
	$query = "select * from author";
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Reg Users</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>

  <!-- NAV BAR-->
  <DIV id="nav-placeholder">

  </DIV>

  <script>
    $(function(){
      $("#nav-placeholder").load("nav.php");
    });
    </script>
      <!-- NAV BAR-->

		<center><h4>Registered Users Detail</h4><br></center>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
                <table class="table-bordered" width="900px" style="text-align: center">
						<tr>
							<th>S.no</th>
							<th>authors</th>

						</tr>
				
					<?php
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['author_name'];?></td>

						</tr>

					<?php
						}
					?>	
				</table>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>
