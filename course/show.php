<?php

include ('../functions/Course.php');
$teachers = getTeachers();
$course_id = $_GET['course_id'];

$query = "SELECT * FROM courses WHERE course_id=$course_id";
$course_data = mysqli_query($GLOBALS['con'], $query);
$course_data = mysqli_fetch_assoc($course_data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<?php include '../navbar.php'; ?>
<div class="container mt-5">
    <h2>Edit Course</h2>
    <form method="POST">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id"
                value="<?= $course_data['course_id'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name"
                value="<?= $course_data['course_name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="teacher_id">Teacher</label>
            <select class="form-control" id="teacher_id" name="teacher_id" required>
                <?php

                while ($row = mysqli_fetch_assoc($teachers)) {
                    ?>
                    <option <?php if ($row['teacher_id'] == $course_data['teacher_id']) {
                        echo "selected";
                    } ?> value="<?php echo $row['teacher_id'] ?>">
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
                required><?= $course_data['course_description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="delete_course">Delete</button>
    </form>


</div>
</body>

</html>