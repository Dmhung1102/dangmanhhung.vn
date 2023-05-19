<?php
session_start();
$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");
$id = $_GET['id'];
$sqlQuery = "SELECT * FROM blog WHERE $id";
$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
$blog = $stmt -> fetch();
$album = json_decode($blog['album']);


$sqlQueryPopularBlog = "SELECT * FROM blog ORDER BY id ASC LIMIT 3";
$stmtPopularBlog = $connect->prepare($sqlQueryPopularBlog);
$stmtPopularBlog ->execute();
$dataPopularBlog = $stmtPopularBlog->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Feed</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./assets/icon/css/all.min.css">
    <link rel="stylesheet" href="./assets/icon/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="./assets/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="./assets/slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="./assets/owl/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/owl/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
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
                                    <?php
                                    // Hiển thị thông tin lưu trong Session
                                    // phải kiểm tra có tồn tại không trước khi hiển thị nó ra
                                    if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
                                        echo " <a href=add_page.php>Pages</a>";
                                    }
                                    else {
                                        echo "<a href=login.php>Pages</a>";
                                    }
                                    ?>
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
        <div class="banner-newfeed">
            <div class="banner-contact" style="background: #000">
                <div class="container">
                    <div class="banner-inner">
                        <div class="section-tittle text-center">
                            <h2 class="page-tittle">News Feed</h2>
                            <ul class="page-list">
                                <li>Home ></li>
                                <li>Single blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="newfeed-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="details">
                            <div class="business">
                                <a href="#">Business</a>
                            </div>
                            <h3><?= $blog['title']?></h3>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-calendar-days mx-1"></i> <?=  $blog['date']?>
                                </li>
                                <li>
                                    <i class="fa-solid fa-eye"></i> 4263
                                </li>
                                <li>
                                    <i class="fa-solid fa-message"></i> 68
                                </li>
                            </ul>
                        </div>
                        <div class="first-slider text-center">
                            <?php
                                foreach ($album as $albumkey => $blogimg):
                            ?>
                            <div class="slider-1">
                                <div class="img-slider">
                                    <img src="<?= $blogimg?>" alt="">
                                </div>
                            </div>
                            <?php endforeach;?>
                          </div>
                        <div class="cmt">
                            <p class="text-dark"><?=$blog['description']?></p>
                        </div>
                        <div class="audio">
                            <audio controls style="width: 100%;">
                                <source src="./assets/audio/nhacchuong.net_lily-remix-lea-x-kdag-dx-msx.mp3">
                            </audio>
                        </div>
                        <div class="details-bottom">
                            <h4>User Experience </h4>
                            <div class="details-bottom-header p-2 ">
                                <i class="fa-solid fa-quote-left"></i>
                                <h5 class="fs-6">
                                   <?= $blog['quote'] ?>
                                </h5>
                                <hr>
                                <p class="text-dark"><? $blog['username']?></p>
                            </div>
                            <p></p>
                            <p></p>
                        </div>
                        <div class="cmt">
                            <p class="text-dark p-0"><?=$blog['descriptionbot']?></p>
                        </div>
                        <div class="society-area px-3">
                            <div class="row">
                                <div class="col-6 p-0">
                                    <div class="society-left">
                                        <ul class="m-0">
                                            <li><a href="https://www.instagram.com/explore/tags/treands/?hl=en">Treands</a></li>
                                            <li><a href="https://www.instagram.com/explore/tags/inttero/?hl=en">Inttero</a></li>
                                            <li><a href="https://www.instagram.com/explore/tags/estario/?hl=en">Estario</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6 p-0">
                                    <div class="society-right">
                                        <ul class="p-0">
                                            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                        </ul>
                                        <ul>
                                            <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                                        </ul>
                                        <ul>
                                            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                        </ul>
                                        <ul>
                                           <a href="https://www.skype.com/"> <i class="fa-brands fa-skype"></i></a>
                                        </ul>
                                        <ul>
                                            <a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest-p"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <div class="container">
