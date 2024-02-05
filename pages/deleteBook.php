<?php



session_start();

// Check if the user is not logged in, redirect to login.php if not logged in
if (!isset($_SESSION['valid_email'])) {
    
    header("Location: login.php");
    exit();
}

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<title>Book Inventory - Delete Book </title>
</head>
<body>
HTML;

include "headerEm.php";
require_once('database.php');

$db = db_connect();

$bookid = $_GET['bookid'];


if($_SERVER['REQUEST_METHOD'] == 'POST') {


  $sql = "DELETE FROM books WHERE id =" . $_POST['bookid'] ;
    $result = mysqli_query($db, $sql);

  header("Location: inventory.php");

} 
else 
{

  $sql = "SELECT * FROM books WHERE id= '$bookid' ";
    
$result_set = mysqli_query($db, $sql);
    
    $result = mysqli_fetch_assoc($result_set);

}

$page_title = 'Delete Page'; 
?>

<section class ="contentpage">
  <div id="content">
    <div class="delete">
        <a class="back-link"  href="inventory.php"> <img src="./imgs/icons/back_icon.png" alt="back" style="width:30px" title="Back to List"></a>
    </div>
    <div class="subjects listing delete-space">
      <div class="half-screen-container"> 
        <div class="center-container">
              <h2  class="center-title">Delete Book</h2>


              <form action="deleteBook.php?bookid=<?php echo $result['id'];?>"  method="POST">

                    <div class="input-group search-group">     
                      <p>Are you sure you want to delete this Book?</p>
                      <p class="item"><?php echo $result['book_title']; ?></p>
                    </div>
                    <div class="input-group search-group">   
                    
                    <input type=hidden name=bookid value="<?php echo  $result['id']; ?>">
                    <input type="submit" class="btn" name="commit" value="Delete Book" />
  
                  </div>
              </form>

          </div>
        </div>
    </div>
  <div>
</section>
  <?php include 'footerEm.php'; ?>

  </body>
</html>

