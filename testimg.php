<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mingrand";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",

    "root", "");

$userid = $_SESSION['userid'] ;

    $sql = "SELECT * FROM user as u JOIN house as h ON u.id = h.userid WHERE h.id = '$id' LIMIT 1";
    $conn->query($sql);

$result = mysqli_query($conn, "SELECT * FROM user as u JOIN house as h ON u.id = h.userid WHERE h.id = '$id' LIMIT 1");

?>
