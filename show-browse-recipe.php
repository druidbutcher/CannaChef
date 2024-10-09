<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show your Recipe</title>

<link rel="stylesheet" href="css/style.css" />

</head>

<body>
<?php
include ('fraction.php');
$demouser = $_POST['demouser'];
$userid = $_POST['id'];
//echo $demouser;
//echo $userid;
if (empty($demouser)) {
  ?>
 
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


$recipeid = $_POST['recipeid'];
//echo $recipeid;
   include('conn.php');
 
 $mysqli = new mysqli($hostname, $username, $password, $database);
 // Check connection
 if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
 }else{
 //echo ("good connection!");
 }




 $query = "SELECT * FROM recipe  WHERE id ='$recipeid'";
 $result = $mysqli->query($query);
 $row1 = mysqli_fetch_assoc($result);



$query2 = "SELECT * FROM recipeItems  WHERE recipeid ='$recipeid'";
$result2 = $mysqli->query($query2);

echo '

<table >
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
<div class="recipe">
'; 

While($row=mysqli_fetch_array($result2))
{ 
    $roundup =  $row["amount"] * 8;
    $midround = ceil($roundup);
    $finalround = $midround / 8;

    echo '
    

 
    <tr>
    <td>'.convert_decimal_to_fraction( $finalround).'</td>
    <td>'.$row["measure"].'</td>
    <td>'.$row["description"].'</td>
    <th>'.$row["ingredient"].'</th>
  
    </tr>
  
    <br>';

$roundup =  $row["amount"] * 8;
$midround = ceil($roundup);
$finalround = $midround / 8;

}
$directions = $row1["directions"];

     ?>
<h2> Directions</h2>
<?php
echo nl2br($directions);

  ?>
  </div>
  <form method="POST" action="browse-recipe.php">
  <input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
<input type="submit" id="submit" value="View another recipe" name="submit">
</form><br>
  </body>
</html>