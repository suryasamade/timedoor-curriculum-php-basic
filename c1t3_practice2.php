<!-- SKENARIO -->
<!-- menentukan grade nilai ujian (elseif), skala nilai 100 -->
<!-- menentukan keterangan nilai ujian berdasarkan grade (switch-case) -->

<?php
$testScore = 50;
// inisiasi nilai untuk menyimpan grade dan deskripsi nilai
$grade = null;
$description = null;

// menentukan grade nilai
// tanpa operator logika penggunaan AND/OR, batasan kondisi kurang jelas
if ($testScore > 90) {
    $grade = "A";
} elseif ($testScore > 80) {
    $grade = "B";
} elseif ($testScore > 70) {
    $grade = "C";
} elseif ($testScore > 60) {
    $grade = "D";
} elseif ($testScore > 50) {
    $grade = "E";
} else {
    $grade = "F";
}

// menentukan deskripsi berdasar grade
switch ($grade) {
    case 'A':
        $description = "Perfect";
        break;
    case 'B':
        $description = "Excellent";
        break;
    case 'C':
        $description = "Good";
        break;
    case 'D':
        $description = "Enough";
        break;
    case 'E': // tidak menggunakan break, maka case akan berjalan terus hingga menemukan break
    default:
        $description = "Try Again";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Grade of Test Score</title>
</head>

<body>
    <?= "$description. Nilai ujian Anda adalah $testScore, termasuk ke dalam grade $grade!" ?>
</body>

</html>