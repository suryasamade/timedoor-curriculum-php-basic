<!-- COST CALCULATION: WITH CONDITIONAL -->
<!-- CASE -->
<!--
    1. menyeragamkan dan menentukan satuan panjang jalan secara dinamis
    2. melakukan konversi panjang dengan conditional switch (satuan panjang ketiga jalan jadi dinamis)
-->

<?php
$isCashReady            = false;
$anggrekStreetLength    = 0;
$kambojaStreetLength    = 0;
$lotusStreetLength      = 0;

// terapkan if-else-elseif
// terapkan switch-case-break-default
if (isset($_GET['anggrek_street'])) {
    if (empty($_GET['anggrek_street'])) {
    } else {
        $anggrekStreetLength = $_GET['anggrek_street'];
    }
}

if (isset($_GET['kamboja_street'])) {
    if (empty($_GET['kamboja_street'])) {
    } else {
        $kambojaStreetLength = $_GET['kamboja_street'];
    }
}

if (isset($_GET['lotus_street'])) {
    if (empty($_GET['lotus_street'])) {
    } else {
        $lotusStreetLength = $_GET['lotus_street'];
    }
}

// buatkan form input untuk variable ini
if (isset($_GET['cash_ready'])) {
    $isCashReady = true;
}

if (isset($_GET['unit'])) {
    switch ($_GET['unit']) {
        case 'km':
            $anggrekStreetLength    *= 1000;
            $kambojaStreetLength    *= 1000;
            $lotusStreetLength      *= 1000;
            break;
        case 'cm':
            $anggrekStreetLength    /= 100;
            $kambojaStreetLength    /= 100;
            $lotusStreetLength      /= 100;
            break;
        default:
            break;
    }
}

$totalStreetLength  = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;
$costMaterial       = $totalStreetLength * 15000;
$workerFee          = ($totalStreetLength / 1000) * 650000;
$totalCost          = $costMaterial + $workerFee;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cost Calculation</title>
</head>

<body>
    <h1>Dynamics Calculating Project Cost</h1>

    <form action="" method="GET">
        <label for="unit_length">Street Length Unit</label>
        <select name="unit" id="unit_length">
            <option value="km">KM</option>
            <option value="m">M</option>
            <option value="cm">CM</option>
        </select>
        <br>
        <label for="anggrek">Anggrek Street</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek" required><br>
        <label for="kamboja">Kamboja Street</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja" required><br>
        <label for="lotus">Lotus Street</label>
        <input type="number" step="0.1" name="lotus_street" id="lotus" required><br>
        <label for="cash">Is cash ready?</label>
        <input type="checkbox" name="cash_ready" id="cash"><br>
        <input type="submit" value="Count">
    </form>

    <?php if ($totalStreetLength > 0) { ?>
        <p><?= "To carry out road repairs with a total length of {$totalStreetLength} meters, Perumahan Graha Sentosa must prepare a total cost of Rp. {$totalCost}." ?></p>

        <!-- PENERAPAN ALTERNATIVE SYNTAX-NYA MANA? -->
        <?php if ($isCashReady) { ?>
            <p style="color:green;">Due to the availability of funds, the project will be implemented soon!</p>
        <?php } else { ?>
            <p style="color:red;">However, project implementation will be postponed until funds are available.</p>
        <?php } ?>
    <?php } ?>

</body>

</html>