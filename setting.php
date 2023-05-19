<?php
session_start();
$sqlQuery = "";

include('connect.php');
if (isset($_SESSION['username']) == false) {
    // Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
    header('Location: http://localhost/mind2/public/login.php');
}
if(isset($_POST['namechange'])){
    if(isset($_POST['newname'])){
        $newname = addslashes($_POST['newname']);
    }
    if(isset($_POST['password'])){
        $password = addslashes($_POST['password']);
        $password = md5($password);
    }
    $change = isset($_GET['change']) && $_GET['change'] ? trim($_GET['change']) : '';

    if(isset($_SESSION['password']) && $_SESSION['password'] == $password){
        $query = mysqli_query($conn,"UPDATE user SET name = '{$newname}' WHERE username = '{$_SESSION['username']}'");
        echo "Your name has been changed!";
    } else {
        echo "Your password is incorrect!. <a href='javascript: history.go(-1)'>Go Back</a>";
        exit;
    }

}
if(isset($_POST['passwordchange'])){
    if(isset($_POST['newpassword'])){
        $newpassword = addslashes($_POST['newpassword']);
    }
    if(isset($_POST['password'])){
        $password = addslashes($_POST['password']);
        $password = md5($password);
    }
    if(isset($_POST['renewpassword'])){
        $renewpassword = addslashes($_POST['renewpassword']);
    }

    if($renewpassword = $newpassword){
        $uppercase    = preg_match('@[A-Z]@', $newpassword);
        $lowercase    = preg_match('@[a-z]@', $newpassword);
        $number       = preg_match('@[0-9]@', $newpassword);
        $specialChars = preg_match('@[^\w]@', $newpassword);

        if(isset($_SESSION['password']) && $_SESSION['password'] == $password) {
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpassword) < 8){
                echo "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<a href='javascript: history.go(-1)'>Go Back</a>";
                exit;
            } else {
                if ($newpassword == $password) {
                    echo "Please change password different from old password! <a href='javascript: history.go(-1)'>Go Back</a>";
                    exit;
                } else {
                    $newpassword = md5($newpassword);
                    $query = mysqli_query($conn,"UPDATE `user` SET `password` = '{$newpassword}' WHERE `username`='{$_SESSION['username']}'");
                    echo "Your password has been changed!";
                    $_SESSION['password'] = $newpassword;
                }
            }
        } else {
            echo "Your password is incorrect!. <a href='javascript: history.go(-1)'>Go Back</a>";
            exit;
        }
    } else {
        echo "Your password is not match!. <a href='javascript: history.go(-1)'>Go Back</a>";
        exit;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proparty-grid</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./assets/icon/css/all.min.css">
    <link rel="stylesheet" href="./assets/icon/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<div class="wrapper">
    <div class="navbar-area">
        <div class="navbar-bot">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="./assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li>
                                <a href="./index.php">Home</a>
                            </li>
                            <li>
                                <a href="./about.php">About</a>
                            </li>
                            <li>
                                <a href="./proparty_grid.php">Properties</a>
                            </li>
                            <li>
                                <a href="./add_page.php">Pages</a>
                            </li>
                            <li>
                                <a href="./blog.php">Blog</a>
                            </li>
                            <li>
                                <a href="./contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="btn btn-base">
                            <span class="btn-text">
                                SUBMIT
                                <i class="fa-solid fa-plus"></i>
                            </span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <div class="setting-content">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 login-box">
                    <form action="setting.php?do=changename" method="post" class="col-md-12">
                        <h3>Change your Name</h3>
                        <div class="form-group">
                            <label for="newname">Enter your new name</label>
                            <input type="text" name="newname" id="name" class="form-control text-dark">
                            <label for="password">Enter your password</label>
                            <input type="password" name="password" class="form-control ">
                            <input type="submit" name="namechange" class="btn btn-success float-end mt-2" value="Save">
                        </div>
                    </form>
                    <form action="setting.php?do=changepassword" method="post" class="col-md-12 change-password mt-5">
                        <h3>Change your Password</h3>
                        <div class="form-group">
                            <label for="password">Enter your password</label>
                            <input type="password" name="password" class="form-control">
                            <label for="newpassword">Enter your new password</label>
                            <input type="password" name="newpassword" class="form-control">
                            <label for="renewpassword">Re-enter your new password</label>
                            <input type="password" name="renewpassword" class="form-control">
                            <input type="submit" name="passwordchange" class="btn btn-success float-end mt-2" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area mt-5">
        <div class="footer-top-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a href="./index.php">
                            <img src="./assets/img/logo.png" alt="">
                        </a>

                    </div>
                    <div class="col-md-8">
                        <ul class="icon-footer">
                            <li>
                                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>

                            </li>
                            <li>
                                <a href="https://twitter.com/home"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.skype.com/en/"><i class="fa-brands fa-skype"></i></a>
                            </li>
                            <li>
                                <a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest-p"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-mid-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="footer-title">
                            <h4>Contact Us</h4>
                        </div>
                        <div class="footer-details-contact">
                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                420 Love Sreet 133/2 Mirpur City, Dhaka
                            </p>
                            <p>
                                <i class="fa-solid fa-phone-volume"></i>
                                +(066) 19 5017 800 628
                            </p>
                            <p>
                                <i class="fa-solid fa-envelope"></i>
                                info.contact@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 p-0">
                        <h4>Quick link</h4>
                        <div class="quick-link">
                            <ul>
                                <li><a href="./about.php">About Us</a></li>
                                <li><a href="./proparty_details.php">Property</a></li>
                                <li><a href="./add_page.php">Add Property</a> </li>
                                <li><a href="./contact.php">Contact Us</a> </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-2 col-6">
                        <h4>Categories</h4>
                        <div class="quick-link">
                            <ul>
                                <li><a href="https://idesign.vn/graphic-design/design-art-s-khac-bi-t-8740.php">Arts & Design</a> </li>
                                <li><a href="https://www.facebook.com/hashtag/Business/">Business</a> </li>
                                <li><a href="https://www.facebook.com/hashtag/ComputerScience/">Computer Science</a> </li>
                                <li><a href="https://www.facebook.com/hashtag/DataScience/">Data Science</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="newslatter">
                            <h4>Newslatter</h4>
                            <div class="details">
                                <p>Lorem ipsum dolor sit amet</p>
                                <div class="subscrise">
                                    <input type="text" placeholder="Your Mail">
                                    <a href="">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bot">
            <div class="container">
                <div class="row">
                    <div class="col-7 p-0">
                        <p>©2022, Copy Right By Solverwp. All Rights Reserved</p>
                    </div>
                    <div class="col-5 p-0 ">
                        <ul>
                            <li>
                                <a href="./index.php">Home</a>
                            </li>
                            <li>
                                <a href="./about.php">About</a>
                            </li>
                            <li>
                                <a href="./blog.php">Blog</a>
                            </li>
                            <li>
                                <a href="./contact.php"> Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
