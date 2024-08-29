<!doctype html>
<html>
<head>
<?php session_start(); 
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
$user = "demo user";


$query = "INSERT INTO users (username)  VALUES ('$user')";
//echo $query;
if ($mysqli->query($query) === TRUE) {
$last_id = mysqli_insert_id($mysqli);
echo "New record created successfully";
} else {
echo "Error: " . $query . "<br>" . $mysqli->error;
} 
$_SESSION['demouser'] = $user;
$_SESSION['id'] = $last_id;
header ('location: make-flower.php'); 
exit;
?>
<body>
</body>
</html>