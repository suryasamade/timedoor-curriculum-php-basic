<!-- APPLYING MATERIAL -->
<!-- VALIDATION: TAMBAH VALIDASI UNTUK MIN/MAX KARAKTER INPUT, GANTI MENJADI POST METHOD -->

<?php
    require_once "c3t4-helper/validation.php";

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
        $measure = $_POST['measure'];
        $name    = $_POST['name'];
        $age     = $_POST['age'];
        $gender  = $_POST['gender'];
        $height  = $_POST['height'];
        $weight  = $_POST['weight'];
        $waistCircumference = $_POST['waist_circumference'];

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
    <form action="" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" >
        <div style="color:red;"><?= error_message($validationResult, 'name'); ?></div>
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" >
        <div style="color:red;"><?= error_message($validationResult, 'age'); ?></div>
        <br>
        <p>Select gender:</p>
        <div style="color:red;"><?= error_message($validationResult, 'gender'); ?></div>
        <input type="radio" name="gender" id="male" value="m" >
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="f" >
        <label for="female">Female</label>
        <br>
        <label for="height">Height</label>
        <input type="number" name="height" id="height" >
        <div style="color:red;"><?= error_message($validationResult, 'height'); ?></div>
        <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight" id="weight" step="0.1" >
        <div style="color:red;"><?= error_message($validationResult, 'weight'); ?></div>
        <br>
        <label for="waist_circumference">Waist Circumference</label>
        <input type="number" name="waist_circumference" id="waist_circumference" >
        <div style="color:red;"><?= error_message($validationResult, 'waist_circumference'); ?></div>
        <br>
        <label for="measure">Measure</label>
        <select name="measure" id="measure">
            <option value="bmi">BMI</option>
            <option value="rfm">RFM</option>
        </select>
        <div style="color:red;"><?= error_message($validationResult, 'measure'); ?></div>
        <br>
        <input type="submit" value="Count">
    </form>
    <?php if ($_REQUEST && $isValid): ?>
        <h3>Calculation result is:</h3>
        <?php if ($measure == "rfm"):?>
            <p>RFM score <?= "<b>{$objPerson->getRFMScore()}%</b>, belongs to the category <b>{$objPerson->getRFMCategory()}</b>" ?></p>
        <?php else: ?>
            <p>BMI score <?= "<b>{$objPerson->getBMIScore()}</b>, belongs to the category <b>{$objPerson->getBMICategory()}</b>" ?></p>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>