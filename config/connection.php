<?php

$hostname = "localhost";
$username = "root";
$password = "afriyan";
$dbname = "db_laptop";
$port = 3306;

$conn = mysqli_connect($hostname, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}
