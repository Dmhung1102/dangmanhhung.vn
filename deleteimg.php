<?php
$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");
$name = $_GET['name'];

$purpose = $_GET['purpose'];
$houseid = $_GET['houseid'];
$sqlQueryDeleteAlbum = "DELETE FROM housealbum WHERE name =  '$name' AND purposeimg = '$purpose' AND houseid = '$houseid'  ";
var_dump($sqlQueryDeleteAlbum);
$stmt2 = $connect->prepare($sqlQueryDeleteAlbum);
$stmt2 ->execute();



header("location:./editpage.php?id= $houseid");


