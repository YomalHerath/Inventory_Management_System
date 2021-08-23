<?php

session_start();

// get db connection from congfig file
require '../config.php';

$uname = $_SESSION['username'];

//get all the submition data from form
$current_password = $_POST['current_password'];
$new_password = base64_encode($_POST['new_password']);
$confirm_password = base64_encode($_POST['confirm_password']);

if (isset($_POST['submit'])) {

    $result = mysqli_query($con, "SELECT password FROM user WHERE username = '$uname' ");

    while ($row = mysqli_fetch_array($result)) {
        $pass = $row['password'];
    }

    $decode_pw = base64_decode($pass);

    if($decode_pw == $current_password){
            if($new_password == $confirm_password){
                $sql = "UPDATE user SET password='$new_password' WHERE username='$uname' ";

                $query = $con->query($sql);
                    echo mysqli_error($con);

                    echo '<script>alert("Successfully Password Changed")</script>';
                    echo "<script type='text/javascript'> document.location = '../../../index.php'; </script>";
                } else {

                    echo '<script>alert("Sorry, Password and Confirm Password doesnot Match")</script>';
                    echo "<script type='text/javascript'> document.location = '../forms/change_pw.php'; </script>";
                }
            
            }else{
                echo '<script>alert("Sorry,Please Check again your Current Password")</script>';
                echo "<script type='text/javascript'> document.location = '../forms/change_pw.php'; </script>";

            }
    }

?>