<?php
include('../functions/Course.php');
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
        <h2>Courses</h2>
        <a href="create.php" class="btn btn-success my-3" id="addcourse">Add course</a>
        <form method="get" class="form-group">
            <input type="text" class="form-control my-2 col-2" name="course_name" placeholder="searchByName">
            <button class="btn btn-info my-2 "> Search </button>
        </form>

        <?php


        if (isset($_GET['course_name'])) {

            $result = searchByCourse($_GET['course_name']);
        } else {

            $query = "SELECT courses.course_id   ,courses.course_name , teachers.teacher_name  ,courses.course_description
                      FROM courses JOIN teachers ON courses.teacher_id=teachers.teacher_id;";
            $result = mysqli_query($GLOBALS['con'], $query);
        }


        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Teacher</th>
                    <th>Description</th>
                    <th>Action</th>
                    <th>Students</th>
                </tr>
            </thead>
            <tbody>

                <?php


                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $row['course_id'] ?></td>
                        <td><?= $row['course_name'] ?></td>
                        <td><?= $row['teacher_name'] ?></td>
                        <td><?= $row['course_description'] ?></td>
                        <td>
                            <a href="./edit.php?course_id=<?= $row['course_id'] ?>" class="btn btn-primary" name="update_course">Edit</a>
                            <a href="./show.php?course_id=<?= $row['course_id'] ?>" class="btn btn-danger" name="delete_course">Delete</a>
                        </td>
                        <td><a href="./report.php?course_id=<?= $row['course_id'] ?>" class="btn btn-primary">Show report</a></td>
                    </tr>
                <?php
                }

                // var_dump(print_r($_GET));
                ?>




            </tbody>
        </table>
    </div>
</body>

</html>