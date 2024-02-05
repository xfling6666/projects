<?php
session_start();

// Check if the user is not logged in, redirect to login.php if not logged in
if (!isset($_SESSION['valid_email'])) {
    
    header("Location: login.php");
    exit();
}

require_once('database.php');
$db = db_connect();

if(!isset($_GET['userid'])) {
  header("Location:  login.php");
}
$userid = $_SESSION['userid'];

$page_title = 'Edit User'; 
  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  //access the employee information
  $user_name = $_POST['user_name']; 
  $email= $_POST['email'] ;
  $telephone= $_POST['telephone'] ;
  $user_role= $_POST['user_role'] ;



  if (!$_FILES['imageuser']['error'] && $_FILES['imageuser']['size'] > 0) {
    $img_user =  $_FILES['imageuser']['name'] ;
    $tempuserimg = $_FILES['imageuser']['tmp_name'];
    $userimg_type = $_FILES['imageuser']['type'];
   //update the table with new information
   $folder = "./imgs/user_imgs/"; // Directory where images will be stored
   move_uploaded_file($tempuserimg, $folder . $img_user); 

 
} else {
    // Set a default image filename or path if no image is uploaded
    $img_user = "img_avatar.png"; // Replace with your default image filename
}

  $sql="UPDATE user 
    set user_name = '$user_name' , email= '$email' , telephone= '$telephone' , user_role = '$user_role', img_user = '$img_user'
    where ID = '$userid' ";
  $result = mysqli_query($db, $sql);
  //redirect to show page

    header("Location: account.php?userid=$userid");
  }
  // display the employee information
  else {
    $sql = "SELECT * FROM user WHERE ID= '$userid' ";  
    $result_set = mysqli_query($db, $sql);    
    $result = mysqli_fetch_assoc($result_set);
  }

?>

<?php include 'headerEm.php' ?>;
<section class="contentpage">

  <div id="content">
    <a class="back-link" href="account.php"> <img src="./imgs/icons/back_icon.png" alt="back" style="width:30px" title="Back to List"></a>
      <div class="half-screen-container">
        <h2>Edit Your Profile</h2>
        <form class="form-center" action="<?php echo 'editUser.php?userid='.$result['ID']; ?>"  method="post" enctype="multipart/form-data">
          <div class="form-group">   
            <div class="center-group">
              <label class="table-cell"  for="imageuser">Your Profile image</label>
              <div class="right-group"> 
                <img src="./imgs/user_imgs/<?php echo $result['img_user']; ?>" class="detailimg">
                <input  class="table-cell form-control" type="file" name="imageuser" value="Change Image from your laptop" placeholder="img_avatar.png"/>
              </div>
              </div>  
            
            <div class="center-group">
              <label  class="table-cell" for="id">ID</label>
              <input class="table-cell"  type="text" name="id" value="<?php echo $result['ID']; ?>" />
            </div>
            <div class="center-group">
              <label class="table-cell" for="user_name">User Name</label>
              <input class="table-cell"  type="text" name="user_name" value="<?php echo $result['user_name']; ?>" />
            </div>
            <div class="center-group">
              <label class="table-cell" for="id">Email</label>
              <input  class="table-cell" type="text" name="email" value="<?php echo $result['email']; ?>" />
            </div>
            <div class="center-group">
              <label  class="table-cell" for="telephone">Telephone</label>
              <input class="table-cell" type="text" name="telephone" value="<?php echo $result['telephone']; ?>" />
            </div>
            <div class="center-group">
              <label  class="table-cell" for="user_role">Role</label>
              <input class="table-cell" type="text" name="user_role" value="<?php echo $result['user_role']; ?>" />
            </div>
          </div>
          <div id="operations">
            <input type="submit" value="Save changes" class="btn">
          </div>
        
        </form>

      </div>
    </div>
  </div>
</section>
<?php include 'footerEm.php'; ?>
</body>
</html>