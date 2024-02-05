<?php

/*
    Student name: Feiling Xie ; Lanchen Zhou; Mingzi Xu
    File name: inventory.php
    Section: CST 8285 sec 312 group 9
    date created: nov.25th
    Descriptiom: this is the inventory result php file for assignment02
*/


session_start();
if (!isset($_SESSION['valid_email'])) {
    
  header("Location: login.php");
  exit();
}
// Check if the user is not logged in, redirect to login.php if not logged in

require_once('database.php');

$db = db_connect();

$user = $_SESSION['user_details']; 
$userid = $user['ID'];

  $sql = "SELECT * FROM books ";
  $sql .= "ORDER BY id ASC";
  //echo $sql;
  $result_set = mysqli_query($db,$sql);

?>


<!DOCTYPE html>
<html lang = "en">
<head>
 <!-- <link rel="stylesheet" media="all" href="./css/style.css" />
-->  
<title>Book Inventory - Inventory </title>
</head>
<body>

<?php include ("headerEm.php") ?>
  

<section class ="contentpage">    
  <div id="content">
    <div class="subjects listing">
      <h2>BOOKS</h2>
        <div class="actions inline">
          <h3>Inventory - all book list</h3>
          <a class="action addbtn" href="newBook.php"><img src="./imgs/icons/add_icon.png" alt="add" style="width:30px" title="Create New book"></a>
        </div>
        <div class ="table-scroll" >

          <table class="list">
            <tr>
              <th>Book Cover</th>
              <th>ID</th>
              <th>Title</th>
              <th>Author</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>type</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            <?php while($results = mysqli_fetch_assoc($result_set)) { ?>
              <tr>
                <td class="cell-center"><img src="./imgs/book_cover/<?php echo $results['cover']; ?>" class="small book_cover"></td>
                <td><?php echo $results['id']; ?></td>
                <td><?php echo $results['book_title']; ?></td>
                <td><?php echo $results['author'] ; ?></td>
                <td><?php echo $results['quantity']; ?></td>
                <td><?php echo $results['price']; ?></td>
                <td><?php echo $results['book_type']; ?></td>
                <td class="cell-center"><a class="action" href="<?php echo"showBook.php?id=" . $results['id']; ?>"><img src="./imgs/icons/view_icon.png" alt="view" style="width:30px"></a></td>
                <td class="cell-center"><a class="action" href="<?php echo"editBook.php?bookid=" . $results['id']; ?>"><img src="./imgs/icons/edit_icon.png" alt="Edit" style="width:30px"></a></td>
                <td class="cell-center"><a class="action" href="<?php echo"deleteBook.php?bookid=" . $results['id']; ?>"><img src="./imgs/icons/delete_icon.png" alt="delete" style="width:30px"></a></td>
              </tr>
            <?php } ?>
          </table>
          
        </div>
    </div>
  </div>
</section>
           
 <?php include("footerEm.php"); ?>
   
</body>
</html>