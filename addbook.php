<?php
	// require("functions.php");
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"library");
	$name = "";
	$email = "";
	$mobile = "";
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
	<title>Add New Book</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script> type="text/javascript"</script>
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


		<center><h4>Add a new Book</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="addbook.php" method="post">
					<div class="form-group">
						<label for="email">Book Name:</label>
						<input type="text" name="book_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Author ID:</label>
						<input type="text" name="book_author" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Category ID:</label>
						<input type="text" name="book_category" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Book Number:</label>
						<input type="text" name="book_no" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Book Price:</label>
						<input type="text" name="book_price" class="form-control" required>
					</div>
					<button type="submit" name="add_book" class="btn btn-primary">Add Book</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>

 <?php
if(isset($_POST['add_book']))
{

// include("functions.php");
include("data_class.php");


$book_name=$_REQUEST['book_name'];
$book_author=$_REQUEST['book_author'];
$book_category=$_REQUEST['book_category'];
$book_no=$_REQUEST['book_no'];
$book_price=$_REQUEST['book_price'];

// echo $book_name;
// echo "<br>";
// echo $book_author;
// echo "<br>";
// echo $book_category;
// echo "<br>";
// echo $book_no;
// echo "<br>";
// echo $book_price;
// echo "<br>";


$obj = new data();
$obj->setconnection();
$obj->add_author($book_author);


$obj = new data();
$obj->setconnection();
$obj->cat($book_category);

$obj = new data();
$obj->setconnection();
$obj->addbook($book_name,$book_author,$book_category,$book_no,$book_price);}


?> 
