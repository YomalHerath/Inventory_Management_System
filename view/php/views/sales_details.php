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
                                <h1 class="d-flex justify-content-center text-uppercase"><b>Sales Details</b></h1>
                                <div class="card-body">
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

                                    <!-- Supplier details table view -->
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">

                                            <thead class="table-primary text-center">
                                                <tr>
                                                    <th>Invoice No</th>
                                                    <th>Date</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Address</th>
                                                    <th>Total Bill Value</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <!-- Get details from sql table with connection  -->
                                            <?php
                                            require '../config.php';

                                            $query = " SELECT * FROM sales";
                                            $sql = mysqli_query($con, $query) or die('error getting');

                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>

                                                <tbody class="table-light text-center">
                                                    <td><?php echo $row['invoice_no']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['customer_name']; ?></td>
                                                    <td><?php echo $row['customer_address']; ?></td>
                                                    <td><?php echo $row['total_bill_value']; ?></td>
                                                    <td>
                                                        <?php
                                                        echo "<a class='btn btn-primary btn-sm' href=\"../views/view_invoice_details.php?sales_id=$row[sales_id]\"><i class='fa fa-eye' aria-hidden='true'><span class='p-2'>View</span></i></a>";
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