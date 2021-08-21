<?php
//get db connection from config file.
require '../config.php';

if (isset($_POST['submit'])) {

    //get all the submission data from form
    $quotation_no = $_POST['quotation_no'];
    $date = $_POST['date'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $company_tel = $_POST['company_tel'];
    $total_bill_value = $_POST['total_bill_value'];
    $warranty_period = $_POST['warranty_period'];
    $validity_period = $_POST['validity_period'];

    //store the submit data into database
    $sql = "INSERT INTO tender(quotation_no, date, company_name, company_address, company_tel_no, quotation_value, warranty_period, validity_period) 
    VALUES('$quotation_no', '$date', '$company_name', '$company_address', '$company_tel', '$total_bill_value', '$warranty_period', '$validity_period')"; 

    $query = $con->query($sql);
    echo mysqli_error($con);

    $quotation_no=$_POST['quotation_no'];
    $description=$_POST['description'];
    $qty=$_POST['qty'];
    $unit_price=$_POST['unit_price'];
    $amount=$_POST['amount'];

    foreach($description as $keys => $value){
        $sql_quotation="INSERT INTO quotation(quotation_no,description,qty,unit_price,amount)
        VALUES('$quotation_no','" . $description[$keys] . "','" . $qty[$keys] . "','" . $unit_price[$keys] . "','" . $amount[$keys] . "')";
    
        $query = $con->query($sql_quotation);
        echo mysqli_error($con);
    }
    
    echo '<script>alert("Successfully Added")</script>';
    header("Location: ../views/tender_details.php");
} else {
    echo '<script>alert("Unsuccess")</script>';
    header("Location: ../forms/create_quotation.php");
}

$con->close();