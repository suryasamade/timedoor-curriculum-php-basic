<!-- SKENARIO -->
<!-- terdapat tiga indexed array yang menyimpan nilai ujian dari tiga mata pelajaran yaitu math, science, dan english -->
<!-- di dalam tiap array tersimpan nilai-nilai ujian siswa yang terdiri dari Lina, Kadi, Omar, Padu, dan Widi -->
<!-- nilai masing-masing siswa di tiap-tiap mata pelajaran akan dirata-ratakan untuk kemudian ditentukan rankingnya -->
<!-- dan jika ditemukan siswa yang belum memiliki nilai di salah satu mata pelajaran, proses penghitungan akan dihentikan untuk memeriksa/memastikan nilai siswa -->

<?php
$math = [];
$science = [];
$english = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table Multiplication</title>
</head>

<body>
    <h1>Table-like Multiplication</h1>
    <table border="1">
        <?php for ($row = 1; $row <= 10; $row++) : ?>
            <tr>
                <?php for ($column = 11; $column <= 20; $column++) : ?>
                    <?php if ($row == $column - 10) : ?>
                        <td style="background-color: red;"><?= $row + $column ?></td>
                    <?php else : ?>
                        <td><?= $row + $column ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>