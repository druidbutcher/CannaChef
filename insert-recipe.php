<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Your new Recipe</title>
<link rel="stylesheet" href="css/style.css" />

</head>

<body>
<?php
  session_start();

  $userid = $_SESSION['id'];
  $name = $_POST['name'];
  $image = $_POST['image'];
  $directions = $_POST['directions'];
  $numberServings = $_POST['numberServings'];
 

$username = "root";
$password = "root";
$database = "cc";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);
// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully";



$query = "INSERT INTO recipe (recipe.name, recipe.image, numberServings, directions)  VALUES ('$name', '$image', '$numberServings', '$directions')";
//echo $query;
if ($mysqli->query($query) === TRUE) {
  $last_id = mysqli_insert_id($mysqli);
  echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . $mysqli->error;
}


?>

	
	
	<table border="1" cellspacing="1" cellpadding="1"> 
      <tr> 
          <td> <font face="Arial">Recipe name</font> </td>
          <td> <font face="Arial">Recipe image</font> </td>
          <td> <font face="Arial">Number of Servings</font> </td>  
     
      </tr>
<?php
$query = "SELECT * FROM recipe WHERE id = '$last_id'";

$result = $mysqli->query($query);
$row = $result->fetch_assoc();

          echo '<tr><th>'.$row["name"].'</th><td><img src="'.$row["image"].'"width="100" height="100"></td><td>'.$row["numberServings"].'</td></tr>'; 
    
 


?>
<form action="insert-ingredient.php" method="POST">
  
  <label for="name">Ingredient name:</label><br>
  <input type="text" id="ingredient" name="ingredient"><br>
  <label for="amount">Amount:</label>
  <select id="amount" name="amount"><br>
  <option value=".25">1/4</option>
    <option value=".5">1/2</option>
    <option value=".75">3/4 </option>  
    <option value="1">1</option>
    <option value="1.25">1 1/4</option>
    <option value="1.5">1 1/2</option>
    <option value="1.75">1 3/4 </option>
    <option value="2">2</option>
    <option value="2.25">2 1/4</option>
    <option value="2.5">2 1/2</option>
    <option value="2.75">2 3/4 </option>
    <option value="3">3</option>
    <option value="3.25">3 1/4</option>
    <option value="3.5">3 1/2</option>
    <option value="3.75">3 3/4 </option>
    <option value="4">4</option>
    <option value="4.25">4 1/4</option>
    <option value="4.5">4 1/2</option>
    <option value="4.75">4 3/4 </option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>

  </select>
  <label for="measure">Choose a measurement:</label>
  <select id="measure" name="measure">
    <option value="cup">Cup</option>
    <option value="tsp">Teaspoon</option>
    <option value="tbsp">Tablespoon</option>
    <option value="pinch">Pinch</option>
    <option value="ounces">Ounces</option>
    <option value="floz">Fluid Ounces</option>
    <option value="large">Large</option>
    <option value="package">Package</option>
  </select><br>
  <label for="Description">Description :</label><br>
  <input type="text" id="description" name="description"><br>
  <label for="isFat">Check if this Fat :</label><br>
  <label for="isFat">Yes :</label><br>
  <input type="checkbox" id="isFat" name="isFat" value="1"><br>
  <label for="isFat1">No :</label><br>
  <input type="checkbox" id="isFat1" name="isFat" value="0"><br>
  <label for="recipeid">Recipe id :</label><br>
  <input type="text" id="recipeid" name="recipeid" value =  <?php echo $last_id; ?>  ><br>
  <input type="submit" value="Submit">
</form>
<h2> Make your recipe </h2>
</body>
</html>