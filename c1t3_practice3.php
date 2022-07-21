<!-- COST CALCULATION: WITH CONDITIONAL -->
<!-- CASE -->
<!--
    1. menerapkan elseif
    2. menerapkan comparison operator
    3. menerapkan logical operator
-->

<?php
$appName        = "Cost Calculation";
$appTitle       = "Dynamics Calculating Project Cost";

// terapkan logical operator
if (isset($_GET['anggrek_street']) && !empty($_GET['anggrek_street'])) {
    $anggrekStreetLength = $_GET['anggrek_street'];
} else {
    $anggrekStreetLength = 0;
}

if (isset($_GET['kamboja_street']) && !empty($_GET['kamboja_street'])) {
    $kambojaStreetLength = $_GET['kamboja_street'];
} else {
    $kambojaStreetLength = 0;
}

if (isset($_GET['lotus_street']) && !empty($_GET['lotus_street'])) {
    $lotusStreetLength = $_GET['lotus_street'];
} else {
    $lotusStreetLength = 0;
}

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

if (($totalCost > 50000000) || ($isCashReady == false)) {
    $meetingAgreement = "Warga akan mengirim surat permohonan bantuan dana ke pemerintah daerah.";
} elseif ($totalCost > 20000000) {
    $meetingAgreement = "Mengadakan bazzar untuk menutup kekurangan dana.";
} else {
    $meetingAgreement = "Hanya dilakukan secara swadaya dari warga penghuni perumahan saja.";
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
        <p>Pengumpulan dana: <?= $meetingAgreement ?></p>
    <?php endif; ?>
</body>

</html>