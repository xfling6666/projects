<?php
session_start();
require_once('database.php');

$db = db_connect();

if (isset($_SESSION["valid_email"])) {
    header("location: inventory.php?userid = $userid");
    exit;
}


if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    if (empty($email) || empty($password)) {
        echo '<script>alert("input email and password please");history.back()</script>';
        exit;
    }


    // Query the database to find a matching user
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result_set = mysqli_query($db, $sql);

    if(!$result_set) {
        die("Database query failed.");
    }


    $user = mysqli_fetch_assoc($result_set);

    // Check if user exists and verify the password
    if (isset($user['email']) && $user['password'] === $password) {

            $_SESSION['valid_email'] = $email;
            $_SESSION['user_details'] = $user;
            $_SESSION['userid'] = $user['ID'];
        
        // You might want to store more user-related information in sessions
        
    }else{
        echo '<script>alert("email or password not match");history.back()</script>';
        exit;
    }

}

?>



<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>Book Inventory - Log in page</title>
    <meta name="author" content = "Feiling Xie,Mingzi Xu,Lanchen Zhou">
    <meta name="Description" content = "Information">
    <meta name = "keywords" content = "Inventory database">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kenia">
    <link rel="stylesheet" href="./css/style1.css"type = "text/css">
    <link rel="stylesheet" href="./css/style.css"type = "text/css">
   
   </head>


<body>
     <div class="full-screen-container">
        <div class="login-container">
       
            <h3 class="login-title">Welcome</h3>
            <?php
                if (isset($_SESSION['valid_email'])) {
                    header("location: account.php?userid=" . $user['ID']);
                    
                } else {
                    if (isset($email)) {
                        // if they've tried and failed to log in
                        echo '<p>Could not log you in.</p>';
                    } else {
                        // they have not tried to log in yet or have logged out
                        echo '<p>You are not logged in.</p>';
                    }
                }
                ?>
                    <form action="login.php" name="form" method="POST" >
                        
                        <div class="input-group">
                            <label for="email">Email Address</label>
                             <input type="text" name="email" id="email" placeholder="Email">
                                                
                        </div>
                        <div class="input-group">
                            <label for="passwrd">Password</label>
                            <input type="password" name="password" id="password" placeholder="password">
                                                
                        </div>
                        <button type="submit" class="login-btn btn">Sign in</button>
        
                        <button id ="register" class="login-btn btn"><a  href = "register.html">Register</a></button>
                        <button id ="cancel" class="login-btn btn"><a  href = "index.html">Cancel</a></button>
                    
                    </form>
                    
                        
        </div>
    </div>
   
    <footer><p>Libre Inventory, 2023 Copyright</p></footer>

   
</body>
</html>