<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Cannabis Chef - show</title>
</head>
 <?php
//header("Refresh:0");
?>
<body>
<?php 

session_start();

        $userid = $_SESSION['id'];
        $flowerName = $_POST["flowername"];
        $thcPercent = $_POST["thcpercent"];
        $flowerAmount = $_POST["amountflower"];
        $fatAmount = $_POST["fatamount"];
        $fat = $_POST["fat"]; 
		    $infusion = $_POST["infusion"]; 
        $decarb = $_POST["decarb"];
        $totalThc = $_POST["totalThc"];
        $totalPerThc = $_POST["totalPerTsp"];
		
		//do the math for totalthc
		$totalmg = $thcPercent * '10';
		 
		 $totalThcmg = $totalmg *  $flowerAmount;
		 $totalThc = $totalThcmg / $fatAmount;
		 $totalPerTsp = $totalThc / '16';
		
		
		
	/*
		 
		//math for loss
       let decarbLoss   = thcPercent * 0.8
	   //math for total in fat
	     let totinfat = thcperoz * totfat
        let totalmgs = totinfat / totperserv
        return String(format: "%.2f", totalmgs)
        
   //math for metric conversion
        
        guard let amount = Double(inputValue) else {return "Enter an amount"}
        guard let dense = Double(density) else {return "No density"}
        guard let choice = Double(volume) else {return "Choose a fat"}
        //input value * 236.5882 * density of typeofat
        let convertToDensity = amount * choice
        let convertToGram = convertToDensity * dense
        
		return String(format: "%.2f", convertToGram)
*/

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


$query = "INSERT INTO flower (fat, decarb, infusion, flowerName, thcPercent, flowerAmount, fatAmount, totalThc, totalPerTsp) VALUES ('$fat', '$decarb', '$infusion', '$flowerName', '$thcPercent','$flowerAmount','$fatAmount','$totalThc','$totalPerTsp')";

if (mysqli_query($mysqli, $query)) {
  $last_id = mysqli_insert_id($mysqli);
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}


$query = "INSERT INTO userflower (flowerid, userid) VALUES ('$last_id','$userid')";
$result = $mysqli->query($query); 
$_SESSION['fid'] = $last_id;
//echo $query;



//$mysqli->close();
header("Location: pick-flower.php");
exit();
?>

</body>
</html>