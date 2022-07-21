<!-- CASE -->
<!-- 
    ----- SESUAIKAN CASE DAN DATANYA DENGAN VIDEO/MATERI SEBELUMNYA -----
    1. tambahkan 2 variable array lagi yang menyimpan id student dan quiz score
    2. jumlahkan dan hitung juga nilai rata-rata dari quizScores seperti examScores
    3. sesuaikan teks yang akan ditampilkan dalam list
    4. ubah bentuk array menjadi multi-dimensional array yang di dalamnya berisi array assoc dari tiap data
    5. sesuaikan for loop untuk mengakses array multi-dimensional
    6. ganti array, gunakan foreach
 -->
<?php
// soal 1 (separated array)
// $studentsName   = ["Lina", "Kidi", "Amar", "Pandu", "Lili", "Wirni"];
// $studentsId     = [1220, 1221, 1222, 1223, 1224, 1225];
// $examScores     = [78, 77, 92, 84, 63, 80];
// $quizScores     = [80, 79, 85, 84, 81, 91];

// soal 4 (multi-dimensional array)
// gunakan foreach untuk mengakses value
$studentsData   = [
    [
        "id"            => 1220,
        "name"          => "Lina",
        "exam_score"    => 78,
        "quiz_score"    => 80
    ],
    [
        "id"            => 1221,
        "name"          => "Kidi",
        "exam_score"    => 77,
        "quiz_score"    => 79
    ],
    [
        "id"            => 1222,
        "name"          => "Amar",
        "exam_score"    => 92,
        "quiz_score"    => 85
    ],
    [
        "id"            => 1223,
        "name"          => "Pandu",
        "exam_score"    => 84,
        "quiz_score"    => 84
    ],
    [
        "id"            => 1224,
        "name"          => "Lili",
        "exam_score"    => 63,
        "quiz_score"    => 81
    ],
    [
        "id"            => 1225,
        "name"          => "Wirni",
        "exam_score"    => 80,
        "quiz_score"    => 91
    ]
];

$sumScores      = 0;
$sumQuizScores  = 0;

// soal 2
// for version separated_arr
// for ($i = 0; $i < count($examScores); $i++) {
//     $sumScores += $examScores[$i];
//     $sumQuizScores += $quizScores[$i];
// }

// soal 5
// for version arr_assoc
// for ($i = 0; $i < count($studentsData); $i++) {
//     $sumScores += $studentsData[$i]['exam_score'];
//     $sumQuizScores += $studentsData[$i]['quiz_score'];
// }

// soal 6
// foreach version arr_assoc
foreach ($studentsData as $student) {
    $sumScores += $student['exam_score'];
    $sumQuizScores += $student['quiz_score'];
}

$averageOfExamScores = $sumScores / count($studentsData);
$averageOfQuizScores = $sumQuizScores / count($studentsData);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Scores of Students</title>
</head>

<body>
    <h1>Students Final Scores</h1>
    <p>List of the students score!</p>
    <!-- soal 3 -->
    <ol>
        <?php foreach ($studentsData as $student) : ?>
            <li><?= "Student with id $student[id] named $student[name], got exam score = $student[exam_score] and quiz score = $student[quiz_score].<br>" ?></li>
        <?php endforeach; ?>
    </ol>
    <p><?= "And... average of all those data, <b>average exam score is $averageOfExamScores</b> and <b>average quiz score is $averageOfQuizScores</b>" ?></p>
</body>

</html>