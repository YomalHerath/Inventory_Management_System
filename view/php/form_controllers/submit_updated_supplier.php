<?php
// get db connection from congfig file
require '../config.php';

if (isset($_POST['submit'])) {

    //get all the submition data from form
    $supplier_id = $_POST['supplier_id'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];

    //update the submit data into database
    $sql = "UPDATE suppliers SET company_name = '$company_name', company_address = '$company_address', email = '$email', contact_no = '$contact_no' WHERE supplier_id = '$supplier_id'";

    $query = $con->query($sql);
    echo mysqli_error($con);

    echo '<script>alert("Successfully Updated")</script>';
    header("Location: ../views/supplier_details.php");
} else {
    echo '<script>alert("Didnt Update Any Data")</script>';
    header("Location: ../views/supplier_details.php");
}

$con->close();
