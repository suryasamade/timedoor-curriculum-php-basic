<?php
$age = 20;
$driverLicenseStatus = $age >= 18 ? "yay... ready to be a driver!" : "not yet of age to drive!";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Check Driver License</title>
</head>

<body>
    <h1>Driver License Status</h1>
    <p>
        <?php
        echo "Your age is $age, $driverLicenseStatus";
        ?>
    </p>
</body>

</html>