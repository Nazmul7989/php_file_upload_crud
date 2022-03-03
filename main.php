<?php

include ('connection.php');

$message = '';

if (isset($_GET['message'])) {
    $message = $_GET['message'];
}

//select data from database
$selectSQL = "SELECT * FROM `products`";
$runSelectSQL = mysqli_query($connection, $selectSQL);

//delete data from database
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];


    $deleteSQL = "DELETE FROM `products` WHERE `id`='$id'";
    $runDeleteSQL = mysqli_query($connection, $deleteSQL);

    if ($runDeleteSQL == true) {

//        chmod("asset/images/$image", 0644);
//        unlink("asset/images/$image");

        $imagePath = "asset/images/".$image;
        if (file_exists($imagePath)) {
//            chmod($imagePath, 0644);
            unlink($imagePath);
        }
        header('location:main.php?message= Product deleted successfully.');
    }else{

        header('location:main.php?message= Opps! Product delete failed.');
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
    <link rel="stylesheet" href="asset/css/all.min.css">
    <link rel="stylesheet" href="asset/css/fontawesome.min.css">
    <title> Product Crud</title>
</head>
<body>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card px-4 py-4">

                <?php if ($message != '') { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $message ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }?>

                <div class="clearfix">
                    <h4 class="float-left">Product Info</h4>
                    <a href="create.php" class="float-right btn btn-success btn-sm">Add New</a>
                </div>

                <table class="table table-bordered mt-3">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php while ($product = mysqli_fetch_assoc($runSelectSQL)){?>
                        <tr>
                            <td><?php echo $product['id']?></td>
                            <td><?php echo $product['name']?></td>
                            <td>
                                <img src="asset/images/<?php echo $product['image']?>" style="width: 90px; height: 65px" alt="<?php echo $product['name']?>">
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $product['id']?>&image=<?php echo $product['image']?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                <a href="main.php?id=<?php echo $product['id']?>&image=<?php echo $product['image']?>"  class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<script src="asset/js/jquery-3.5.1.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/all.min.js"></script>
<script src="asset/js/fontawesome.min.js"></script>

</body>
</html>
