<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".//css/style.css" />
    
    <title>Cannabis Chef</title>
    
    <link rel="icon" type="image/jpg" rel="noopener" target="_blank" href="images/ccicon118.jpg">
	<link rel="manifest" href="manifest.json" />
	
  </head>
  <body class="mainlogo">
 <?php
     session_unset();
     session_destroy();
     if (!empty($demouser)) {
        //echo ("demouser is set");
     }else{
      //echo ("No demouser");
     }
     ?>
  <div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Menu
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="help.php">Help</a>
  
    </div>
  </div>
</div><br>
<span>Welcome to CannaChef!</span><br>
  <img src="images/small-cclogo.png" width="200" height="200" alt=""/><br>
	  
 
	  
  <table border="1" align="center" cellpadding="10" cellspacing="10">
	    <tbody>
	      <tr>
	        <td><input onclick="window.location='Login.php';" type="button" class="loginbuttons" value="Log In" ></td>
	        <td><input  onclick="window.location='register.php';" type="button" class="loginbuttons" value="Register" ></td>
	        <td><input  onclick="window.location='demo-login.php';" type="button" class="loginbuttons" value="Demo Mode" ></td>
          </tr>
        </tbody>
  </table>
	 <span>CannaChef gives you accurate THC dosages for your homemade edibles or other products. It saves all your infusions and automatically adds the correct substitution amounts to your recipes. </span>
  <table border="1" align="center" cellpadding="10" cellspacing="10">
  <tbody>
    <tr>
      <td><input type="button" class="tutorials" value="Overview"></td>
      <td><input onclick="window.location='http://localhost/cannachef-web/decarb.php';" type="button" class="tutorials" value="Decarb" ></td>
      
    
    </tr>
    <tr>
      <td><input type="button" class="tutorials" value="Other Products"></td>
      <td><input type="button" class="tutorials" value="Website and Other Info"></td>
    </tr>

  </tbody>
</table>
</body>
</html>
