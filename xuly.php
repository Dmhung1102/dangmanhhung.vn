<?php

// Nếu không phải là sự kiện đăng ký thì không xử lý
if (!isset($_POST['txtUsername'])){
    die('');
}

//Nhúng file kết nối với database
include('connect.php');

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');

//Lấy dữ liệu từ file signup.php
$username   = addslashes($_POST['txtUsername']);
$name       = addslashes($_POST['txtName']);
$phonenumber = addslashes($_POST['txtPhonenumber']);
$email      = addslashes($_POST['txtEmail']);
$password   = addslashes($_POST['txtPassword']);
$confirmpassword  = addslashes($_POST['txtConfirmPassword']);



//Kiểm tra người dùng đã nhập liệu đầy đủ chưa
if (!$username || !$name || !$phonenumber|| !$email || !$password || !$confirmpassword  )
{
    echo "Please enter full information. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

// Mã khóa mật khẩu
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<a href='javascript: history.go(-1)'>Go Back</a>";
    exit;
}
$password = md5($password);

//Kiểm tra tên đăng nhập này đã có người dùng chưa
$checkusername = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
if(!$checkusername){
    die(mysqli_error($conn));
}
if (mysqli_num_rows($checkusername) > 0){
    echo "This username is exist. Please use the other one. <a href='javascript: history.go(-1)'>Go Back</a>";
    exit;
}

//Kiểm tra sdt này đã có người dùng chưa
$checkphonenumber = mysqli_query($conn, "SELECT phonenumber FROM user WHERE phonenumber='$phonenumber'");
if(!$checkphonenumber){
    die(mysqli_error($conn));
}
if (mysqli_num_rows($checkphonenumber) > 0){
    echo "This phonenumber is exist. Please use the other one. <a href='javascript: history.go(-1)'>Go Back</a>";
    exit;
}
//Kiểm tra email có đúng định dạng hay không
if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})^", $email)){
    echo "This email is not valid. Please use the other one. <a href='javascript: history.go(-1)'>Go Back</a>";
    exit;
};

//Kiểm tra email đã có người dùng chưa
$checkemail = mysqli_query($conn, "SELECT email FROM user WHERE email='$email'");
if(!$checkemail){
    die(mysqli_error($conn));
}
if (mysqli_num_rows($checkemail) > 0)
{
    echo "This email is exist. Please use the other one. <a href='javascript: history.go(-1)'>Go Back</a>";
    exit;
};

//Kiểm tra mật khẩu lặp lại
if($_POST['txtPassword']!==$_POST['txtConfirmPassword']) {

    echo "Your passwords did not match <a href='javascript: history.go(-1)'>Go Back</a>";
    exit;
}
// Kiểm tra term
if(!isset($_POST['read-terms'])){
    echo "You have to read and agree to the terms. <a href='javascript: history.go(-1)'>Go Back</a>";
    exit;
}
//Lưu thông tin thành viên vào bảng
$sql = "INSERT INTO user (username, name, phonenumber, email, password)
VALUES ('$username', '$name', '$phonenumber', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Sign Up Success <a href='./login.php'>Login</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>