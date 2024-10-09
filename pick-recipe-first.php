<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show Recipes</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php

  $demouser = $_POST["demouser"];
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
 $userid = $_POST['id'];
//echo $userid;
if (empty($demouser)) {
  include('conn.php');
 }else{
  include('conndemo.php');
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

	
?>
<h3>Choose a Recipe you want to make</h3>
		<form action="pick-recipe-second.php" method="POST">
    <span class="custom-dropdown big">
    <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
		<input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>">
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
</span><br>
<input type='submit' id="submit" value="View Recipe" name="submit"><br><br>






</body>
</html>