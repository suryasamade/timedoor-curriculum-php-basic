<!-- CASE -->
<!-- 
    1. menambahkan 'gender' dan 'last_name' ke dalam array students
    2. membuat function untuk menyambungkan 'first_name' dan 'last_name' student, dan mengembalikan nilai
    3. membuat function untuk menentukan final score status, dengan menerima input 'exam_score' dan 'quiz_score', ditentukan keluarannya berdasarkan kondiri tertentu:
        - jika 'exam_score' lebih besar dari 80 dan 'quiz_score' lebih besar dari 82, maka akan dikembalikan status 'Passed!'
        - jika 'exam_score' lebih besar dari 80, maka statusnya 'Not passed, take new quiz!'
        - jika 'quiz_score' lebih besar dari 82, maka statusnya 'Not passed, take the remedial exam!'
        - jika semua kondisi diatas tidak terpenuhi, maka kembalikan status 'Not passed, try next semester!'
    4. tampilkan data tiap student dalam bentuk daftar dengan memanggil function yang telah dibuat, sehingga contoh hasilnya seperti 'Alex Tim, a student with id 3150. Your final score status is Not passed, try next semester!'
 -->

<?php
    function concate_full_name($firstName, $lastName)
    {
        return "{$firstName} {$lastName}";
    }

    // PERHATIKAN NAMING CONVENTION (VARIABLE, FUNCTION, PROPERTIES, METHODS)
    function get_final_score_status($examScore, $quizScore)
    {
        // PERBAIKI LOGIC-NYA, GUNAKAN EARLY RETURN UNTUK MEMINIMALISIR PENGGUNAAN ESLE-IF/NESTED-IF
        // CHECK-POINT DISKUSI 22 SEPTEMBER
        
        if (($examScore > 80) && ($quizScore > 82)) {
            return "Passed!";
        } elseif (($examScore > 80) && ($quizScore <= 82)) {
            return "Not passed, take new quiz!";
        } elseif (($examScore <= 80) && ($quizScore > 82)) {
            return "Not passed, take the remedial exam!";
        } else {
            return "Not passed, try next semester!";
        }
        
        // ALTERNATIVE CODE
        // if ($examScore > 80 && $quizScore > 82) return "Passed!";

        // if ($examScore > 80 && $quizScore <= 82) return "Not passed, take new quiz!";
        
        // if ($examScore <= 80 && $quizScore > 82) return "Not passed, try the remedial exam!";
        
        // return "Not passed, try next semester!";
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

    // CHALLENGE STUDENT: TENTUKAN AGAR HASILNYA DIBULATKAN 2 ANGKA DI BELAKANG KOMA
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

            <li><?= "<b>{$studentFullName}</b>, student with id {$student['id']}. Your final score status is <b>{$studentScoreStatus}</b>" ?></li>
        <?php endforeach; ?>
    </ol>
    <p>And... average of all those data, <b>average exam score is <?= $averageExamScores ?></b> and <b>average quiz score is <?= $averageQuizScores ?></b></p>
</body>

</html>