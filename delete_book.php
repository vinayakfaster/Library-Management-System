<?php


	include('data_class.php');
    $book_no = $_GET['bn'];

$obj = new data();
$obj->setconnection();
$obj->delete_book($book_no);


