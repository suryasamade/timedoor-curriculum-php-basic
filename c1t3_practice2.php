<!-- COST CALCULATION: WITH CONDITIONAL -->
<!-- CASE -->
<!--
    1. menyeragamkan dan menentukan satuan panjang jalan secara dinamis
    2. melakukan konversi panjang dengan conditional switch (satuan panjang ketiga jalan jadi dinamis)
-->

<?php
$appName        = "Cost Calculation";
$appTitle       = "Dynamics Calculating Project Cost";

// terapkan if-else-elseif
// terapkan switch-case-break-default
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

// buatkan form untuk variable ini
if (isset($_GET['cash_ready'])) {
    $isCashReady = true;
} else {
    $isCashReady = false;
}

if (isset($_GET['unit'])) {
    switch ($_GET['unit']) {
        case 'm':
            break;
        case 'cm':
            $anggrekStreetLength    /= 100;
            $kambojaStreetLength    /= 100;
            $lotusStreetLength      /= 100;
            break;
        default:
            $anggrekStreetLength    *= 1000;
            $kambojaStreetLength    *= 1000;
            $lotusStreetLength      *= 1000;
            break;
    }
}

$totalStreetLength  = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;
$costMaterial       = $totalStreetLength * 15000;
$workerFee          = ($totalStreetLength / 1000) * 650000;
$totalCost          = $costMaterial + $workerFee;

$costDescription    = 'Maka untuk melakukan perbaikan jalan dengan total panjang ' . $totalStreetLength . ' meter, Perumahan Graha Sentosa harus menyiapkan total biaya sebesar Rp. ' . $totalCost . '.';

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
        <label for="unit_length">Satuan Panjang Jalan</label>
        <select name="unit" id="unit_length">
            <option value="km">KM</option>
            <option value="m">M</option>
            <option value="cm">CM</option>
        </select><br>
        <label for="anggrek">Jalan Anggrek</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek" required><br>
        <label for="kamboja">Jalan Kamboja</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja" required><br>
        <label for="lotus">Jalan Lotus</label>
        <input type="number" step="0.1" name="lotus_street" id="lotus" required><br>
        <label for="cash">Kas tersedia?</label>
        <input type="checkbox" name="cash_ready" id="cash"><br>
        <input type="submit" value="Count">
    </form>

    <p><?= $costDescription ?></p>

    <?php if ($totalStreetLength > 0) : ?>
        <p style="color:<?= $fontColor ?>;"><?= $executionStatus ?></p>
    <?php endif; ?>

</body>

</html>