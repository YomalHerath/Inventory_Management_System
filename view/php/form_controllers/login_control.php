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
        $id = $row['id'];

        $decode_password = base64_decode($password);

        if (($uname == $username) && ($pass == $decode_password)) {

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $decode_password;
            $_SESSION['id'] = $id;

            header("location: ../../../index.php ");
            exit();
        } else {

            echo 'Incorrect Username or Password';
            header("location: ../forms/login.php ");
            exit();
        }
    }
}