<!--                                <h3> --><?php
//                                    $soluong = count($dataMessage) ;
//                                    echo  $soluong. '  Message';
//                                    ?>
<!--                                </h3>-->
<!--                                <div class="comment-inner">-->
<!--                                    <div class="col-1">-->
<!--                                        <div class="thumbnail"><img src="./assets/img/newfeed-img/reply-img.png" alt="">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-11">-->
<!--                                        <div class="reply">-->
<!--                                            <h6>--><?php //= $dataMessage['name']?><!--</h6>-->
<!--                                            <p class="text-dark">--><?php //= $dataMessage['date']?><!-- </p>-->
<!--                                            <p class="text-dark">--><?php //= $dataMessage['message']?><!--</p>-->
<!--                                            <a href="#">reply</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="leave-reply mt-5">
                            <div class="container">
                                <div class="comment">
                                    <h3>Leave a Reply</h3>
                                </div>
                                <p class="text-dark">Your Email addres not be published adipisicing elit, sed*</p>
                                <div class="form-input">
                                    <div class="row align-items-start">
                                        <form action="addmessage.php" method="post">
                                            <div class="col-sm-4 mt-2 d-inline-flex ">
                                                <input type="text" class="form-control text-dark" placeholder="Name"
                                                       name="name">
                                            </div>
                                            <div class="col-sm-4 mt-2 d-inline-flex ">
                                                <input type="text" class="form-control text-dark"
                                                       placeholder="Phonenumber" name="phonenumber">
                                            </div>
                                            <div class="col-sm-3 mt-2 d-inline-flex ">
                                                <input type="text" class="form-control text-dark"
                                                       placeholder="Date" name="date">
                                            </div>
                                            <div class="col-sm-8 mt-2 d-inline-flex  ">
                                                <input type="text" class="form-control text-dark" placeholder="Email"
                                                       name="email">
                                            </div>
                                            <div class="massage-reply">
                                                <div class="col-12">
                                                    <textarea class="form-control" name="message"
                                                              placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="submit-btn-reply">
                                                <div class="col-12">
                                                    <button class="btn-submit btn-base border-0 rounded-2 " name="savemes">
                                                        Submit now
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 px-4">
                        <div class="newfeed-area p-0">
                            <div class="search-form mb-5 mt-md-0 mt-5">
                                <div class="row">
                                    <div class="form-group position-relative">
                                        <input type="text" class="form-control" placeholder="Search your keyword">
                                        <button class="submit-icon">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="in4-popular p-3 mt-3 p-4">
                                <div class="comment">
                                    <div class="in4-me">
                                        <h3>About Me</h3>
                                        <div class="thumbnail"><img src="./assets/img/agent-area/agent-area-img-1.png" alt="">
                                        </div>
                                        <div class="details lh-sm">
                                            <h4>Sandra micon</h4>
                                            <p class="text-dark">
                                                Lorem ipsum dolor amet, Lore ipsum dolor sit amet, consectetur, Lorem ipsum
                                                dolor amet, Lore ipsum dolor sit amet, consectetur
                                            </p>
                                        </div>
                                        <div class="society">
                                            <ul>
                                                <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a> </i></li>
                                                <li><a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a> </li>
                                                <li><a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a></li>
                                                <li><a href="https://www.skype.com/"><i class="fa-brands fa-skype"></i></a></li>
                                                <li><a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-feed p-3 mt-3 p-4">
                                <div class="comment">
                                    <h3>Popular Feeds</h3>
                                </div>
                                <?php foreach ($dataPopularBlog as $popularkey => $popularfeed):?>
                                    <div class="popular-feed-inner">
                                    <div class="thumbnail">
                                        <img src="<?= $popularfeed['image']?>" alt="">
                                    </div>
                                    <div class="details mt-2">
                                        <h5 class="fs-6"><?= $popularfeed['title']?></h5>
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <p class="text-dark"><?= $popularfeed['date']?></p>
    
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div class="price-area mt-5 p-4">
                                <div class="comment">
                                    <h3>Categories</h3>
                                </div>
                                <div class="categories-in4 justify-content-between">
                                    <div class="categories-left">
                                        <ul>
                                            <li>Popular</li>
                                            <li>Villa House</li>
                                            <li>Indastrial</li>
                                            <li>Global World</li>
                                            <li>Residantial</li>
                                        </ul>
                                    </div>
                                    <div class="categories-right">
                                        <ul>
                                            <li>(26)</li>
                                            <li>(21)</li>
                                            <li>(8)</li>
                                            <li>(13)</li>
                                            <li>(36)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="newfeed-subcrive pt-3">
                                <div class="comment">
                                    <h3>Subscribe </h3>
                                </div>
                                <p>Don't Miss Latest News</p>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter mail">
                                </div>
                                <div class="submit-btn-reply">
                                    <div class="col-12">
                                        <button class="btn-submit btn-base">
                                            Subscribe 
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="instagram-feed p-3 mt-3">
                                <div class="comment">
                                    <h3>Instagram Feeds</h3>
                                </div>
                                <div class="thumb-ins">
                                    <div class="row justify-content-center">
                                        <div class="thumb"><img src="./assets/img/ins-img/ins-1.jfif" alt="">
                                        </div>
                                        <div class="thumb"><img src="./assets/img/ins-img/ing-2.jfif" alt="">
                                        </div>
                                        <div class="thumb"><img src="./assets/img/ins-img/ins-1.jfif" alt="">
                                        </div>
                                        <div class="thumb"><img src="./assets/img/ins-img/ing-2.jfif" alt="">
                                        </div>
                                        <div class="thumb"><img src="./assets/img/ins-img/ins-1.jfif" alt="">
                                        </div>
                                        <div class="thumb"><img src="./assets/img/ins-img/ing-2.jfif" alt="">
                                        </div>
                                        <div class="thumb"><img src="./assets/img/ins-img/ins-1.jfif" alt="">
                                        </div>
                                        <div class="thumb"><img src="./assets/img/ins-img/ing-2.jfif" alt="">
                                        </div>
                                        <div class="thumb"><img src="./assets/img/ins-img/ins-1.jfif" alt="">
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            <div class="add-banner">
                                <div class="thumb-add-banner">
                                    <img src="./assets/img/ins-img/ins-4.webp" alt="">
                                </div>
                            </div>
                            <div class="popular-tag p-3">
                                <div class="comment">
                                    <h3>Popular Tag</h3>
                                </div>
                                <div class="container">
                                    <div class="popular-tag-inner">
                                        <a href="https://www.instagram.com/explore/tags/popular/">Popular</a>
                                        <a href="https://www.instagram.com/explore/tags/art/">Art</a>
                                        <a href="https://www.instagram.com/explore/tags/business/">Business</a>
                                        <a href="https://www.instagram.com/explore/tags/design/">Design</a>
                                        <a href="https://www.instagram.com/explore/tags/Devolper/">Devolper</a>
                                        <a href="https://www.instagram.com/explore/tags/Creater/">Creater</a>
                                        <a href="https://www.instagram.com/explore/tags/Popular/">Popular</a>
                                        <a href="https://www.instagram.com/explore/tags/Popular/">Popular</a>
                                        <a href="https://www.instagram.com/explore/tags/>Art/">Art</a>
                                    </div>
                                </div>
                            </div>
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
                            <div class="col-lg-4 col-6 text-light">
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
                            <div class="col-lg-4 col-6">
                                <div class="newslatter">
                                    <h4>Newslatter</h4>
                                    <div class="details">
                                        <p>Lorem ipsum dolor sit amet</p>
                                        <div class="subscrise">
                                            <input type="text" placeholder="Your Mail">
                                            <a href="">Subscribe </a>
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
                            <div class="col-7 p-0 text-light">
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
            dots: true,
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