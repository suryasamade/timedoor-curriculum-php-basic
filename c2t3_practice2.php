<!-- CASE -->
<!-- 
    1. menambahkan nilai 'id' dan 'quiz_score' sebagai array baru
    2. menerapkan foreach pada kasus sebelumnya
 -->
<?php
$studentsData   = [
    [
        "id"         => 1220,
        "name"       => "Lina",
        "exam_score" => 78,
        "quiz_score" => 80
    ],
    [
        "id"         => 1221,
        "name"       => "Kidi",
        "exam_score" => 77,
        "quiz_score" => 79
    ],
    [
        "id"         => 1222,
        "name"       => "Amar",
        "exam_score" => 92,
        "quiz_score" => 85
    ],
    [
        "id"         => 1223,
        "name"       => "Pandu",
        "exam_score" => 84,
        "quiz_score" => 84
    ],
    [
        "id"         => 1224,
        "name"       => "Lili",
        "exam_score" => 63,
        "quiz_score" => 81
    ],
    [
        "id"         => 1225,
        "name"       => "Wirni",
        "exam_score" => 80,
        "quiz_score" => 91
    ]
];
// PENAMAAN VARIABLE SINGKAT TAPI DESKRIPTIF, TIDAK RANCU
$examScores      = 0;
$QuizScores      = 0;
$countOfStudents = count($studentsData);

foreach ($studentsData as $student) {
    $examScores += $student['exam_score'];
    $QuizScores += $student['quiz_score'];
}

$averageOfExamScores = $examScores / $countOfStudents;
$averageOfQuizScores = $QuizScores / $countOfStudents;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Scores of Students</title>
</head>

<body>
    <h1>Students Final Scores</h1>
    <p>List of the students score!</p>
    <ol>
        <?php foreach ($studentsData as $student) : ?>
            <!-- UNTUK ROUND, BERIKAN HINT BAHWA ADA CARA UNTUK MEMBULATKAN NILAI DESIMAL (ROUND()) -->
            <li><?= "Student with id {$student['id']} named {$student['name']}, got exam score = {$student['exam_score']} and quiz score = {$student['quiz_score']}." ?></li>
        <?php endforeach; ?>
    </ol>
    <p>And... average of all those data, <b>average exam score is <?= $averageOfExamScores ?></b> and <b>average quiz score is <?= $averageOfQuizScores ?></b></p>
</body>

</html>