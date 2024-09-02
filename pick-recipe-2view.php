<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show Recipes with Flower</title>
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

 $userid = $_SESSION['id'];
 $userid = $_SESSION['id'];
 $flowerid= $_SESSION['fid'];

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
//$query = "SELECT * FROM `userflower` INNER JOIN `recipe` ON userflower.recipeid = recipe.id INNER JOIN `flower` ON userflower.flowerid = flower.id WHERE userflower.recipeid != 0 ORDER BY recipe.id ";
$query = "SELECT userflower.id , userflower.numberservings, userflower.thcPerServing, userflower.thcFatAmount,flower.flowerName, flower.thcPercent, recipe.name, flower.totalThc, recipe.id as recid  FROM `userflower` INNER JOIN `recipe` ON userflower.recipeid = recipe.id INNER JOIN `flower` ON userflower.flowerid = flower.id WHERE userflower.recipeid != 0 ORDER BY recipe.id";
$result = $mysqli->query($query);
$row=mysqli_fetch_array($result);
echo $row["userflower.id"];
	
?>
<h3>Choose a Recipe</h3>
		<form action="show-recipe.php" method="POST">
		
<?php
//$userflowerid = $row["flowerid"];
//$numberServings = $row["numberServings"];
//$thcPerServing = $row["thcPerServing"];
//$totalThc = $row["totalThc"];
echo $numberServings;
echo '<select name= "userflowerid" id= "userflowerid">';
//echo "<option>--Users--</option";	
While($row=mysqli_fetch_array($result))
{ 
    $userflower = $row["userflower.id"];
    
	echo "<option>Recipe:--$row[name]--Flower:$row[flowerName]--THC $row[thcPercent]%--id: $row[id] </option>";
    
}
	?>

</select>

<input type='submit'><br><br>






</body>
</html>