<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

?>

    <?php include('../views/header.php'); ?>

    <body>

        <?php

        // get db connection from congfig file
        require '../config.php';

        //getting title from url
        if (!isset($_GET['product_id'])) {
            header("Location: ../views/supplier_details.php");
        } else {
            $product_id = $_GET['product_id'];
        }

        //selecting data associated
        $result = mysqli_query($con, "SELECT * FROM products WHERE product_id = '$product_id' ");

        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_brand = $row['product_brand'];
            $category = $row['category'];
            $qty = $row['qty'];
            $price = $row['price'];
            $availability = $row['availability'];
        }

        ?>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg grid-margin stretch-card mx-auto">
                    <div class="m-3">

                        <div class="col-lg-4 mx-auto">
                            <div class="card mb-3" style="background-color:#e0b0ff;">
                                <div class="card-header">
                                    <h2 class="card-title d-flex justify-content-center text-uppercase"><b>Add New Product</b></h2>
                                    <div class="card-body">
                                    </div>
                                    <form class="m-1" action="../form_controllers/submit_updated_product.php" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" class="form-control" name="product_id" id="product_id" value="<?php echo $product_id; ?>">

                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Product Brand</label>
                                            <input type="text" class="form-control" id="product_brand" name="product_brand" value="<?php echo $product_brand; ?>" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Product Name</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name; ?>" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Category</label>
                                            <input type="text" class="form-control" id="category" name="category" value="<?php echo $category; ?>" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Quantity</label>
                                            <input type="number" class="form-control" id="qty" name="qty" pattern="/^[0-9]+$/" value="<?php echo $qty; ?>" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Unit Price</label>
                                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Availability</label>
                                            <input type="text" class="form-control" id="availability" name="availability" value="<?php echo $availability; ?>" required>
                                        </div>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn btn-success m-1">Update</button>
                                        <button type="button" class="btn btn btn-danger m-1" onclick="history.back();">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>
    <?php include('../views/footer.php'); ?>

<?php

} else {

    header("location: ../forms/login.php");
    exit();
}

?>