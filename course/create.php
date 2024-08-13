<?php
include ('../functions/Course.php');
$teachers = getTeachers();


?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h2>Create Course</h2>
        <form method="POST">
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" required>
            </div>
            <div class="form-group">
                <label for="teacher_id">Teacher</label>
                <select class="form-control" id="teacher_id" name="teacher_id" required>
                    <?php

                    while ($row = mysqli_fetch_assoc($teachers)) {
                        ?>
                        <option value="<?php echo $row['teacher_id'] ?>">
                            <?php echo $row['teacher_name'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="course_description">Description</label>
                <textarea class="form-control" id="course_description" name="course_description" rows="3"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="create_course">Submit</button>
        </form>


    </div>
</body>

</html>