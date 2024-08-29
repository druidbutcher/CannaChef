<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Choose or View a Recipe</title>
<link rel="stylesheet" href="css/style.css" />
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
      <a href="recipe-maker.php">Make Recipe</a>
    </div>
  </div>
</div>
<?php
session_start();
  $userid = $_SESSION['id'];
  $flowerid = $_POST['flowerid'];
  //echo $user;
  $fid = substr($flowerid,-8);
  $flowerid = preg_replace("/[^0-9,.]/", "", $fid)."\n";
  $_SESSION['flowerid'];
  //echo $flowerid;
	//connect to db
 	$username = "root";
	$password = "root";
  if (isset($_SESSION['demouser'])) {
    $database = "ccdemo";
    }else{
      $database = "cc";
    }
   echo$database;


$mysqli = new mysqli("localhost:3306", $username, $password, $database);
if ($mysqli->connect_error) {
 die("Connection failed: " . $mysqli->connect_error);
}
$query = "SELECT * FROM recipe ";

//echo $query;
$result = $mysqli->query($query);
//list recipes then choose recipe to update servings and thc or show recipe
?>
<h3>Choose a Recipe</h3>
<form action="update-recipe.php" method="POST">

<select name= "recipeid" id= "recipeid">

<?php
While($row=mysqli_fetch_array($result))
{ 
	echo "<option> $row[name] --id:$row[id] </option>";
}
?>	
</select>
<input type="hidden" id="flowerid" name="flowerid" value =  <?php echo $flowerid; ?> >  
<input type="submit" id="submit" value="One More step!" name="submit">
<br><br>
</form>



</body>
</html>