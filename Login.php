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

 include('redirect.php');
 include('conn.php');

 if (isset($_POST['login'])) { 
 
// Connect to the database 
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check for errors 
if ($mysqli->connect_error) { die("Connection failed: " . $mysqli->connect_error); } 
$username = $_POST['username']; 
$password1 = $_POST['password']; 

$query = "SELECT * FROM users where username = '$username' ";
$result = $mysqli->query($query);
$row = mysqli_fetch_array($result);
$id = $row["id"];
$password = $row["password"];

// Check if the user exists 
if ($row["username"] > 0) { 

// Verify the password 
//if ($row["password"] == $password1) {

// Redirect to the user's dashboard
RedirectWithMethodPost("choose-path-user.php?id=$id"); 
//header("Location: make-flower.php"); 
exit; }
/*} else {
   echo "Incorrect password!";
   } 
  } else { 
    echo "User not found!"; } 
    */
  }

?>
<meta charset="UTF-8">
<title>Login</title>
</head>

<body>
<form action="Login.php" method="post">
<input type="hidden" id="id">
  <label for="username">Username:</label>
  <input id="username" name="username" required="" type="text" />
  <label for="password">Password:</label> <input id="password" name="password" required="" type="password" />
  <input name="login" type="submit" value="Login" />
</form>
forgot my Password
</body>
</html>