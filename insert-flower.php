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


        $userid = $_POST['id'];
        $demouser = $_POST['demouser'];
        $flowerName = $_POST["flowername"];
        $thcPercent = $_POST["thcpercent"];
        $flowerAmount = $_POST["amountflower"];
        $fatAmount = $_POST["fatamount"];
        $fat = $_POST["fat"]; 
		    $infusion = $_POST["infusion"]; 
        $decarb = $_POST["decarb"];
        $totalThc = $_POST["totalThc"];
        $totalPerTsp = $_POST["totalPerTsp"];
        $recipeid = $_POST["recipeid"];
        $numberServings = $_POST["numberServings"];
        $thcPerServing = $_POST["thcPerServing"];
        $instructions = $_POST["instructions"];
   //echo $instructions;
   //echo $demouser;
   //echo $userid;
   //die ("ima dead");
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

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}else{
//echo ("good connection!");
}


$query = "INSERT INTO flower (fat, decarb, infusion, flowerName, thcPercent, flowerAmount, fatAmount, totalThc, totalPerTsp) VALUES ('$fat', '$decarb', '$infusion', '$flowerName', '$thcPercent','$flowerAmount','$fatAmount','$totalThc','$totalPerTsp')";
//echo $query;
if (mysqli_query($mysqli, $query)) {
  $last_id = mysqli_insert_id($mysqli);
  $flowerid= $last_id;
  //echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}

if (empty($recipeid)) {
  $recipeid = 0;
  $numberServings = 0;
  $thcPerServing = 0;
  $fatAmount = 0;
  $query1 = "INSERT INTO userflower (flowerid, userid,recipeid,numberServings,thcPerServing,thcFatAmount) VALUES ('$last_id','$userid','$recipeid','$numberServings','$thcPerServing','$fatAmount')";
  $result1 = $mysqli->query($query1);
  $last_id = mysqli_insert_id($mysqli);
  $userflowerid = $last_id;
}else{

  $query1 = "INSERT INTO userflower (flowerid, userid,recipeid,numberServings,thcPerServing,thcFatAmount) VALUES ('$last_id','$userid','$recipeid','$numberServings','$thcPerServing','$fatAmount')";
  $result1 = $mysqli->query($query1);
  $last_id = mysqli_insert_id($mysqli);
  $userflowerid = $last_id;
//echo $userflowerid;


 
  if (empty($demouser)) {
    //die("top of no demouser");
?>
<form name="recipevars" method="post" action="view-recipe.php">
<input type="hidden" name="userflowerid" value="<?php echo $userflowerid; ?>">
<input type="hidden" name="numberServings" value="<?php echo $numberServings; ?>">
<input type="hidden" name="flowerid" value="<?php echo $flowerid; ?>">
<input type="hidden" name="thcPerServing" value="<?php echo $thcPerServing; ?>">
<input type="hidden" name="totalThc" value="<?php echo $totalThc; ?>">
<input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
<script language="JavaScript">document.recipevars.submit();</script></form>
<?php
   
  }else{
   // die("top of demouser");

if (!empty($instructions)) {

  ?>
  <form name="recipevars" method="post" action="infusion-instructions.php">
  <input type="hidden" name="userflowerid" value="<?php echo $userflowerid; ?>">
  <input type="hidden" name="flowerid" value="<?php echo $flowerid; ?>">
  <input type="hidden" name="numberServings" value="<?php echo $numberServings; ?>">
  <input type="hidden" name="thcPerServing" value="<?php echo $thcPerServing; ?>">
  <input type="hidden" name="totalThc" value="<?php echo $totalThc; ?>">
  <input type="hidden" name="user" value="<?php echo $demouser; ?>">
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
  <script language="JavaScript">document.recipevars.submit();</script></form>
  <?php


}
    ?>
    <form name="recipevars" method="post" action="view-recipe.php">
    <input type="hidden" name="userflowerid" value="<?php echo $userflowerid; ?>">
    <input type="hidden" name="flowerid" value="<?php echo $flowerid; ?>">
    <input type="hidden" name="numberServings" value="<?php echo $numberServings; ?>">
    <input type="hidden" name="thcPerServing" value="<?php echo $thcPerServing; ?>">
    <input type="hidden" name="totalThc" value="<?php echo $totalThc; ?>">
    <input type="hidden" name="user" value="<?php echo $demouser; ?>">
    <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
    <script language="JavaScript">document.recipevars.submit();</script></form>
    <?php
  }
 

}


if (empty($demouser)) {
  RedirectWithMethodPost("pick-flower.php?user=''&fid=$userflower&id=$userid");
}else{
  ?>
  <form name="recipevars" method="post" action="infusion-instructions.php">
  <input type="hidden" name="flowerid" value="<?php echo $flowerid; ?>">
  <input type="hidden" name="userflowerid" value="<?php echo $userflowerid; ?>">
  <input type="hidden" name="numberServings" value="<?php echo $numberServings; ?>">
  <input type="hidden" name="thcPerServing" value="<?php echo $thcPerServing; ?>">
  <input type="hidden" name="totalThc" value="<?php echo $totalThc; ?>">
  <input type="hidden" name="user" value="<?php echo $demouser; ?>">
  <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
  <script language="JavaScript">document.recipevars.submit();</script></form>
  <?php
}


?>

</body>
</html>