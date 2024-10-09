<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style.css" />
    
    <title>Lets get started</title>
	<link rel="manifest" href="manifest.json" />

	
  </head>
  <body>

  <div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Menu
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="index.php">Home</a>
  
    </div>
  </div>
</div>
<?php

$userid = $_POST['id'];
//echo $userid;
//die("ima after userid");
?>
  <form action="make-flower.php" method="POST">
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
  <input type="submit" value="I want to make an infusion first"><br><br>
</form>
  <form action="pick-recipe-first.php" method="POST">
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
  <input type="submit" value="I want to choose a recipe first"><br><br>
</form>
  <form action="browse-recipe.php" method="POST">
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
  <input type="submit" value="I want to browse recipes first"><br><br>
</form>

  </body>
</html>