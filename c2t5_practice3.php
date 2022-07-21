<!-- CASE -->
<!-- memanfaatkan constructor, require/include, membuat inheritance, melakukan overriding property/method, memanfaatkan fungsi get_class() -->
<!-- ubah $category pada categoryBMI() class Person dalam bentuk array -->

<?php
// option
// require_once "class/Singapore.php";
// require_once "class/Japan.php";
require_once "class/Hongkong.php";

// instantiate the object
// set the properties when create an object
$roki = new Hongkong("Roki", 24, 180, 68, 65);
$rokiBMI = $roki->countBMI();
$rokiRFM = $roki->countRFM();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $roki->name ?> Health Record: BMI and RFM</title>
</head>

<body>
    <h1><?= "{$roki->name}'s Body Mass Index (BMI) and Relative Fat Mass (RFM) Result." ?></h1>
    <h3><?= $roki->welcomeGreeting() ?></h3>
    <p><?= "BMI: <b>$rokiBMI</b>, belongs to the category <b>{$roki->categoryBMI($rokiBMI)}</b> based on <b>{$roki->standardMeasurement}</b> standard." ?></p>
    <p><?= "RFM: <b>$rokiRFM%</b>, belongs to the category <b>{$roki->categoryRFM($rokiRFM)}</b>." ?></p>
</body>

</html>