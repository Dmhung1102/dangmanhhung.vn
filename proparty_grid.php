<?php
session_start();

$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");

if(isset($_GET['search']) || isset($_GET['sort']) || isset($_GET['sortbed']) || isset($_GET['sortbath']) || isset($_GET['sortliving'])) {
    if (isset($_GET['sort'])) {
        $sort=$_GET['sort'];
        if ($sort=='area') {
            $condition = 'ORDER BY h.area DESC';
        }
        if ($sort == 'pricemin'){
            $condition = 'ORDER BY h.price + 0 ASC ';
        }
        if ($sort == 'pricemax'){
            $condition = 'ORDER BY h.price + 0 DESC';
        }
        $sqlQueryUserid = "SELECT h.livingroom as livingroom, h.status as status, h.locationdetails as locationdetails, h.length as length, h.width as width, h.location as location, h.yearbuilding as yearbuilding, h.description as description, h.title as title, h.id as id, h.purpose as purpose, h.price as price, h.bedrooms as bedrooms, h.bathrooms as bathrooms, h.area as area, a.name as name, a.purposeimg as purposeimg 
                        FROM housealbum as a JOIN house as h ON a.houseid = h.id WHERE purposeimg = 'image' $condition";
    }
    if(isset($_GET['sortbath']))
    {
        $sortbath=$_GET['sortbath'];
        $sqlQueryUserid = "SELECT * FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE purposeimg = 'image' AND bathrooms = $sortbath";
    }
    if(isset($_GET['sortbed']))
    {
        $sortbed=$_GET['sortbed'];
        $sqlQueryUserid = "SELECT * FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE purposeimg = 'image' AND bedrooms = $sortbed";
    }

    if(isset($_GET['sortliving']))
    {
        $sortliving=$_GET['sortliving'];
        $sqlQueryUserid = "SELECT * FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE purposeimg = 'image' AND livingroom = $sortliving";
    }
    if(isset($_GET['search']) && !empty($_GET['search']))
    {
        $key = $_GET['search'];
        $sqlQueryUserid = "SELECT * FROM housealbum as a JOIN house as h ON a.houseid = h.id WHERE purposeimg = 'image' AND  location LIKE '%$key%' OR purposeimg = 'image' AND description LIKE '%$key%' OR type LIKE '%$key%' OR purposeimg = 'image' AND locationdetails LIKE '%$key%' OR purposeimg = 'image' AND orienten LIKE '%$key%'";
    }
}
else {
    $sqlQueryUserid = "SELECT  h.livingroom as livingroom, h.status as status, h.locationdetails as locationdetails, h.length as length, h.width as width, h.location as location, h.yearbuilding as yearbuilding, h.description as description, h.title as title, h.id as id, h.purpose as purpose, h.price as price, h.bedrooms as bedrooms, h.bathrooms as bathrooms, h.area as area, a.name as name, a.purposeimg as purposeimg 
                        FROM housealbum as a JOIN house as h ON a.houseid = h.id WHERE purposeimg = 'image' ";
}


$stmt2 = $connect->prepare($sqlQueryUserid);
$stmt2 ->execute();
$dataUserid = $stmt2->fetchAll();


$sqlQueryNB = "SELECT COUNT(id) AS countnb FROM house WHERE location ='Ninh Binh'";
$stmtNB = $connect->prepare($sqlQueryNB);
$stmtNB ->execute();
$dataNB = $stmtNB->fetch();

$sqlQueryHB = "SELECT COUNT(id) AS counthb FROM house WHERE location ='Hoa Binh'";
$stmtHB = $connect->prepare($sqlQueryHB);
$stmtHB ->execute();
$dataHB = $stmtHB->fetch();

$sqlQueryHN = "SELECT COUNT(id) AS counthn FROM house WHERE location ='Ha Noi'";
$stmtHN = $connect->prepare($sqlQueryHN);
$stmtHN ->execute();
$dataHN = $stmtHN->fetch();

