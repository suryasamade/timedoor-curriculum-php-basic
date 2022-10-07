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

    $id         = input_checker('id');
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
    $sql = "UPDATE persons SET name=?, age=?, gender=?, height=?, weight=?, waist_circumference=?, score_rfm=?, category_rfm=?, score_bmi=?, category_bmi=?, updated_at=? WHERE id=?;";
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
    $updateData = $updateQuery->execute($values);

    if ($updateData) {
        echo "{$name} successfully updated!";
        header('Refresh:3; url=c3t3_practice2.php');
    }