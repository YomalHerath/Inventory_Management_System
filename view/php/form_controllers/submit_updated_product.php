<?php
// get db connection from congfig file
require '../config.php';

if (isset($_POST['submit'])) {

    //get all the submition data from form
    $product_id = $_POST['product_id'];
    $product_brand = $_POST['product_brand'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];

    //update the submit data into database
    $sql = "UPDATE products SET product_brand = '$product_brand', product_name = '$product_name', category = '$category', qty = '$qty', price = '$price', availability = '$availability' WHERE product_id = '$product_id'";

    $query = $con->query($sql);
    echo mysqli_error($con);

    echo '<script>alert("Successfully Updated")</script>';
    header("Location: ../views/product_details.php");
} else {
    echo '<script>alert("Didnt Update Any Data")</script>';
    header("Location: ../views/product_details.php");
}

$con->close();
