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
 $flowerid= $_SESSION['fid'];
 //echo $flowerid;
 $username = "root";
 $password = "root";
 $database = "cc";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$query1 = "SELECT * FROM flower WHERE id = '$flowerid'";
$result1 = $mysqli->query($query1);
$row1=mysqli_fetch_array($result1);
echo '
<table style="width:70%">
<tr>
  <th>Flower Name</th>
  <th>THC % of flower</th>
  <th>Type of Fat</th>
  <th>Total THC in this batch</th>
  <th>Total cups in this batch</th>
  
</tr>
<tr>
<td>'.$row1["flowerName"].'</td>
<td>'.$row1["thcPercent"].'</td>
<td>'.$row1["fat"].'</td>
<td>'.$row1["totalThc"].'</td>
<td>'.$row1["fatAmount"].'</td>

</tr>
</table>
<br>
'; 
unset($_SESSION['fid']);

$query = "SELECT DISTINCT userflower.flowerid , flower.id, flower.flowerName , flower.thcPercent FROM flower INNER JOIN userflower ON flower.id = userflower.flowerid ORDER BY flower.id DESC ";

$result = $mysqli->query($query);


	
?>
<h3>Choose a Flower</h3>
		<form action="choose-recipe.php" method="POST">
		
<?php
echo '<select name= "flowerid" id= "flowerid">';
//echo "<option>--Users--</option";	
While($row=mysqli_fetch_array($result))
{ 
	echo"<option>$row[flowerName]-$row[thcPercent]% --id:$row[flowerid] </option>";
}
	?>

</select>

<input type="submit" id="submit" value="Grrove on to recipes" name="submit"><br><br>



<form method="POST" action="make-flower.php">
<input type="submit" id="submit" value="Add another flower" name="submit">
</form><br>


</body>
</html>