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
                                    <form method="POST">
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
                                                    <th>Invoice Qty</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                            </thead>

                                            <!-- Get details from sql table with connection  -->
                                            <?php
                                            require '../config.php';

                                            $query = " SELECT * FROM products WHERE availability = 'Available'";
                                            if (isset($_POST['search'])) {

                                                $search =  $_POST['search'];
                                                $query = "SELECT * FROM products WHERE availability = 'Available' AND (product_brand LIKE '%$search%' OR category LIKE '%$search%' OR product_name LIKE '%$search%' OR company_name LIKE '%$search%')";
                                            }

                                            $sql = mysqli_query($con, $query) or die('error getting');

                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>

                                                <tbody class="table-light text-center">
                                                    <td><?php echo $row['product_id']; ?></td>
                                                    <td><?php echo $row['company_name']; ?></td>
                                                    <td><?php echo $row['product_brand']; ?></td>
                                                    <td><?php echo $row['product_name']; ?></td>
                                                    <td><?php echo $row['category']; ?></td>
                                                    <td><?php echo $row['qty']; ?></td>
                                                    <td><?php echo number_format($row['price'], 2); ?></td>
                                                    <td>
                                                        <p class="p-1 mb-1 bg-success text-light"><?php echo $row['availability']; ?></p>
                                                    </td>

                                                    <form method="POST" action="../forms/create_invoice.php?action=add&product_id=<?php echo $row["product_id"]; ?>">

                                                        <td>
                                                            <input type="number" name="quantity" id="quantity" min="1" max="50" value="1" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <button class='btn btn-primary btn-sm' name="add_to_invoice"><i class='fa fa-pencil-square-o' aria-hidden='true'><span class='p-2'>Add to Invoice</span></i></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo "<a class='btn btn-warning btn-sm' href=\"../forms/update_product.php?product_id=$row[product_id]\"><i class='fa fa-pencil' aria-hidden='true'><span class='p-2'>Update</span></i></a>";
                                                            ?>
                                                        </td>
                                                    </form>
                                                </tbody>

                                            <?php
                                            }
                                            ?>

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

                                            <!-- Get details from sql table with connection  -->
                                            <?php
                                            require '../config.php';

                                            $query = " SELECT * FROM products WHERE availability = 'Unavailable'";
                                            if (isset($_POST['search'])) {

                                                $search =  $_POST['search'];
                                                $query = "SELECT * FROM products WHERE availability = 'Unavailable' AND (product_brand LIKE '%$search%' OR category LIKE '%$search%' OR product_name LIKE '%$search%' OR company_name LIKE '%$search%')";
                                            }

                                            $sql = mysqli_query($con, $query) or die('error getting');

                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>

                                                <tbody class="table-light text-center">
                                                    <td><?php echo $row['product_id']; ?></td>
                                                    <td><?php echo $row['company_name']; ?></td>
                                                    <td><?php echo $row['product_brand']; ?></td>
                                                    <td><?php echo $row['product_name']; ?></td>
                                                    <td><?php echo $row['category']; ?></td>
                                                    <td><?php echo $row['qty']; ?></td>
                                                    <td><?php echo number_format($row['price'], 2); ?></td>
                                                    <td>
                                                        <p class="p-1 mb-1 bg-danger text-light"><?php echo $row['availability']; ?></p>
                                                    </td>
                                                    <td>

                                                        <?php
                                                        echo "<a class='btn btn-warning btn-sm' href=\"../forms/update_product.php?product_id=$row[product_id]\"><i class='fa fa-pencil' aria-hidden='true'><span class='p-2'>Update</span></i></a>";
                                                        ?>
                                                    </td>
                                                </tbody>

                                            <?php
                                            }
                                            ?>

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