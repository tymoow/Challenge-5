<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_errno) {
    die("de conectie is gefaald. de fout code is: " . $conn->connect_error);
} echo ("de conectie is gelukt");
?>