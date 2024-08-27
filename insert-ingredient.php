<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>insert ingredients</title>
</head>
<body>
 
<?php
	//insert recipe ingredients
    $recipeid=$_POST['recipeid'];
    $ingredient=$_POST['ingredient'];
    $amount=$_POST['amount'];
    $measure=$_POST['measure'];
    $description=$_POST['description'];

    $isFat=$_POST['isFat'];
    $username = "root";
    $password = "root";
    $database = "cc";
    
    $mysqli = new mysqli("localhost:3306", $username, $password, $database);
    // Check connection
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
    }
    $query = "INSERT INTO recipeitems (recipeid, ingredient, amount, measure, recipeitems.description, isFat)  VALUES ('$recipeid', '$ingredient', '$amount', '$measure', '$description','$isFat')";
//echo $query;
if ($mysqli->query($query) === TRUE) {
  $last_id = mysqli_insert_id($mysqli);
  //echo "New record created successfully";
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
$query1 = "SELECT * FROM recipe WHERE recipe.id = '$recipeid'";
$result = $mysqli->query($query1);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
          echo '<tr>
          <th>'.$row["name"].'</th>
          <td><img src="'.$row["image"].'"width="100" height="100"></td>
          <td>'.$row["numberServings"].'</td>
          </tr>'; 
    
 } 
  
} else {
  echo "0 results";
}
$query2 = "SELECT * FROM recipeitems WHERE recipeid = '$recipeid'";
//echo $query2;
$result1 = $mysqli->query($query2);
?>
      <tr> 
          <td> <font face="Arial">Ingredient</font> </td>
          <td> <font face="Arial">Amount</font> </td>
          <td> <font face="Arial">Measurement</font> </td>  
          <td> <font face="Arial">Description</font> </td>  
      </tr>
      <?php
            if ($result1->num_rows > 0) {
                // output data of each row
            while($row2 = $result1->fetch_assoc()) {
 
          echo '
          <tr>
          <th>'.$row2["ingredient"].'</th>
          <td>'.$row2["amount"].'</td>
          <td>'.$row2["measure"].'</td>
          <td>'.$row2["description"].'</td>
          </tr>
          
          '; 
    
 } 
  
} else {
  echo "0 results";
}
?>
</table>
<h2>Add an ingredient</h2>
<form action="insert-ingredient.php" method="POST">
  <label for="name">Ingredient name:</label><br>
  <input type="text" id="ingredient" name="ingredient"><br>
  <label for="amount">Amount:</label>
  <select id="amount" name="amount"><br>
    <option value=".25">1/8</option>
    <option value=".5">1/2</option>
    <option value=".75">3/4 </option>  
    <option value="1">1</option>
    <option value="1.25">1 1/8</option>
    <option value="1.5">1 1/2</option>
    <option value="1.75">1 3/4 </option>
    <option value="2">2</option>
    <option value="2.25">2 1/8</option>
    <option value="2.5">2 1/2</option>
    <option value="2.75">2 3/4 </option>
    <option value="3">3</option>
    <option value="3.25">3 1/8</option>
    <option value="3.5">3 1/2</option>
    <option value="3.75">3 3/4 </option>
    <option value="4">4</option>
    <option value="4.25">4 1/8</option>
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
    <option value="large">large</option>
    <option value="ounces">ounces</option>
  </select><br>
  <label for="Description">Description :</label><br>
  <input type="text" id="description" name="description"><br>
  <label for="isFat">Check if this Fat :</label><br>
  <label for="isFat">Yes :</label><br>
  <input type="checkbox" id="isFat" name="isFat" value="1"><br>
  <label for="isFat1">No :</label><br>
  <input type="checkbox" id="isFat1" name="isFat" value="0"><br>
  <label for="recipeid">Recipe id :</label><br>
  <input type="text" id="recipeid" name="recipeid" value =  <?php echo $recipeid; ?>  ><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>