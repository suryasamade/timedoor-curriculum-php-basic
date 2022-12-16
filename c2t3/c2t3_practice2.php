<!-- CASE -->
<!-- 
    1. menambahkan nilai 'id' dan 'quiz_score' sebagai array baru
    2. menerapkan foreach pada kasus sebelumnya
 -->
<?php
    $students = [
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
    $totalStudents = count($students);

    $examScores = 0;
    $quizScores = 0;

    foreach ($students as $student) {
        $examScores += $student['exam_score'];
        $quizScores += $student['quiz_score'];
    }

    $averageExamScores = $examScores / $totalStudents;
    $averageQuizScores = $quizScores / $totalStudents;
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
        <?php foreach ($students as $student): ?>
            <!-- UNTUK ROUND, BERIKAN HINT BAHWA ADA CARA UNTUK MEMBULATKAN NILAI DESIMAL (ROUND()) -->
            <li><?= "Student with id {$student['id']} named {$student['name']}, got exam score = {$student['exam_score']} and quiz score = {$student['quiz_score']}." ?></li>
        <?php endforeach; ?>
    </ol>
    <p><b>Average of exam score is <?= round($averageExamScores, 2) ?></b> and <b>average of quiz score is <?= round($averageQuizScores, 2) ?></b></p>
</body>

</html>