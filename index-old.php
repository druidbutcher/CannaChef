<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style.css" />
    
    <title>Dev'Back office tools PWA</title>
	<link rel="manifest" href="manifest.json" />

	
  </head>
  <body>
 <?php
     session_unset();
     session_destroy();
     if (isset($_SESSION['demouser'])) {
        //echo ("demouser is set");
     }else{
      //echo ("No demouser");
     }
     ?>
  <div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="help.php">Help</a>
  
    </div>
  </div>
</div>


 


  <a href="register.php">Register</a><br>
  <a href="Login.php">Login</a><br>
  <a href="demo-login.php">Run in Demo Mode</a><br><br>
<h2>For more recipes and to save your work buy the app</h2>
  </body>
</html>
