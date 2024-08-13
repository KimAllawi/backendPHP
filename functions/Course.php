<?php
include ('../connect.php');

if (isset($_POST['create_course'])) {
    createCourse();
}
if (isset($_POST['edit_course'])) {
    updateCourse();
}

if(isset($_POST['delete_course'])){
    deleteCourse();
    exit;
}

if(isset($_POST['update_course'])){
    updateCourse();
    exit;
}
function getCourses()
{
    $query = "SELECT courses.course_id   ,courses.course_name , teachers.teacher_name ,courses.course_description
    FROM courses JOIN teachers ON courses.teacher_id=teachers.teacher_id;";

    $result = mysqli_query($GLOBALS['con'], $query);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return NULL;
    }
}


function getTeachers()
{
    $query = "SELECT * FROM teachers";

    $result = mysqli_query($GLOBALS['con'], $query);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return NULL;
    }
}


function createCourse()
{
    $course_name = $_POST['course_name'];
    $teacher_id = $_POST['teacher_id'];
    $course_description = $_POST['course_description'];

    $query = "INSERT INTO courses(course_name, teacher_id, course_description) 
    VALUES ('$course_name',$teacher_id,'$course_description')";

    $result = mysqli_query($GLOBALS['con'], $query);

    if($result){
        header('Location:../course/index.php');
    } else{
        echo'Error create';
    }
}


function updateCourse()
{
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $teacher_id = $_POST['teacher_id'];
    $course_description = $_POST['course_description'];

    $query = "UPDATE courses SET course_name='$course_name',teacher_id='$teacher_id',
    course_description='$course_description' WHERE course_id=$course_id";


    $result = mysqli_query($GLOBALS['con'], $query);

    if($result){
        header('Location:../course/index.php');
    } else{
        echo'Error Update';
    }
}

function deleteCourse(){
    $course_id = $_GET['course_id'];
    $query = "DELETE FROM courses WHERE course_id = '$course_id'";

    $result = mysqli_query($GLOBALS['con'], $query);

    if($result){
        header('Location:../course/index.php');
    } else{
        echo'Error Delete';
    }
}

function searchByCourse($course_name){
    $query = "SELECT * FROM courses JOIN teachers ON courses.teacher_id=teachers.teacher_id WHERE course_name LIKE '%$course_name%'";

    $result = mysqli_query($GLOBALS['con']  ,$query);

    

    if($result && $result->num_rows>0){
        return $result;
    } else{
        return NULL;
    }

}

