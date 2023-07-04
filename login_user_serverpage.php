<?php

  require("functions.php");
  session_start();
     // $_SESSION['name'];
     $name=$_GET['name'];

	function get_user_issue_book_count(){

        // session_start();
        // $_SESSION['name'];
        $name=$_GET['name'];

		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"library");
		$suser_issue_book_count = 0;
		$query = "select count(*) as user_issue_book_count from ibook where studentName = '$name'";
        
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			// $user_issue_book_count = $row['user_issue_book_count'];
            // $user_issue_book_count = $row['user_issue_book_count'];
            // $user_issue_book_count = $row['user_issue_book_count'];
            $suser_issue_book_count = $row['user_issue_book_count'];

		}
        
        // echo $name;
		return($suser_issue_book_count);
	}

    	#fetch data from database
	$connectionn = mysqli_connect("localhost","root","");
	$dbb = mysqli_select_db($connectionn,"library");
	$book_name = "";
	$author = "";
	$book_no = "";
	$query2 = "SELECT * FROM ibook WHERE studentName = '$name'";
    // $query2 = "select * from ibook";


// echo $name;
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
	<div class="row">
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Book Issued</div>
				<div class="card-body">
					<p class="card-text">No of book issued: <?php echo get_user_issue_book_count();?></p>
					
				</div>
			</div>
		</div>
		<div class="col-md-3" style="margin: 0px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Total Book</div>
				<div class="card-body">
					<p class="card-text">No of books available: <?php echo get_book_count();?></p>
					<a class="btn btn-success" href="send_ibook_req.php" target="_blank">View All Books</a>
				</div>
			</div>
		</div>

		
				

		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
	</div>


		<center><h4>Issued Book's Detail</h4><br></center>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<table class="table-bordered" width="900px" style="text-align: center">
					<tr>
							<th>ID</th>
							<th>Book name</th>
							<th>Author</th>
							<th>Student name</th>
						</tr>
					<?php
						$query_runa = mysqli_query($connectionn,$query2);
						while ($row = mysqli_fetch_assoc($query_runa)){
							?>
							<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['book_name'];?></td>
                            <td><?php echo $row['author'];?></td>
                            <td><?php echo $row['studentName'];?></td>
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