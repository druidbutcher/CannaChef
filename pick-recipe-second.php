<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show your Recipe</title>
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
  $recipeid = $_POST['recipeid'];
  $granny = "true";

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


//show the recipe 
$query = "SELECT * FROM recipe WHERE id = '$recipeid'";
$result = $mysqli->query($query);
$row1 = mysqli_fetch_assoc($result);
$directions = $row1["directions"];

echo '
<table style="width:70%">
<tr>
  <th>Name</th>
  <th>Image</th>
  <th>Number of Servings</th>
 
</tr>
<tr>
<td>'.$row1["name"].'</td>
<td><img src="'.$row1["image"].'"width="100" height="100"></td>
<td>'.$row1["numberServings"].'</td>

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
// if ifat =1 dont show here, show below
$fatty = $row["isFat"];
if ($fatty != 1){
    echo '
  
    <tr>
    <th>'.$row["ingredient"].'</th>
    <td>'.convert_decimal_to_fraction($finalround).'</td>
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

        if ($oldfat > 0){
  
       
       ?>
         <h1 style="font-size: 1rem; color: #ec3a13">
   
       <?php
       echo ("This is What you will use to make your infusion!!")."</h1>";
       ?>
       <h1 style="font-size: 1rem; color: blue">
 
     <?php  
       echo $row["ingredient"].(" ").convert_decimal_to_fraction($finalround1).(" ").$row["measure"]; ?></h1>
       <?php
     
            }else{
        ?>
        <h1 style="font-size: 1rem; color: #ec3a13">
  
      <?php
        echo("You may choose either oil or tincture to make your infusion");
         ?>
         
         <?php
     
            }
         }
     }
     ?>
<h2> Directions</h2>
<?php
echo nl2br($directions);

  ?>
  <form method="POST" action="make-flower.php">
  <input type="hidden" id= "recipeid" name="recipeid" value = "<?php echo $recipeid;?>">
  <input type="hidden" id= "granny" name="granny" value = "<?php echo $granny; ?>">
<input type="submit" id="submit" value="Make your infusion" name="submit">
</form><br>
  </body>
</html>