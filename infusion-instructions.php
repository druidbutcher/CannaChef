<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href=".//css/style.css" />
    <style id="table_style" type="text/css">
   
    table
    {
        border: 1px solid #ccc;
        border-collapse: collapse;
    }
    table th
    {
        background-color: #F7F7F7;
        color: #333;
        font-weight: bold;
    }
    table th, table td
    {
        padding: 5px;
        border: 1px solid #ccc;
    }
</style>
    <title>How to make your infusion</title>
    <script type="text/javascript">
    function PrintTable() {
        var printWindow = window.open('', '', 'height=200,width=500');
        printWindow.document.write('<html><head><title>Infusion Label</title>');
 
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
</head>
<body>
 
<?php
include ('fraction.php');
$demouser= $_POST['user'];
$userid = $_POST['id'];
$userflowerid = $_POST['userflowerid'];
$flowerid = $_POST["flowerid"];
$totalThc = $_POST['totalThc'] ;

//echo $flowerid;
//echo $totalThc;
  $totalThcPerRec = $numberServings * $thcPerServing;
  //divide by totalthc (in one cup) of flower
  $totalThcFatPerRec1 = $totalThcPerRec / $totalThc;
  $totalThcFatPerRec = number_format($totalThcFatPerRec1, 2);
  //echo ("This is the total amount of fat in cups needed").$totalThcFatPerRec;
  $roundup2 =  $totalThcFatPerRec * 8;
  $midround2 = ceil($roundup2) ;
  $totalThcRec = $midround2 / 8;  
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
<?php }else{ ?>
 <div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Demo Menu
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

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}else{
//echo ("Good connection");
}


$query1 = "SELECT * FROM userflower WHERE userflower.id ='$userflowerid'";
//echo $query1;
$result1 = $mysqli->query($query1);
$row1 = mysqli_fetch_assoc($result1);
$cupofat= $row1["thcFatAmount"];
//$flowerid =$row1["flowerid"];
$userflowerid = $row1["id"];
$numberServings=$row1["numberServings"];
$thcPerServing=$row1["thcPerServing"];
$recipeid = $row1["recipeid"];

$query = "SELECT * FROM flower WHERE flower.id ='$flowerid'";
//echo $query;
$result = $mysqli->query($query);
$row = mysqli_fetch_assoc($result);
$flowerName = $row["flowerName"];

echo '
<div id="dvContents" style="border: 1px dotted black; padding: 5px; width:100%">
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
<td>'.$row["flowerName"].'</td>
<td>'.$row["thcPercent"]."  %".'</td>
<td>'.$row["fat"].'</td>
<td>'.$row["totalThc"]."  mgs".'</td>
<td>'.$row["totalPerTsp"]."  mgs".'</td>
<td>'.$row["fatAmount"].'</td>
</tr>
<input type="button" onclick="PrintTable();" value="Print"/>
</div>

</table>
<br>
';

$fat = $row["fat"];
$decarb = $row["decarb"];
$infusion = $row["infusion"];
?>

<h2>First things first. You need to decarb your bud!</h2><br>

