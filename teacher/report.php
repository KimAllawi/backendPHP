<?php

include '../functions/Teacher.php';
include '../navbar.php';

$teacher_id = $_GET['teacher_id'];


$query = "SELECT  teachers.teacher_id , teachers.teacher_name , courses.course_name as courses FROM teachers JOIN courses 
        ON teachers.teacher_id = courses.teacher_id where teachers.teacher_id='$teacher_id' GROUP BY courses.course_name  ";
$result = mysqli_query($GLOBALS['con'], $query);
$row = mysqli_fetch_assoc($result);


$query_student =  "SELECT students.student_id as id , students.student_name as name , grades.grade as grade 
from students
    join grades on students.student_id = grades.student_id 
    join courses on grades.course_id = courses.course_id 
    join  teachers on  courses.teacher_id = teachers.teacher_id
where teachers.teacher_id = $teacher_id ";
$result_student =  mysqli_query($GLOBALS['con'], $query_student);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h3 class="col-4 my-5"> Courses for MS : <span class="text-primary"> <?php echo $row['courses'] ?> </span> </h3>

        <table class=" table table-hover my-4 ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>GRADE</th>
                </tr>
            </thead>

            <tbody>

                <?php

                while ($row_student =  mysqli_fetch_assoc($result_student)) {
                ?>
                    <tr>
                        <td> <?php echo $row_student['id']   ?> </td>
                        <td> <?php echo $row_student['name']   ?> </td>
                        <td> <?php echo $row_student['grade']   ?> </td>
                    </tr>

                <?php

                }

                ?>

            </tbody>

        </table>
    </div>
</body>

</html>