
<!DOCTYPE html>
<html>
<head>
	<title>Add New Student</title>
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



		<center><h4>Add a new Student</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="adduser.php" method="post">
					<div class="form-group">
						<label for="name">Student Name:</label>
						<input type="text" name="sname" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" class="form-control" required>
					</div>
                    <div class="form-group">
						<label for="mobile">Mobile</label>
						<input type="number" name="mob" class="form-control" >
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input type="pass" name="pass" class="form-control" required>
					</div>

				
					<button type="submit" name="add_user" class="btn btn-primary">Add user</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>

 <?php
if(isset($_POST['add_user']))
{

// include("functions.php");
include("data_class.php");


$sname=$_REQUEST['sname'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$mob=$_REQUEST['mob'];




$obj = new data();
$obj->setconnection();
$obj->add_user($sname,$email,$mob,$pass);}


?> 
