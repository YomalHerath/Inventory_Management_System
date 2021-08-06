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
        $pass = ($_POST['password']);

        $result = mysqli_query($con, "SELECT * FROM user WHERE username= '$uname' AND password ='$pass' ");

        $row = mysqli_fetch_array($result);
        $username = $row['username'];
        $password = $row['password'];
        $id = $row['id'];


        if (($uname === $username) && ($pass === $password)) {

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
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
