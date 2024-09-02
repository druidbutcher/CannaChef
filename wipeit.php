
<?php
session_start();
 $userid = $_SESSION['id'];
 $demouser = $_SESSION['demouser']; 
 // move connections to a single file require 'conn.php';

 include('conndemo.php');
 $mysqli = new mysqli($hostname, $username, $password, $database);
 echo $database;
 // Check connection
 if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
 }else{
 echo ("good connection!");
 }
 $user = "demo user";


$query = "DELETE  `users`, `flower`,`userflower` FROM `userflower`JOIN `users`ON users.id = userflower.userid JOIN `flower` ON userflower.flowerid = flower.id WHERE users.id = '$userid' ";
//$query = "DELETE  FROM users  USING JOIN flower JOIN userflower  where users.id = '$userid' AND userflower.userid = '$userid' AND flower.id = userflower.flowerid";
//echo $query;
if ($mysqli->query($query) === TRUE) {
$last_id = mysqli_insert_id($mysqli);
echo "Nuked em";
} else {
echo "Error: " . $query . "<br>" . $mysqli->error;
} 

  

  
    session_unset();
    session_destroy();



     
header ('location: index.php'); 
exit;
?>
