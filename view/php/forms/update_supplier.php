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
        if (!isset($_GET['supplier_id'])) {
            header("Location: ../views/supplier_details.php");
        } else {
            $supplier_id = $_GET['supplier_id'];
        }

        //selecting data associated
        $result = mysqli_query($con, "SELECT * FROM suppliers WHERE supplier_id = '$supplier_id' ");

        while ($row = mysqli_fetch_array($result)) {
            $supplier_id = $row['supplier_id'];
            $company_name = $row['company_name'];
            $company_address = $row['company_address'];
            $email = $row['email'];
            $contact_no = $row['contact_no'];
        }

        ?>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg grid-margin stretch-card mx-auto">
                    <div class="m-3">

                        <div class="col-lg-4 mx-auto">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h2 class="card-title d-flex justify-content-center text-uppercase"><b>Update Supplier Details</b></h2>
                                    <div class="card-body">
                                    </div>
                                    <form class="m-1" action="../form_controllers/submit_updated_supplier.php" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" class="form-control" name="supplier_id" id="supplier_id" value="<?php echo $supplier_id; ?>">

                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Company Name</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name; ?>" required>
                                        </div>
                                        <div class=" form-group p-2">
                                            <label for="exampleFormControlInput1">Address</label>
                                            <input type="text" class="form-control" id="company_address" name="company_address" value="<?php echo $company_address; ?>" required>
                                        </div>
                                        <div class=" form-group p-2">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                                        </div>
                                        <div class=" form-group p-2">
                                            <label for="exampleFormControlInput1">Contact No</label>
                                            <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $contact_no; ?>" required>
                                        </div>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn btn-success m-1">Update</button>
                                        <button type=" button" class="btn btn btn-danger m-1" onclick="history.go(-1);">Cancel</button>
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