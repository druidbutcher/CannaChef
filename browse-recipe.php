<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Browse Recipes </title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php
$userid = $_POST['id'];
$demouser = $_POST['demouser'];
//echo $userid;
//echo $demouser;
if (empty($demouser)) {
  ?>
 
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



if (!empty($demouser)) {
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
//$query = "SELECT userflower.id , userflower.numberservings, userflower.thcPerServing, userflower.thcFatAmount,flower.flowerName, flower.thcPercent, recipe.name, flower.totalThc, recipe.id as recid  FROM `userflower` INNER JOIN `recipe` ON userflower.recipeid = recipe.id INNER JOIN `flower` ON userflower.flowerid = flower.id WHERE userflower.recipeid != 0 ORDER BY recipe.id";
$query = "SELECT * FROM recipe ";
$result = $mysqli->query($query);
//$row=mysqli_fetch_array($result);

	
?>
<h3>Choose a recipe to view</h3>
		<form action="show-browse-recipe.php" method="POST">
		<span class="custom-dropdown big">
<?php

echo $numberServings;
echo '<select name= "recipeid" id= "recipeid">';
//echo "<option>--Users--</option";	
While($row=mysqli_fetch_array($result))

{ 
  $recid = "$row[id]";
?>

	<option value = <?php echo $recid; ?>> <?php echo "$row[name]"?> </option>"
  <?php
}
	?>

</select><br><br>
</span><br>
<input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
<input type='submit' value="View this recipe"><br><br>
</form>
<?php
if (empty($demouser)) {
  ?>
<form action="choose-path-user.php" method="POST">
<input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
<input type='submit' value="Back"><br><br>
  <?php 
}else{
?>
<form action="choose-path.php" method="POST">
<input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
<input type='submit' value="Back"><br><br>
</form>
<?php
}
?>




</body>
</html>