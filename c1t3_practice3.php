<!-- BMI -->
<!-- SKENARIO -->
<!-- menghitung BMI, dan menentukan kategorinya -->
<!-- konversi rentang nilai menjadi operator perbandingan-logika -->

<?php
$mass   = 70; // massa dalam kilogram
$height = 180; // tinggi dalam centimeter

$height /= 100; // tinggi dalam meter
$bmi    = number_format($mass / ($height ** 2), 2); // format number to show just two digits after decimal's dot

// reference https://en.wikipedia.org/wiki/Body_mass_index
if ($bmi < 16.0) {
    $category = "Underweight (Severe thinness)";
} elseif ($bmi >= 16.0 && $bmi <= 16.9) {
    $category = "Underweight (Moderate thinness)";
} elseif ($bmi >= 17.0 && $bmi <= 18.4) {
    $category = "Underweight (Mild thinness)";
} elseif ($bmi >= 18.5 && $bmi <= 24.9) {
    $category = "Normal";
} elseif ($bmi >= 25.0 && $bmi <= 29.9) {
    $category = "Overweight (Pre-obese)";
} elseif ($bmi >= 30.0 && $bmi <= 34.9) {
    $category = "Obese (Class I)";
} elseif ($bmi >= 35.0 && $bmi <= 39.9) {
    $category = "Obese (Class II)";
} else {
    $category = "Obese (Class III)";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Body Mass Index - Calculator</title>
</head>

<body>
    <h1>Your Body Mass Index</h1>
    <p>Berat badan = <?= $mass ?> kg & tinggi badan = <?= $height ?> m.</p>
    <p>BMI Anda adalah sebesar <?= $bmi ?> dan termasuk dalam kategori <b><?= $category ?></b>.</p>
    <?php
    // gunakan if(): endif;
    if ($category != "Normal") {
        echo "<p><b style='color:red'>Warning!</b> Perhatikan kondisi kesehatan dan kecukupan gizi Anda.</p>";
    }
    ?>
</body>

</html>