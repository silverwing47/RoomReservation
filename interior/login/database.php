<?php

$username = "localhost";
$uname = "root";
$password = "";

$db_name = "g_fast";

$conn = mysqli_connect($username, $uname, $password, $db_name);

if (!$conn) {
    echo "connection failed!";
}
