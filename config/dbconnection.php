<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "zenocraft_landingpage";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {

    echo "Connection Failed";

}
