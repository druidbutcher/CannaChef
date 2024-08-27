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
    <a href="index.php">Home</a>
      <a href="make-flower.php">Make flower product</a>
      <a href="pick-flower.php">Connect Flower w/ recipe 2</a>
      <a href="pick-recipe-2view.php">View Recipe</a>
      <a href="recipe-maker.php">Make Recipe(back office only)</a>
    </div>
  </div>
</div>


  <?php 
  session_start();

        $userid = $_SESSION['id'];
  ?>
  
  <a href="register.php">Register</a><br>
  <a href="Login.php">Login</a><br>

  </body>
</html>
