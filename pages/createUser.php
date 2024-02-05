<?php

require_once('database.php');

$db = db_connect();

  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){


 $user_name = $_POST['user_name'] ;
 $telephone = $_POST['telephone'] ;
 $email = $_POST['email'];
 $password = $_POST['password'];
 $user_role = $_POST['user_role'];

 $checksql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
  $checkresult = mysqli_query($db, $checksql);
  $user = mysqli_fetch_assoc($checkresult);

  if ($user['ID']) {
    // var_dump($user);
    echo '<script>alert("User already exists！");history.back()</script>';
  }else{
    $sql = "INSERT INTO user (user_name, telephone,email,password,user_role) 
    VALUES ('$user_name','$telephone','$email','$password','$user_role')";
  
  
  $result = mysqli_query($db, $sql);
      // For INSERT statements, $result is true/false

    $id = mysqli_insert_id($db);
  
    //redirect to show page
    header("Location: login.php");
  }


  

} else {
    header("Location:  register.html");
}

?>