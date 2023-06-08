<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./assets/icon/css/all.min.css">
    <link rel="stylesheet" href="./assets/icon/css/fontawesome.min.css">
    <link rel="stylesheet" href="./assets/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="./assets/slick-1.8.1/slick/slick-theme.css">
</head>

<body>
    <div class="wrapper-contact">
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
                                        <?php
                                        if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
                                            echo " <a href=add_page.php>Pages</a>";
                                        }
                                        else {
                                            echo "<a href=./login.php>Pages</a>";
                                        }
                                        ?>
                                    </li>
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
        <div class="banner-contact" style="background: url(./assets/img/bg/bg-1.jpg);">
            <div class="container">
                <div class="banner-inner">
                    <div class="section-tittle text-center">
                        <h2 class="page-tittle">Contact</h2>
                        <ul class="page-list">
                            <a href="./index.php">
                                <li>Home ></li>
                            </a>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mt-5 mb-5">
                        <div class="contact-details">
                            <h4>Adipisicing elit se tempor labore .</h4>
                            <p>Lorem ipsum dolor consectetur aLorem ipsum consectetur adipisicing elit, eiusmod tempor incididunt labore et dolore magna aliqua.minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            <div class="row">
                                <div class="col-6">
                                    <div class="contact-list">
                                        <h5>India Office</h5>
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                                420 Love Sreet 133/2 Mirpur Nevis, Caribbean Dhaka
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                                +(066) 19 5017 800 628
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                                +(066) 19 5017 800 628
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="contact-list">
                                        <h5>India Office</h5>
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                                +(066) 19 5017 800 628
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                                +(066) 19 5017 800 628
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                                +(066) 19 5017 800 628
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="contact-date">
                                        <p>
                                            <strong>Monday-Friday:</strong>
                                            9am - 8pm
                                        </p>
                                        <p>
                                            <strong>Saturday:</strong>
                                            10 am to 3 pm
                                        </p>
                                        <p>
                                            <strong>Sunday: </strong>
                                            Clossed
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="contact-social">
                                        <ul class="social-icon">
                                            <li>
                                                <a href="https://www.facebook.com/"> <i class="fa-brands fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.skype.com/"><i class="fa-brands fa-skype"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest-p"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mb-5 mt-5">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-inner">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>General Information</option>
                                            <option value="1">General Information</option>
                                            <option value="2">General Information</option>
                                            <option value="3">General Information</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-inner">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Subject" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-inner">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Name" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-inner">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Email" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-inner">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Phone" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-inner">
                                        <div class="input-group-mes">
                                            <input type="text" class="form-control" placeholder="Message" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn-submit btn-base p-2">
                                        Submit now
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="contact-page"></div>
        </div>
        <div class="map-area">
            <div class="col-12" style="background-image: url(./assets/img/style2/map3.jpg);">
                <i class="fa-solid fa-location-dot"></i>
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
    <script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
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