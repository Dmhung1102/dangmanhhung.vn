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
if(isset($_POST['save'])){

    if (isset($_POST['title'])) {
        $title = $_POST['title'];
    }
    if (isset($_POST['quote'])) {
        $quote = $_POST['quote'];
    }
    if (isset($_POST['date'])) {
        $date = $_POST['date'];
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }
    if (isset($_POST['titlebot'])) {
        $titlebot = $_POST['titlebot'];
    }
    if (isset($_POST['descriptionbot'])) {
        $descriptionbot = $_POST['descriptionbot'];
    }
    if (isset($_POST['image'])) {
        $image = $_POST['image'];
    }
    $input = isset($_POST['album'])? trim($_POST['album']) :"";
    // var_dump($input) ;
    $album = explode("\n", str_replace("\r", "", $input));

    // encoce array to string to save into database
    if(isset($album)){
        $album = json_encode($album, true);
    }

    $sql = "INSERT INTO blog (title,description,album, titlebot, descriptionbot, image, userid, date, quote)
    VALUES ('$title', '$description','$album','$titlebot','$descriptionbot','$image','$userid','$date','$quote')";
    $conn->query($sql);
    echo "Product registration successful <a href='./blog.php'>Back</a>";
}

?>
