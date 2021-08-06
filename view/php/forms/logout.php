<?php

session_start();

session_unset();
session_destroy();


header("location: ../forms/login.php");
exit();
