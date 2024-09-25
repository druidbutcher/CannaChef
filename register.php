<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/style.css" />

<?php 
include('redirect.php');

if (isset($_POST['register'])) { 
include('conn.php');
$mysqli = new mysqli($hostname, $username, $password, $database);
// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}else{
echo ("good connection!");
}
//echo $database;

// Get the form data 
$username = $_POST['username']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
//echo $username;
//echo $email;
//echo $password;
// Hash the password 
$password = password_hash($password, PASSWORD_DEFAULT); 
//Insert 

$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
//echo $query;
if (mysqli_query($mysqli, $query)) {
  //echo "New record created successfully. ";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
//goto login
RedirectWithMethodPost("Login.php?user=''");
}

?>
<meta charset="UTF-8">
<title>Register</title>
</head>

<body>
<h3> Register as a new user </h3>
<form action="register.php" method="post">
  <label for="username">Username:</label> 
  <input id="username" name="username" required="" type="text" />
  <label for="email">Email:</label>
  <input id="email" name="email" required="" type="email" />
  <label for="password">Password:</label>
  <input id="password" name="password" required="" type="password" />
  <input name="register" type="submit" value="Register" />
</form>
<form method="POST" action="Login.php">
<input type="submit" id="submit" value="Login" name="submit">
</form><br>
<?php 


?>
</body>
</html>