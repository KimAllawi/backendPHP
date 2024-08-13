<?php

include '../connect.php';


if (isset($_POST['create_student'])) {
    createStudent();
}

if (isset($_POST['update_student'])) {
    updateStudent();
}

function SearchByName($student_name)
{
    $query = "SELECT * FROM students WHERE student_name LIKE '%$student_name%'";
    $result = mysqli_query($GLOBALS['con'], $query);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return NULL;
    }
}

function createStudent()
{
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];

    $query = "INSERT INTO students(student_name,student_email,date_of_birth,address)
    VALUES('$student_name','$student_email','$date_of_birth','$address')";

    $result = mysqli_query($GLOBALS['con'], $query);

    if($result){
        header('Location:../student/index.php');
    } else{
        echo 'Error';
    }
}


function updateStudent(){

    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];

    $query = " UPDATE students SET student_name = '$student_name',  student_email = '$student_email' , 
    date_of_birth = '$date_of_birth' , address = '$address' WHERE student_id = '$student_id' ";
    $result = mysqli_query($GLOBALS['con'], $query);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return NULL;
    }
}
