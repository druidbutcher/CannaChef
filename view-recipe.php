<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>View your Recipe</title>

<link rel="stylesheet" href=".//css/style.css" />

</head>

<body>
<?php



session_start();
$demouser= $_POST['user'];
include ('fraction.php');

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
     
 
     </div>
   </div>
 </div>
<?php
}


  $userid = $_SESSION['id'];
  $userflowerid = $_POST['userflowerid'];
  $numberServings = $_POST['numberServings'];
  $thcPerServing = $_POST['thcPerServing'];
  $totalThc = $_POST['totalThc'] ;
  //echo $userflowerid;
  //echo $numberServings;
  //echo $totalThc;
 

    $totalThcPerRec = $numberServings * $thcPerServing;
    //divide by totalthc (in one cup) of flower
    $totalThcFatPerRec1 = $totalThcPerRec / $totalThc;
    $totalThcFatPerRec = number_format($totalThcFatPerRec1, 2);
    //echo ("This is the total amount of fat in cups needed").$totalThcFatPerRec;
    $roundup2 =  $totalThcFatPerRec * 8;
    $midround2 = ceil($roundup2) ;
    $totalThcRec = $midround2 / 8;  
    
  if (empty($demouser)) {
    include('conn.php');
  }else{
    include('conndemo.php');
  }
  $mysqli = new mysqli($hostname, $username, $password, $database);
  // Check connection
  //echo $database;

  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }else{
  //echo ("good connection!");
  }
    //do update on userflower
    $query = "UPDATE userflower SET numberServings='$numberServings', thcPerServing='$thcPerServing', thcFatAmount='$totalThcFatPerRec' WHERE id='$userflowerid'";
//echo $query;
if (mysqli_query($mysqli, $query)) {
    $last_id = mysqli_insert_id($mysqli);
 // echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
//show the recipe with fat substitution

$query1 = "SELECT * FROM recipe INNER JOIN userflower ON userflower.recipeid = recipe.id WHERE userflower.id ='$userflowerid'";
//echo $query1;
$result1 = $mysqli->query($query1);
$row = mysqli_fetch_assoc($result1);
$recipeid=$row["recipeid"];
$flowerid=$row["flowerid"];
$directions = $row["directions"];
////echo $recipeid;
//echo $flowerid;
$query2 = "SELECT * FROM flower WHERE flower.id ='$flowerid'";
//echo $query2;
$result2 = $mysqli->query($query2);
$row2 = mysqli_fetch_assoc($result2);
$flowerName = $row2["flowerName"];
//echo $flowerName;

echo '
<table >
<tr>
  <th>Name</th>
  <th>Image</th>
  <th>Number of Servings</th>
  <th>THC per Serving</th>
  <th>Infusion name</th>
</tr>
<tr>
<td>'.$row["name"].'</td>
<td><img src="'.$row["image"].'"width="100" height="100"></td>
<td>'.$row["numberServings"].'</td>
<td>'.$row["thcPerServing"].'mgs</td>
<td>'.$flowerName.'</td>
</tr>
</table>
<br>
'; 
?><h2> Ingredients </h2> <?php
$query = "SELECT * FROM recipeItems  WHERE recipeid ='$recipeid'";
//echo $query;
$result = $mysqli->query($query);
While($row=mysqli_fetch_array($result))
  {


$roundup =  $row["amount"] * 8;
$midround = ceil($roundup);
$finalround = $midround / 8;

$fatty = $row["isFat"];
if ($fatty != 1){
    echo '
  
    <tr>
    <th>'.$row["ingredient"].'</th>
    <td>'.convert_decimal_to_fraction( $finalround).'</td>
    <td>'.$row["measure"].'</td>
    <td>'.$row["description"].'</td>
    </tr>
    <br>';
} 
   
    $oldfat = $row["amount"];
    $roundup1 =  $oldfat * 8;
    $midround1 = ceil($roundup1);
    $finalround1 = $midround1 / 8;



  if   ($fatty == 1){
 $tottbsp = $totalThcRec * 16;


    
      if ($oldfat <= $totalThcRec){
        //die("Ima dead duck");
    ?>
    <h2 style="color: red"> You cant make this recipe with this infusion </h2>
    
    Here are some things that can help<br>
    1. Lower the amount in THC per serving<br>
    2. Use more grams of flower in your infusion<br>
    3. Use only 1 cup of base ingredient in your infusion<br>
   
    <form method="POST" action="pick-flower.php">
    <input type="submit" id="submit" value="Try again" name="submit"><br>
  <?php
    die();
    }
  ?>
 
    <?php
   
    $newfat = $finalround1  -  $totalThcRec;
    echo ("Combine  regular ").$row["ingredient"];
    echo ("  ").convert_decimal_to_fraction($newfat);
    echo (" ").$row["measure"].("  ").$row["description"]."<br>";
    echo ("With your infused THC  ").$row["ingredient"].("  ").convert_decimal_to_fraction( $totalThcRec).("  cups or  ").convert_decimal_to_fraction( $tottbsp).("  Tbsp ")."<br><br>";
    ?>
   
    <?php
    //echo ("This now gives you your   ").convert_decimal_to_fraction( $finalround).("  ").$row["measure"].("  of *Cannabis infused ").$row["ingredient"].("*  containing the correct mix of THC   ")."</h1>";
  }
    ?>
    
    
    <?php

  }

?>
<h2> Directions</h2>
<?php
echo nl2br($directions);
if (empty($demouser)) {

 ?>
  <form method="POST" action="pick-flower.php">
<input type="submit" id="submit" value="Make another recipe" name="submit">
</form><br>

  <?php
    }else{
   ?>
  <form method="POST" action="wipeit.php">
  <input type="submit" id="submit" value="Go again?" name="submit">
<?php } 
unset($_SESSION["fatty"]);
unset($_SESSION["recipeid"]);
?>
  </body>
</html>