<!-- COST CALCULATION: WITH CONDITIONAL -->
<!-- CASE -->
<!--
    1. menerapkan elseif
    2. menerapkan comparison operator
    3. menerapkan logical operator
-->

<?php
    $isCashReady = false;
    $budget      = 20000000;

    $anggrekStreetLength = 0;
    $kambojaStreetLength = 0;
    $lotusStreetLength   = 0;
    
    $costMaterial = 15000;
    $workerFee    = 650000;

    $meterKiloRatio  = 1000;
    $meterCentiRatio = 100;

    // terapkan logical operator
    if (isset($_GET['anggrek_street']) && !empty($_GET['anggrek_street'])) {
        $anggrekStreetLength = $_GET['anggrek_street'];
    }

    if (isset($_GET['kamboja_street']) && !empty($_GET['kamboja_street'])) {
        $kambojaStreetLength = $_GET['kamboja_street'];
    }

    if (isset($_GET['lotus_street']) && !empty($_GET['lotus_street'])) {
        $lotusStreetLength = $_GET['lotus_street'];
    }

    $isCashReady = isset($_GET['cash_ready']);

    if (isset($_GET['unit'])) {
        switch ($_GET['unit']) {
            case 'km':
                $anggrekStreetLength *= $meterKiloRatio;
                $kambojaStreetLength *= $meterKiloRatio;
                $lotusStreetLength   *= $meterKiloRatio;
                break;
            case 'cm':
                $anggrekStreetLength /= $meterCentiRatio;
                $kambojaStreetLength /= $meterCentiRatio;
                $lotusStreetLength   /= $meterCentiRatio;
                break;
            default:
                break;
        }
    }

    $totalStreetLength = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

    $totalCostMaterial = $totalStreetLength * $costMaterial;
    
    $totalStreetLengthInKilo = $totalStreetLength / $meterKiloRatio;
    $totalWorkerFee          = $totalStreetLengthInKilo * $workerFee;
    
    $totalCost = $totalCostMaterial + $totalWorkerFee;

    // set $fundStatus
    if ($totalCost > $budget) {
        $isCashReady = false;
        $fundStatus  = "Lack of funds - ";
       
        if ($totalCost >= ($budget * 2)) {
            $fundStatus .= "apply for financial assistance to the local government.";
        } else {
            $fundStatus .= "to cover the lack of funds, a fund-raising bazaar was held.";
        }
    } else {
        $fundStatus = "The budget is sufficient, the source of self-supporting funds from the residents of Perumahan Graha Sentosa only.";
    }
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
        </select><br>
        <label for="anggrek">Anggrek Street</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek" required><br>
        <label for="kamboja">Kamboja Street</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja" required><br>
        <label for="lotus">Lotus Street</label>
        <input type="number" step="0.001" name="lotus_street" id="lotus" required><br>
        <label for="cash">Is cash ready?</label>
        <input type="checkbox" name="cash_ready" id="cash"><br>
        <input type="submit" value="Count">
    </form>

    <?php if ($totalStreetLength > 0) : ?>
        <p>Description: <?= "To carry out road repairs with a total length of {$totalStreetLength} meters, Perumahan Graha Sentosa must prepare a total cost of Rp. {$totalCost}." ?></p>
        <p>Budget: Rp. <?= $budget ?></p>
        <p>Fund Status: <?= $fundStatus ?></p>

        <?php if ($isCashReady): ?>
            <p>Project Status: <span style="color:green;">Will be implemented soon!</span></p>
        <?php else: ?>
            <p>Project Status: <span style="color:red;">Will be postponed, until funds are available.</span></p>
        <?php endif ?>
    <?php endif; ?>

</body>

</html>