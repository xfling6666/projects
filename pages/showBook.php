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
  <title>Book Inventory - Book Details </title>
</head>
<body>
<?php include ("headerEm.php") ?>
<?php
require_once('database.php');
$db = db_connect();?>


<?php 
$bookid = $_GET['id'] ;
$sql = "SELECT * FROM books WHERE id= '$bookid' ";
    
$result_set = mysqli_query($db, $sql);    
$result = mysqli_fetch_assoc($result_set);

?>

<section class ="contentpage"> 
  <div id="content">
    <a class="back-link"  href="inventory.php"> <img src="./imgs/icons/back_icon.png" alt="back" style="width:30px" title="Back to List"></a>
    
    <div class="half-screen-container">
      <h2>Book Details</h2>
      <div class="form-center">
        
        <dl class="center-group">
          <dt  class="table-cell" ><?php echo $result['book_title']; ?></dt>
          <dd class="table-cell" ><img src="./imgs/book_cover/<?php echo $result['cover']; ?>" class="detailimg">
          </dd>
        </dl>
        <dl class="center-group">
          <dt class="table-cell" >Book</dt>
          <dd class="table-cell" ><?php echo $result['book_title']; ?></dd>
        </dl>
        <dl class="center-group">
          <dt class="table-cell" >Author name</dt>
          <dd class="table-cell" ><?php echo $result['author']; ?></dd>
        </dl>
        <dl class="center-group">
              <dt class="table-cell" >Book Category</dt>
              <dd class="table-cell" ><?php echo $result['book_type']; ?></dd>
        </dl>
        <dl class="center-group">
          <dt class="table-cell" >Quantity in Stock</dt>
          <dd class="table-cell" ><?php echo $result['quantity']; ?></dd>
        </dl>
        <dl class="center-group">
          <dt class="table-cell" >Price</dt>
          <dd class="table-cell" ><?php echo $result['price']; ?></dd>
        </dl>    
    </div>
</div> 
</section>

<?php include 'footerEm.php'; ?>
</body>
</html>
