<?php
session_start();
// store to test if they *were* logged in
$old_user = $_SESSION['valid_email'];
unset($_SESSION['valid_email']); //delete session variable
session_unset();



session_destroy(); //kill the session
header("location: index.html");

?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>Book Inventory - Logged Out</title>
    <meta name="author" content = "Feiling Xie,Mingzi Xu,Lanchen Zhou">
    <meta name="Description" content = "Information">
    <meta name = "keywords" content = "Inventory database">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kenia">
    <link rel="stylesheet" href="./css/style1.css"type = "text/css">
   </head>
<div class="full-screen-container">
        <div class="login-container">
      
            <h3 class="login-title">Welcome</h3>
             <p><a href="login.php">Back to Login Page</a></p>
           <?php
            if (!empty($old_user)) {
                echo '<h3>You have been logged out.</h3>';
            } else {
                // if they weren't logged in but came to this page somehow
                echo '<h3>You were not logged in, and so have not been logged out.</h3>';
            }
            ?>             
        </div>
    </div>
   
    <footer><p>Libre Inventory, 2023 Copyright</p></footer>

    
  
</body>

</html>