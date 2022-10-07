<?php
    require_once "c3t4_config.php";
    require_once "c3t4-helper/validation.php";
    require_once "class/RelativeFatMass.php";
    require_once "class/BodyMassIndex.php";

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
        $id     = $_POST['id'];
        $name   = $_POST['name'];
        $age    = $_POST['age'];
        $gender = $_POST['gender'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $waistCircumference = $_POST['waist_circumference'];

        $rfmObj = new RelativeFatMass($name, $age, $gender, $height, $weight, $waistCircumference);
        $bmiObj = new BodyMassIndex($name, $age, $gender, $height, $weight, $waistCircumference);
        $rfmObj->countRFM();
        $bmiObj->countBMI();

        $timestamp = date('Y-m-d H:i:s');
        $sql = "UPDATE persons SET name=?, age=?, gender=?, height=?, weight=?, waist_circumference=?, score_rfm=?, id_rfm=?, score_bmi=?, id_bmi=?, updated_at=? WHERE id=?;";
        $values = [
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
            $id
        ];

        $updateQuery = $dbh->prepare($sql);
        $updateData  = $updateQuery->execute($values);
        
        if ($updateData) {
            echo "{$name} successfully updated!";
            header('Refresh:3; url=c3t4_practice.php');
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

    <a href="c3t4_practice.php">Go home</a>
</body>
</html>