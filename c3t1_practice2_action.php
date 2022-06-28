<?php
$name   = $_GET['name'];
$age    = $_GET['age'];
$height = $_GET['height'];
$weight = $_GET['weight'];
$gender = $_GET['gender'];
$waist_circumference    = $_GET['waist_circumference'];
$standard               = $_GET['standard'];

// form validation
$notValid = [];
if (empty($name)) {
    array_push($notValid, "Name");
} elseif (empty($age) || !is_numeric($age)) {
    array_push($notValid, "Age");
} elseif (empty($height) || !is_numeric($height)) {
    array_push($notValid, "Height");
} elseif (empty($weight) || !is_numeric($weight)) {
    array_push($notValid, "Weight");
} elseif (!($gender == "M" || $gender == "F")) {
    array_push($notValid, "Gender");
} elseif (empty($waist_circumference) || !is_numeric($waist_circumference)) {
    array_push($notValid, "Circumference");
} elseif ($standard == "WHO" || $standard == "Japan" || $standard == "Hongkong" || $standard == "Singapore") {
    array_push($notValid, "Standard");
}

// echo count([]);
echo "<br>";
// var_dump($notValid);
if (count($notValid) > 0) {
    $messages = null;
    foreach ($notValid as $idx => $message) {
        $messages .= "message$idx=$message,";
    }

    header("Location: c3t1_practice2_error.php?$messages");
}

die();

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