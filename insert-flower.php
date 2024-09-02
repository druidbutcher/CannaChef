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
include('redirect.php');
session_start();

        $userid = $_SESSION['id'];
        $demouser = $_POST['demouser'];
        $flowerName = $_POST["flowername"];
        $thcPercent = $_POST["thcpercent"];
        $flowerAmount = $_POST["amountflower"];
        $fatAmount = $_POST["fatamount"];
        $fat = $_POST["fat"]; 
		    $infusion = $_POST["infusion"]; 
        $decarb = $_POST["decarb"];
        $totalThc = $_POST["totalThc"];
        $totalPerThc = $_POST["totalPerTsp"];
           // echo $userid;
            //echo $demouser;
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


if (empty($demouser)) {
  include('conn.php');
}else{
  include('conndemo.php');
}


$mysqli = new mysqli($hostname, $username, $password, $database);
// Check connection
//echo $database;
//die ("im dead again");
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}else{
//echo ("good connection!");
}
//echo $database;

$query = "INSERT INTO flower (fat, decarb, infusion, flowerName, thcPercent, flowerAmount, fatAmount, totalThc, totalPerTsp) VALUES ('$fat', '$decarb', '$infusion', '$flowerName', '$thcPercent','$flowerAmount','$fatAmount','$totalThc','$totalPerTsp')";
//echo $query;
if (mysqli_query($mysqli, $query)) {
  $last_id = mysqli_insert_id($mysqli);
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}


$query = "INSERT INTO userflower (flowerid, userid) VALUES ('$last_id','$userid')";
$result = $mysqli->query($query); 
$_SESSION['fid'] = $last_id;
//echo $demouser;
//echo $_SESSION['fid'];
//die("why i gotta die");
if (empty($demouser)) {
  RedirectWithMethodPost("pick-flower.php?user=''");
}else{
  RedirectWithMethodPost("pick-flower.php?user=demouser");
}

?>

</body>
</html>