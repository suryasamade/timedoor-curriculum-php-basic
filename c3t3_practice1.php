<!-- APPLYING MATERIAL -->
<!-- CONNECTING PHP WITH DATABASE -->

<?php
// CONNECTING DATABASE AND CHECK THE STATUS
require_once("./c3t3_config.php");

// if ($dbh) {
//     var_dump("Database Connected!");
// }
// END

function input_checker($inputName)
{
    if (isset($_GET[$inputName])) {
        return $_GET[$inputName];
    } else {
        return "null";
    }
}

$measure    = input_checker('measure');
$name       = input_checker('name');
$age        = input_checker('age');
$gender     = input_checker('gender');
$height     = input_checker('height');
$weight     = input_checker('weight');
$waistCircumference = input_checker('waist_circumference');

if ($measure) {
    if ($measure == "rfm") {
        require_once "class/RelativeFatMass.php";
        $objPerson = new RelativeFatMass($name, $age, $gender, $height, $weight, $waistCircumference);
        $objPerson->countRFM();
    } else {
        require_once "class/BodyMassIndex.php";
        $objPerson = new BodyMassIndex($name, $age, $gender, $height, $weight, $waistCircumference);
        $objPerson->countBMI();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical Record</title>
</head>

<body>
<h3>Body Mass Index (BMI) and Relative Fat Mass (RFM) Category Calculator</h3>
    <p>Form input</p>
    <form action="" method="GET">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" required>
        <br>
        <p>Select gender:</p>
        <input type="radio" name="gender" id="male" value="m" required>
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="f" required>
        <label for="female">Female</label>
        <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" required>
        <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" step="0.1" required>
        <br>
        <label for="waist_circumference">Waist Circumference</label>
        <input type="number" name="waist_circumference" id="waist_circumference" required>
        <br>
        <label for="measure">Measure</label>
        <select name="measure" id="measure">
            <option value="bmi">BMI</option>
            <option value="rfm">RFM</option>
        </select>
        <br>
        <input type="submit" value="Count">
    </form>

    <?php if ($measure): ?>
        <h3>Calculation result is:</h3>
        <?php if ($measure == "rfm"):?>
            <p>RFM score <?= "<b>{$objPerson->getRFMScore()}%</b>, belongs to the category <b>{$objPerson->getRFMCategory()}</b>" ?></p>
        <?php else: ?>
            <p>BMI score <?= "<b>{$objPerson->getBMIScore()}</b>, belongs to the category <b>{$objPerson->getBMICategory()}</b>" ?></p>
        <?php endif; ?>
    <?php endif; ?>
    
</body>

</html>