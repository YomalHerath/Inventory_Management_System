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
                                <h1 class="d-flex justify-content-center text-uppercase"><b>Tender Details</b></h1>
                                <div class="card-body">
                                    <!-- add tender button -->
                                    <a class="btn btn-primary col-lg-2 ml-2" href="../forms/create_quotation.php"><i class="fa fa-tasks" aria-hidden="true"><span class="p-3">Add New Tender</span></i></a>
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

                                    <!-- Supplier details table view -->
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">

                                            <thead class="table-primary text-center">
                                                <tr>
                                                    <th>Quotation No</th>
                                                    <th>Date</th>
                                                    <th>Company Name</th>
                                                    <th>Company Address</th>
                                                    <th>Quotation Value</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                                <tbody class="table-light text-center">
                                                    <td>122922</td>
                                                    <td>15-7-2021</td>
                                                    <td>Navy Walisara</td>
                                                    <td>Walisara</td>
                                                    <td>Rs 456500.00</td>
                                                    <td>
                                                        <?php
                                                        echo "<a class='btn btn-primary btn-sm' href=\"../views/view_quotation_details.php\"><i class='fa fa-eye' aria-hidden='true'><span class='p-2'>View</span></i></a>";
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