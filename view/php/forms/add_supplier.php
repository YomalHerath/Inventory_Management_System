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
                                <div class="card-header" style="background-color:#e0b0ff;">
                                    <h2 class="card-title d-flex justify-content-center text-uppercase"><b>Add New Supplier</b></h2>
                                    <div class="card-body">
                                    </div>
                                    <form class="m-1" action="../form_controllers/submit_supplier.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Company Name</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Address</label>
                                            <input type="text" class="form-control" id="company_address" name="company_address" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Contact No</label>
                                            <input type="text" class="form-control" id="contact_no" pattern="\d*" name="contact_no" required>
                                        </div>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn btn-success m-1">Save</button>
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