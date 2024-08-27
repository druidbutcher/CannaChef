<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Choose Recipe</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
 <?php
session_start();
  $userid = $_SESSION['id'];
  $flowerid = $_POST['flowerid'];
  $recipeid = $_POST['recipeid'];
  $rid = substr($recipeid,-8);
  $recipeid = preg_replace("/[^0-9,.]/", "", $rid)."\n";
  
  //echo $userid;
  //echo $flowerid;
  //echo $recipeid;

$username = "root";
$password = "root";
$database = "cc";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);
//die("Im here");


// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
//echo "Connected successfully";
$query = "INSERT INTO userflower (userid, flowerid, recipeid) VALUES ('$userid', '$flowerid', '$recipeid')";

if (mysqli_query($mysqli, $query)) {
    $last_id = mysqli_insert_id($mysqli);
  //echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
//select recipe
$query1 = "SELECT * FROM recipe where recipe.id = '$recipeid'";
if (mysqli_query($mysqli, $query1)) {
  //echo "Got the recipe";
} else {
  echo "Error: " . $query1 . "<br>" . $mysqli->error;
}
$result = $mysqli->query($query1);
$row = mysqli_fetch_assoc($result);

//select flower
$query2 = "SELECT * FROM flower where flower.id = '$flowerid'";
if (mysqli_query($mysqli, $query2)) {
  //echo "Got the flower";
} else {
  echo "Error: " . $query2 . "<br>" . $mysqli->error;
}
$result2 = $mysqli->query($query2);
$row2 = mysqli_fetch_assoc($result2);
//pass variables lastid for the userflower so we can update numberServings , thcPerserving, thcFatAmount

  ?>
  <form action="view-recipe.php" method="POST">
  
  <h3><?php echo $row['name']; ?> </h3><br>
    <img src="<?php echo $row["image"]; ?>"width="100" height="100"><br>
    <label for="numberServings">Number of Servings:</label><br>
  <input type="text" id="numberServings" name="numberServings" value=<?php echo $row['numberServings'];  ?>><br>
      <label for="thcPerServing">THC Per Serving :</label><br>
  <input type="text" id="thcPerServing" name="thcPerServing"><br>
  <input type="hidden" id="userflowerid" name="userflowerid" value = "<?php echo $last_id; ?>"><br>
  <input type="hidden" id="totalThc" name="totalThc" value = "<?php echo $row2["totalThc"]; ?>"><br>
  <input type="submit" id="submit" value="Lets see it!!" name="submit">
</form>
</body>
</html>