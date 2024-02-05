<?php
session_start();

// Check if the user is not logged in, redirect to login.php if not logged in
if (!isset($_SESSION['valid_email'])) {
    
    header("Location: login.php");
    exit();
}



// check session variable

if(!isset($_GET['bookid'])) {
  header("Location:  index.php");
}

require_once('database.php');
$db = db_connect();
$bookid = $_GET['bookid'];

$page_title = 'Edit Book'; 
  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  //access the employee information
  $book_title = $_POST['book_title']; 
  $author= $_POST['author'] ;
  $quantity= $_POST['quantity'] ;
  $price= $_POST['price'] ;
  $book_type= $_POST['book_type'] ;




  if ($_FILES['image']['size']!=0) {
    $cover =  $_FILES['image']['name'] ;
    $tempcover = $_FILES['image']['tmp_name'];
    $cover_type = $_FILES['image']['type'];
    //update the table with new information
  
    $folder = "./imgs/book_cover/"; // Directory where images will be stored
    move_uploaded_file($tempcover, $folder . $cover); 
    
    $sqlcover =  " cover = '$cover' ,";
  }



  $sql="UPDATE books 
    set book_title = '$book_title' , author= '$author' , quantity= '$quantity' , price = '$price', ". $sqlcover  ."  book_type = '$book_type'
    where id = '$bookid' ";
  $result = mysqli_query($db, $sql);
  //redirect to show page
    header("Location: showBook.php?id=$bookid");
  }
  // display the employee information
  else {
    $sql = "SELECT * FROM books WHERE id= '$bookid' ";
    $result_set = mysqli_query($db, $sql);   
    $result = mysqli_fetch_assoc($result_set);
  }

?>

<?php include 'headerEm.php' ?>;
<section class="contentpage">

  <div id="content">
    <a class="back-link" href="inventory.php"> <img src="./imgs/icons/back_icon.png" alt="back" style="width:30px" title="Back to List"></a>
    <div class="half-screen-container">
      <h2>Edit Book</h2>
      <form class="form-center" action="<?php echo 'editBook.php?bookid=' . $result['id']; ?>"  method="post" enctype="multipart/form-data">
        <div class="form-group">  
          <div class="center-group">
            <label  class="table-cell" for="image">Book Cover</label>
            <div class="right-group"> 
              <img src="./imgs/book_cover/<?php echo $result['cover']; ?>" class="detailimg">
             
              <input  class="table-cell form-control" type="file" name="image" value="Change Image from your laptop" />
            </div>
            </div> 
         
          <div class="center-group">
            <label class="table-cell"  for="id">ID</label>
            <input class="table-cell"  type="text" name="id" value="<?php echo htmlentities($result['id']); ?>" readonly />
          </div>
          <div class="center-group">
            <label class="table-cell"  for="book_title">Book title</label>
            <input  class="table-cell" type="text" name="book_title" value="<?php echo $result['book_title']; ?>" />
          </div>
          <div class="center-group">
            <label  class="table-cell" for="author">Author</label>
            <input  class="table-cell" type="text" name="author" value="<?php echo $result['author']; ?>" />
          </div>
          <div class="center-group">
            <label  class="table-cell" for="book_type">Book Category</label>
            <input  class="table-cell" type="text" name="book_type" value="<?php echo $result['book_type']; ?>" />
          </div>
          <div class="center-group">
            <label class="table-cell"  for="quantity">Inventory</label>
            <input class="table-cell"  type="text" name="quantity" value="<?php echo $result['quantity']; ?>" />
          </div>
          <div class="center-group">
            <label  class="table-cell" for="price">Price</label>
            <input  class="table-cell" type="text" name="price" value="<?php echo $result['price']; ?>" />
          </div>
        </div>
        <div id="operations">
          <input type="submit" value="Save changes" class="btn">
        </div>
    </form>

  </div>

</div>
</section>
<?php include 'footerEm.php'; ?>
</body>
</html>