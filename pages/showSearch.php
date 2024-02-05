<?php
session_start();

// Check if the user is not logged in, redirect to login.php if not logged in
if (!isset($_SESSION['valid_email'])) {
    
    header("Location: login.php");
    exit();
}

require_once('database.php');

$db = db_connect();

?>
    

<?php 


if($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['keyword']) && isset($_GET['search_option'])) {
      $keyword = $_GET['keyword'];
      $search_option = $_GET['search_option'];
    
      // Constructicti  ng the query based on selected option
      $sql = "SELECT * FROM books WHERE ";
      switch ($search_option) {
        case 'all':
            $sql .= "book_title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR book_type LIKE '%$keyword%'";
            break;
        case 'book_title':
            $sql .= "book_title LIKE '%$keyword%'";
            break;
        case 'author':
            $sql .= "author LIKE '%$keyword%'";
            break;
        case 'book_type':
            $sql .= "book_type LIKE '%$keyword%'";
            break;
        default:
            // Handle default case or error
            break;
      }

    // Execute the query
      $result_set = mysqli_query($db, $sql);   

 
    if ($result_set === false) {
      echo "Error: " . $db->error;
    }
       
?>


<!DOCTYPE html>
<html lang = "en">
<head>
 <!-- <link rel="stylesheet" media="all" href="./css/style.css" />
-->  
<title>Book Inventory - Search Result </title>
</head>
<body>
<?php include ("headerEm.php") ?>
<section class ="contentpage">
  <div id="content">
    <div class="subjects listing">
    <div class="search-container">
      <h2>Searching Result</h2> 
      <div class="actions inline">
          <h3>This is the list of all the book related from our database</h3>
          </div>
      <?php 
      if (mysqli_num_rows($result_set) > 0) {
      ?>
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
        <?php 
      while($results = mysqli_fetch_assoc($result_set)) 
      {  ?>
          <tr>
            <td><img src="./imgs/book_cover/<?php echo $results['cover']; ?>" class="small book_cover"></td>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['book_title']; ?></td>
            <td><?php echo $results['author'] ; ?></td>
            <td><?php echo $results['quantity']; ?></td>
            <td><?php echo $results['price']; ?></td>
            <td><?php echo $results['book_type']; ?></td>
            <td><a class="action" href="<?php echo"showBook.php?id=" . $results['id']; ?>"><img src="./imgs/icons/view_icon.png" alt="view" style="width:30px"></a></td>
            <td><a class="action" href="<?php echo"editBook.php?bookid=" . $results['id']; ?>"><img src="./imgs/icons/edit_icon.png" alt="Edit" style="width:30px"></a></td>
            <td><a class="action" href="<?php echo"deleteBook.php?bookid=" . $results['id']; ?>"><img src="./imgs/icons/delete_icon.png" alt="delete" style="width:30px"></a></td>
          </tr>
        <?php }?> 
      
      </table> 
      </div> 
      <?php } else {?>
            <h3 class="nofound">No results found<h3>
      <?php      }
        }
      }else {
        header("Location: search.php");
      }
      
      //echo $sql;
      ?> 
        </div>
      </div>
      </div>
  </section>
     
 <?php include("footerEm.php"); ?>
   
</body>
</html>