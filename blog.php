<?php
session_start();
$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");
$sqlQueryBlogid = "SELECT b.userexperience as userexperience ,b.image as image, b.album as album, b.description as description, b.title as title, b.titlebot as titlebot, b.descriptionbot as descriptionbot ,b.id as id, u.name as username FROM user as u JOIN blog as b ON u.id = b.userid  ORDER BY b.id ";
$stmt2 = $connect->prepare($sqlQueryBlogid);
$stmt2 ->execute();
$dataBlogid = $stmt2->fetchAll();

$sqlQueryPopular = "SELECT * FROM blog ORDER BY id ASC LIMIT 3";
$stmtPopular = $connect->prepare($sqlQueryPopular);
$stmtPopular ->execute();
$dataPopular = $stmtPopular->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
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
        </div>
        <div class="banner-newfeed mb-5">
            <div class="banner-contact" style="background: #000">
                <div class="container">
                    <div class="banner-inner">
                        <div class="section-tittle text-center">
                            <h2 class="page-tittle">New Feed</h2>
                            <ul class="page-list">
                                <a href="./index.php">
                                    <li>Home ></li>
                                </a>
                                <li>Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="blog-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5">
                        <?php foreach ($dataBlogid as $blogkey => $blog): ?>
                        <div class="details-blog-inner bg-white">
                            <div class="img-header">
                                <a href="./single_blog.php?id=<?=$blog['id']?> ">
                                    <img src="<?=$blog['image'] ?>" alt="">
                                </a>

                            </div>
                            <div class="details-blog mt-4 px-4">
                                <div class="business">
                                    <a href="#">Business</a>
                                </div>
                                <h3><?=$blog['title'] ?>
                                </h3>
                                <ul  class="icon-business p-0">
                                    <li>
                                        <i class="fa-solid fa-calendar-days"></i> <?php  $date = mktime((0), 0, 0, 04, (6 - 1), 2023); echo date('d/m/Y', $date)?>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-eye"></i> <?php echo mt_rand(1, 100) ?>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-message"></i> <?php echo mt_rand(1, 100) ?>
                                    </li>
                                </ul>
                                <p><?= $blog['description'] ?></p>
                                <div class="blog-inner-bot">
                                    <p>By <?=$blog['username'] ?></p>
                                    <a href="./single_blog.php?id= <?= $blog['id']?>">
                                        Read more
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                    
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="comma-banner mt-5" style="background-image: url(./assets/img/comma-area/comma-img.png);">
                            <i class="fa-solid fa-quote-right"></i>
                            <p>"Lorem ipsum dolor sit amet, consectetur et adipisicing  eiLore Lorem ipsum dolor sit amet, ipsum dolor sit ametipsum dolor sit amet"</p>
                            <ul class="icon-business  justify-content-center text-light">
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i> Marce 9 , 2020
                                </li>
                                <li>
                                    <i class="fa-solid fa-eye"></i> 4263
                                </li>
                                <li>
                                    <i class="fa-solid fa-message"></i> 68
                                </li>
                            </ul>
                        </div>
                        <div class=" bg-white p-4">
                            <div class="business">
                                <a href="#">Business</a>
                            </div>
                            <h3>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet sed do eiusmod tempor incididunt.
                            </h3>
                            <ul class="icon-business p-0">
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i> Marce 9 , 2020
                                </li>
                                <li>
                                    <i class="fa-solid fa-eye"></i> 4263
                                </li>
                                <li>
                                    <i class="fa-solid fa-message"></i> 68
                                </li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur et adipisicing eiLorem ipsum dolor
                                sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, consectetur adipisicing elit, consectetur et adipisicing eiLorem ipsum
                                dolor sit amet</p>
                            <div class="blog-inner-bot">
                                <img src="./assets/img/author1.png" alt="">
                                <p>By Admin</p>
                
                                <a href="./single_blog.php">
                                    Read more
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                
                            </div>
                        </div>
                        <div class="proparty-list-area mt-3">
                            <div class="w3-center">
                                <div class="section">
                                    <button class="rounded-circle " onclick="plusDivs(-1)">❮❮ </button>
                                </div>
                                <button class="rounded-circle" onclick="currentDiv(1)">1</button>
                                <button class="rounded-circle" onclick="currentDiv(2)">2</button>
                                <button class="rounded-circle" onclick="currentDiv(3)">3</button>
                                <button class="rounded-circle" onclick="currentDiv(3)">...</button>
                                <div class="section">
                                    <button class="rounded-circle " onclick="plusDivs(1)">❯❯</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 px-4">
                        <div class="newfeed-area pt-0">
                            <div class="search-form mb-5">
                                <div class="row">
                                    <div class="form-group position-relative">
                                        <input type="text" class="form-control" placeholder="Search your keyword">
                                        <button class="submit-icon">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="in4-popular p-3 mt-3">
                                <div class="comment">
                                    <div class="in4-me">
                                        <h3>About Me</h3>
                                        <div class="thumbnail"><img src="./assets/img/agent-area/agent-area-img-1.png" alt="">
                                        </div>
                                        <div class="details">
                                            <h4>Sandara Mrikon</h4>
                                            <p>
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
                            <div class="popular-feed p-3 mt-3">
                                <div class="comment">
                                    <h3>Popular Feeds</h3>
                                </div>
                                <?php foreach ($dataPopular as $popularkey => $popularfeed):?>
                                    <div class="popular-feed-inner">
                                    <div class="thumbnail">
                                        <img src="<?= $popularfeed['image'] ?>" alt="">
                                    </div>
                                    <div class="details">
                                        <h5><?= $popularfeed['title']?></h5>
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <p><?= $popularfeed['date']?></p>
    
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               <?php endforeach; ?>
                            </div>
                            <div class="price-area mt-5">
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
                                    <div class="categories-right text-center">
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
                                    <h3>Subscrive</h3>
                                </div>
                                <p>Don't Miss Lattest News</p>
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
                                            Subscrive
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="instagram-feed p-3 mt-3">
                                <div class="comment">
                                    <h3>Instagram Feeds</h3>
                                </div>
                                <div class="thumb-ins pb-0">
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
   <!-- btn -->
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
    <!-- style w3 -->
    <style>
        .mySlides {
            display: none
        }

        .w3-left,
        .w3-right,
        .w3-badge {
            cursor: pointer
        }

        .w3-badge {
            height: 13px;
            width: 13px;
            padding: 0
        }
    </style>
   
   <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = x.length }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-white", "");
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " w3-white";
        }
    </script>
</body>
</html>