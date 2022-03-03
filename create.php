<?php

include ('connection.php');


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $insertSQL = "INSERT INTO `students`( `name`, `phone`, `email`) VALUES ('$name','$phone','$email')";

    $runInsertSQL = mysqli_query($connection, $insertSQL);

    if ($runInsertSQL == true) {

        header('location:main.php?message= Student info saved successfully.');
    }else{

        header('location:main.php?message= Opps! Student info saved failed.');
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
    <title>Create Student</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card px-4 py-4">
                    <div class="clearfix">
                        <h4 class="float-left">Add New Student</h4>
                        <a href="main.php" class="float-right btn btn-success btn-sm">Back to Home</a>
                    </div>
                    <hr>

                    <form action="" method="post">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone no">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" name="submit"  class="form-control btn btn-success" value="Submit">
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
