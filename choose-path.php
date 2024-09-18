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
<?php
session_start();
$userid = $_SESSION['id'];
//echo $userid;
?>
  <a href="make-flower.php">I am Pro chef!</a><br><br>
  <a href="pick-recipe-first.php">I am a grandma!</a><br>

  </body>
</html>