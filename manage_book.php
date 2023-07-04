<?php
	// require("functions.php");
	session_start();
	// #fetch data from database
	// $connection = mysqli_connect("localhost","root","");
	// $db = mysqli_select_db($connection,"library");
	// $name = "";
	// $email = "";
	// $mobile = "";
	// $query = "select * from admins where email = '$_SESSION[email]'";
	// $query_run = mysqli_query($connection,$query);
	// while ($row = mysqli_fetch_assoc($query_run)){
	// 	$name = $row['name'];
	// 	$email = $row['email'];
	// 	$mobile = $row['mobile'];
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Book</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  	<script type="text/javascript">
	
  		// function alertMsg(){
  		// 	alert('Book added successfully...');
  		// 	window.location.href = "admin_dashboard.php";
  		// }
  	</script>
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
		<center><h4>Manage Books</h4><br></center>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Author</th>
							<th>Category</th>
							<th>ISBN No.</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
						$connection = mysqli_connect("localhost","root","");
						$db = mysqli_select_db($connection,"library");
						$query = "select * from book";
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
							<td><?php echo $row['id'];?></td>
								<td><?php echo $row['book_name'];?></td>
								<td><?php echo $row['author_name'];?></td>
								<td><?php echo $row['cat_id'];?></td>
								<td><?php echo $row['book_no'];?></td>
								<td><?php echo $row['book_price'];?></td>

								<?php $bn = $row['book_no'];?>
								<td><button class="btn" name=""><a href="edit_book.php?bn=<?php echo $row['id'];?>">Edit</a></button>
								<button class="btn"><a href="delete_book.php?bn=<?php echo $bn;?>">Delete</a></button></td>
							</tr>
							<?php
						}
					?>
				</table>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>
