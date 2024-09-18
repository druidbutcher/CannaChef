<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Choose or View a Recipe</title>
<link rel="stylesheet" href=".//css/style.css" />

</head>

<body>
  <?php
   session_start();
  $demouser = $_POST['user'];
//echo $dmouser;
if (empty($demouser)) {
    ?>
   
   <div class="navbar">
     <div class="dropdown">
       <button class="dropbtn">Menu
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
       <button class="dropbtn">Demo Menu
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
  $flowerid = $_POST['flowerid'];
 
    //echo $flowerid;
    //die("ima dead choosing");
  
	//connect to db
 
 if (empty($demouser)) {
  include('conn.php');
}else{
  include('conndemo.php');
}
$mysqli = new mysqli($hostname, $username, $password, $database);
// Check connection
//echo $database;
//die ("im dead again");
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}else{
//echo ("good connection!");
}


$query = "SELECT * FROM recipe ";
$result = $mysqli->query($query);
//list recipes then choose recipe to update servings and thc or show recipe
?>
<h3>Choose one of our "Cannibis Chef"™ tested recipes</h3>
A reminder -- Gummies need a higher conctration of THC than other recipes<br>
Your current Infusion has <?php echo $totalthc; ?> in 1 cup  <br>
We recommend a minumum of 1400mgs per cup for gummies<br>
<form action="update-recipe.php" method="POST">
<span class="custom-dropdown big">
<select name= "recipeid" id= "recipeid">

<?php
While($row=mysqli_fetch_array($result))
{ 
  $recid = "$row[id]";
?>

	<option value = <?php echo $recid; ?>> <?php echo "$row[name]"; ?> </option>"
  <?php
}
	?>
</select>
</span>
<input type="hidden" id="flowerid" name="flowerid" value =  <?php echo $flowerid; ?> >  
<input type="hidden" id= "user" name="user" value = "<?php echo $demouser; ?>">
<input type="submit" id="submit" value="One More step!" name="submit">
<br><br>
</form>



</body>
</html>