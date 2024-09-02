<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show Flower by user</title>
</head>

<body>
<?php
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

$userid = $_SESSION['id'];
$flowerid= $_SESSION['fid'];

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
$query = "SELECT * FROM flower INNER JOIN userflower ON flower.id = userflower.flowerid ORDER BY '$userid'";

//echo $query;


$result = $mysqli->query($query);

	echo '<table border="1" cellspacing="1" cellpadding="1"> 
      <tr> 
         <td> <font face="Arial">Flower ID</font> </td>     
         <td> <font face="Arial">Flower name</font> </td> 
          <td> <font face="Arial">THC Percentage</font> </td> 
          <td> <font face="Arial">Flower Amount in  grams</font> </td> 
          <td> <font face="Arial">Fat Amount in cups</font> </td> 
          <td> <font face="Arial">Fat type</font> </td> 
		      <td> <font face="Arial">Infusion </font> </td> 
          <td> <font face="Arial">Decarb</font> </td> 
          <td> <font face="Arial">Total Thc per Cup </font> </td> 
		      <td> <font face="Arial">Total Thc per Tbsp </font> </td>
          
      </tr>';

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   
	  	  $id = $row["flowerid"];
        $field1name = $row["flowerName"];
        $field2name = $row["thcPercent"];
        $field3name = $row["flowerAmount"];
        $field4name = $row["fatAmount"];
        $field5name = $row["fat"]; 
		    $field6name = $row["infusion"]; 
        $field7name = $row["decarb"];
        $field8name = $row["totalThc"];
        $field9name = $row["totalPerTsp"];
        

echo '   <tr> 
                  <td><input type="text" id=fname name=fname value ='.$id.' ></td> 
                  <td bgcolor="grey"><input type="text" id=fname name=fname value = "'.$field1name.'" ></td> 
                  <td bgcolor="white"><input type="text" id=f1 name=f1 value ="'.$field2name.' "></td> 
                  <td bgcolor="grey"><input type="text" id=fname name=fname value ='.$field3name.' ></td> 
                  <td bgcolor="white"><input type="text" id=fname name=fname value ='.$field4name.' ></td> 
				          <td bgcolor="grey"><input type="text" id=fname name=fname value ="'.$field5name.'" ></td> 
				          <td bgcolor="white"><input type="text" id=fname name=fname value ="'.$field6name.'" ></td> 
				          <td bgcolor="white"><input type="text" id=fname name=fname value ="'.$field7name.'" ></td> 
				          <td bgcolor="grey"><input type="text" id=fname name=fname value ='.$field8name.' ></td> 
				          <td bgcolor="white"><input type="text" id=fname name=fname value ='.$field9name.' ></td>
				  
				          <td><input type="submit" value="Edit"></td>
				          <td><input type="submit" value="Delete"></td>
				  
				  
        </tr> 
		
		 ';
    
 } 
  
} else {
  echo "0 results";
}

//mysql_free_result($result);
?>

<form method="POST" action="make-flower.php">
<input type="submit" id="submit" value="Add another" name="submit">
</form><br>
<form method="POST" action="recipemaker.php">
<label for="name">Flower id:</label>
  <input type="text" id="flowerid" name="flowerid"><br>
<input type="submit" id="submit" value="Make a recipe" name="submit">
</form>

</body>
</html>