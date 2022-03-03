<?php

include ('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$selectSQL = "SELECT * FROM `students` WHERE `id`='$id'";
$runSelectSQL = mysqli_query($connection, $selectSQL);
$student = mysqli_fetch_assoc($runSelectSQL);


if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];


    $updateSQL = "UPDATE `students` SET `name`='$name',`phone`='$phone',`email`='$email' WHERE `id`='$id'";

    $runUpdateSQL = mysqli_query($connection, $updateSQL);

    if ($runUpdateSQL == true) {

        header('location:main.php?message= Student info updated successfully.');
    }else{

        header('location:main.php?message= Opps! Student info update failed.');
    }

}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <title>Edit Student</title>
</head>
<body>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="card px-4 py-4">

                <div class="clearfix">
                    <h4 class="float-left">Edit Student</h4>
                    <a href="main.php" class="float-right btn btn-success btn-sm">Back to Home</a>
                </div>
                <hr>

                <form action="" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="<?php echo $student['name']?>" class="form-control" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" value="<?php echo $student['phone']?>" class="form-control" placeholder="Enter your phone no">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="<?php echo $student['email']?>" class="form-control" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" name="update"  class="form-control btn btn-success" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="asset/js/jquery-3.5.1.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/popper.min.js"></script>

</body>
</html>
