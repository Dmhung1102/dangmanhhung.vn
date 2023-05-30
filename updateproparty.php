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

$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",

    "root", "");
session_start();
$id = $_SESSION['id'] ;
if(isset($_POST['saveupdate'])){

    if (isset($_POST['title'])) {
        $title = $_POST['title'];
    }
    if (isset($_POST)) {
        $type = $_POST['type'];
    }
    if (isset($_POST['garages'])) {
        $garages = $_POST['garages'];
    }
    if (isset($_POST['bedrooms'])) {
        $bedrooms = $_POST['bedrooms'];
    }
    if (isset($_POST['bathrooms'])) {
        $bathrooms = $_POST['bathrooms'];
    }
    if (isset($_POST['kitchen'])) {
        $kitchen = $_POST['kitchen'];
    }
    if (isset($_POST['livingroom'])) {
        $livingroom = $_POST['livingroom'];
    }
    if (isset($_POST['location'])) {
        $location = $_POST['location'];
    }
    if (isset($_POST['locationdetails'])) {
        $locationdetails = $_POST['locationdetails'];
    }
    if (isset($_POST['area'])) {
        $area = $_POST['area'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }
    if (isset($_POST['floors'])) {
        $floors = $_POST['floors'];
    }
    if (isset($_POST['orienten'])) {
        $orienten = $_POST['orienten'];
    }
    if (isset($_POST['length'])) {
        $length = $_POST['length'];
    }
    if (isset($_POST['width'])) {
        $width = $_POST['width'];
    }
    if (isset($_POST['height'])) {
        $height = $_POST['height'];
    }
    if (isset($_POST['yearbuilding'])) {
        $yearbuilding = $_POST['yearbuilding'];
    }
    if (isset($_POST['ground'])) {
        $ground = $_POST['ground'];
    }
    if (isset($_POST['poolsize'])) {
        $poolsize = $_POST['poolsize'];
    }
    if (isset($_POST['additionalroom'])) {
        $additionalroom = $_POST['additionalroom'];
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }
    if (isset($_POST['equipment'])) {
        $equipment = $_POST['equipment'];
    }
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }
    if(!empty($_POST['amenities'])) {
        $amenitieslist = array();
        foreach($_POST['amenities'] as $value){
            array_push($amenitieslist, $value);
        }
        $amenities = json_encode($amenitieslist, true);
    }
    if (isset($_POST['iframe'])) {
        $iframe = $_POST['iframe'];
    }
    if (isset($_POST['negotiatedprice'])) {
        $negotiatedprice = $_POST['negotiatedprice'];
    }
    if (isset($_POST['purpose'])) {
        $purpose = $_POST['purpose'];
    }

    if (isset($_POST['floorapartment'])) {
        $floorapartment = $_POST['floorapartment'];
    }


    $sql = "UPDATE house SET status = '$status',negotiatedprice ='$negotiatedprice', title = '$title', type = '$type', garages = '$garages', bedrooms ='$bedrooms', bathrooms = '$bathrooms',
   kitchen = '$kitchen', livingroom = '$livingroom', location = '$location', locationdetails = '$locationdetails', floorapartment = '$floorapartment', area = '$area',
   purpose = '$purpose', description = '$description', yearbuilding = '$yearbuilding', amenities = '$amenities',
   price = '$price', floors = '$floors', orienten = '$orienten', length = '$length', width = '$width', height = '$height',
   ground = '$ground', poolsize = '$poolsize', additionalroom = '$additionalroom', description = '$description', equipment = '$equipment',
   amenities = '$amenities', iframe = '$iframe',purpose = '$purpose', WHERE id =  '$_SESSION[id]'";


    if (!empty($_FILES['upimage']['name'])) {
        // Nếu có file được chọn, thực hiện update hình ảnh
        $purposeimg = 'image';
        $errors = array();
        $file_parts = explode('.', $_FILES['upimage']['name']);
        $file_ext = strtolower(end($file_parts));
        $expensions = array("jpeg", "jpg", "png");
        $name = $_FILES['upimage']['name'];

        $sql = "UPDATE housealbum SET  name = '$name' WHERE purposeimg = '$purposeimg' AND houseid = $id";
        $conn->query($sql);
    } else {

    }

    if(!empty($_FILES['upimages']['name'][0])) {
        $purposeimg = 'album';

        $upimages = $_FILES['upimages'];
        // Lặp qua từng tệp được tải lên
        for ($i = 0; $i < count($upimages['name']); $i++) {
            $name = $upimages['name'][$i];
            $data = file_get_contents($upimages['tmp_name'][$i]);

            // Thêm dữ liệu ảnh vào SQL bằng PDO
            $stmt = $connect->prepare("INSERT INTO housealbum (houseid, name, data, purposeimg) VALUES ('$id', ?, ?, '$purposeimg')");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $data, PDO::PARAM_LOB);
            $stmt->execute();
        }
    }
    if (!empty($_FILES['upestate']['name'][0])) {
        $purposeimg = 'estate';

        $upestate = $_FILES['upestate'];
        // Lặp qua từng tệp được tải lên
        for ($i = 0; $i < count($upestate['name']); $i++) {
            $name = $upestate['name'][$i];
            $data = file_get_contents($upestate['tmp_name'][$i]);

            // Thêm dữ liệu ảnh vào SQL bằng PDO
            $stmt = $connect->prepare("INSERT INTO housealbum (houseid, name, data, purposeimg) VALUES ('$id', ?, ?, '$purposeimg')");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $data, PDO::PARAM_LOB);
            $stmt->execute();
        }
    }
    if (!empty($_FILES['upfloor']['name'][0])) {
        $purposeimg = 'floor';

        $upfloor = $_FILES['upfloor'];
        // Lặp qua từng tệp được tải lên
        for ($i = 0; $i < count($upfloor['name']); $i++) {
            $name = $upfloor['name'][$i];
            $data = file_get_contents($upfloor['tmp_name'][$i]);

            // Thêm dữ liệu ảnh vào SQL bằng PDO
            $stmt = $connect->prepare("INSERT INTO housealbum (houseid, name, data, purposeimg) VALUES ('$id', ?, ?, '$purposeimg')");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $data, PDO::PARAM_LOB);
            $stmt->execute();
        }
    }
    echo "Product registration successful <a href='proparty_details.php?id=$id'>Back</a>";
}


?>
