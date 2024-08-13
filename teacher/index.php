<?php
include "../functions/Teacher.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body data-bs-theme="dark">
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h2>Teachers</h2>
        <a href="create.php" class="btn btn-success my-3" id="addteacher">Add teacher</a>

    <form method="GET" class="form-group">
        <input type="text" class="form-control my-3 col-3" name="teacher_name" placeholder="SearchByTeacher" >
        <button class="btn btn-info"> Search </button>
    </form>

        <table class="table">
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
                if(isset($_GET['teacher_name'])){

                    $result = SearchByTeacher($_GET['teacher_name']);

                } else{
                        $query = "SELECT * FROM teachers";
                        $result = mysqli_query($GLOBALS['con'], $query);
                        
                }

                if($result != NULL){

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['teacher_id'] ?></td>
                            <td><?= $row['teacher_name'] ?></td>
                            <td><?= $row['teacher_email'] ?></td>
                            <td><?= $row['date_of_birth'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td>
                                <a href="./edit.php?teacher_id=<?php echo $row['teacher_id'] ?> " class="btn btn-info">Edit</a> 
                                <a href="./show.php?teacher_id=<?php echo $row['teacher_id'] ?> " class="btn btn-danger">Delete</a> 
                            </td> 
                            <td>
                                <a href="./report.php?teacher_id=<?php echo $row['teacher_id']   ?>" class="btn btn-primary form-control " > Show Courses</a>
                            </td>
                            
                            
    
                        </tr>
                        <?php
                    }

                } else{
                    ?>

                    <td>
                        <tr>NO Result</tr>
                    </td>

                    <?php
                }
               
                // var_dump(print_r($result));
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>