$sqlQueryRent = "SELECT COUNT(id) AS countrent FROM house WHERE purpose ='rent'";
$stmtRent = $connect->prepare($sqlQueryRent);
$stmtRent ->execute();
$dataRent = $stmtRent->fetch();

$sqlQuerySell = "SELECT COUNT(id) AS countrent FROM house WHERE purpose ='sell'";
$stmtSell = $connect->prepare($sqlQuerySell);
$stmtSell ->execute();
$dataSell = $stmtSell->fetch();

$sqlQueryPopular = "SELECT  h.id as id, h.status as status, h.location as location,  h.title as title, h.type as type, a.name as name FROM housealbum as a JOIN house as h ON a.houseid = h.id WHERE purposeimg = 'image'   LIMIT 3";
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
                    <div class="section-title text-center">
                        <h2 class="page-title">Proparty Grid</h2>
                        <ul class="page-list">
                            <a href="./index.php">
                                <li>Home ></li>
                            </a>
                            <li>Proparty Grid</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="proparty-grid-area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 px-5">
                    <div class="search-proparty">
                        <h3 class="mt-0">
                            <?php
                            $soluong = count($dataUserid) ;
                            echo  $soluong. '  Properties';
                            ?>
                        </h3>
                        <div class="search-form">
                            <div class="row">
                                <div class="form-group">
                                    <form action="" method="get">
                                        <input type="text" class="form-control text-dark" placeholder="Search your keyword" name="search" >
                                        <button class="submit-icon"
                                                value="<?php if (isset($_GET['search'])) {echo $_GET['search']; }?>">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="?sort=pricemin">Price <i class="fa-solid fa-arrow-down"></i></a></li>
                                <li><a class="dropdown-item" href="?sort=pricemax">Price <i class="fa-solid fa-arrow-up"></i></a></li>
                            </ul>
                        </div>
                        <div class="list-icon-right">
                            <i class="fa-solid fa-list"></i>
                        </div>
                    </div>
                    <div class="w3-content" style="max-width:800px">
                        <div class="mySlides">
                            <div class="row">
                                <?php foreach ($dataUserid as $grid =>$userid):?>
                                    <div class="col-xl-6 col-12 mt-5">
                                        <div class="single-propartes">
                                            <a href="./proparty_details.php?id= <?= $userid['id']?> ">
                                                <img src="photo/<?= $userid['data']?>">
                                            </a>
                                            <div class="propartes-img">
