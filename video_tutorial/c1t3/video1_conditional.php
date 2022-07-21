<!-- GRADE OF TEST SCORE -->
<!-- CASE -->
<!-- gunakan form, kalo memungkinkan -->
<!-- menentukan grade nilai ujian (elseif), skala nilai 100 -->
<!-- menentukan keterangan nilai ujian berdasarkan grade (switch-case) -->

<?php
// inisiasi nilai untuk menyimpan grade dan deskripsi nilai
$appName            = "Grade of Test Score";
$testScore          = 50;
// kenapa harus deklarasi dengan nilai null?
$grade              = null;
$gradeDescription   = null;

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
        $gradeDescription = "Perfect";
        break;
    case 'B':
        $gradeDescription = "Excellent";
        break;
    case 'C':
        $gradeDescription = "Good";
        break;
    case 'D':
        $gradeDescription = "Enough";
        break;
    case 'E': // tidak menggunakan break, maka case akan berjalan terus hingga menemukan break
    default:
        $gradeDescription = "Try Again";
        break;
}

$reportResults = "Nilai ujian Anda adalah $testScore, termasuk ke dalam grade $grade!";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $appName ?></title>
</head>

<body>
    <h1><?= $gradeDescription ?></h1>
    <p><?= $reportResults ?></p>
</body>

</html>