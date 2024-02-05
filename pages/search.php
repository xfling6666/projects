<?php

/*
    Student name: Feiling Xie ; Lanchen Zhou; Mingzi Xu
    File name: search.php
    Section: CST 8285 sec 312 group 9
    date created: nov.25th
    Descriptiom: this is the search  php file for assignment02
*/

session_start();

// Check if the user is not logged in, redirect to login.php if not logged in
if (!isset($_SESSION['valid_email'])) {
    
    header("Location: login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang = "en">
<head>
 <title>Book Inventory - Search </title>
</head>
<body>

<?php include ("headerEm.php") ?>
    
<section class ="contentpage">
  
  <div id="content">
    <div class="subjects listing search-space">
      
      <div class="half-screen-container">
        <div class="center-container">
            <h2 class="center-title">Please search by the book name or author or book category</h2>
            <form action="showSearch.php" class="search-center" name="form" method="get">
               <div class="input-group search-group">
                   <label for="keyboard">Keyword</label>
                   <input type="text" name="keyword" id="keyword" >
                </div>
                   <div class="input-group search-group">   
                            <input type="radio" id="all" name="search_option" value="all" checked>
                            <label for="all" name="search_option">All</label>
   
                            <input type ="radio"  name="search_option" id="book_title" value="book_title" > 
                            <label for="book_title" name="search_option">Book Name</label>
                            
                            <input type ="radio" name="search_option" id="author" value="author"> 
                            <label for="author" name="search_option">Author</label>
                            
                            <input type ="radio" name="search_option" id="book_type" value="book_type"> 
                            <label for="book_type" name="search_option">Book Type </label>                 
                </div>
                <div class="input-group search-group">   
                <button type="submit" class="btn">Search</button>
                          <button type= "reset" class=" btn">Reset</button>
                </div>

             </form>
                    
            </div>
        </div>
      
        </div>
        </div>
  </section>
           
 <?php include("footerEm.php"); ?>
   
</body>
</html>