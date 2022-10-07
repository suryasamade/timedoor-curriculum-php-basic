<?php
    require_once "c3t5_config.php";
    require_once "c3t4-helper/validation.php";
    require_once "class/RelativeFatMass_c3t5.php";
    require_once "class/BodyMassIndex_c3t5.php";

    $rules = [
        'name'   => ['required'],
        'age'    => ['required', 'numeric'],
        'gender' => ['required', 'gender'],
        'height' => ['required', 'numeric'],
        'weight' => ['required', 'numeric'],
        'waist_circumference' => ['required', 'numeric'],
    ];

    $validationResult = validation($rules);
    $isValid = !($validationResult);

    if ($_REQUEST && $isValid)
    {
        $name    = $_POST['name'];
        $age     = $_POST['age'];
        $gender  = $_POST['gender'];
        $height  = $_POST['height'];
        $weight  = $_POST['weight'];
        $waistCircumference = $_POST['waist_circumference'];

        $rfmObj = new RelativeFatMass($name, $age, $gender, $height, $weight, $waistCircumference);
        $bmiObj = new BodyMassIndex($name, $age, $gender, $height, $weight, $waistCircumference);
        $rfmObj->countRFM();
        $bmiObj->countBMI();

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
        $insertData  = $insertQuery->execute($values);
        
        if ($insertData) {
            echo "new record successfully created!";
            header('Refresh:3; url=c3t5_practice.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <div style="color:red;">
        <?= error_message($validationResult, 'name'); ?>
    </div>
            
    <div style="color:red;">
        <?= error_message($validationResult, 'age'); ?>
    </div>

    <div style="color:red;">
        <?= error_message($validationResult, 'gender'); ?>
    </div>
                
    <div style="color:red;">
        <?= error_message($validationResult, 'height'); ?>
    </div>

    <div style="color:red;">
        <?= error_message($validationResult, 'weight'); ?>
    </div>

    <div style="color:red;">
        <?= error_message($validationResult, 'waist_circumference'); ?>
    </div>

    <a href="c3t5_practice.php">Go home</a>
</body>
</html>
