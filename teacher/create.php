<?php 


include '../functions/Teacher.php' ;

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Teacher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h2>Create Teacher</h2>
        <form  method="POST">
            <div class="form-group">
                <label for="teacher_name">Name</label>
                <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
            </div>
            <div class="form-group">
                <label for="teacher_email">Email</label>
                <input type="email" class="form-control" id="teacher_email" name="teacher_email" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <button type="submit" name="create_teacher" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>