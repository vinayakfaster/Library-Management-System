<?php
if(isset($_POST['update']))
{


    include('data_class.php');

	$id =$_POST['id'];
	$book_no = $_POST['book_no'];
	$book_name = $_POST['book_name'];
	
	$book_author = $_POST['author_name'];
	$book_category = $_POST['cat_id'];
	$book_price = $_POST['book_price'];


	echo $id;
    echo "<br>";
    echo $book_no;
    echo "<br>";
    echo $book_name;
    echo "<br>";
    echo $book_author;
    echo "<br>";
    echo $book_category;
    echo "<br>";
    echo $book_price;



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