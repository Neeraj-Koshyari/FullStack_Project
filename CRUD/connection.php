<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) die("Error occured in : ". mysqli_error($conn));
?>