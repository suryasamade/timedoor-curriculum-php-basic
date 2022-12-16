<?php
    require_once "helper/Database.php";
    require_once "helper/Validation.php";
    require_once "helper/RequiredRule.php";
    require_once "helper/NumberRule.php";
    require_once "helper/get_input.php";

    require_once "class/RelativeFatMass.php";
    require_once "class/BodyMassIndex.php";
    
    $connection = require_once "helper/connection.php";

    if (!$_POST) {
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
    
    $database = new Database($connection);
    $person = $database->selectSpecified("persons", "id", "=", $id);
    
    if (!$person) {
        echo "<h2>Data not found!</h2>";
        die();
    }

    $attributes = [
        'name'   => $name,
        'age'    => $age,
        'gender' => $gender,
        'height' => $height,
        'weight' => $weight,
        'waist_size' => $waistSize,
    ];

    $rules = [
        'name' => [new RequiredRule()],
        'age' => [new RequiredRule(), new NumberRule(18, 60)],
        'gender' => [new RequiredRule()],
        'height' => [new RequiredRule(), new NumberRule(120, 220)],
        'weight' => [new RequiredRule(), new NumberRule(40, 150)],
        'waist_size' => [new RequiredRule(), new NumberRule(50, 100)],
    ];

    $validation = new Validation();
    $validation->makeRule(
        $attributes,
        $rules
    );

    if (!$validation->isFails()) {
        $bmi = new BodyMassIndex();
        $bmi->calculate($height, $weight);
        
        $rfm = new RelativeFatMass();
        $rfm->calculate($height, $waistSize, $gender);

        $attributes['rfm_score'] = $rfm->getScore();
        $attributes['rfm_category'] = $rfm->getCategory();
        $attributes['bmi_score'] = $bmi->getScore();
        $attributes['bmi_category'] = $bmi->getCategory();

        $columns = array_keys($attributes);
        $values = array_values($attributes);

        $update = $database->update("persons", $columns, $values, "id", "=", $id);
        
        if ($update) {
            echo "<h2>data is successfully updated!</h2>";
            header('Refresh:3; url=index.php');
        } else {
            echo "<h2>failed to updating data!</h2>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Medical Record</title>
</head>
<body>
    <div style="color:red;">
        <?php foreach ($validation->getErrors() as $attributeErrors):
            foreach ($attributeErrors as $error): ?>
                <?= "- {$error}<br>" ?>
            <?php endforeach ?>
            <br>
        <?php endforeach ?>
    </div>

    <a href="index.php">Go home</a>
</body>
</html>