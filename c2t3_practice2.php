<!-- SKENARIO -->
<!-- terdapat tiga indexed array yang menyimpan nilai ujian dari tiga mata pelajaran yaitu math, science, dan english -->
<!-- di dalam tiap array tersimpan nilai-nilai ujian siswa yang terdiri dari Lina, Kadi, Omar, Padu, dan Winda -->
<!-- nilai masing-masing siswa di tiap-tiap mata pelajaran akan dirata-ratakan untuk kemudian ditentukan lulus tidaknya mereka -->
<!-- proses menghitung rata-rata tersebut akan dilakukan jika ketiga mata pelajaran memiliki banyak nilai yang sama (lengkap) sesuai jumlah siswa -->
<!-- dan jika ditemukan siswa yang belum memiliki nilai (null) di salah satu mata pelajaran, proses penghitungan akan dihentikan untuk memeriksa/memastikan nilai siswa -->

<?php
$students   = ["Lina", "Kadi", "Omar", "Padu", "Winda"];
$math       = [78, 77, 92, 84, 63];
$science    = [85, 80, 89, 79, 79];
$english    = [55, 67, 72, 80, 94];

$isNumStudentsEqual = (count($students) == count($math)) && (count($math) == count($science)) && (count($math) == count($english));

$meanScores = [];
if ($isNumStudentsEqual) {
    for ($i = 0; $i < count($math); $i++) {
        if ($math[$i] == null || $science[$i] == null || $english[$i] == null) {
            break;
        }
        $means = number_format(($math[$i] + $science[$i] + $english[$i]) / 3, 2);
        array_push($meanScores, $means);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Scores of Students</title>
</head>

<body>
    <h1>Students Final Scores</h1>
    <?php if ($isNumStudentsEqual && (count($students) == count($meanScores))) : ?>
        <h3>The Scores</h3>
        <table border="1">
            <tr>
                <?php for ($s = 0; $s < count($students); $s++) : ?>
                    <th><?= $students[$s] ?></th>
                <?php endfor; ?>
            </tr>
            <?php for ($s = 0; $s < count($students); $s++) : ?>
                <tr>
                    <?php for ($i = 0; $i < count($meanScores); $i++) : ?>
                        <?php if (($s == $i) && ($meanScores[$i] < 75.0)) : ?>
                            <td style="background-color: orange;"><?= $meanScores[$i] ?></td>
                        <?php elseif ($s == $i) : ?>
                            <td><?= $meanScores[$i] ?></td>
                        <?php else : ?>
                            <td style="background-color: grey;"></td>
                        <?php endif; ?>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <hr>
        <h3>Conclusions!</h3>
        <ol>
            <?php for ($s = 0; $s < count($students); $s++) : ?>
                <?php if ($meanScores[$s] >= 75.0) : ?>
                    <li><?= "Congrats " . $students[$s]  . ", you Passed the exam with a final scores of " . $meanScores[$s] . "!"; ?></li>
                <?php else : ?>
                    <li><span style="background-color: orange;"><?= "Sorry " . $students[$s] . ", you have to retake the exam next year."; ?></span></li>
                <?php endif; ?>
            <?php endfor; ?>
        </ol>
    <?php else : ?>
        <h3 style="color: orange;">Please re-check the students scores!</h3>
    <?php endif; ?>
</body>

</html>