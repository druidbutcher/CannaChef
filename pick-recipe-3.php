<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Choose Recipe</title>
<link rel="stylesheet" href=".//css/style.css" />
<style>
input[type=submit] {
  background-color:  #71b894;
  border: 1;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>

<body>
 <?php
 
session_start();
  $demouser = $_POST['demouser'];
  $userid = $_POST['id'];
  $recipeid = $_POST['recipeid'];
  $typeofat = $_POST['typeofat']  ;
  //echo $typeofat;
//echo $demouser;
//echo $userid;
  if (empty($demouser)) {
    include('conn.php');
  }else{
    include('conndemo.php');
  }
  
  
  $mysqli = new mysqli($hostname, $username, $password, $database);

  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }else{
  //echo ("good connection!");
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



//pass variables lastid for the userflower so we can update numberServings , thcPerserving, thcFatAmount

  ?>
  <form action="pick-recipe-4.php" method="POST">
  
  <h3><?php echo $row['name']; ?> </h3><br>
    <img src="<?php echo $row["image"]; ?>"width="100" height="100"><br>
    <label for="numberServings">This recipe makes this number of servings<br> You may change it if you would like to</label><br>
  <input type="text" id="numberServings" name="numberServings" value=<?php echo $row['numberServings'];  ?>><br>
      <label for="thcPerServing">Enter how many mgs of THC do you want in each<br> <?php echo $row['name']; ?><br><label>
  <input type="text" id="thcPerServing" name="thcPerServing"><br>
  *10mg is nice and easy*

  <input type="hidden" id= "recipeid" name="recipeid" value = "<?php echo $recipeid; ?>">
  <input type="hidden" id= "typeofat" name="typeofat" value = "<?php echo $typeofat; ?>">
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
  <input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"><br><br>     
  <input type="submit" id="submit" value="Lets make an infusion!!" name="submit">
</form>
</body>
</html>