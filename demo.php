<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$connect = new PDO("mysql:host=127.0.0.1;dbname=demo;charset=utf8",

    "root", "");
// lệnh sql xóa 1 bản ghi
$sql = "DELETE FROM customer WHERE id=4";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully <a href='deletedemo.php'>Go Back</a>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>