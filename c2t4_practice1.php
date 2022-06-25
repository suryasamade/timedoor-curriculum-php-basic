<!-- SKENARIO -->
<!-- membuat function dan menampilkannya ke we-page -->
<!-- membuat function dengan parameter untuk mengirimkan nilai, dan menampilkannya -->
<!-- membuat function dengan parameter, dan melakukan kalkulasi dalam function, dan menampilkannya -->

<?php

// step 1
// create a function and show this to web-page
function documentTitle()
{
    echo "Play with PHP Functions";
}

// step 2
// create function with arguments/parameters, and concate the parameters/params with others string
function greetPeoples($name, $time)
{
    echo "Hi, Good $time $name! How are you today?";
}

// step 3
// using params to set value of side-long to count the square area
function countSquareArea($side)
{
    $area = $side * $side;
    echo "Total area of the lands is = " . $area . " m<sup>2</sup>.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php documentTitle(); ?></title>
</head>

<body>
    <h1>First functions-program!</h1>
    <p><b><?php greetPeoples("Rob", "morning") ?></b></p>
    <p><?php countSquareArea(320) ?></p>
</body>

</html>