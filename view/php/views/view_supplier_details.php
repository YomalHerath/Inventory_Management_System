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

                        <div class="col-lg-10 mx-auto">
                            <div class="card mb-13">
                                <div class="card-header"style="background-color:#e0b0ff;">
                                    <h2 class="card-title d-flex justify-content-center text-uppercase"><b>Supplier Details</b></h2>
                                    <div class="card-body">

                                        <div class="col">
                                            <div class="row-sm">
                                                <label><b>Company Name : </b></label>
                                                <label></label>
                                            </div>
                                            <div class="row-sm">
                                                <label class="font-weight-bold"><b>Email : </b></label>
                                                <label></label>
                                            </div>
                                            <div class="row-sm">
                                                <label class="font-weight-bold"><b>Contact No : </b></label>
                                                <label></label>
                                            </div>
                                            <div class="row-sm">
                                                <label class="font-weight-bold"><b>Address : </b></label>
                                                <label></label>
                                            </div>
                                        </div>

                                        <hr>

                                        <table class="table table-bordered">

                                            <thead class="table-primary text-center">
                                                <tr>
                                                    <th>Product No</th>
                                                    <th>Category</th>
                                                    <th>Product Brand</th>
                                                    <th>Product Model</th>
                                                    <th>Unit Price</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-light text-center">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
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