<?php
$connect = new PDO("mysql:host=127.0.0.1;dbname=demo;charset=utf8",

    "root", "");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="house-data">
    <a href="/mingrand/public/edithouse.php?id=<?= $data['id']?>"
       class="btn btn-success <?= (($data['ownerId'] == $_SESSION['userid']) || ($_SESSION['permision'] == '1'))? "" : "d-none" ?>">Edit
    </a>
    <a href="/mind2/public/deletedemo.php?id=<?= $data['id']?>"
       class="btn btn-success <?= (($data['ownerId'] == $_SESSION['userid']) || ($_SESSION['permision'] == '1')) ? "" : "d-none" ?>"
       onclick="return confirmDelete()">Delete
    </a>

</div>
<script>
    function confirmDelete(){
        if(confirm("You want to delete this house ?"))
            return true;

        return false;
    }
</script>
</body>
</html>
