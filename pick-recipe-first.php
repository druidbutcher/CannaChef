<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show Recipes</title>
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
session_start();

 $userid = $_SESSION['id'];

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
$query = "SELECT * FROM recipe ";
$result = $mysqli->query($query);
//$row=mysqli_fetch_array($result);
//echo $row["id"];
	
?>
<h3>Choose a Recipe you want to made</h3>
		<form action="pick-recipe-second.php" method="POST">
		
<?php

echo '<select name= "recipeid" id= "recipeid">';
//echo "<option>--Users--</option";	
While($row=mysqli_fetch_array($result))
{ 
   
  $recid = "$row[id]";
	?>
  echo "<option value=<?php echo $recid; ?>> <?php echo "$row[name]" ; ?></option>
  
  <?php

    
}
	?>

</select>

<input type='submit'><br><br>






</body>
</html>