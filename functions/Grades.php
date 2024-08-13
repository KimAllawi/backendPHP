<?php

include ('../connect.php');

if (isset($_POST['create_grade'])) {
    createGrade();
}



function createGrade()
{
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    $query = "INSERT INTO grades(student_id,course_id,grade)
     VALUES($student_id,$course_id,$grade)";
    $result = mysqli_query($GLOBALS['con'], $query);

    if($result){
        header('Location:../grade/index.php');
    }
}