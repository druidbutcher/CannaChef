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
  $userflowerid = $_POST['userflowerid'];
  $numberServings = $_POST['numberServings'];
  $thcPerServing = $_POST['thcPerServing'];
  $totalThc = $_POST['totalThc']  ;

    $totalThcPerRec = $numberServings * $thcPerServing;
    //divide by totalthc (in one cup) of flower
    $totalThcFatPerRec1 = $totalThcPerRec / $totalThc;
    $totalThcFatPerRec = number_format($totalThcFatPerRec1, 2);
    //echo ("This is the total amount of fat in cups needed").$totalThcFatPerRec;

    $username = "root";
    $password = "root";
    $database = "cc";
    
    $mysqli = new mysqli("localhost:3306", $username, $password, $database);
    
    // Check connection
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
    }
    //echo "Connected successfully";

    //do update on userflower
    $query = "UPDATE userflower SET numberServings='$numberServings', thcPerServing='$thcPerServing', thcFatAmount='$totalThcFatPerRec' WHERE id='$userflowerid'";

if (mysqli_query($mysqli, $query)) {
    $last_id = mysqli_insert_id($mysqli);
  //echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
//show the recipe with fat substitution

$query1 = "SELECT * FROM recipe INNER JOIN userflower ON userflower.recipeid = recipe.id WHERE userflower.id ='$userflowerid'";

$result1 = $mysqli->query($query1);
$row = mysqli_fetch_assoc($result1);
$recipeid=$row["recipeid"];
$flowerid=$row["flowerid"];
//echo $recipeid;
//echo $flowerid;
$query2 = "SELECT * FROM flower WHERE flower.id ='$flowerid'";
//echo $query2;
$result2 = $mysqli->query($query2);
$row2 = mysqli_fetch_assoc($result2);
$flowerName=$row2["flowerName"];


echo '
<table style="width:70%">
<tr>
  <th>Name</th>
  <th>Image</th>
  <th>Number of Servings</th>
  <th>THC per Serving</th>
  <th>Total cup THC in recipe</th>
  <th>Flower name</th>
</tr>
<tr>
<td>'.$row["name"].'</td>
<td><img src="'.$row["image"].'"width="100" height="100"></td>
<td>'.$row["numberServings"].'</td>
<td>'.$row["thcPerServing"].'</td>
<td>'.$totalThcFatPerRec.' </td>
<td>'.$flowerName.'</td>
</tr>
</table>
<br>
'; 

$query2 = "SELECT * FROM recipeitems  WHERE recipeid ='$recipeid'";

$result2 = $mysqli->query($query2);
While($row=mysqli_fetch_array($result2))
{ 
   $fraction =$row["amount"];
   preg_replace("/\.5[0]{0,}/", "&frac12;", $fraction);
  //echo $fraction;
    echo '
  
    <tr>
    <th>'.$row["ingredient"].'</th>
    <td>'.$row["amount"].'</td>
    <td>'.$row["measure"].'</td>
    <td>'.$row["description"].'</td>
    </tr>
    <br>';
    $fatty = $row["isFat"];
    $oldfat = $row["amount"];
if   ($fatty == 1){
    ?>
    <h1 style="font-size: 1rem; color: #ec3a13">
    <?php
    echo ("Fat adjustment!!")."</h1>";
    $newfat = $oldfat - $totalThcFatPerRec;
    echo ("Now Use:  ").$row["ingredient"];
    echo ("  ").$newfat;
    echo ("  ").$row["measure"].("  ").$row["description"]."<br>";
    
    echo $row["ingredient"].("  containing THC :  ").$totalThcFatPerRec;
    echo("  cup");
    ?>
    <br> <br>
    <?php

}
}

  ?>
  <form method="POST" action="pick-flower.php">
<input type="submit" id="submit" value="Make another recipe" name="submit">
</form><br>
  </body>
</html>