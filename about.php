<?php
$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");
$sqlQuery = "SELECT * FROM agent";
$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
$dataAgent = $stmt -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About-us</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./assets/icon/css/all.min.css">
    <link rel="stylesheet" href="./assets/icon/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="./assets/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="./assets/slick-1.8.1/slick/slick-theme.css">
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
        <div class="banner-contact" style="background: #000">
            <div class="container">
                <div class="banner-inner">
                    <div class="section-tittle text-center">
                        <h2 class="page-tittle">About us</h2>
                        <ul class="page-list">
                            <a href="./index.php">
                                <li>Home ></li>
                            </a>
                            <li>About-us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-area ">
            <div class="container">
                <div class="about-inner">
                     <div class="about-inner-left">
                            <div class="details">
                                <div class="section-title">
                                    <h6>We are offring the best real estate</h6>
                                    <h2>The exparts in local.</h2>
                                    <b>
                                        Lorem ipsum dolor consectetur aLorem ipsum amet, consectetur
                                    </b>
                                    <p>
                                        Lorem ipsum dolor consectetur aLorem ipsum amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                    <div class="row">
                                        <div class="col-6 mb-4">
                                            <ul class="list-inner">
                                                <li>Tempor incididunt Amet</li>
                                                <li>Exercitation ullamco </li>
                                                <li>Dolore magna aliqua quis nisi</li>
                                            </ul>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <ul class="list-inner">
                                                <li>Tempor incididunt Amet</li>
                                                <li>Exercitation ullamco </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-inner-bottom">
                                    <div class="col-6">
                                        <div class="over-75">
                                            <h7>We Have Over</h7>
                                            <h1>75</h1>
                                            <h6>YEARS</h6>
                                            <h5>EXPARTED</h5>
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                </div>
                            </div>
                        </div>
                        <div class="about-inner-right">
                            <div class="img-about">
                                <img src="./assets/img/agent-area/agent-area-img-1.png" alt="hjkhdaskdjh">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="statistical-area pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-3 ">
                        <div class="statistical-inner mt-5">
                            <h2>2981</h2>
                            <p>Creative Works</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="statistical-inner mt-5">
                            <h2>414</h2>
                            <p>Growing Team</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="statistical-inner mt-5">
                            <h2>678</h2>
                            <p>Client Works</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="statistical-inner mt-5">
                            <h2>541</h2>
                            <p>Project Done</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-area-about">
            <div class="service-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-12 mt-3">
                            <div class="single-service-warp"
                                style="background-image: url(./assets/img/about-img/about-img-1.png);">
                                <div class="thumbnail-about text-center ">
                                    <img src="./assets/img/png4.png" alt="...">
                                </div>
                                <div class="single-service-details text-center mt-0">
                                    <h4>Family House</h4>
                                    <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eius eiusmod tempor
                                        incididunt ut labore.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mt-3">
                            <div class="single-service-warp"
                                style="background-image: url(./assets/img/about-img/about-img-2.png);">
                                <div class="thumbnail-about text-center ">
                                    <img src="./assets/img/png4.png" alt="...">
                                </div>
                                <div class="single-service-details text-center mt-0">
                                    <h4>Family House</h4>
                                    <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eius eiusmod tempor
                                        incididunt ut labore.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mt-3">
                            <div class="single-service-warp"
                                style="background-image: url(./assets/img/about-img/about-img-3.png);">
                                <div class="thumbnail-about text-center ">
                                    <img src="./assets/img/png4.png" alt="...">
                                </div>
                                <div class="single-service-details text-center mt-0">
                                    <h4>Family House</h4>
                                    <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eius eiusmod tempor
                                        incididunt ut labore.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-agent-area">
            <div class="agent-area">
                <div class="container">
                    <div class="section-title text-center">
                        <h6>Meet Our Agent</h6>
                        <h2>Our Best Agent</h2>
                    </div>
                    <div class="row">
                        <?php foreach ($dataAgent as $smtm =>$item):?>
                        <div class="col-lg-3 col-6  mt-3">
                            <div class="single-agent">
                                <div class="thumb-about p-3">
                                    <img src="<?= $item['image']?>" alt="">
                                   </div>
                                <div class="details pt-4 pb-4">
                                    <h4><?= $item['name']?></h4>
                                    <h6><?= $item['position']?></h6>
                                    <ul class="social-area ">
                                        <li class="rounded-circle social-area-item social-area-item">
                                          <a class="social-area-item-link" href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li class="rounded-circle social-area-item social-area-item" >
                                          <a class="social-area-item-link" href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                                        </li>
                                        <li class="rounded-circle social-area-item social-area-item">
                                          <a class="social-area-item-link" href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li class="rounded-circle social-area-item social-area-item">
                                          <a class="social-area-item-link" href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                      </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="testomonial-area mt-5">
            <div class="reviews-area">
                <div class="bg-overlay-wrap p-5">
                    <div class="container">
                        <div class="section-title text-center">
                            <h6>Our Testomonial </h6>
                            <h2>What Client Say</h2>
                            <p>Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ips</p>
                        </div>
                        <div class="first-slider text-center">
                            <div class="slider-1">
                                <div class="testomonial-area-img"
                                    style="background-image: url('./assets/img/testomonial-area-img/img1.png');">
                                </div>
                                <div class="details-thumb">
                                    <p>“consecte Lorem ipsum dolor sit amet, Lorem ipsum dolor amet, consecte Lorem
                                        ipsum dolor sit adipisicing amet, consectetur sed do eiusmod tempor
                                        incididunt dolore magna consecrem adipisicing ipsum dolor sit amet,
                                        consectetur elit,’’ </p>
                                    <h6>Sarif Jaya Miprut</h6>
                                    <span>Profile Manager</span>
                                </div>
                            </div>
                            <div class="slider-1">
                                <div class="testomonial-area-img"
                                    style="background-image: url('./assets/img/testomonial-area-img/img1.png');">
                                </div>
                                <div class="details-thumb">
                                    <p>“consecte Lorem ipsum dolor sit amet, Lorem ipsum dolor amet, consecte Lorem
                                        ipsum dolor sit adipisicing amet, consectetur sed do eiusmod tempor
                                        incididunt dolore magna consecrem adipisicing ipsum dolor sit amet,
                                        consectetur elit,’’ </p>
                                    <h6>Sarif Jaya Miprut</h6>
                                    <span>Profile Manager</span>
                                </div>
                            </div>
                            <div class="slider-1">
                                <div class="testomonial-area-img"
                                    style="background-image: url('./assets/img/testomonial-area-img/img1.png');">
                                </div>
                                <div class="details-thumb">
                                    <p>“consecte Lorem ipsum dolor sit amet, Lorem ipsum dolor amet, consecte Lorem
                                        ipsum dolor sit adipisicing amet, consectetur sed do eiusmod tempor
                                        incididunt dolore magna consecrem adipisicing ipsum dolor sit amet,
                                        consectetur elit,’’ </p>
                                    <h6>Sarif Jaya Miprut</h6>
                                    <span>Profile Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-about-area mt-5 mb-5">
            <div class="container">
                <div class="section-title text-center mt-5">
                    <h6>More About Us</h6>
                    <h2>More Info</h2>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-5">
                        <div class="single-propartes ">
                            <div class="propartes-img-about">
                                <img src="./assets/img/more-about/more-about-img1.jpg" alt="">
                            </div>
                            <div class="propartes-wrap-details">
                                <h4>
                                    <a href="">New York Office</a>
                                </h4>
                                <p>
                                    New York ipsum dolor consectetur adipisicing elit, sed do eius Lorem ipsum dolo amet, consectetur eiusmod. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="single-propartes ">
                            <div class="propartes-img-about">
                                <img src="./assets/img/more-about/more-about-img2.jpg" alt="">
                            </div>
                            <div class="propartes-wrap-details">
                                <h4>
                                    <a href="">Booston Office</a>
                                </h4>
                                <p>
                                    New York ipsum dolor consectetur adipisicing elit, sed do eius Lorem ipsum dolo amet, consectetur eiusmod. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="single-propartes ">
                            <div class="propartes-img-about">
                                <img src="./assets/img/more-about/more-about-img3.jpg" alt="">
                            </div>
                            <div class="propartes-wrap-details">
                                <h4>
                                    <a href="">Canada Office</a>
                                </h4>
                                <p>
                                    New York ipsum dolor consectetur adipisicing elit, sed do eius Lorem ipsum dolo amet, consectetur eiusmod. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="read-more">
            <a class="btn btn-base">Read more
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            
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
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="./assets/slick-1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.first-slider').slick({
                infinite: true,
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrow: true,
                // prevArrow: '<div class="prev-slider"><i class="fa-solid fa-circle-chevron-left"></i></div>',
                // nextArrow: '<div class="next-slider"><i class="fa-solid fa-circle-chevron-right"></i></div>',
                prevArrow: `<button type='button' class='slick-prev slick-arrow'><ion-icon name="arrow-back-outline"></ion-icon></button>`,
                nextArrow: `<button type='button' class='slick-next slick-arrow'><ion-icon name="arrow-forward-outline"></ion-icon></button>`,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                ]
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