<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Make infusion</title>
<link rel="stylesheet" href=".//css/style.css" />

</head>

<?php

session_start();
$userid = $_SESSION["id"];
$demouser = $_POST["user"];

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
<?php }else{ ?>
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

 if (empty($demouser)) {
  include('conn.php');
}else{
  include('conndemo.php');
}


$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}else{

}
$query = "SELECT recipe.id , recipeItems.ingredient FROM recipe INNER JOIN recipeItems on recipeItems.recipeid = recipe.id WHERE recipe.id = '$recipeid' AND recipeItems.isFat = '1' ";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
$fatty = $row['ingredient'];

?>
<h1>Lets make a THC Infusion</h1>
<form action="insert-flower.php" method="POST">
<label for="flowername">Name your infusion:</label><br>
  <input type="text" id="flowername" name="flowername"><br>
<h3> Choose the base ingredient you want to use.</h3>
 <div class="container">
  <div id="radios">
    <label for="butter" >
      <input type="radio" name="fat" id="butter" value="butter" checked/>
      <span>Butter</span>
    </label>                
    <label for="oil">
      <input type="radio" name="fat" id="oil" value="oil" />
      <span>Oil</span>
    </label>
    <label for="tincture">
      <input type="radio" name="fat" id="tincture" value="tincture" />
      <span>Tincture</span>
    </label>
  </div>
</div>
<br>
<label for="fatamount">Enter the amount you want to make , in cups:</label><br>
  <input type="text" id="fatamount" name="fatamount"><br>
<h2> Lets talk about your flower</h2>
  <label for="thcpercent">What is the % of THC in your flower?</label><br>
  <input type="text" id="thcpercent" name="thcpercent"><br>
    <label for="amountflower">Enter the amount of flower you are using, in Grams</label><br>
  <input type="text" id="amountflower" name="amountflower"><br>
<h3>How will you decarboxylate?</h3>
<div class="container">
  <div id="radios">
    <label for="oven" >
      <input type="radio" name="decarb" id="oven" value="oven" checked/>
      <span>Oven</span>
    </label>                
    <label for="ardent">
      <input type="radio" name="decarb" id="ardent" value="ardent" />
      <span>Ardent</span>
    </label>
  </div>
</div>

<h3>What will you use to infuse your product?</h3>
<div class="container">
  <div id="radios">
    <label for="mbm" >
      <input type="radio" name="infusion" id="mbm" value="mbm" checked/>
      <span>Magic Butter Machine</span>
    </label>                
    <label for="slowcooker">
      <input type="radio" name="infusion" id="slowcooker" value="slowcooker" />
      <span>Slow Cooker</span>
    </label>
    <label for="ardentfx">
      <input type="radio" name="infusion" id="ardentfx" value="ardentfx" />
      <span>Ardent FX</span>
    </label>
    <label for="freezer">
      <input type="radio" name="infusion" id="freezer" value="freezer" />
      <span>Freezer</span>
    </label>
  </div>
</div>
<br>
  


  <input type="hidden" id="fatty" name="fatty" value=<?php echo $fatty ?>>
  <input type="hidden" id="granny" name="granny" value=<?php echo $granny ?>>
  <input type="hidden" id="recipeid" name="recipeid" value=<?php echo $recipeid ?>>
  <input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="submit" value="NEXT->">
</form>
</body>
</html>