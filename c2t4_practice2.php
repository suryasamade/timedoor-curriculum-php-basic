<!-- CASE -->
<!-- 
    1. tambahkan type-hinting pada params dan return
 -->

<?php
    function concate_full_name(string $firstName, string $lastName): string
    {
        return "{$firstName} {$lastName}";
    }

    function get_final_score_status(int $examScore, int $quizScore): string
    {
        if ($examScore > 80 && $quizScore > 82) return "Passed!";

        if ($examScore > 80 && $quizScore <= 82) return "Not passed, take new quiz!";
        
        if ($examScore <= 80 && $quizScore > 82) return "Not passed, try the remedial exam!";
        
        return "Not passed, try next semester!";
    }

    $students = [
        [
            "id"         => 1220,
            "first_name" => "Lina",
            "last_name"  => "Karolin",
            "gender"     => "female",
            "exam_score" => 78,
            "quiz_score" => 80
        ],
        [
            "id"         => 1221,
            "first_name" => "Kidi",
            "last_name"  => "Alan",
            "gender"     => "male",
            "exam_score" => 77,
            "quiz_score" => 79
        ],
        [
            "id"         => 1222,
            "first_name" => "Amar",
            "last_name"  => "Tanjung",
            "gender"     => "male",
            "exam_score" => 92,
            "quiz_score" => 85
        ],
        [
            "id"         => 1223,
            "first_name" => "Pandu",
            "last_name"  => "Ginanjar",
            "gender"     => "male",
            "exam_score" => 84,
            "quiz_score" => 84
        ],
        [
            "id"         => 1224,
            "first_name" => "Lili",
            "last_name"  => "Pertiwi",
            "gender"     => "female",
            "exam_score" => 63,
            "quiz_score" => 81
        ],
        [
            "id"         => 1225,
            "first_name" => "Wirni",
            "last_name"  => "Asih",
            "gender"     => "female",
            "exam_score" => 80,
            "quiz_score" => 91
        ],
    ];

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
    <title>Final Scores of Students with Functions</title>
</head>

<body>
    <h1>Students Final Scores with Functions</h1>
    <p>List of the students score!</p>
    <ol>
        <?php foreach ($students as $student) : ?>
            <?php
                $studentFullName    = concate_full_name($student['first_name'], $student['last_name']);
                $studentScoreStatus = get_final_score_status($student['exam_score'], $student['quiz_score']);
            ?>

            <li><?= "<b> {$studentFullName} </b>, student with id $student[id]. Your final score status is <b> {$studentScoreStatus} </b>" ?></li>
        <?php endforeach; ?>
    </ol>
    <p>And... average of all those data, <b>average exam score is <?= $averageExamScores ?></b> and <b>average quiz score is <?= $averageQuizScores ?></b></p>
</body>

</html>