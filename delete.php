<?php
include ('connect.php');
$id = $_GET['id'];
// lệnh sql xóa 1 bản ghi
$sql = "DELETE FROM house WHERE id= $id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully <a href='index.php'>Go Home</a>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>