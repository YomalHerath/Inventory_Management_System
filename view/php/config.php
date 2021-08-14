<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "inventory_management_system";

// Creating a connection
$con = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Connection successful message
//echo "<script>alert('Connected successfully!')</script>";
