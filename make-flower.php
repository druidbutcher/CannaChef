<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>insert local new</title>
<link rel="stylesheet" href="css/style.css" />

</head>

<body style="background-color:greenyellow;">
<?php

session_start();
$userid = $_SESSION['id'];
$demouser = $_POST['user'];
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
      <a href="make-flower.php">Make flower product</a>
      <a href="pick-flower.php">Connect Flower w/ recipe 2</a>
      <a href="pick-recipe-2view.php">View Recipe</a>
      <a href="recipe-maker.php">Make Recipe</a>
    </div>
  </div>
</div>
<?php }else{ ?>
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



?>

<form action="insert-flower.php" method="POST">
 <h3> Type of Fat</h3>

  <label for="oil">Oil
  <input type="radio" id="oil" name="fat" value="oil">
  <img src="images/cannaleaf.png" alt="oil"width="20" height="20">
  </label>
  <label for="butter">Butter
  <input type="radio" id="butter" name="fat" value="butter">
  <img src="images/cannaleaf.png" alt="butter"width="20" height="20">
  </label>
   <label for="tincture">Tincture
  <input type="radio" id="tincture" name="fat" value="tincture">
  <img src="images/cannaleaf.png" alt="butter"width="20" height="20">
  </label><br>
  <h3>Type of Decarb</h3>
    <label for="oven">Oven</label>
  <input type="radio" id="oven" name="decarb" value="oven">
  <label for="aedent">Ardent</label>
  <input type="radio" id="ardent" name="decarb" value="ardent"><br>
  <h3>Type of Infusion</h3>
  <label for="mbm">Magic Butter Machine</label>
    <input type="radio" id="mbm" name="infusion" value="mbm">
  <label for="slowcooker">Slow Cooker</label>
  <input type="radio" id="slowcooker" name="infusion" value="slowcooker">
   <label for="ardentfx">Ardent FX</label>
  <input type="radio" id="ardentfx" name="infusion" value="ardentfx">
     <label for="freezer">Freezer</label>
  <input type="radio" id="freezer" name="infusion" value="freezer"><br><br><br>
 
  
  <label for="flowername">Flower name:</label><br>
  <input type="text" id="flowername" name="flowername"><br>
  	<label for="thcpercent">Percentage of THC:</label><br>
  <input type="text" id="thcpercent" name="thcpercent"><br>
    <label for="amountflower">Amount of Flower in Grams:</label><br>
  <input type="text" id="amountflower" name="amountflower"><br>
  	<label for="fatamount">Amount of fat in cups:</label><br>
  <input type="text" id="fatamount" name="fatamount"><br><br>
  <input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>