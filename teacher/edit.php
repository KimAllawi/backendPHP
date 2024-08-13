<?php 


include '../functions/Teacher.php';

$teacher_id = $_GET['teacher_id'];


$query = "SELECT * FROM teachers WHERE teacher_id = '$teacher_id'";

$result = mysqli_query($GLOBALS['con'] , $query);

$row = mysqli_fetch_assoc($result);

// var_dump($_GET);

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
        <h2>Update Teacher</h2>
        <form method="post" >

            <div class="form-group">
                <label for="teacher_id">Id</label>
                <input type="text" class="form-control" value="<?php echo $row['teacher_id']  ?>" id="teacher_id" name="teacher_id" required>
            </div>
            <div class="form-group">
                <label for="teacher_name">Name</label>
                <input type="text" class="form-control" value="<?php echo $row['teacher_name']  ?>" id="teacher_name" name="teacher_name" required>
            </div>
            <div class="form-group">
                <label for="teacher_email">Email</label>
                <input type="email" class="form-control" value="<?php echo $row['teacher_email']  ?>" id="teacher_email" name="teacher_email" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" value="<?php echo $row['date_of_birth']  ?>" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required> <?php echo $row['address']  ?> </textarea>
            </div>
            <button type="submit" name="update_teacher" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>