<?php 
switch ($decarb) {
    case "oven":
      echo ("You chosen the "). $decarb.("   method!")."<br><br>";
      echo ("Oven Method (16% Loss)<br>
      Using your oven is the most common method, but don't expect to keep all your potency<br>
       Here’s how to do it:<br>
      •	Prep Your Flower: There’s some debate on whether to grind it or break it up into small pieces.<br> 
      Personally, I prefer breaking it into thumbnail-sized chunks. It seems to help<br>
      retain some terpenes for better flavor.<br>
      •	Get Baking: Preheat your oven to 230°F (110°C). Spread the flower on a baking sheet and pop it in <br>
      for about 30 minutes. Keep your nose ready—the moment you start to<br>
      smell that delicious cannabis aroma, it’s time to check the color. Aim for a nice medium brown!<br>");
      break;
    case "sousvide":
      echo ("Sous Vide Method (8% Loss)<br>
      If you're looking for a more controlled way to decarb, try the sous vide method. <br>
      •	Setup: Fill your sous vide container with hot tap water and drop in the immersion circulator. Set it to 203°F (95°C).<br>
      •	Grind Time: You’ll want to grind your cannabis finely. Since sous vide keeps things at a precise temperature, there’s less risk of ruining those beautiful cannabinoids and
      terpenes.<br>
      •	Seal It Up: Vacuum-seal the cannabis or use the water displacement method in a zip-top bag to minimize air pockets.<br>
      •	Hot Bath: Place it in the water bath for about 90 minutes. Once done, let it cool for 15- 20 minutes, dry off the bag, and your decarbed cannabis is ready for cooking!<br>
      ");
      break;
    case "ardent":
      echo "Ardent Method (0% Loss)<br>
     The Ardent machine is where it’s at. It’s designed
      specifically, for decarbing, ensuring zero loss of your precious cannabinoids. <br>
      Simply follow the machine's instructions, and you’ll preserve all the goodness without any hassle!
      ";
      break;
    default:
      echo "You didnt  choose a decarb!";
  }
?>


<h2> Lets get infused </h2>
<?php 
switch ($infusion) {
    case "slowcooker":
      echo ("You chosen the slow cooker   method!")."<br><br>";
      echo ("What You’ll Need for the slow cooker method:<br>
        •	Decarboxylated cannabis (this step is crucial for activating those cannabinoids)<br>
        •	Your favorite carrier butter / oil (coconut, olive, or avocado oil works great!)<br>
        •	A trusty slow cooker<br>
        •	Step-by-Step Guide:<br>
        
        1.	Mix It Up: In a mason jar combine the decarboxylated cannabis with your chosen carrier oil or butter. <br>
            Give it a good stir to ensure that all of that lovely green goodness is fully submerged in the oil/butter.<br>
        2.	Set the Mood: Crank that slow cooker down to the middle temperature setting and fill halfway with water. We’re going for a gentle infusion here.<br>
        3.	Time to Infuse: Let the cannabis and oil mingle for about 4 to 6 hours. Give it a stir now and then to keep things moving. If you’re feeling adventurous, you can push it to 8 hours for a more potent oil or butter—but don’t go beyond that! We want to avoid degrading those delicate cannabinoids.<br>
        Strain and Store: When you’re done infusing, strain the oil through a cheesecloth or a fine mesh strainer to remove the plant matter. Store your infused oil or butter in a cool dark place, and voilà!<br>
        ");
      break;
    case "ardentfx":
      echo "ardentfx!";
      break;
    case "mbm":
      echo "mbm!";
      break;
      case "freezer":
        echo ("Freezer method is for making an alcahol based tincture.<br>
        Step 1: Chill Time<br>
        First things first—separate your decarbed cannabis and alcohol and pop them in the freezer.
        Yep, separate! Getting them super cold is key! The chilly temps help those lovely trichomes
        break off without dragging any nasty chlorophyll into your tincture. Trust me; your taste buds will thank you.<br>
        Step 2: 60 Minutes of Coolness<br>
        After letting them chill for about 60 minutes, grab your frozen cannabis and throw it into a mason jar.<br>
        Step 3: Time for a Soak<br>
        Next, pour in enough ice-cold alcohol to completely cover that plant material. Seal it up tight with the lid—this isn’t a party if things aren’t sealed properly.<br>
        
        Step 4: Shake It Up<br>
        Now, give that jar a good shake—like you mean it! A few minutes of vigorous shaking gets those cannabinoids mixing with the alcohol, setting the stage for extraction magic.<br>
        Step 5: Back in the Freezer<br>
        Next, stick that bad boy in the coldest part of your freezer (typically the back). Don’t forget to show it some love by giving it a good shake every 3-5 hours. Think of it as a chilly dance party for the tincture!<br>
        Step 6: Patience is a Virtue<br>
        Your tincture is ready to go in as little as a day, but here’s a pro tip: The longer you leave it in
        there—up to a couple of weeks—the closer to 100% infused it gets! Give yourself a little time and see the goodness develop.<br>
        Final Steps: Strain & Store<br>
        Once you’ve achieved that desired infusion level, it’s straining time! Filter out the plant material and transfer your tincture into a glass container. Don’t forget to use the label you printed in Canna chef. <br>
        Lasting Freshness
        You can store your tincture in the fridge for up to 6 months. So you can whip up a batch now and enjoy the fruits of your labor for months to come!
        ");
        break;
    default:
      echo "you didnt choose an infusion method!";
  }
  if (!empty($recipeid)) {
 
?>

    <form name="recipevars" method="post" action="view-recipe.php">
    <input type="hidden" name="userflowerid" value="<?php echo $userflowerid; ?>">
    <input type="hidden" name="numberServings" value="<?php echo $numberServings; ?>">
    <input type="hidden" name="thcPerServing" value="<?php echo $thcPerServing; ?>">
    <input type="hidden" name="totalThc" value="<?php echo $totalThc; ?>">
    <input type="hidden" name="user" value="<?php echo $demouser; ?>">
    <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
    <input type="submit" value="View your recipe"><br><br></form>
   <?php
  }else{
    ?>
    <form method="POST" action="wipeit.php">
    <input type="hidden" id= "id" name="id" value = "<?php echo $userid; ?>"> 
    <input type="hidden" id= "user" name="user" value = "<?php echo $demouser; ?>">
    <input type="submit" id="submit" value="Go again?" name="submit">
<?php
  } 
?>
</body>
</html>