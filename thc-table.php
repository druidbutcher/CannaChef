<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Test page</title>

<link rel="stylesheet" href="css/style.css" />

</head>

<body>

<form name=frmTest action="NextPage.asp" method=POST>
  <p>
  <select name=ComboName size=1 onChange="frmTest.submit();">
    <option value="" SELECTED>Choose One 
    <option value="1">Numbers
    <option value="2">Fruit
    <option value="3">Animals
    <option>Rock
    <option>Scissors
    <option>Paper
    <option value="H">Hearts
    <option value="D">Diamonds
    <option value="C">Clubs
    <option value="S">Spades
  </select>
  </p>
</form>




 </body>
 </hmtl>