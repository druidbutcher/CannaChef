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

  $userid = $_POST['id'];
  $recipeid = $_POST['recipeid'];
  $demouser = $_POST['demouser'];
  //echo $demouser;
  //echo $userid;
if (empty($demouser)) {
  ?>
 
 <div class="navbar">
   <div class="dropdown">
     <button class="dropbtn">Menu
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
 <center>
<?php
}



if (empty($demouser)) {
  include('conn.php');
 }else{
  include('conndemo.php');
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
    <td>'.convert_decimal_to_fraction( $finalround).'</td>
    <td>'.$row["measure"].'</td>
    <td>'.$row["description"].'</td>
    <th>'.$row["ingredient"].'</th>
  
    </tr>
    <br>';
   
}
        
    
    $oldfat = $row["amount"];
    $roundup1 =  $oldfat * 8;
    $midround1 = floor($roundup1);
    $finalround1 = $midround1 / 8;

    if   ($fatty == 1){

        
      $typeofat =  $row["ingredient"];
       
       ?>
         <h1 style="font-size: 1.5rem; color: dark green">
   
       <?php
       echo ("This is the base ingredient for  your infusion!!")."</h1>";
       ?>
       <h1 style="font-size: 1.5rem; color: blue">
 
     <?php  
       echo convert_decimal_to_fraction($finalround1).(" ").$row["measure"].(" ").$row["ingredient"]; 
       ?></h1>
       <?php
     
            
         }
     }
     ?>
<h2> Directions</h2>
<?php
echo nl2br($directions);

  ?>
  <form method="POST" action="pick-recipe-3.php">
  <input type="hidden" id= "typeofat" name="typeofat" value = "<?php echo $typeofat?>">
  <input type="hidden" id= "recipeid" name="recipeid" value = "<?php echo $recipeid;?>">
  <input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>">
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
<input type="submit" id="submit" value="Use this recipe" name="submit">
</form>
<form method="POST" action="pick-recipe-first.php">
  <input type="hidden" id= "demouser" name="demouser" value = "<?php echo $demouser; ?>"> <br><br>
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
<input type="submit" id="submit" value="View another recipe" name="submit">
</form>
    </center>
  </body>
</html>