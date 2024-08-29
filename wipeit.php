<!doctype html>
<html>
<head>
<?php session_start();
 $userid = $_SESSION['id'];
 $demouser = $_SESSION['demouser']; 
 // move connections to a single file require 'conn.php';
$username = "root";
$password = "root";
$database = "ccdemo";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}else{
echo ("good connection!");
}


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
         //session_write_close();

     
header ('location: index.php'); 
exit;
?>
<body>
</body>
</html>