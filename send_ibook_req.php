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
	$query = "select * from book";
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
	  
	  <style>
        .approve-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            margin-right: 10px;
        }

        .reject-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
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

		<center><h4>Available books</h4><br></center>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
                <table class="table-bordered" width="900px" style="text-align: center">
						<tr>
							<th>Name</th>
							<th>Author</th>
							<th>category</th>
							<th>book No</th>
							<th>Price</th>
							
						</tr>
				
					<?php
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
							<td><?php echo $row['book_name'];?></td>
							<td><?php echo $row['author_name'];?></td>
							<td><?php echo $row['cat_id'];?></td>
							<td><?php echo $row['book_no'];?></td>
							<td><?php echo $row['book_price'];?></td>


							<?php $book_name = $row['book_name']; ?>
                            <?php $book_name = $row['book_name']; ?>
                            <?php $status = "approve"; ?>


                            <td><?php echo $book_name; ?></td>
                            <td><?php echo $book_name; ?></td>
                            <td><?php echo $row['status']; ?></td>


                            <td><?php echo '
                            <form method="GET" action="view_issue_book_req.php">
							<input type="text" name="sname" value="" placeholder="Your name here">
                            <input type="hidden" name="book_name" value="' . $book_name . '">
                            <input type="hidden" name="status" value="pending">
                            <input class="approve-btn" type="submit" name="submit" value="Send Request">
    
                            </form>';

                                echo "<hr>"; ?></td>

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
<?php

	
// error_reporting(E_ALL);
// Step 4: Approve or reject a request
if (isset($_GET['submit'])) {

	include('data_class.php');


	$sname = $_GET['sname'];
    $book_name = $_GET['book_name'];
    $status = $_GET["status"];

	$obj = new data();
	$obj->setconnection();
	$obj->send_book_req($sname,$book_name,$status);




}
