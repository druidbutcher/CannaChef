<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show Flower by user</title>
</head>

<body>
<?php
session_start();
 $userid = $_SESSION['id'];
 
//$userid= "5";
 //echo ("im here");
 $username = "root";
 $password = "root";
 $database = "cc";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
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