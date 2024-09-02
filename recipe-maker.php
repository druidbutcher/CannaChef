<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Make a recipe</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php
session_start();
if (empty($demouser)) {
  ?>
 
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
       <a href="recipe-maker.php">Make Recipe</a>
     </div>
   </div>
 </div>
 <?php }else { ?>
  <div class="navbar">
   <div class="dropdown">
     <button class="dropbtn">Dropdown
       <i class="fa fa-caret-down"></i>
     </button>
     <div class="dropdown-content">
     <a href="index.php">Home</a>
 
     </div>
   </div>
 </div>
<?php
}

//session_start();
$userid = $_SESSION['id'];
$flowerid= $_SESSION['fid'];
//$demouser = $_SESSION['demouser'];
if (isset($_SESSION['demouser'])) {
 //$database = "ccdemo";
 include('conndemo.php');
 }else{
   include('conn.php');
 }
 $mysqli = new mysqli($hostname, $username, $password, $database);
 // Check connection
 if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
 }else{
 //echo ("good connection!");
 }
 
  ?>





 <h3> Recipe Maker</h3>

 <form action="insert-recipe.php" method="POST">
  
  <label for="name">Recipe name:</label><br>
  <input type="text" id="name" name="name"><br>
  	<label for="image">Image of Recipe:</label><br>
  <input type="text" id="image" name="image"><br>
    <label for="numberServings">Number of Servings:</label><br>
  <input type="text" id="numberServings" name="numberServings"><br>

  	<label for="directions">Directions:</label><br>
  <textarea id="directions" name="directions"></textarea><br>
 
  <input type="submit" value="Submit">
</form>
</body>
</html>