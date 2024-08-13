<?php
include ('../functions/Grades.php');
$students_query = "SELECT * FROM students;";
$students = mysqli_query($GLOBALS['con'], $students_query);

$course_query = "SELECT * FROM courses;";
$courses = mysqli_query($GLOBALS['con'], $course_query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Grades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h2>Create Grades</h2>
        <form method="POST">
            <div class="form-group">
                <label for="course_name">Select Student</label>
                <select name="student_id" id="student_id" class="form-control">
                    <?php
                    while ($student_row = mysqli_fetch_assoc($students)) {
                        ?>
                        <option value="<?php echo $student_row['student_id'] ?>"><?php echo $student_row['student_name'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>




            <div class="form-group">
                <label for="course_name">Select course</label>
                <select name="course_id" id="course_id" class="form-control">
                    <?php
                    while ($course_row = mysqli_fetch_assoc($courses)) {
                        ?>
                        <option value="<?php echo $course_row['course_id'] ?>"><?php echo $course_row['course_name'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="course_name">grade</label>
                <input type="text" name="grade" id="grade" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" name="create_grade">Submit</button>
        </form>


    </div>
</body>

</html>