<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>insert local new</title>
<link rel="stylesheet" href="css/style.css" />

</head>

<body>
<?php

function convert_decimal_to_fraction($decimal){

    $big_fraction = float2rat($decimal);
    $num_array = explode('/', $big_fraction);
    $numerator = $num_array[0];
    $denominator = $num_array[1];
    $whole_number = floor( $numerator / $denominator );
    $numerator = $numerator % $denominator;

    if($numerator == 0){
        return $whole_number;
    }else if ($whole_number == 0){
        return $numerator . '/' . $denominator;
    }else{
        return $whole_number . ' ' . $numerator . '/' . $denominator;
    }
}

function float2rat($n, $tolerance = 1.e-6) {
    $h1=1; $h2=0;
    $k1=0; $k2=1;
    $b = 1/$n;
    do {
        $b = 1/$b;
        $a = floor($b);
        $aux = $h1; $h1 = $a*$h1+$h2; $h2 = $aux;
        $aux = $k1; $k1 = $a*$k1+$k2; $k2 = $aux;
        $b = $b-$a;
    } while (abs($n-$h1/$k1) > $n*$tolerance);

    return "$h1/$k1";
}
/*
echo $_POST['mynum']."<br>";
if ($_POST['mynum'] <> "") {
$mynum = $_POST['mynum'];
echo "Number is : ".$mynum."<br>";
echo "Fraction is ".convert_decimal_to_fraction($mynum)."<hr>";
}
?>
<form action="" method=post>
<input type=text name=mynum>Enter a number: </input>
<button type=submit>Convert</button>
</form>
*/
?>
</body>
</html>