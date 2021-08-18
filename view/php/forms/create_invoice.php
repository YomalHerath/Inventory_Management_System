<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

?>

    <?php include('../views/header.php'); ?>

    <?php

    // get db connection from congfig file
    require '../config.php';

    //getting title from url
    if ((isset($_POST["add_to_cart"])) && (isset($_GET["product_id"]))) {

        $product_id = $_GET['product_id'];

        //selecting data associated
        $result = mysqli_query($con, "SELECT * FROM products WHERE product_id = '$product_id' ");

        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_brand = $row['product_brand'];
            $price = $row['price'];
        }

        if (isset($_SESSION["shopping_cart"])) {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

            if (!in_array($_GET["product_id"], $item_array_id)) {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'           =>    $_GET["product_id"],
                    'item_name'         =>    $product_name,
                    'item_brand'        =>    $product_brand,
                    'item_price'        =>    $price,
                    'item_quantity'     =>    $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            } else {
                echo '<script>alert("Item Already Added")</script>';
            }
        } else {
            $item_array = array(
                'item_id'           =>    $_GET["product_id"],
                'item_name'         =>    $product_name,
                'item_brand'        =>    $product_brand,
                'item_price'        =>    $price,
                'item_quantity'     =>    $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                if ($values["item_id"] == $_GET["product_id"]) {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="create_invoice.php"</script>';
                }
            }
        }
    }

    ?>

    <body>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg grid-margin stretch-card mx-auto">
                    <div class="m-3">

                        <div class="col-lg-6 mx-auto">
                            <div class="card mb-3" style="background-color:#e0b0ff;">
                                <div class="card-header">
                                    <h2 class="card-title d-flex justify-content-center text-uppercase"><b>Create New
                                            Invoice</b></h2>
                                    <div class="card-body">
                                    </div>

                                    <form class="m-1" action="../form_controllers/submit_create_invoice.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Invoice No</label>
                                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Date</label>
                                            <input type="date" class="form-control" id="date" name="date" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Customer Name</label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Customer Address</label>
                                            <input type="text" class="form-control" id="customer_address" name="customer_address" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Customer Tel No</label>
                                            <input type="text" class="form-control" id="customer_tel" name="customer_tel" required>
                                        </div>
                                        <br>

                                        <div>
                                            <div class="form-group m-2">
                                                <div class="table-responsive ">
                                                    <table class="table table-bordered" id="product_table">

                                                        <thead class="table-primary text-center">
                                                            <tr>
                                                                <th>Product Brand</th>
                                                                <th>Product Name</th>
                                                                <th>Qty</th>
                                                                <th>Unit Price</th>
                                                                <th style="padding:10px" width="5%">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        if (!empty($_SESSION["shopping_cart"])) {
                                                            $total = 0;
                                                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                        ?>
                                                                <tbody class="table-light" id="table_body">
                                                                    <tr>
                                                                        <td><?php echo $values["item_brand"]; ?></td>
                                                                        <td><?php echo $values["item_name"]; ?></td>
                                                                        <td><?php echo $values["item_quantity"]; ?></label></td>
                                                                        <td><?php echo $values["item_price"]; ?></label></td>
                                                                        <td><a class="btn btn-sm btn-danger" href="create_invoice.php?action=delete&product_id=<?php echo $values["item_id"]; ?>"><span class="DeleteButton">Remove</span></a></td>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                                            }
                                                                ?>
                                                                <tr>
                                                                    <td style="font-weight:bold" colspan="3" align="right">Total</td>
                                                                    <td align="right" style="font-weight:bold" colspan="2">Rs <?php echo number_format($total, 2); ?></td>
                                                                </tr>
                                                                </tbody>

                                                            <?php
                                                        }
                                                            ?>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn btn-success m-1">Submit</button>
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