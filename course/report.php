<?php
include('../functions/Course.php');


$course_id = $_GET['course_id'];


$query = "SELECT courses.course_name,students.student_name,grades.grade FROM `courses`
JOIN grades on courses.course_id=grades.course_id 
JOIN students on grades.student_id = students.student_id WHERE courses.course_id=$course_id";
$report_result = mysqli_query($GLOBALS['con'], $query);

$query_course_name = "SELECT course_name FROM courses WHERE course_id=$course_id";
$name_result = mysqli_query($GLOBALS['con'], $query_course_name);
$course_name = mysqli_fetch_assoc($name_result);

$query_for_count = "SELECT COUNT(*) as count_student FROM grades WHERE course_id=$course_id";
$count_result = mysqli_query($GLOBALS['con'], $query_for_count);
$count = mysqli_fetch_assoc($count_result);

$query_for_average = "SELECT format(AVG(grade),1) as grade from grades where course_id=$course_id ";
$avg_for_mark = mysqli_query($GLOBALS['con'],   $query_for_average);
$avg = mysqli_fetch_assoc($avg_for_mark);


$query_min_mark = "SELECT min(grade) as grade FROM grades where course_id=$course_id ";
$min_mark = mysqli_query($GLOBALS['con'], $query_min_mark);
$min = mysqli_fetch_assoc($min_mark);



$query_mark_max_student = "SELECT grades.grade , students.student_name as student_name FROM grades JOIN students ON grades.student_id = students.student_id
where course_id = $course_id ORDER BY grades.grade DESC LIMIT 1";
$max_mark_student = mysqli_query($GLOBALS['con'], $query_mark_max_student);
$max_student = mysqli_fetch_assoc($max_mark_student);


$query_mark_min_student = "SELECT grades.grade , students.student_name as student_name FROM grades JOIN students ON grades.student_id = students.student_id
where course_id = $course_id  ORDER BY grades.grade LIMIT 1";
$min_mark_student = mysqli_query($GLOBALS['con'], $query_mark_min_student);
$min_student = mysqli_fetch_assoc($min_mark_student);



$query_max_mark = "SELECT max(grade) as grade FROM grades  where course_id=$course_id ";
$max_mark = mysqli_query($GLOBALS['con'], $query_max_mark);
$max = mysqli_fetch_assoc($max_mark);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h2>Report for : <?php echo $course_name["course_name"] ?> <span class="text-success">(<?php echo $count['count_student'] ?>)</span></h2>
        <h3> Average for marks : <?php
                                    $a = explode(".", $avg['grade']);
                                    echo ($a[0]);
                                    ?>

            <h3> Max Mark : <span class="text-primary"> <?php echo $max['grade'] . '  ' . '(' . $max_student['student_name'] . ')' ?> </span> </h3>
            <h3> Min Mark : <span class="text-danger"> <?php echo $min['grade'] . ' ' . '(' . $min_student['student_name'] . ')' ?> </span> </h3>


            <table class="table col-6 my-3">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($report_result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['student_name'] ?></td>
                            <td><?php echo $row['grade'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    </div>


    <script src="../script.js"></script>
</body>

</html>