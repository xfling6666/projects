<?php
session_start();

// Check if the user is not logged in, redirect to login.php if not logged in
if (!isset($_SESSION['valid_email'])) {
    header("Location: login.php");
    exit();             
}
echo <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
<title>Book Inventory - Account </title>
</head>
<body>
EOT;


include "headerEm.php" ;
require_once('database.php');

$db = db_connect();

//access URL parameter
    $user = $_SESSION['user_details'];
    $userid = $user['ID'];
 // Retrieve user details from session
    $sql = "SELECT * FROM user WHERE ID = '$userid'";
    $result_set = mysqli_query($db, $sql);
    $userinfo = mysqli_fetch_assoc($result_set);
?>
   
<section class ="contentpage">
    <div class="content">
        <div class="half-screen-container">
        <div class="page edit">
            <div class="actions inline">
                <h3 class="table-cell" >Account Details</h3>
                <a class="action" href="<?php echo"editUser.php?userid=".$userinfo['ID'] ; ?>"><img src="./imgs/icons/edit_icon.png" alt="Edit" style="width:30px"></a>
            </div>    
            <div class="attributes form-center">
                    <dl class="center-group">
                        <dt class="table-cell" >Profile image</dt>
                        <dd class="table-cell" ><img src="./imgs/user_imgs/<?php echo $userinfo['img_user']; ?>" class="detailimg">
                            </dd>
                    </dl>
                    <dl class="center-group">
                        <dt class="table-cell" >User ID</dt>
                        <dd class="table-cell" ><?php echo $userinfo['ID']; ?></dd>
                    </dl>
                    <dl class="center-group">
                        <dt class="table-cell" >User Name</dt>
                        <dd class="table-cell" ><?php echo $userinfo['user_name']; ?></dd>
                    </dl>
                    <dl class="center-group">
                        <dt class="table-cell" >Telephone</dt>
                        <dd  class="table-cell" ><?php echo $userinfo['telephone']; ?></dd>
                    </dl>
                    <dl class="center-group">
                            <dt class="table-cell" >Email</dt>
                            <dd class="table-cell" ><?php echo $userinfo['email']; ?></dd>
                    </dl>
                    <dl class="center-group">
                            <dt class="table-cell" >Role</dt>
                            <dd class="table-cell" ><?php echo $userinfo['user_role']; ?></dd>
                    </dl>
            
                </div>

        </div>
</div>
    </div>
</section>
<?php include 'footerEm.php'; ?>
</body>
</html>
