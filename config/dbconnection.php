<?php

$server = "localhost";
$username = "root";
$password = "Zenocraft@123";
$database = "email_us";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {

    echo "Connection Failed";

}
