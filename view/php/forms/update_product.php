<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

?>

<?php include('../views/header.php'); ?>

<body>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card mx-auto">
                <div class="m-3">

                    <div class="col-lg-4 mx-auto">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="card-title d-flex justify-content-center text-uppercase"><b>Update Product Details</b></h2>
                                <div class="card-body" style="background-color:#e0b0ff;">
                                </div>
                                <form class="m-1" action="../form_controllers/submit_updated_product.php" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" class="form-control" name="product_id" id="product_id">

                                    <div class="form-group p-2">
                                        <label for="exampleFormControlInput1">Product Brand</label>
                                        <input type="text" class="form-control" id="product_brand" name="product_brand" required>
                                    </div>
                                    <div class="form-group p-2">
                                        <label for="exampleFormControlInput1">Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                                    </div>
                                    <div class="form-group p-2">
                                        <label for="exampleFormControlInput1">Category</label>
                                        <input type="text" class="form-control" id="category" name="category" required>
                                    </div>
                                    <div class="form-group p-2">
                                        <label for="exampleFormControlInput1">Quantity</label>
                                        <input type="text" class="form-control" id="qty" name="qty" required>
                                    </div>
                                    <div class="form-group p-2">
                                        <label for="exampleFormControlInput1">Unit Price</label>
                                        <input type="text" class="form-control" id="price" name="price" required>
                                    </div>
                                    <div class="form-group p-2">
                                        <label for="exampleFormControlInput1">Availability</label>
                                        <input type="text" class="form-control" id="availability" name="availability" required>
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