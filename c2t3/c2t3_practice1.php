<!-- CASE -->
<!-- buat 4 buah indexed-array, array pertama yang merepresentasikan/mewakili nama student, array kedua mewakili nilai mapel math, array ketiga mewakili nilai science, array terakhir mewakili nilai english -->
<!-- periksa status apakah elmen keempat array sinkron/memiliki sama panjang, dan simpan nilai statusnya ke dalam sebuah variable -->
<!-- gunakan nilai variable tersebut untuk melakukan evaluasi pada kondisional yang akan melakukan perulangan untuk pengambilan nilai mapel masing-masing student -->
<!-- sebelum nilai mapel tiap student diambil, check terlebih dahulu, jika terdapat nilai yang belum dimasukkan (null), proses perulangan tersebut akan dihentikan -->
<!-- jika nilai student sudah lengkap, proses menghitung nilai rata-rata dilakukan, untuk menghasilkan nilai yang tidak banyak angka desimalnya gunakan function number_format -->
<!-- masukkan dan kumpulkan tiap nilai hasil rata-rata tersebut ke dalam sebuah array -->

<?php
    $examScores     = [78, 77, 92, 84, 63, 80];
    $totalExamScore = count($examScores);
    $sumScores      = 0;

    for ($i = 0; $i < $totalExamScore; $i++) {
        $sumScores += $examScores[$i];
    }

    $averageScores = $sumScores / $totalExamScore;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Scores of Students</title>
</head>

<body>
    <h1>Students Exam Score</h1>
    <p>List of the students score!</p>
    <ol>
        <?php for ($i = 0; $i < $totalExamScore; $i++): ?>
            <?php $studentNumber = $i + 1; ?>
            <li><?= "Student{$studentNumber}'s score is {$examScores[$i]}." ?></li>
        <?php endfor; ?>
    </ol>
    <p>Average of exam score is <b><?= $averageScores ?></b></p>
</body>

</html>