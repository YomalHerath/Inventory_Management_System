<?php
// get db connection from congfig file
require '../config.php';

if (isset($_POST['submit'])) {

    $qty = 0;

    $id = $_POST['id'];
    $product_all_qty = $_POST['product_all_qty'];

    $invoice_no = $_POST['invoice_no'];
    $product_brand = $_POST['brand'];
    $product_name = $_POST['name'];
    $product_qty = $_POST['qty'];
    $product_price = $_POST['price'];
    $amount = $_POST['amount'];

    foreach ($product_name as $key => $value) {

        $sql_invoice = "INSERT INTO sales_invoices( invoice_no, product_brand, product_name, qty, unit_price, amount)
        VALUES ('$invoice_no','" . $product_brand[$key] . "','" . $product_name[$key] . "','" . $product_qty[$key] . "','" . $product_price[$key] . "','" . $amount[$key] . "')";

        $query = $con->query($sql_invoice);
        echo mysqli_error($con);

        $qty = ($product_all_qty[$key] - $product_qty[$key]);

        $result = mysqli_query($con, "UPDATE products SET qty ='$qty' WHERE product_id = '" . $id[$key] . "' ");

    }

    //get all the submition data from form
    $invoice_no = $_POST['invoice_no'];
    $date = $_POST['date'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_tel = $_POST['customer_tel'];
    $total_price = $_POST['total_price'];

    //store the submit data into database
    $sql = "INSERT INTO sales(invoice_no, date, customer_name, customer_address, customer_tel, total_bill_value) 
    VALUES ('$invoice_no', '$date','$customer_name','$customer_address','$customer_tel','$total_price')";

    $query = $con->query($sql);
    echo mysqli_error($con);

    $result = mysqli_query($con, "UPDATE products SET availability = 'Unavailable' WHERE qty = '0' OR qty = 'null' ");

    echo '<script>alert("Successfull")</script>';
    header("Location: ../views/product_details.php");

    session_start();
    unset($_SESSION["shopping_cart"]);
} else {
    echo '<script>alert("Unsuccess")</script>';
    header("Location: ../forms/create_invoice.php");
}

$con->close();
