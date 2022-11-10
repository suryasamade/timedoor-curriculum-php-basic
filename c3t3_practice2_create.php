<?php
    require_once "class/RelativeFatMass.php";
    require_once "class/BodyMassIndex.php";
    require_once "class/MySQLConnection.php";
    
    $config = require_once "c3t3_config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);
    $connection = $connection->getConnection();

    function get_input(string $inputName, mixed $default = null): mixed
    {
        if (isset($_GET[$inputName])) return $_GET[$inputName];

        return $default;
    }

    $name      = get_input('name', '');
    $age       = get_input('age', 0);
    $gender    = get_input('gender', 'm');
    $height    = get_input('height', 0);
    $weight    = get_input('weight', 0);
    $waistSize = get_input('waist_size', 0);

    $bmi = new BodyMassIndex($height, $weight);

    $rfm = new RelativeFatMass($height, $waistSize, $gender);

    // PREPARE METHOD with UNNAMED-PLACEHOLDER & EXECUTE
    $insertQuery = "INSERT INTO persons (name, age, gender, height, weight, waist_size, rfm_score, rfm_category, bmi_score, bmi_category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $values      = [
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
        echo "new record successfully created!";
        header('Refresh:3; url=c3t3_practice2.php');
    }