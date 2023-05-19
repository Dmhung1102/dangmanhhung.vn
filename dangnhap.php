<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<form action='dangnhap.php' method='POST'>
    <input type="text" name="user" id="">
    <input type="password" name="pass" id="">
    <input type="submit" name="dangnhap" value="Đăng Nhập">
</form>
<?php
    if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];

        $_SESSION['user']=$user;
        $_SESSION['pass']=$pass;

        echo "đã đăng nhập  ".$user." ".$pass." ";
    }
?>
</body>
</html>