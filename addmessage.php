<?php
$servername = "localhost";
$username = "root";
$password = "Dmhung1102!";
$dbname = "mingrand";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$userid = $_SESSION['userid'] ;
if(isset($_POST['savemes'])){

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['date'])) {
        $date = $_POST['date'];
    }
    if (isset($_POST['phonenumber'])) {
        $phonenumber = $_POST['phonenumber'];
    }
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
    }

    $sql = "INSERT INTO message (name, email, date, phonenumber, message, userid) VALUES  ('$name', '$email', '$date', '$phonenumber', '$message','$userid')";
    $conn->query($sql);
        echo "Enter message successfully <a href='./blog.php'>Back</a>";
}

?>
