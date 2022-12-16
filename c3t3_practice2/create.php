<?php
    require_once "helper/get_input.php";

    require_once "class/RelativeFatMass.php";
    require_once "class/BodyMassIndex.php";
    
    $connection = require_once "helper/connection.php";

    if (!$_GET) {
        echo "<h2>access not allowed!</h2>";
        die();
    }

    $name      = get_input('name', '');
    $age       = get_input('age', 0);
    $gender    = get_input('gender', 'm');
    $height    = get_input('height', 0);
    $weight    = get_input('weight', 0);
    $waistSize = get_input('waist_size', 0);

    $bmi = new BodyMassIndex();
    $bmi->calculate($height, $weight);

    $rfm = new RelativeFatMass();
    $rfm->calculate($height, $waistSize, $gender);

    $insertQuery = "INSERT INTO persons (name, age, gender, height, weight, waist_size, rfm_score, rfm_category, bmi_score, bmi_category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $values = [
        $name, 
        $age, 
        $gender, 
        $height, 
        $weight, 
        $waistSize, 
        $rfm->getScore(), 
        $rfm->getCategory(), 
        $bmi->getScore(), 
        $bmi->getCategory()
    ];

    $prepareQuery = $connection->prepare($insertQuery);

    if ($prepareQuery->execute($values)) {
        echo "<h2>new data successfully created!</h2>";
        header('Refresh:3; url=index.php');
    } else {
        echo "<h2>failed to adding the new data!</h2>";
    }
?>