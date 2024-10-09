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
    <?php
  $demouser = "demouser";
  //echo $demouser;
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
<?php
session_start();
$userid = $_POST['id'];
//echo $userid;

?>
  <form action="make-flower.php" method="POST">
  <input type="hidden" id= "user" name="user" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
  <input type="submit" value="I want to make an infusion"><br><br>
</form>
  <form action="pick-recipe-first.php" method="POST">
  <input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
  <input type="submit" value="I want to choose a recipe"><br><br>


  </body>
</html>