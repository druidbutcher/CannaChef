<!doctype html>
<html>

<head>
<link rel="stylesheet" href="css/style.css" />

<?php 
include('redirect.php');
include('conndemo.php');

$mysqli = new mysqli($hostname, $username, $password, $database);
//die("dead1");
echo $database;

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
session_start(); 
$_SESSION['id'] = $last_id;



RedirectWithMethodPost("make-flower.php?user=demouser");
?>

<body>
</body>
</html>