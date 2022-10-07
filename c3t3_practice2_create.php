<?php

require_once "c3t3_config.php";
require_once "class/RelativeFatMass.php";
require_once "class/BodyMassIndex.php";

function input_checker($inputName)
{
    if (isset($_GET[$inputName])) {
        return $_GET[$inputName];
    } else {
        return "null";
    }
}

// $measure    = input_checker('measure');
$name       = input_checker('name');
$age        = input_checker('age');
$gender     = input_checker('gender');
$height     = input_checker('height');
$weight     = input_checker('weight');
$waistCircumference = input_checker('waist_circumference');

$rfmObj = new RelativeFatMass($name, $age, $gender, $height, $weight, $waistCircumference);
$bmiObj = new BodyMassIndex($name, $age, $gender, $height, $weight, $waistCircumference);
$rfmObj->countRFM();
$bmiObj->countBMI();

// PREPARE METHOD with UNNAMED-PLACEHOLDER & EXECUTE
$timestamp = date('Y-m-d H:i:s');
$sql = "INSERT INTO persons VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
$values = [
    NULL, 
    $name, 
    $age, 
    $gender, 
    $height, 
    $weight, 
    $waistCircumference, 
    $rfmObj->getRFMScore(), 
    $rfmObj->getRFMCategory(), 
    $bmiObj->getBMIScore(), 
    $bmiObj->getBMICategory(), 
    $timestamp, 
    $timestamp
];
$insertQuery = $dbh->prepare($sql);
$insertData = $insertQuery->execute($values);

if ($insertData) {
    echo "new record successfully created!";
    header('Refresh:3; url=c3t3_practice2.php');
}