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
  $demouser = $_POST['user'];
  $userid = $_SESSION['id'];
  $recipeid = $_POST['recipeid'];
  $numberServings = $_POST['numberServings'];
  $thcPerServing = $_POST['thcPerServing'];
  $amount = $_POST['amount'];
  $thcpercent = $_POST['thcpercent'];


 $totalThcPerRec = $numberServings * $thcPerServing;
 //do the math for totalthc table
 $totalmg = $thcpercent * '10';

  $totalThcmg = $totalmg *  $amount;
  $totalThc = $totalThcmg / 1;
  $totalPerTsp = $totalThc / '16';


     //$roundup2 =  $totalThcFatPerRec * 8;
     //$midround2 = ceil($roundup2) ;
     //$totalThcRec = $midround2 / 8; 
     //die("I died here2");
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
  <form  method="POST">

  <h3><?php echo $row['name']; ?> </h3><br>
    <img src="<?php echo $row["image"]; ?>"width="100" height="100"><br>
    <label for="numberServings">Number of Servings:</label><br>
  <input type="text" id="numberServings" name="numberServings" value=<?php echo $row['numberServings'];  ?>><br>
      <label for="thcPerServing">mgs of THC Per Serving *10mg is nice and easy*:</label><br>
  <input type="text" id="thcPerServing" name="thcPerServing"><br><br>
  Now what about your flower? You can play with different numbers here<br><br>
        <label for="amount">Amount of flower in grams:</label><br>
  <input type="text" id="amount" name="amount" ><br>
        <label for="thcpercent">Percentage of THC in flowers:</label><br>
  <input type="text" id="thcpercent" name="thcpercent" ><br>
  <input type="hidden" id= "user" name="user" value = "<?php echo $demouser; ?>">
  <input type="hidden" id= "recipeid" name="recipeid" value = "<?php echo $recipeid; ?>">
  <input type="submit" id="submit" value="Lets see it!!" name="submit">
</form>
<?php
  //divide by totalthc (in one cup) of flower
   //these need to go after the post
     $totalThcFatPerRec1 = $totalThcPerRec / $totalThc;
     $totalThcFatPerRec = number_format($totalThcFatPerRec1, 2);
     echo ("This is the total amount of infusion you will need ").$totalThcFatPerRec.("cups");
     ?>
</body>
</html>