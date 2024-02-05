<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="author" content = "Feiling Xie,Mingzi Xu,Lanchen Zhou">
    <meta name="Description" content = "Information">
    <meta name = "keywords" content = "Inventory Database">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kenia">
    <link rel="stylesheet" media="all" href="<?php echo './css/style1.css'; ?>" />
    <link rel="stylesheet" media="all" href="<?php echo './css/style.css'; ?>" />
    <link rel="stylesheet" media="all" href="<?php echo './css/menustyle.css'; ?>" />
    <script>
    function myFunction() {
      var x = document.getElementById("menu");
      if (x.className === "nav") {
        x.className += " responsive";
      } else {
        x.className = "nav";
      }
    } 
  </script>
  </head>

<body>
  
  <header>
      <navigation  id="mynav">
      
      <h1><a href = "inventory.php">Book Inventory Database</a></h1> 
        <div id="menu" class="nav">
            <a href="inventory.php" class="active mobile">Inventory</a>
            <a href="search.php" class="mobile">Search</a>
            <a href="account.php" class="mobile">Account</a>
          <a href="logout.php" class="logout mobile" >Log out </a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">Logo</a>
        </a></div>
         
      </navigation> 
    
  </header> 


</script>
  