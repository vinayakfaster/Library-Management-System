<!<!DOCTYPE html>

<html>
    <head>
        <title>LB</title>

	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <style type="text/css">
	#main_content{
		padding: 50px;
		background-color: whitesmoke;
	}
	#side_bar{
		background-color: whitesmoke;
		padding: 50px;
		width: 300px;
		height: 450px;
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

      <div class="row">
		<div class="col-md-4" id="side_bar">
			<h5>Library Timing</h5>
			<ul>
				<li>Opening: 8:00 AM</li>
				<li>Closing: 8:00 PM</li>
				<li>(Sunday Off)</li>
			</ul>
			<h5>What We provide ?</h5>
			<ul>
				<li>Full furniture</li>
				<li>Free Wi-fi</li>
				<li>News Papers</li>
				<li>Discussion Room</li>
				<li>RO Water</li>
				<li>Peacefull Environment</li>
			</ul>
		</div>


    
<div class="container login-container">
<!-- <div class="row"><h4><?php //echo $msg?></h4></div> -->
            <div class="row">
 
                <div class="col-md-6 login-form-3">
                    <h3>Student Login</h3>
                    <form action="userlogin.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                            <?php echo "<br>"?>
                            <input type="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                            <?php echo "<br>"?>
                            <input type="submit" class="btnSubmit" name="aLogin" value="Login" />
                            
                        </div>
<?php
if(isset($_GET["aLogin"])){


    include('data_class.php');

    $email=$_GET["login_email"];
    $pass=$_GET["login_pasword"];


    $obj = new data();
    $obj->setconnection();
    $obj->userLogin($email,$pass);
								
}         ?>



    </body>