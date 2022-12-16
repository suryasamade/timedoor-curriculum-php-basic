<?php
    require_once "helper/get_input.php";

    require_once "class/RelativeFatMass.php";
    require_once "class/BodyMassIndex.php";
    
    $connection = require_once "helper/connection.php";
    
    if (!$_GET) {
        echo "<h2>access not allowed!</h3>";
        die();
    }

    $id        = get_input('id', 0);
    $name      = get_input('name', '');
    $age       = get_input('age', 0);
    $gender    = get_input('gender', 'm');
    $height    = get_input('height', 0);
    $weight    = get_input('weight', 0);
    $waistSize = get_input('waist_size', 0);

    $selectQuery = "SELECT * FROM persons WHERE id=?";
    $prepareQuery = $connection->prepare($selectQuery);
    $prepareQuery->execute([$id]);
    $person = $prepareQuery->fetch();

    if (!$person) {
        echo "<h2>Data not found!</h2>";
        die();
    }

    $bmi = new BodyMassIndex();
    $bmi->calculate($height, $weight);

    $rfm = new RelativeFatMass();
    $rfm->calculate($height, $waistSize, $gender);

    // PREPARE METHOD with UNNAMED-PLACEHOLDER & EXECUTE
    $updateQuery = "UPDATE persons SET name=?, age=?, gender=?, height=?, weight=?, waist_size=?, rfm_score=?, rfm_category=?, bmi_score=?, bmi_category=? WHERE id=?;";
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
        $bmi->getCategory(),
        $id
    ];
    
    $prepareQuery = $connection->prepare($updateQuery);
    
    if ($prepareQuery->execute($values)) {
        echo "<h2>data is successfully updated!</h2>";
        header('Refresh:3; url=index.php');
    } else {
        echo "<h2>failed to updating data!</h2>";
    }
?>