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
                                <h1 class="d-flex justify-content-center text-uppercase"><b>Supplier Details</b></h1>
                                <div class="card-body">
                                    <!-- Add Supplier Button -->
                                    <a class="btn btn-primary col-lg-2 ml-2" href="../forms/add_supplier.php"><i class="fa fa-users" aria-hidden="true"><span class="p-3">Add New Supplier</span></i></a>
                                    <br>
                                    <form method="POST">
                                        <div class="row no-gutters align-items-center mt-2 pt-2">
                                            <!--end of col-->
                                            <div class="col-lg-3">
                                                <input class="form-control" name="search" type="search" placeholder="Search...">
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
                                                    <th>Supply Company Name</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <!-- Get details from sql table with connection  -->
                                            <?php
                                            require '../config.php';

                                            $query = " SELECT * FROM suppliers";

                                            if (isset($_POST['search'])) {

                                                $search =  $_POST['search'];
                                                $query = "SELECT * FROM suppliers WHERE supplier_id LIKE '%$search%' OR company_name LIKE '%$search%' OR company_address LIKE '%$search%' OR email LIKE '%$search%' ";
                                            }


                                            $sql = mysqli_query($con, $query) or die('error getting');

                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>

                                                <tbody class="table-light text-center">
                                                    <td><?php echo $row['company_name']; ?></td>
                                                    <td><?php echo $row['company_address']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['contact_no']; ?></td>
                                                    <td>
                                                        <?php
                                                        echo "<a class='btn btn-primary btn-sm' href=\"../views/view_supplier_details.php?supplier_id=$row[supplier_id]\"><i class='fa fa-eye' aria-hidden='true'><span class='p-2'>View</span></i></a>";
                                                        ?>
                                                        <?php
                                                        echo "<a class='btn btn-warning btn-sm' href=\"../forms/update_supplier.php?supplier_id=$row[supplier_id]\"><i class='fa fa-pencil' aria-hidden='true'><span class='p-2'>Update</span></i></a>";
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