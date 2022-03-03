<?php

include ('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];
}

//select product from database
$selectSQL = "SELECT * FROM `products` WHERE `id`='$id'";
$runSelectSQL = mysqli_query($connection, $selectSQL);
$product = mysqli_fetch_assoc($runSelectSQL);

//update product in database
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $uniqueName = date('Y-M-D-H-i-s')."-";
    $imageOldName = $_FILES['image']['name'];
    $imageName = $uniqueName.$imageOldName;
    $image_temp = $_FILES['image']['tmp_name'];

    if ($image_temp) {

        $imagePath = "asset/images/".$image;
//        chmod($imagePath, 0644);
        unlink($imagePath);

        move_uploaded_file($image_temp,"asset/images/".$imageName);

    }else{
        $imageName = $image;
    }

    $updateSQL = "UPDATE `products` SET `name`='$name',`image`='$imageName' WHERE `id`='$id'";

    $runUpdateSQL = mysqli_query($connection, $updateSQL);


    if ($runUpdateSQL == true) {

        header('location:main.php?message= Product updated successfully.');
    }else{

        header('location:main.php?message= Opps! Product update failed.');
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
    <title>Edit Product</title>
</head>
<body>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="card px-4 py-4">

                <div class="clearfix">
                    <h4 class="float-left">Edit Product</h4>
                    <a href="main.php" class="float-right btn btn-success btn-sm">Back to Home</a>
                </div>
                <hr>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="<?php echo $product['name']?>" class="form-control" placeholder="Enter your name">
                            </div>
                        </div>

                        <div class="col-9">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" value="<?php echo $product['image']?>" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <img src="asset/images/<?php echo $product['image']?>" style="height: 55px;width: 80px;margin-top: 20px;">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" name="update"  class="form-control btn btn-success" value="Update">
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
