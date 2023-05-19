<?php
session_start();
if (isset($_SESSION['username']) == false) {
// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
    header('Location: http://dangmanhhung.vn/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Page</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./assets/icon/css/all.min.css">
    <link rel="stylesheet" href="./assets/icon/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

</head>

<body>
<div class="wrapper">
    <div class="navbar-property-list">
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
    </div>
    <div class="banner-newfeed">
        <div class="banner-contact" style="background: #000">
            <div class="container">
                <div class="banner-inner">
                    <div class="section-tittle text-center">
                        <h2 class="page-tittle">Add Blog</h2>
                        <ul class="page-list">
                            <a href="./index.php">
                                <li>Home ></li>
                            </a>
                            <li>Add Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="add-area-property ">
        <div class="container bg-light p-0">
            <div class="add-property d-flex">
                <button class="add-property-button" data-tab="#propertytype">Add Blog</button>
            </div>
            <div class="list-property p-5 border">
                <form action="addblog.php" method="post">
                    <div id="propertytype" class="add-area active">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Tittle</div>
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Date</div>
                                    <input type="text" class="form-control" name="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Description</div>
                                    <textarea class="form-control" id="floatingTextarea" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Quote</div>
                                    <textarea class="form-control" id="floatingTextarea" name="quote"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Tittle Bot</div>
                                    <textarea class="form-control" id="floatingTextarea" name="titlebot"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Description Bot</div>
                                    <textarea class="form-control" id="floatingTextarea" name="descriptionbot"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-label">Image</div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea" name="image"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-label">Album</div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea" name="album"></textarea>
                                </div>
                            </div>
                        </div>
                        <button name="save" class="btnsave mt-2 border-0 px-2 py-1 rounded-2">
                            Save
                        </button>
                    </div>
                </form>
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
                    <div class="col-lg-2 col-6">
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
<button id="myBtn"><i class="fa-solid fa-chevron-up"></i></button>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
<script>
    function setActiveTab(tab_id) {
        $('.add-property-button').removeClass('active');
        $("button[data-tab='" + tab_id +"']").addClass('active');

        $('.add-area').removeClass('active');
        $(tab_id).addClass('active');
    };
    jQuery(document).ready(function($)
    {
        $('.add-property-button').click( function() {
            var tab = $(this).data('tab');
            setActiveTab(tab);
        });
    });
</script>
<script>
    window.onscroll = function () { scrollFunction() };
    function scrollFunction() {

        if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    document.getElementById('myBtn').addEventListener("click", function () {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>

</body>

</html>