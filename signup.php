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
    <link rel="stylesheet" href="./assets/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="./assets/slick-1.8.1/slick/slick-theme.css">
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
    <div class="login-content">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 login-box">
                    <form action="xuly.php" method="post" class="col-md-12 row">
                        <h3>Sign up</h3>
                        <div class="form-group col-12">
                            <label for="username" class="form-text">Username:</label><br>
                            <input type="text" name="txtUsername" id="username" class="form-control text-dark">
                        </div>
                        <div class="form-group col-12">
                            <label for="name" class="form-text">Name:</label><br>
                            <input type="text" name="txtName" id="name" class="form-control text-dark">
                        </div>
                        <div class="form-group col-12">
                            <label for="phonenumber" class="form-text">Phone number:</label><br>
                            <input type="text" name="txtPhonenumber" id="phonenumber" class="form-control text-dark">
                        </div>
                        <div class="form-group col-12">
                            <label for="email" class="form-text">Email:</label><br>
                            <input type="text" name="txtEmail" id="email" class="form-control text-dark">
                        </div>
                        <div class="form-group col-12">
                            <label for="password" class="form-text">Password:</label><br>
                            <input type="password" name="txtPassword" id="password" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label for="confirmpassword" class="form-text">Confirm Password:</label><br>
                            <input type="password" name="txtConfirmPassword" id="confirmpassword" class="form-control">
                        </div>
<!--                        <div class="form-group col-12">-->
<!--                            <label for="image" class="form-text">Avatar</label><br>-->
<!--                            <input type="text" name="txtImage" id="image" class="form-control">-->
<!--                        </div>-->
                        <div class="form-group col-12">
                            <label for="read-terms" class="checkbox-btn">
                                <span>I have read and agree to the terms</span>
                                <span><input id="read-terms" name="read-terms" type="checkbox"></span>
                            </label><br>
                            <input type="submit" name="register" class="btn btn-success btn-md login-btn" value="Register">
                        </div>

                        <div id="login-link" class="d-flex justify-content-center">
                            <p class="text-dark">You have account?</p>&nbsp;
                            <a href="./login.php" class="">Login here</a>
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