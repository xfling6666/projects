<?php

require_once('database.php');

$db = db_connect();

  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $book_title = $_POST['book_title'] ;
  $author = $_POST['author'] ;
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $book_type = $_POST['book_type'];

  $cover =  $_FILES['image']['name'] ;
  $tempcover = $_FILES['image']['tmp_name'];
  $cover_type = $_FILES['image']['type'];

//check upload image

  $folder = "./imgs/book_cover/"; // Directory where images will be stored
  move_uploaded_file($tempcover, $folder . $cover);

  // Insert data into the database
  //$sql = "INSERT INTO books (username, image) VALUES ('$username', '$image')";
  $sql = "INSERT INTO books (book_title,author,quantity,price,book_type,cover) 
  VALUES ('$book_title','$author','$quantity','$price','$book_type','$cover')";
  $result = mysqli_query($db, $sql);
  
  $id = mysqli_insert_id($db);
  //redirect to show page
  header("Location: showBook.php?id=$id");
  } else {
    header("Location:  newBook.php");
}

?>