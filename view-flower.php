<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show Flower by user</title>
<link rel="stylesheet" href="css/style.css" />
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}

</style>
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

 $username = "root";
 $password = "root";
 $database = "cc";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
$query1 = "SELECT DISTINCT flower.id, flower.fat, flower.flowerName, flower.thcPercent, flower.totalThc, flower.totalPerTsp, flower.fatAmount FROM flower INNER JOIN userflower ON flower.id = userflower.flowerid WHERE userflower.userid = '$userid'";

$result1 = $mysqli->query($query1);
While($row1=mysqli_fetch_array($result1))
{ 
echo '
<table style="width:70%">
<tr>
  <th>Flower Name</th>
  <th>THC % of flower</th>
  <th>Type of Fat</th>
  <th>Total THC per cup</th>
  <th>Total THC per Tbsp</th>
  <th>Total cups in this batch</th>
  
</tr>
<tr>
<td>'.$row1["flowerName"].'</td>
<td>'.$row1["thcPercent"].'</td>
<td>'.$row1["fat"].'</td>
<td>'.$row1["totalThc"].'</td>
<td>'.$row1["totalPerTsp"].'</td>
<td>'.$row1["fatAmount"].'</td>

</tr>
</table>
<br>

'; 

}
?>


</body>
</html>