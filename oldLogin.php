<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".//css/style.css" />

  <style>
    input[type=submit] {
  background-color:  #71b894;
  border: 1;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<?php 
 session_start(); 
 include('redirect.php');
 include('conn.php');

 if (isset($_POST['login'])) { 

// Connect to the database 
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check for errors 
if ($mysqli->connect_error) { die("Connection failed: " . $mysqli->connect_error); } 

// Prepare and bind the SQL statement 
$stmt = $mysqli->prepare("SELECT id, password FROM users WHERE username = ?"); $stmt->bind_param("s", $username); 

// Get the form data 
$username = $_POST['username']; $password = $_POST['password']; 

// Execute the SQL statement 
$stmt->execute(); $stmt->store_result(); 

// Check if the user exists 
if ($stmt->num_rows > 0) { 

// Bind the result to variables 
$stmt->bind_result($id, $hashed_password); 

// Fetch the result 
$stmt->fetch(); 

// Verify the password 
if (password_verify($password, $hashed_password)) { 

// Set the session variables 
$_SESSION['loggedin'] = true; 
$_SESSION['id'] = $id; 
$_SESSION['username'] = $username; 
$id = $_SESSION['id'];
// Redirect to the user's dashboard
RedirectWithMethodPost("choose-path-user.php?userid=$id"); 
//header("Location: make-flower.php"); 
exit; 
} else {
   echo "Incorrect password!";
   } 
  } else { 
    echo "User not found!"; } 

// Close the connection 
$stmt->close(); $mysqli->close(); }
?>
<meta charset="UTF-8">
<title>Login</title>
</head>

<body>
<form action="Login1.php" method="post">
<input type="hidden" id="id">
  <label for="username">Username:</label>
  <input id="username" name="username" required="" type="text" />
  <label for="password">Password:</label> <input id="password" name="password" required="" type="password" />
  <input name="login" type="submit" value="Login" />
</form>
forgot my Password
</body>
</html>