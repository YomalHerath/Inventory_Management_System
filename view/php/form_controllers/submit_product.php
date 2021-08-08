<?php
// get db connection from congfig file
require '../config.php';

if (isset($_POST['submit'])) {

    //get all the submition data from form
    $result = $_POST['company_name'];
    $result_explode = explode(
        '|',
        $result
    );

    $supplier_id =  $result_explode[0];
    $company_name = $result_explode[1];

    $product_brand = $_POST['product_brand'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];

    //store the submit data into database
    $sql = "INSERT INTO products(supplier_id, company_name, product_brand, product_name, category, qty, price, availability) 
    VALUES ('$supplier_id', '$company_name','$product_brand','$product_name','$category','$qty','$price', '$availability')";

    $query = $con->query($sql);
    echo mysqli_error($con);

    echo '<script>alert("Successfully Added")</script>';
    header("Location: ../views/product_details.php");
} else {
    echo '<script>alert("Unsuccess")</script>';
    header("Location: ../views/product_details.php");
}

$con->close();
