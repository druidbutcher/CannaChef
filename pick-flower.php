<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Show Infusion</title>
<link rel="stylesheet" href=".//css/style.css" />

 <!--
<script type="text/javascript">
    function PrintTable() {
        var printWindow = window.open('', '', 'height=200,width=400');
        printWindow.document.write('<html><head><title>Table Contents</title>');
 
        //Print the Table CSS.
        var table_style = document.getElementById("table_style").innerHTML;
        printWindow.document.write('<style type = "text/css">');
        printWindow.document.write(table_style);
        printWindow.document.write('</style>');
        printWindow.document.write('</head>');
 
        //Print the DIV contents i.e. the HTML Table.
        printWindow.document.write('<body>');
        var divContents = document.getElementById("dvContents").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
  -->
</head>

<body>
<?php
session_start();
$demouser = $_POST['user'];
$userid = $_SESSION['id'];
$flowerid = $_SESSION['fid'];
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
     <button class="dropbtn">Menu
       <i class="fa fa-caret-down"></i>
     </button>
     <div class="dropdown-content">
     <a href="index.php">Home</a>
 
     </div>
   </div>
 </div>
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

$query1 = "SELECT * FROM flower WHERE id = '$flowerid'";
$result1 = $mysqli->query($query1);
$row1 = mysqli_fetch_array($result1);
//echo $query1;
echo '
<table>

<tr>
  <th>Flower Name</th>
  <th>THC % of flower</th>
  <th>Type of Fat</th>
  <th>Total THC per cup</th>
  <th>Total THC per Tbsp</th>
  <th>Total cups in this batch</th>
  
</tr>
<tr>
<td>'.$row1["flowerName"].'</td>
<td>'.$row1["thcPercent"].'</td>
<td>'.$row1["fat"].'</td>
<td>'.$row1["totalThc"].'</td>
<td>'.$row1["totalPerTsp"].'</td>
<td>'.$row1["fatAmount"].'</td>

</tr>
</table>
<br>

</div>
'; 
unset($_SESSION['fid']);

$query = "SELECT DISTINCT flower.totalThc, flower.totalPerTsp, userflower.flowerid , userflower.userid, flower.id, flower.flowerName , flower.thcPercent FROM flower INNER JOIN userflower ON flower.id = userflower.flowerid WHERE userflower.userid = '$userid' ORDER BY flower.id DESC ";

$result = $mysqli->query($query);


	
?>
<h3>Choose an Infusion</h3>
		<form action="choose-recipe.php" method="POST">
		<span class="custom-dropdown big">
<?php
echo '<select name= "flowerid" id= "flowerid">';
//echo "<option>--Users--</option";	
While($row=mysqli_fetch_array($result))

{ 
  $fid = "$row[flowerid]";
  $totthc = "$row[totalThc]";
  ?>
  	<option value = <?php echo $fid; ?>><?php echo "$row[flowerName]"?>--THC%--<?php echo "$row[thcPercent]" ; ?> </option>"
	
  <?php
}
	?>

</select>
<noscript><input type=”submit” value=”Submit”></noscript>
</span>

<input type="hidden" id= "user" name="user" value = "<?php echo $demouser; ?>">
<input type="submit" id="submit" value="Groove on to recipes" name="submit"><br><br>
</form><br>


<form method="POST" action="make-flower.php">
<input type="hidden" id= "user" name="user" value = "<?php echo $demouser; ?>">
<input type="submit" id="submit" value="Make another Infusion" name="submit">
</form><br>


</body>
</html>