<?php
$servername = "localhost";
$username = "root";
$passwd = "Diplamtuan123.";
$dbname = "doanweb2";


// Create connection
$conn = mysqli_connect($servername, $username, $passwd, $dbname);

// Check connection
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
} else {
    // echo "Connected successfully";
}
