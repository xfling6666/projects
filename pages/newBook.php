<?php
session_start();
// Check if the user is not logged in, redirect to login.php if not logged in
if (!isset($_SESSION['valid_email'])) {
    
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Book Inventory - Create New Book </title>

</head>
<body>
<?php include 'headerEm.php'; ?>

<section class="contentpage" >
  <div id="content">
  <a class="back-link" href="inventory.php"> <img src="./imgs/icons/back_icon.png" alt="back" style="width:30px" title="Back to List"></a>
  <div class="half-screen-container">
  <h2>Create New Book</h2>
      <form class="form-center"  action='createBook.php' method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <div class="center-group">
            <label  class="table-cell"  for="image">Book Cover</label>
            <input  class="table-cell"  class="form-control" type="file" name="image" value="Choose Image from your laptop" /></dd>  
          </div>
          <div class="center-group">
            <label class="table-cell"  for="book_title">Book title</label>
            <input  class="table-cell"  type="text" name="book_title" />
          </div>
          <div class="center-group">
            <label class="table-cell"   for="author">Author</label>
            <input  class="table-cell"  type="text" name="author"  />
          </div>
          <div class="center-group">
            <label class="table-cell"   for="quantity">Inventory</label>
            <input  class="table-cell"  type="text" name="quantity"  />
          </div>
          <div class="center-group">
            <label  class="table-cell" for="price">Price</label>
            <input type="text" name="price"  />
          </div>
          <div class="center-group">
            <label class="table-cell"  for="book_type">Book Category</label>
            <input type="text" name="book_type"  />
          </div>
        </div>
        <div id="operations">
          <button type="submit" value="Create New Book Record" class="btn">Create New Book Record</button>
        </div>
    </form>
    

  </div>

</div>
</section>
<?php include 'footerEm.php'; ?>
