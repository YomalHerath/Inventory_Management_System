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

                        <div class="col-lg-12 mx-auto">
                            <div class="m-3">
                                <h1 class="d-flex justify-content-center text-uppercase"><b>Product Details</b></h1>
                                <div class="card-body">
                                    <!-- Add Product Button -->
                                    <a class="btn btn-primary col-lg-2 ml-2" href="../forms/add_product.php"><i class="fa fa-folder-open" aria-hidden="true"><span class="p-3">Add New Product</span></i></a>
                                    <br>
                                    <form>
                                        <div class="row no-gutters align-items-center mt-2 pt-2">
                                            <!--end of col-->
                                            <div class="col-lg-3">
                                                <input class="form-control" type="search" name="search" placeholder="Search...">
                                            </div>
                                            <!--end of col-->
                                            <div class="col-auto">
                                                <button class="btn btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"><span class="p-2">Search</span></i></button>
                                            </div>
                                            <!--end of col-->
                                        </div>
                                    </form>

                                    <hr>

                                    <h3>Available Products</h3>
                                    <!-- Supplier details table view -->
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">

                                            <thead class="table-primary text-center">
                                                <tr>
                                                    <th>Product ID</th>
                                                    <th>Company Name</th>
                                                    <th>Product Brand</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                    <th>Availability</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="table-light text-center">
                                                <td>1</td>
                                                <td>Hoyt Archery</td>
                                                <td>Hoyt</td>
                                                <td>Riser</td>
                                                <td>Recurve</td>
                                                <td>5</td>
                                                <td>Rs145000.00</td>
                                                <td>
                                                    <p class="p-1 mb-1 bg-success text-light">Available</p>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo "<a class='btn btn-warning btn-sm' href=\"../forms/update_product.php\"><i class='fa fa-pencil' aria-hidden='true'><span class='p-2'>Update</span></i></a>";
                                                    ?>
                                                    <?php
                                                    echo "<a class='btn btn-primary btn-sm' href=\"../forms/create_invoice.php\"><i class='fa fa-pencil-square-o' aria-hidden='true'><span class='p-2'>Add to Invoice</span></i></a>";
                                                    ?>
                                                </td>
                                            </tbody>

                                        </table>
                                    </div>

                                    <hr>

                                    <h3>Out of Stock Products</h3>
                                    <!-- Supplier details table view -->
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">

                                            <thead class="table-primary text-center">
                                                <tr>
                                                    <th>Product ID</th>
                                                    <th>Company Name</th>
                                                    <th>Product Brand</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                    <th>Availability</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="table-light text-center">
                                                <td>1</td>
                                                <td>Hoyt Archery</td>
                                                <td>Hoyt</td>
                                                <td>Limbs</td>
                                                <td>Recurve</td>
                                                <td>0</td>
                                                <td>Rs113000.00</td>
                                                <td>
                                                    <p class="p-1 mb-1 bg-danger text-light">Unavailable</p>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo "<a class='btn btn-warning btn-sm' href=\"../forms/update_product.php\"><i class='fa fa-pencil' aria-hidden='true'><span class='p-2'>Update</span></i></a>";
                                                    ?>
                                                </td>
                                            </tbody>

                                        </table>
                                    </div>

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