<!-- COST CALCULATION: WITH CONDITIONAL -->
<!-- CASE -->
<!--
    1. hilangkan warning dengan evaluasi jika input undefined, gunakan nilai default 
    2. jika dana/kas dievaluasi sebagai true, maka proyek akan dilaksanakan
    3. tapi jika dana/kas dievaluasi sebagai false, maka pelaksanaan proyek perbaikan jalan akan ditunda sementara
-->

<?php
$appName        = "Cost Calculation";
$appTitle       = "Dynamics Calculating Project Cost";

$isCashReady    = false;

// conditional untuk menetapkan nilai default
if (isset($_GET['anggrek_street'])) {
    if (empty($_GET['anggrek_street'])) {
        $anggrekStreetLength = 0;
    } else {
        $anggrekStreetLength = $_GET['anggrek_street'];
    }
} else {
    $anggrekStreetLength = 0;
}

if (isset($_GET['kamboja_street'])) {
    if (empty($_GET['kamboja_street'])) {
        $kambojaStreetLength = 0;
    } else {
        $kambojaStreetLength = $_GET['kamboja_street'];
    }
} else {
    $kambojaStreetLength = 0;
}

if (isset($_GET['lotus_street'])) {
    if (empty($_GET['lotus_street'])) {
        $lotusStreetLength = 0;
    } else {
        $lotusStreetLength = $_GET['lotus_street'];
    }
} else {
    $lotusStreetLength = 0;
}

$anggrekStreetLength  *= 1000;
$lotusStreetLength    /= 100;

$totalStreetLength  = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;
$costMaterial       = $totalStreetLength * 15000;
$workerFee          = ($totalStreetLength / 1000) * 650000;
$totalCost          = $costMaterial + $workerFee;

$costDescription    = 'Maka untuk melakukan perbaikan jalan dengan total panjang ' . $totalStreetLength . ' meter, Perumahan Graha Sentosa harus menyiapkan total biaya sebesar Rp. ' . $totalCost . '.';

// conditional untuk menentukan status pelaksanaan proyek
if ($isCashReady) {
    $executionStatus    = 'Karena telah tersedianya dana, proyek tersebut akan segera dilaksanakan!';
    $fontColor          = "green";
} else {
    $executionStatus    = 'Namun, pelaksanaan proyek akan ditunda hingga dana telah tersedia.';
    $fontColor          = "red";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $appName ?></title>
</head>

<body>
    <h1><?= $appTitle ?></h1>

    <form action="" method="GET">
        <label for="anggrek">Jalan Anggrek</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek"><br>
        <label for="kamboja">Jalan Kamboja</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja"><br>
        <label for="lotus">Jalan Lotus</label>
        <input type="number" step="0.1" name="lotus_street" id="lotus"><br>
        <input type="submit" value="Count">
    </form>

    <p><?= $costDescription ?></p>

    <?php if ($totalStreetLength > 0) : ?>
        <!-- buat teks berwarna HIJAU ketika kas dievaluasi TRUE, atau teks berwarna MERAH ketika FALSE -->
        <p style="color:<?= $fontColor ?>;"><?= $executionStatus ?></p>
    <?php endif; ?>
</body>

</html>