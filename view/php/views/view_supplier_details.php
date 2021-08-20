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

                        <div class="col-lg-10 mx-auto">
                            <div class="card mb-13">
                                <div class="card-header">
                                    <h2 class="card-title d-flex justify-content-center text-uppercase"><b>Supplier Details</b></h2>
                                    <div class="card-body">

                                        <div class="col">
                                            <div class="row-sm">
                                                <label><b>Company Name : </b></label>
                                                <label><?php echo $company_name; ?></label>
                                            </div>
                                            <div class="row-sm">
                                                <label class="font-weight-bold"><b>Email : </b></label>
                                                <label><?php echo $email; ?></label>
                                            </div>
                                            <div class="row-sm">
                                                <label class="font-weight-bold"><b>Contact No : </b></label>
                                                <label><?php echo $contact_no; ?></label>
                                            </div>
                                            <div class="row-sm">
                                                <label class="font-weight-bold"><b>Address : </b></label>
                                                <label><?php echo $company_address; ?></label>
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

                                            <!-- Get Supplier Product Details from sql table with connection  -->
                                            <?php
                                            // get db connection from congfig file
                                            require '../config.php';

                                            $query = "SELECT suppliers.supplier_id, products.product_id, products.product_brand, products.product_name, products.category, products.price, products.qty 
                                        FROM products INNER JOIN suppliers ON suppliers.supplier_id = products.supplier_id
                                        WHERE products.supplier_id = $supplier_id ";
                                            $sql = mysqli_query($con, $query) or die('error getting');
                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>

                                                <tbody class="table-light text-center">
                                                    <tr>
                                                        <td><?php echo $row['product_id']; ?></td>
                                                        <td><?php echo $row['category']; ?></td>
                                                        <td><?php echo $row['product_brand']; ?></td>
                                                        <td><?php echo $row['product_name']; ?></td>
                                                        <td><?php echo $row['price']; ?></td>
                                                        <td><?php echo $row['qty']; ?></td>
                                                    </tr>
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