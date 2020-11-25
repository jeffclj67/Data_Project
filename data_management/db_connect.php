<?php

$dbServername = "127.0.0.1:3306";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "homework_share";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
print "success";

?>