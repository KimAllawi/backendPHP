<?php
include ('../functions/Student.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h2>Create Student</h2>
        <form method="POST" >
            <div class="form-group">
                <label for="student_name">Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name" required>
            </div>
            <div class="form-group">
                <label for="student_email">Email</label>
                <input type="email" class="form-control" id="student_email" name="student_email" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="create_student">Submit</button>
        </form>
    </div>
</body>

</html>