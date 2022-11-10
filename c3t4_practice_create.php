<?php
    require_once "c3t4-helper/validation.php";
    require_once "class/RelativeFatMass.php";
    require_once "class/BodyMassIndex.php";
    require_once "class/MySQLConnection.php";

    $config = require_once "c3t4_config.php";

    $connection = new MySQLConnection($config['host'],$config['database'],$config['user']);
    $connection = $connection->getConnection();

    $rules = [
        'name'   => ['required'],
        'age'    => ['required', 'numeric'],
        'gender' => ['required', 'gender'],
        'height' => ['required', 'numeric'],
        'weight' => ['required', 'numeric'],
        'waist_size' => ['required', 'numeric'],
    ];

    $validationResult = validation($rules);
    $isValid = is_valid($rules);

    function insert_process(PDO $connection): void
    {
        $name      = $_POST['name'];
        $age       = $_POST['age'];
        $gender    = $_POST['gender'];
        $height    = $_POST['height'];
        $weight    = $_POST['weight'];
        $waistSize = $_POST['waist_size'];

        $bmi = new BodyMassIndex($height, $weight);

        $rfm = new RelativeFatMass($height, $waistSize, $gender);

        $timestamp = date('Y-m-d H:i:s');
        $insertQuery = "INSERT INTO persons VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $values = [
            NULL, 
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
            $timestamp, 
            $timestamp
        ];

        $prepareQuery = $connection->prepare($insertQuery);
        
        if ($prepareQuery->execute($values)) {
            echo "new record successfully created!";
            header('Refresh:3; url=c3t4_practice.php');
        }
    }

    $_REQUEST && $isValid ? insert_process($connection) : null;
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
        <?= error_message($validationResult, 'waist_size'); ?>
    </div>

    <a href="c3t4_practice.php">Go home</a>
</body>
</html>
