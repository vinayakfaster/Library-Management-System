<?php
	session_start();

	// $bnn=$_GET['bn'];

	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"library");
	$id="";
	$book_name = "";
	$book_no = "";
	$author_id = "";
	$cat_id = "";
	$book_price = "";
	$query = "select * from book where id = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$id = $row['id'];
		$book_name = $row['book_name'];
		$book_no = $row['book_no'];
		$author_id = $row['author_name'];
		$cat_id = $row['cat_id'];
		$book_price = $row['book_price'];
	}

	// echo $bnn;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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

		<center><h4>Edit Book</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="UPDATEBOOK.php" method="post">
				<div class="form-group">
						<label for="id">Sno:</label>
						<input type="text" name="id" value="<?php echo $id;?>" class="form-control"  required>
					</div>
				<div class="form-group">
						<label for="num">Book Number:</label>
						<input type="text" name="book_no" value="<?php echo $book_no;?>" class="form-control"  required>
					</div>
					<div class="form-group">
						<label for="email">Book Name:</label>
						<input type="text" name="book_name" value="<?php echo $book_name;?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Author Name:</label>
						<input type="text" name="author_name" value="<?php echo $author_id;?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Category ID:</label>
						<input type="text" name="cat_id" value="<?php echo $cat_id;?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Book Price:</label>
						<input type="text" name="book_price" value="<?php echo $book_price;?>" class="form-control" required>
					</div>
					<button type="submit" name="update" class="btn btn-primary">Update Book</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
<?php
if(isset($_POST['update']))
{

	$id =$_POST['id'];
	$book_no = $_POST['book_no'];
	$book_name = $_POST['book_name'];
	
	$book_author = $_POST['author_name'];
	$book_category = $_POST['cat_id'];
	$book_price = $_POST['book_price'];


	include('data_class.php');



$obj = new data();
$obj->setconnection();
$obj->update_book($id,$book_name,$book_author,$book_category,$book_no,$book_price);
}

	// if(isset($_POST['update'])){
	// 	$connection = mysqli_connect("localhost","root","");
	// 	$db = mysqli_select_db($connection,"lms");
	// 	$query = "update books set book_name = '$_POST[book_name]',author_id = $_POST[author_id],cat_id = $_POST[cat_id],book_price = $_POST[book_price] where book_no = $_GET[bn]";
	// 	$query_run = mysqli_query($connection,$query);
	// 	header("location:manage_book.php");
	//}

?>