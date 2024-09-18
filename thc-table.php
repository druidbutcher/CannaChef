<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>View your Recipe</title>
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



session_start();
$demouser= $_POST['user'];
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
     
 
     </div>
   </div>
 </div>
<?php
 }
 $userid = $_SESSION['id'];
 $userflowerid = $_POST['userflowerid'];
 $numberServings = $_POST['numberServings'];
 $thcPerServing = $_POST['thcPerServing'];
 $amount = $_POST['amount'];
 $thcpercent = $_POST['thcpercent'];
echo $numberServings;
echo $thcPerServing;
echo $amount;
echo $thcpercent;

 $totalThcPerRec = $numberServings * $thcPerServing;


		//do the math for totalthc table
		$totalmg = $thcpercent * '10';
		 
		 $totalThcmg = $totalmg *  $amount;
		 $totalThc = $totalThcmg / 1;
		 $totalPerTsp = $totalThc / '16';

          //divide by totalthc (in one cup) of flower
            $totalThcFatPerRec1 = $totalThcPerRec / $totalThc;
            $totalThcFatPerRec = number_format($totalThcFatPerRec1, 2);
            echo ("This is the total amount of fat in cups needed").$totalThcFatPerRec;
            $roundup2 =  $totalThcFatPerRec * 8;
            $midround2 = ceil($roundup2) ;
            $totalThcRec = $midround2 / 8; 
            ?>

 </body>
 </hmtl>