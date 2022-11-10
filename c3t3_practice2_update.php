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

    // LAKUKAN PENGECEKAN 'ID' DAHULU DISINI, 
    // KALO 'ID' TIDAK ADA LANGSUNG BERIKAN WARNING BERUPA 'ECHO' DAN die()

    $id        = get_input('id');
    $name      = get_input('name', '');
    $age       = get_input('age', 0);
    $gender    = get_input('gender', 'm');
    $height    = get_input('height', 0);
    $weight    = get_input('weight', 0);
    $waistSize = get_input('waist_size', 0);

    $bmi = new BodyMassIndex($height, $weight);

    $rfm = new RelativeFatMass($height, $waistSize, $gender);

    // PREPARE METHOD with UNNAMED-PLACEHOLDER & EXECUTE
    $timestamp = date('Y-m-d H:i:s');
    $updateQuery = "UPDATE persons SET name=?, age=?, gender=?, height=?, weight=?, waist_size=?, score_rfm=?, category_rfm=?, score_bmi=?, category_bmi=? WHERE id=?;";
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
        echo "data is successfully updated!";
        header('Refresh:3; url=c3t3_practice2.php');
    }