<?php
$name   = $_GET['name'];
$age    = $_GET['age'];
$height = $_GET['height'];
$weight = $_GET['weight'];
$gender = $_GET['gender'];
$waist_circumference    = $_GET['waist_circumference'];
$standard               = $_GET['standard'];

// validating the form first
if (empty($name)) {
    header("Location: c3t1_practice2_error.php?errorMessage=name");
} elseif (empty($age) || !is_numeric($age)) {
    header("Location: c3t1_practice2_error.php?errorMessage=age");
} elseif (empty($height) || !is_numeric($height)) {
    header("Location: c3t1_practice2_error.php?errorMessage=height");
} elseif (empty($weight) || !is_numeric($weight)) {
    header("Location: c3t1_practice2_error.php?errorMessage=weight");
} elseif (!($gender == "M" || $gender == "F")) {
    header("Location: c3t1_practice2_error.php?errorMessage=gender");
} elseif (empty($waist_circumference) || !is_numeric($waist_circumference)) {
    header("Location: c3t1_practice2_error.php?errorMessage=waist_circumference");
} elseif (!($standard == "Person" || $standard == "Japan" || $standard == "Hongkong" || $standard == "Singapore")) {
    header("Location: c3t1_practice2_error.php?errorMessage=standard");
}

require_once "class/$standard.php";

$person     = new $standard($name, $age, $height, $weight, $waist_circumference, $gender);
$personBMI  = $person->countBMI();
$personRFM  = $person->countRFM();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $person->name ?> Health Record: BMI and RFM</title>
</head>

<body>
    <h1><?= "{$person->name}'s Body Mass Index (BMI) and Relative Fat Mass (RFM) Result." ?></h1>
    <h3><?= $person->welcomeGreeting() ?></h3>
    <p><?= "BMI: <b>$personBMI</b>, belongs to the category <b>{$person->categoryBMI($personBMI)}</b> based on <b>{$person->standardMeasurement}</b> standard." ?></p>
    <p><?= "RFM: <b>$personRFM%</b>, belongs to the category <b>{$person->categoryRFM($personRFM)}</b>." ?></p>
</body>

</html>