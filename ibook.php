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



		<center><h4>Issue a new Book</h4><br></center>
		<center><h5>(make sure you added book before issue)</h5><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="ibook.php" method="post">
					<div class="form-group">
						<label for="email">Book Name:</label>
						<input type="text" name="book_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">student name:</label>
						<input type="text" name="sname" class="form-control" required>
					</div>
					
					<button type="submit" name="ibook" class="btn btn-primary">Issue Book</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>

 <?php

if (isset($_POST['ibook'])) {

	include('data_class.php');

	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"library");

	$book_name=$_REQUEST['book_name'];
	// $book_author=$_REQUEST['book_author'];
	$sname=$_REQUEST['sname'];
    
    // Check if the book exists and is available
    $query = "SELECT * FROM book WHERE book_name = '$book_name'";
	// $recordSet = $this->connection->query($q);
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $status = "pending";
        $query = "INSERT INTO book_issue_requests (sname, book_name, status) VALUES ('$sname', '$book_name', '$status')";
        mysqli_query($connection, $query);
        // Redirect or display a success message
    } else {

		echo '<script type="text/javascript">';
		echo ' alert("Failed")';  //not showing an alert box.
		echo '</script>';

    }
}

?>