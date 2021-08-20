<?php
// get db connection from congfig file
require '../config.php';

if (isset($_POST['submit'])) {

    //get all the submition data from form
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];

    //store the submit data into database
    $sql = "INSERT INTO suppliers(company_name, company_address, email, contact_no) 
    VALUES ('$company_name','$company_address','$email','$contact_no')";

    $query = $con->query($sql);
    echo mysqli_error($con);

    echo '<script>alert("Successfully Added")</script>';
    header("Location: ../views/supplier_details.php");
} else {
    echo '<script>alert("Unsuccess")</script>';
    header("Location: ../views/supplier_details.php");
}

$con->close();
