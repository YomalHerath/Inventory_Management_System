<?php

session_start();

// get db connection from congfig file
require '../config.php';



if (isset($_POST['submit'])) {

    if (isset($_POST['username']) && isset($_POST['password'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['username']);
        $pass =  $_POST['password'];

        $result = mysqli_query($con, "SELECT * FROM user WHERE username= '$uname' ");

        $row = mysqli_fetch_array($result);
        $username = $row['username'];
        $password = $row['password'];

        $decode_password = base64_decode($password);

        if (($uname == $username) && ($pass == $decode_password)) {

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $decode_password;

            echo '<script>alert("Login Successful")</script>';
            echo "<script type='text/javascript'> document.location = '../../../index.php'; </script>";
            exit();
        } else {

            echo '<script>alert("Incorrect Username or Password")</script>';
            echo "<script type='text/javascript'> document.location = '../forms/login.php'; </script>";
            exit();
        }
    }
}
