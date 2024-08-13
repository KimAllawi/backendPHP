<?php
include ('../functions/Student.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h2>Students</h2>
        <a href="create.php" class="btn btn-success my-3" id="addStudent">Add Student</a>
        <form method="get">
            <input type="text" class="form-control col-3 my-1" name="student_name" placeholder="Search By Student Name">
            <button class="btn btn-info mb-3" type="submit">Search</button>
        </form>
        <?php

        if (isset($_GET['student_name'])) {
            $result = SearchByName($_GET['student_name']);
        } else {
            
            $query = "SELECT * FROM students";
            $result = mysqli_query($GLOBALS['con'], $query);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result != NULL) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?= $row['student_id'] ?></td>
                            <td><?= $row['student_name'] ?></td>
                            <td><?= $row['student_email'] ?></td>
                            <td><?= $row['date_of_birth'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td>
                                <a href="edit.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="edit.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                            
                        </tr>

                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td>No Results</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>