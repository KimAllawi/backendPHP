<?php

include '../connect.php' ;


if(isset($_POST['create_teacher'])){
    createTeacher();
    exit;
}

if(isset($_POST['delete_teacher'])){
    deleteTeacher();
    exit;
}

if(isset($_POST['update_teacher'])){
    updateTeacher();
    exit;
}


function createTeacher(){

    $teacher_name = $_POST['teacher_name'];
    $teacher_email = $_POST['teacher_email'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $query = " INSERT INTO teachers (`teacher_name`,`teacher_email`,`date_of_birth`,`address`)  
    values ('$teacher_name','$teacher_email','$date_of_birth','$address');     ";

    $result = mysqli_query($GLOBALS['con'], $query);

    if($result){
        header('Location:../teacher/index.php');
    } else {
        echo'Error';
    }
}

function deleteTeacher(){
    $teacher_id = $_POST['teacher_id'];
    $query = "DELETE FROM teachers WHERE teacher_id = '$teacher_id'";

    $result = mysqli_query($GLOBALS['con'], $query);

    if($result){
        header('Location:../teacher/index.php');
    } else{
        echo'Error Delete';
    }
}

function updateTeacher(){
    $teacher_id = $_POST['teacher_id'];
    $teacher_name = $_POST['teacher_name'];
    $teacher_email = $_POST['teacher_email'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    
    
    $query = "UPDATE teachers SET teacher_name='$teacher_name',
    teacher_email = '$teacher_email' ,  date_of_birth = '$date_of_birth' , address = '$address' 
    WHERE teacher_id = '$teacher_id' ";

    $result = mysqli_query($GLOBALS['con'], $query);

    if($result){
        header('Location:../teacher/index.php');
    }else{
        echo'Error';
    }

}

function SearchByTeacher($teacher_name){

$query = "SELECT * FROM teachers WHERE teacher_name LIKE '%$teacher_name%'";
$result = mysqli_query($GLOBALS['con'], $query);
if ($result && $result->num_rows > 0) {
    return $result;
} else {
    return NULL;
}
}
                    


