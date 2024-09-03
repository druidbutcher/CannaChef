<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Choose Recipe</title>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}

</style>
<link rel="stylesheet" href="css/style.css" />

</head>

<body>
<?php
include ('fraction.php');
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
  $userflowerid = $_POST['userflowerid'];
  $fid = substr($userflowerid,-8);
  $userflowerid = preg_replace("/[^0-9,.]/", "", $fid)."\n";
  //$numberServings = $_POST['numberServings'];
  //$thcPerServing = $_POST['thcPerServing'];
  //$totalThc = $_POST['totalThc']  ;
 //echo $userflowerid;

    //$totalThcPerRec = $numberServings * $thcPerServing;
    //divide by totalthc (in one cup) of flower
    //$totalThcFatPerRec1 = $totalThcPerRec / $totalThc;
    //$totalThcFatPerRec = number_format($totalThcFatPerRec1, 2);
    //echo ("This is the total amount of fat in cups needed").$totalThcFatPerRec;


$userid = $_SESSION['id'];
$flowerid= $_SESSION['fid'];

if (isset($_SESSION['demouser'])) {
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


//show the recipe with fat substitution

$query1 = "SELECT * FROM recipe INNER JOIN userflower ON userflower.recipeid = recipe.id  INNER JOIN flower ON userflower.flowerid = flower.id WHERE userflower.id ='$userflowerid'";

$result1 = $mysqli->query($query1);
$row = mysqli_fetch_assoc($result1);
$recipeid=$row["recipeid"];
$flowerid=$row["flowerid"];
$numberServings = $row["numberServings"];
$thcPerServing = $row["thcPerServing"];
$totalThc = $row["totalThc"];
$flowerName = $row["flowerName"];
$directions = $row["directions"];
//echo $totalThc;
//echo $thcPerServing;
    $totalThcPerRec = $numberServings * $thcPerServing;
    //divide by totalthc (in one cup) of flower
    $totalThcFatPerRec1 = $totalThcPerRec / $totalThc;
    $totalThcFatPerRec = number_format($totalThcFatPerRec1, 2);

    $roundup2 =  $totalThcFatPerRec * 8;
    $midround2 = ceil($roundup2) ;
    $totalThcRec = $midround2 / 8; 

$query2 = "SELECT * FROM flower WHERE flower.id ='$flowerid'";
//echo $query2;
$result2 = $mysqli->query($query2);
$row2 = mysqli_fetch_assoc($result2);
//$flowerName=$row2["flowerName"];


echo '
<table style="width:70%">
<tr>
  <th>Name</th>
  <th>Image</th>
  <th>Number of Servings</th>
  <th>THC per Serving</th>
  <th>Total THC per cup in recipe</th>
  <th>Flower name</th>
</tr>
<tr>
<td>'.$row["name"].'</td>
<td><img src="'.$row["image"].'"width="100" height="100"></td>
<td>'.$numberServings.'</td>
<td>'.$thcPerServing.'</td>
<td>'.$totalThcFatPerRec.' </td>
<td>'.$flowerName.'</td>
</tr>
</table>
<br>
'; 

$query2 = "SELECT * FROM recipeItems  WHERE recipeid ='$recipeid'";

$result2 = $mysqli->query($query2);
While($row=mysqli_fetch_array($result2))
{ 
    $roundup =  $row["amount"] * 8;
    $midround = ceil($roundup);
    $finalround = $midround / 8;

    echo '
  
    <tr>
    <th>'.$row["ingredient"].'</th>
    <td>'.$finalround.'</td>
    <td>'.$row["measure"].'</td>
    <td>'.$row["description"].'</td>
    </tr>
    <br>';

        
    $fatty = $row["isFat"];
    $oldfat = $row["amount"];
    $roundup1 =  $oldfat * 8;
    $midround1 = ceil($roundup1);
    $finalround1 = $midround1 / 8;

    if   ($fatty == 1){
      $tottbsp = $totalThcRec * 16;
     
     
     if ($oldfat > 0){
      echo $oldfat;
      echo $totalThcRec;
       if ($oldfat < $totalThcRec){
         ?>
         <h2 style="color: red"> This will use more fat than your recipe needs </h2>
         Either lower the thc % or make a stronger infusion!
         <form method="POST" action="pick-flower.php">
         <input type="submit" id="submit" value="Try again" name="submit"><br>
       <?php
         die();
       }
       ?>
         <h1 style="font-size: 1rem; color: #ec3a13">
         <?php
         echo ("Fat adjustment!!")."</h1>";
         $newfat = $finalround1  -  $totalThcRec;
         echo ("Now Use:  ").$row["ingredient"];
         echo ("  ").convert_decimal_to_fraction($newfat);
         echo ("  ").$row["measure"].("  ").$row["description"]."<br>";
         echo $row["ingredient"].("  containing THC :  ").convert_decimal_to_fraction( $totalThcRec).("  cups or  ").convert_decimal_to_fraction( $tottbsp).("  Tbsp ");
        
     }else{
       ?>
       <h1 style="font-size: 1rem; color: #ec3a13">
       <?php
       echo ("This is how much to use!!")."</h1>";
       echo $row["ingredient"].("  containing THC :  ").convert_decimal_to_fraction( $totalThcRec).(" cups  or  ").convert_decimal_to_fraction( $tottbsp).("  Tbsp ");
     
     }
         ?>
         <br> <br>
         <?php
     
     }
     }
echo nl2br($directions);

  ?>
  <form method="POST" action="pick-recipe-2view.php">
<input type="submit" id="submit" value="View another recipe" name="submit">
</form><br>
  </body>
</html>