<?php
include ('../functions/Course.php');

$grades_query = "SELECT grades.grade_id as grade_id,students.student_name as student_name,courses.course_name as course_name,grades.grade as grade FROM `grades` JOIN students on grades.student_id=students.student_id JOIN courses on grades.course_id=courses.course_id;";
$grades = mysqli_query($GLOBALS['con'], $grades_query);
?><!DOCTYPE html>
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
        <h2>Grades</h2>
        <a href="create.php" class="btn btn-success my-3" id="addcourse">Add Grade</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>student name</th>
                    <th>course</th>
                    <th>mark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($grades)) {
                    ?>
                    <tr>
                        <td><?php echo $row['grade_id'] ?></td>
                        <td><?= $row['student_name'] ?></td>
                        <td><?= $row['course_name'] ?></td>
                        <td><?= $row['grade'] ?></td>
                        <td><a href="edit.php?student_id=<?php echo $row['student_name']; ?>" class="btn btn-primary">Edit</a>
                            <a href="show.php?student_id=<?php echo $row['student_name']; ?>" class="btn btn-danger">Delete</a>
                        </td>                       

                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
 
</html>