<!--                                                <div class="media pb-3 px-3">-->
<!--                                                    <div class="author justify-content-around">-->
<!--                                                        <a href="">-->
<!--                                                            <i class="fa-regular fa-user"></i>-->
<!--                                                            --><?php //= $userid['username'] ?>
<!--                                                        </a>-->
<!--                                                        <span>|</span>-->
<!--                                                        <a class="">0--><?php //= $userid['phonenumber'] ?><!--</a>-->
<!--                                                        <span>|</span>-->
<!--                                                        <a class="">--><?php //= $userid['status'] ?><!--</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                            </div>
                                            <div class="propartes-wrap-details p-xl-3 p-4">
                                                <h4>
                                                    <a href="./proparty_details.php"><?= $userid['title']?></a>
                                                </h4>
                                                <ul class="propartes-inner">
                                                    <li>
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        <?= $userid['area']?>, <?= $userid['locationdetails']?>, <?= $userid['location']?>
                                                    </li>
                                                    <li>
                                                        <a href=""><?= $userid['purpose']?></a>
                                                    </li>
                                                </ul>
                                                <p class="bg-white border-0">
                                                    <?= $userid['description']?>
                                                </p>
                                                <span>$ <?= number_format($userid['price'])?></span>
                                                <ul>
                                                    <li>Bedroom : <?= $userid['bedrooms']?></li>
                                                    <li class="px-4">Bathroom : <?= $userid['bathrooms']?></li>
                                                    <li>Livingroom: <?= $userid['livingroom']?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mySlides">
                        </div>
                    </div>
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
                <div class="col-lg-4 px-xl-5">

                    <div class="price-area">
                        <div class="comment">
                            <h3>Categories</h3>
                        </div>
                        <div class="categories-in4 justify-content-between">
                            <div class="categories-left">
                                <ul>
                                    <a href="proparty_list.php?purpose=rent">
                                        <li>Rent</li>
                                    </a>
                                    <a href="proparty_list.php?purpose=sell">
                                        <li>Sell</li>
                                    </a>
                                </ul>
                            </div>
                            <div class="categories-right text-center">
                                <ul>
                                    <li> (<?php
                                        echo  $dataRent[0] ;
                                        ?>)
                                    </li>
                                    <li>(<?php
                                        echo  $dataSell[0];
                                        ?>)
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="price-area mt-5">
                        <div class="comment">
                            <h3>Room search</h3>
                        </div>
                        <div class="categories-in4 justify-content-between">
                            <div class="dropdown-roomsearch w-100">
                                <button class="btn-roomsearch dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>Bedrooms</span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="?sortbed=1">One</a></li>
                                    <li><a class="dropdown-item" href="?sortbed=2">Two</a></li>
                                    <li><a class="dropdown-item" href="?sortbed=3">Three</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="categories-in4 justify-content-between">
                            <div class="dropdown-roomsearch w-100 py-2">
                                <button class="btn-roomsearch dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Bathroom
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="?sortbath=1">One</a></li>
                                    <li><a class="dropdown-item" href="?sortbath=2">Two</a></li>
                                    <li><a class="dropdown-item" href="?sortbath=3">Three</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="categories-in4 justify-content-between">
                            <div class="dropdown-roomsearch w-100">
                                <button class="btn-roomsearch dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Livingroom
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="?sortliving=1">One</a></li>
                                    <li><a class="dropdown-item" href="?sortliving=2">Two</a></li>
                                    <li><a class="dropdown-item" href="?sortliving=3">Three</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="price-area mt-5">
                        <div class="place-area  ">
                            <div class="newfeed-categories pt-3">
                                <div class="comment">
                                    <h3>Place</h3>
                                </div>
                                <ul class="p-0">
                                    <a href="proparty_list.php?location=Ninh Binh">
                                        <li>
                                            Ninh Binh
                                            <span><?php
                                                echo  $dataNB[0] ;
                                                ?></span>
                                        </li>
                                    </a>
                                    <a href="proparty_list.php?location=Hoa Binh">
                                        <li>
                                            Hoa Binh
                                            <span><?php
                                                echo  $dataHB[0] ;
                                                ?></span>
                                        </li>
                                    </a>
                                    <a href="proparty_list.php?location=Ha Noi">
                                        <li>
                                            Ha Noi
                                            <span><?php
                                                echo  $dataHN[0] ;
                                                ?></span>
                                        </li>
                                    </a>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="price-area mt-5">
                        <div class="newfeed-categories pt-3">
                            <div class="comment">
                                <h3>Popular Proparty</h3>
                            </div>
                            <?php foreach ($dataPopular as $housell => $popularproperty):?>
                            <div class="popular-feed-inner border-bottom mt-2">
                                <div class="thumbnail mt-2 ">
                                    <a href="proparty_details.php?id= <?= $popularproperty['id']?>">
                                        <?php
                                        echo "<img src='photo/".$popularproperty['name']."' >";
                                        ?>
                                    </a>
                                </div>
                                <div class="details mt-2">
                                    <h5><?= $popularproperty['title'] ?></h5>
                                    <ul>
                                        <li>
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p><?= $popularproperty['location']?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach;?>
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
<button id="myBtn"><i class="fa-solid fa-chevron-up"></i></button>
<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- range -->
<script>
    var rangeSlider = function () {
        var slider = $('.range-slider'),
            range = $('.range'),
            value = $('.range');

        slider.each(function () {

            value.each(function () {
                var value = $(this).prev().attr('value');
                $(this).html(value);
            });

            range.on('input', function () {
                $(this).next(value).html(this.value);
            });
        });
    };

    rangeSlider();
</script>
<script>
    window.onscroll = function () {
        scrollFunction()
    };

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