<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");
$sqlQuery = "SELECT h.livingroom as livingroom, a.data as data, a.houseid as houseid, a.purposeimg as purposeimg, a.name as name ,h.locationdetails as locationdetails, h.length as length, h.width as width,  h.location as location, h.yearbuilding as yearbuilding, h.description as description, h.title as title, h.id as id, h.purpose as purpose, h.price as price, h.bedrooms as bedrooms, h.bathrooms as bathrooms, h.area as area, u.avt as avatar, u.name as username  
FROM user as u 
  JOIN  house as h  ON u.id = h.userid 
  JOIN housealbum as a ON a.houseid = h.id WHERE purposeimg = 'image' ORDER BY h.id LIMIT 3 ";
$stmt2 = $connect->prepare($sqlQuery);
$stmt2 ->execute();
$dataHouse = $stmt2->fetchAll();

$sqlQuery = "SELECT a.data as data, a.name as name, a.purposeimg as purposeimg, h.locationdetails as locationdetails, h.location as location, h.yearbuilding as yearbuilding, h.description as description, h.title as title,  h.id as id, h.purpose as purpose, h.price as price, h.bedrooms as bedrooms, h.bathrooms as bathrooms, h.area as area, u.avt as avatar, u.name as username 
            FROM user as u JOIN house as h JOIN housealbum as a ON u.id = h.userid AND h.id =a.houseid WHERE h.purpose ='sell' AND a.purposeimg = 'image' ORDER BY h.id LIMIT 3"  ;
$stmtSell = $connect->prepare($sqlQuery);
$stmtSell ->execute();
$dataSell = $stmtSell->fetchAll();

$sqlQuery = "SELECT a.data as data, a.name as name, a.purposeimg as purposeimg, h.locationdetails as locationdetails, h.location as location, h.yearbuilding as yearbuilding, h.description as description, h.title as title,  h.id as id, h.purpose as purpose, h.price as price, h.bedrooms as bedrooms, h.bathrooms as bathrooms, h.area as area, u.avt as avatar, u.name as username 
            FROM user as u JOIN house as h JOIN housealbum as a ON u.id = h.userid AND h.id =a.houseid WHERE h.purpose ='rent' AND a.purposeimg = 'image' ORDER BY h.id LIMIT 3"  ;
$stmtRent = $connect->prepare($sqlQuery);
$stmtRent ->execute();
$dataRent = $stmtRent->fetchAll();

$sqlQueryBlog = "SELECT  b.title as title,b.description as description,b.image as image,b.id as id, u.name as username FROM user as u JOIN blog as b ON u.id = b.userid ORDER BY b.id DESC LIMIT 3 ";
$stmtBlog = $connect->prepare($sqlQueryBlog);
$stmtBlog -> execute();
$dataBlog = $stmtBlog->fetchAll();


$sqlQuery = "SELECT * FROM agent";
$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
$dataAgent = $stmt -> fetchAll();

$sqlQueryNB = "SELECT * FROM house WHERE location ='Ninh Binh'"  ;
$stmtNB = $connect->prepare($sqlQueryNB);
$stmtNB ->execute();
$dataNB = $stmtNB->fetchAll();

$sqlQueryHB = "SELECT * FROM house WHERE location ='Hoa Binh'"  ;
$stmtHB = $connect->prepare($sqlQueryHB);
$stmtHB ->execute();
$dataHB = $stmtHB->fetchAll();

$sqlQueryHN = "SELECT * FROM house WHERE location ='Ha Noi'"  ;
$stmtHN = $connect->prepare($sqlQueryHN);
$stmtHN ->execute();
$dataHN = $stmtHN->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="navbar-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 ">
                        <ul>
                            <li>
                                <p>
                                    <i class="fa-solid fa-location-dot"></i>
                                    420 Love Sreet 133/2 flx City
                                </p>
                            </li>
                            <li>
                                <p>
                                    <i class="fa-solid fa-phone"></i>
                                    +(06) 017 800 628
                                </p>
                            </li>
                            <li>
                                <p>
                                    <i class="fa-solid fa-envelope"></i>
                                    info.contact@gmail.com
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-4 ">
                        <ul class="navbar-right">
                            <li class="social-area">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    ?>
                                    <a
                                        href="./profile.php?user= <?= $_SESSION['username'] ?>"><?= $_SESSION['username'] ?></a>
                                    <a href="./logout.php">Logout</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="./signup.php">Register</a>
                                    <a href="./login.php">Login</a>
                                    <?php
                                }
                                ?>
                                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://www.skype.com/"><i class="fa-brands fa-skype"></i></a>
                                <a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest-p"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-bot">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="./assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                aria-expanded="false" aria-label="Toggle navigation">
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
                                        echo "<a href=./login.php>Pages</a>";
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

                        <?php
                        if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
                            echo " <i class='fa-solid fa-magnifying-glass'></i>
                                 <a href='add_page.php' class='btn btn-base'>
                                <span class='btn-icon'>
                                    <i class='fa-slolid fa-flus'></i>
                                 </span>
                                 <span class='btn-text' >SUBMIT PROPERTY</span>
                            </a>" ;
                        }
                        else {
                            echo " <i class='fa-solid fa-magnifying-glass'></i>
                                <a href='login.php' class='btn btn-base'>
                                <span class='btn-icon'>
                                    <i class='fa-slolid fa-flus'></i>
                                 </span>
                                 <span class='btn-text' >SUBMIT PROPERTY</span>
                            </a>";
                        }
                        ?>
                        <!--              <a href="./add_page.php" class="btn btn-base">-->
                        <!--                <span class="btn-icon">-->
                        <!--                  <i class="fa-solid fa-plus"></i>-->
                        <!--                </span>-->
                        <!--                <span class="btn-text" >SUBMIT PROPERTY</span>-->
                        <!--              </a>-->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="banner-area">
        <div class="container">
            <div class="banner-area">
                <div class="banner-bot">
                    <div class="col-12">
                        <div class="banner-inner text-center">
                            <p>Lorem ipsum dolor sit amet, consecteLorem ipsum dolor sit amet</p>
                            <h2>The Best Way To Find Your Perfect Home</h2>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="main-search-inner">
                            <div class="row g-4">
                                <form class="serch-index" action="proparty_list.php" method="get">
                                    <div class="col-lg-3 col-4 px-3">
                                        <div class="single-select-inner">
                                            <select name="locationindex" class="form-select"
                                                    aria-label="Default select example">
                                                <option selected>Location</option>
                                                <option value="Ninh Binh">Ninh Binh</option>
                                                <option value="Hoa Binh">Hoa Binh</option>
                                                <option value="Ha Noi">Ha Noi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-4 px-3">
                                        <select name="purposeindex" class="form-select"
                                                aria-label="Default select example">
                                            <option selected>Purpose</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sell">Sell</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-4 px-3">
                                        <select name="pricesort" class="form-select" id="floatingSelectGrid"
                                                aria-label="Floating label select example">
                                            <option selected>Price</option>
                                            <option value="<100k">
                                                < 100K</option>
                                            <option value=">100k"> > 100K</option>
                                            <option value="100k-1000k"> 100K-1000K</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-12 px-3 mt-lg-0 mt-2 ">
                                        <button class="btn-base btn btn-success rounded-2">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="service-area-home pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <a class="single-service-a" href="proparty_list.php?searchtype=Villa">
                        <div class="single-service-warp">
                            <div class="thumbnail-circle text-center rounded-circle ">
                                <img src="./assets/img/logo/8b7a5b_5fb3cdf679364d9da6ddeff48e66de2b~mv2.png" alt="">
                            </div>
                            <div class="single-service-details text-center">
                                <h4 class="inner-single-service">Villa</h4>
                                <p class="inner-single-service">Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a class="single-service-a" href="proparty_list.php?searchtype=Bungalow">
                        <div class="single-service-warp">
                            <div class="thumbnail-circle text-center rounded-circle">
                                <img src="./assets/img/logo/image-asset.png" alt="...">
                            </div>
                            <div class="single-service-details text-center">
                                <h4 class="inner-single-service">Bungalow</h4>
                                <p class="inner-single-service">Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a class="single-service-a" href="proparty_list.php?searchtype=Resort">
                        <div class="single-service-warp">
                            <div class="thumbnail-circle text-center rounded-circle">
                                <img src="./assets/img/logo/Paradise-Resort-Logo-Template-PNG-Transparent.png" alt="...">
                            </div>
                            <div class="single-service-details text-center">
                                <h4 class="inner-single-service">Resort</h4>
                                <p class="inner-single-service">Lorem ipsum dolor sit consectetur adipisicing elit, sed do eius eiusmod tempor incididunt ut labore.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area mt-5 mb-5">
        <div class="container">
            <div class="section-title text-center">
                <h6>We are offring the best real estate</h6>
                <h2>Best House For You</h2>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($dataHouse as $datahouseid => $houseid): ?>
                    <div class="col-md-4 ">
                        <div class="single-product content">
                            <div class="thumb-img-index">
                                <a href="./proparty_details.php?id=<?= $houseid['id']?> ">
                                    <?= $houseid['purpose'] ?>
                                </a>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($houseid['data']); ?>"
                                     alt="<?php echo $houseid['name']; ?>">
                            </div>
                            <div class="product-wrap-details px-3 bottom-0">
                                <div class="media d-flex">
                                    <div class="author-besthouse">
                                        <img src="<?= $houseid['avatar'] ?>" alt="Empty"
                                             class="w-100 h-75 rounded-circle text-center">
                                    </div>
                                    <div class="author-in4">
                                        <h6 class="fs-6">
                                            <?= $houseid['username'] ?>
                                        </h6>
                                        <p>
                                            <?= $houseid['location'] ?>
                                        </p>
                                    </div>
                                    <a href="" class="fav-btn float-end">
                                        <i class="fa-regular fa-heart fs-6"></i>
                                    </a>
                                </div>
                                <div class="product-meta">
                                    <span class="price">$ <?=number_format($houseid['price']) ?></span>
                                    <div class="float-right d-inline-block">
                                        <ul class="p-0">
                                            <li>
                                                <img src="./assets/img/L1.png" alt="">
                                                <span><?= $houseid['bedrooms'] ?></span>
                                            </li>
                                            <li>
                                                <img src="./assets/img/L2.png" alt="">
                                                <span><?= $houseid['bathrooms'] ?></span>
                                            </li>
                                            <li>
                                                <img src="./assets/img/L3.png" alt="">
                                                <span><?= $houseid['area'] ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="video-area p-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>The Mordan House Video</h2>
                        <p>Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                            eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                        <div class="intro-video">
                            <div class="estate-location-top">
                                <div class="dropdown">
                                    <div class="intro-video-inner">
                                        <video controls>
                                            <source
                                                src="https://media.istockphoto.com/id/1338773875/vi/video/%C4%91i-qua-nh%E1%BB%AFng-ng%C3%B4i-nh%C3%A0-ven-s%C3%B4ng-%C4%91%E1%BA%B9p-v%C3%A0o-ban-ng%C3%A0y.mp4?s=mp4-640x640-is&k=20&c=-yKtNuZOlGhvAI7yAIHtC0PEl-p7Jh2xR2af3yTagA8="
                                                type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="categores">
        <div class="container">
            <div class="section-title text-center">
                <h6>We are offring the best real estate</h6>
                <h2>Populer Categores</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-category-wrap content">
                        <div class="thumb">
                            <img src="https://media.vov.vn/sites/default/files/styles/large/public/2020-10/HN.jpg"
                                 alt="">
                        </div>
                        <div class="single-category-details">
                            <h4>
                                <a>Ha Noi</a>
                            </h4>
                            <a href="./proparty_list.php?location=Ha Noi" class="btn btn-base"><?php
                                $soluong = count($dataHN) ;
                                echo  $soluong ;
                                ?> Poparties</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-category-wrap content">
                        <div class="thumb">
                            <img src="https://cdnimg.vietnamplus.vn/t870/uploaded/ngtnnn/2022_08_31/ttxvn_3108hoabinh3.jpg"
                                 alt="">
                        </div>
                        <div class="single-category-details">
                            <h4>
                                <a>Hoa Binh</a>
                            </h4>
                            <a href="./proparty_list.php?location=Hoa Binh" class="btn btn-base">
                                <?php
                                $soluong = count($dataHB);
                                echo $soluong;
                                ?>
                                Poparties</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-category-wrap content">
                        <div class="thumb">
                            <img src="https://dulichninhbinh.com.vn/mypicture/images/2021/07/truong-huy.jpg" alt="">
                        </div>
                        <div class="single-category-details">
                            <h4>
                                <a>Ninh Binh</a>
                            </h4>
                            <a href="./proparty_list.php?location=Ninh Binh" class="btn btn-base">
                                <?php
                                $soluong = count($dataNB);
                                echo $soluong;
                                ?>
                                Poparties</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="single-category-wrap content">
                        <div class="thumb">
                            <img src="https://www.croatialuxuryrent.com/storage/upload/60b/a84/9d9/thumb-521cd7ab2598d7c7600255ed4c1e7400-ACtC-3dUUhnPukyvA_B6PwqK5wuvQSefQm0xRixxvut1pU3-DTccroA8pzNt6Yvi0UaPGM5YbXPt7YajBpUlEjDYd_g10GKPk_ueHlRlv6ujTvRbWnYdSxcW9wOLsWye-Nw7UVF1yoOOVCh6Wg7QFVRE6-vldw=w1358-h905-no.jpg"
                                 alt="">
                        </div>
                        <div class="single-category-details">
                            <h4>
                                <a>Property on sale</a>
                            </h4>
                            <a href="./proparty_list.php?purpose=sell" class="btn btn-base">
                                <?php
                                $soluong = count($dataSell);
                                echo $soluong;
                                ?>
                                Poparties</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="single-category-wrap content">
                        <div class="thumb">
                            <img src="https://berganco.com/wp-content/uploads/2019/12/rental-property-investment-strategy.jpeg"
                                 alt="">
                        </div>
                        <div class="single-category-details">
                            <h4>
                                <a>Rental property</a>
                            </h4>
                            <a href="./proparty_list.php?purpose=rent" class="btn btn-base">
                                <?php
                                $soluong = count($dataRent);
                                echo $soluong;
                                ?>
                                Poparties</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="reviews-area">
        <div class="bg-overlay-wrap p-5">
            <div class="section-title text-center pt-5">
                <h6>Our Testomonial </h6>
                <h2>What Client Say</h2>
                <p>Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ips</p>
            </div>
            <div class="container">
                <div class="first-slider text-center">
                    <div class="slider-1">
                        <div class="slider1-inner">
                            <div class="rounded-circle img-thumb"
                                 style="background-image: url('./assets/img/rv-png-1.png');">
                            </div>
                            <div class="details-thumb">
                                <h6>Sarif Jaya Miprut</h6>
                                <p>“consecte Lorem ipsum dolor sit amet, Lorem ipsum dolor amet, consecte Lorem
                                    ipsum dolor sit adipisicing amet, consectetur sed do eiusmod tempor
                                    incididunt dolore magna consecrem adipisicing ipsum dolor sit amet,
                                    consectetur elit,’’ </p>
                            </div>
                            <div class="rate-inner">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="slider-1">
                        <div class="slider1-inner">
                            <div class="rounded-circle img-thumb"
                                 style="background-image: url('./assets/img/rv-png-2.png');">
                            </div>
                            <div class="details-thumb">
                                <h6>Sarif Jaya Miprut</h6>
                                <p>“consecte Lorem ipsum dolor sit amet, Lorem ipsum dolor amet, consecte Lorem
                                    ipsum dolor sit adipisicing amet, consectetur sed do eiusmod tempor
                                    incididunt dolore magna consecrem adipisicing ipsum dolor sit amet,
                                    consectetur elit,’’ </p>
                            </div>
                            <div class="rate-inner">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="propartes-area mt-5">
        <div class="container">
            <div class="section-title text-center">
                <h6>Meet Our Agent</h6>
                <h2>Our Properties </h2>
            </div>
            <div class="rent-sell">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-rent-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-rent" type="button" role="tab" aria-controls="pills-rent"
                                aria-selected="true">Rent</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-sell-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-sell" type="button" role="tab" aria-controls="pills-sell"
                                aria-selected="false">Sell</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-rent" role="tabpanel"
                     aria-labelledby="pills-rent-tab">
                    <div class="row">
                        <?php foreach ($dataRent as $datarentid => $purposerent): ?>
                            <div class="col-xl-4 col-md-4  ">
                                <div class="single-propartes">
                                    <div class="propartes-img-zoom content ">
                                        <a href="./proparty_details.php?id=<?= $purposerent['id']?> ">
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($purposerent['data']); ?>"
                                                 alt="<?php echo $purposerent['name']; ?>">
                                        </a>
                                        <div class="media d-flex px-3">
                                            <div class="author-besthouse">
                                                <img src="<?= $purposerent['avatar']?>"
                                                     class="w-100 h-75 rounded-circle text-center">
                                            </div>
                                            <div class="author-in4">
                                                <h6><?= $purposerent['username']?></h6>
                                                <p>
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <?= $purposerent['location']?>
                                                </p>
                                            </div>
                                            <a href="" class="fav-btn float-end">
                                                <i class="fa-regular fa-heart fs-6"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="propartes-wrap-details p-3 border">
                                        <h4>
                                            <a href=""><?= $purposerent['title']?></a>
                                        </h4>
                                        <ul class="propartes-inner">
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                                <?= $purposerent['area']?>, <?= $purposerent['locationdetails']?>,
                                                <?= $purposerent['location'] ?>
                                            </li>
                                            <li>
                                                <a href="./proparty_list.php">For <?= $purposerent['purpose'] ?></a>
                                            </li>
                                        </ul>
                                        <p>
                                            <?= $purposerent['description'] ?>
                                        </p>
                                    </div>
                                    <div class="propartes-bottom text-center">
                                        <span>$ <?= number_format( $purposerent['price'])?> </span>
                                        <span>For <?= $purposerent['purpose']?> </span>
                                        <span><?= $remodelyear = 2023 - $purposerent['yearbuilding']?> year ago</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-sell" role="tabpanel" aria-labelledby="pills-sell-tab">
                    <div class="row">
                        <?php foreach ($dataSell as $datarentid => $purposesell): ?>
                            <div class="col-xl-4 col-md-4  ">
                                <div class="single-propartes">
                                    <div class="propartes-img-zoom content">
                                        <a href="./proparty_details.php?id=<?= $purposesell['id']?> ">
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($purposesell['data']); ?>"
                                                 alt="<?php echo $purposesell['name']; ?>">
                                        </a>
                                        <div class="media d-flex px-3">
                                            <div class="author-besthouse">
                                                <img src="<?= $purposesell['avatar']?>" alt="Empty"
                                                     class="w-100 h-75 rounded-circle text-center">
                                            </div>
                                            <div class="author-in4">
                                                <h6><?= $purposesell['username']?></h6>
                                                <p>
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <?= $purposesell['location'] ?>
                                                </p>
                                            </div>
                                            <a href="" class="fav-btn float-end">
                                                <i class="fa-regular fa-heart fs-6"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="propartes-wrap-details p-3 border">
                                        <h4>
                                            <a href=""><?= $purposesell['title']?></a>
                                        </h4>
                                        <ul class="propartes-inner">
                                            <li>
                                                <i class="fa-solid fa-location-dot"></i>
                                                <?= $purposesell['area']?>, <?= $purposesell['locationdetails']?>,
                                                <?= $purposesell['location'] ?>
                                            </li>
                                            <li>
                                                <a href="./proparty_list.php">For <?= $purposesell['purpose'] ?></a>
                                            </li>
                                        </ul>
                                        <p>
                                            <?= $purposesell['description'] ?>
                                        </p>
                                    </div>
                                    <div class="propartes-bottom text-center">
                                        <span>$ <?= number_format( $purposesell['price'])?> </span>
                                        <span>For <?= $purposesell['purpose']?> </span>
                                        <span><?= $remodelyear = 2023 - $purposesell['yearbuilding']?> year ago</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="submit-area pt-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="section-title text-center">
                        <h6>Buy Or Sell </h6>
                        <h2>Submit Property</h2>
                        <p>consecte Lorem ipsum dolor sit amet, Lorem ipsum dolor amet, consecte Lorem ipsum dolor
                            sit adipisicing
                            amet, consectetur sed do eiusmod tempor incididunt dolore magna consecrem adipisicing
                            ipsum dolor sit
                            amet, consectetur elit,</p>
                    </div>
                    <div class="btn-wrap">
                        <a href="./add_page.php" class="btn-base">SUBMIT</a>
                        <a href="proparty_grid.php" class="btn-base">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="agent-area">
        <div class="container">
            <div class="section-title text-center">
                <h6>Meet Our Agent</h6>
                <h2>Our Best Agent</h2>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($dataAgent as $smtm => $item): ?>
                    <div class="col-md-4 col-10 mt-2">
                        <div class="single-agent border content">
                            <div class="thumb-agent">
                                <img src="<?= $item['image'] ?>" alt="Empty">
                            </div>
                            <div class="details">
                                <h4><?= $item['name'] ?></h4>
                                <h6><?= $item['position'] ?></h6>
                                <ul class="social-area ">
                                    <li class="rounded-circle social-area-item social-area-item">
                                        <a class="social-area-item-link" href="<?= $item['facebook'] ?>"><i
                                                class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li class="rounded-circle social-area-item social-area-item">
                                        <a class="social-area-item-link" href="https://www.linkedin.com/"><i
                                                class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                    <li class="rounded-circle social-area-item social-area-item">
                                        <a class="social-area-item-link" href="https://www.instagram.com/"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li class="rounded-circle social-area-item social-area-item">
                                        <a class="social-area-item-link" href="https://www.twitter.com/"><i
                                                class="fa-brands fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="find-area">
        <div class="container">
            <div class="row justify-content-center text-lg-start">
                <div class="col-9 pt-5">
                    <div class="section-title">
                        <h6>Buy Or Sell</h6>
                        <h2>Find Best Place For Leaving</h2>
                        <p>Lorem ipsum dolor amet, consecteLorem ipsum dolor sit amet, consectetur adipisicing sed
                            do eiusmod
                            tempor incididunt dolore magna consecteLorem ipsum dolor sit amet, consectetur
                            adipisicing elit,</p>
                    </div>
                </div>
                <div class="col-3 align-self-center">
                    <a href="./proparty_grid.php" class="btn btn-base">SUBMIT</a>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-2 col-4">
                    <img src="./assets/img/logo-area/find-area-4.png" alt="">
                </div>
                <div class="col-lg-2 col-4">
                    <img src="./assets/img/logo-area/find-area-2.png" alt="">
                </div>
                <div class="col-lg-2 col-4">
                    <img src="./assets/img/logo-area/find-area-3.png" alt="">
                </div>
                <div class="col-lg-2 col-6">
                    <img src="./assets/img/logo-area/find-area-4.png" alt="">
                </div>
                <div class="col-lg-2 col-6">
                    <img src="./assets/img/logo-area/find-area-2.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area ">
        <div class="container">
            <div class="section-title text-center">
                <h6>Blog & News </h6>
                <h2>News Feeds</h2>
            </div>
            <div class="tab-conent">
                <div class="row">
                    <?php foreach ($dataBlog as $blogkey => $blogid): ?>
                        <div class="col-lg-4 ">
                            <div class="single-blog-wrap">
                                <div class="blog-img" style="background-image: url(<?=$blogid['image']?>);">
                                </div>
                            </div>
                            <div class="blog-wrap-details p-3">
                                <div class="blog-inner d-flex p-0">
                                    <i class="fa-solid fa-user me-2">
                                    </i>
                                    <p><?=$blogid['username']?></p>
                                    <i class="fa-solid fa-calendar-days mx-2">
                                    </i>
                                    <p><?php  $date = mktime((0), 0, 0, 04, (6 - 1), 2023); echo date('d/m/Y', $date)?>
                                    </p>
                                </div>
                                <h4 class="mt-2">
                                    <p class="text-dark" href="./single_blog.php"><?=$blogid['title']?></p>
                                </h4>
                                <p class="text-dark">
                                    <?=$blogid['description']?>.
                                </p>
                                <a href="single_blog.php?id= <?=$blogid['id']?>" class="btn btn-base">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area">
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
    </div>
    <div class="footer-mid pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="footer-title">
                        <h4>Company</h4>
                    </div>
                    <div class="footer-details">
                        <p>
                            Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur et adipisicing
                            eiusmod tempor
                            incididunt labore
                        </p>
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
                <div class="col-md-4 col-12">
                    <div class="footer-title">
                        <h4>News Feeds</h4>
                    </div>
                    <div class="footer-mid-details">
                        <?php foreach ($dataBlog as $blogkey => $blogid): ?>
                            <ul>

                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    <?=$blogid['username'] ?>
                                    <span>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <?php  $date = mktime((rand(10,100)), 0, 0, 04, (6 - 1), 2023); echo date('d/m/Y', $date)?>
                                    </span>
                                </li>

                            </ul>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="newslatter">
                        <h4>Newslatter</h4>
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet</p>
                            <div class="subscrise">
                                <input type="text" placeholder="Your mail">
                                <a href="">Subscribe </a>
                            </div>
                        </div>
                    </div>
                    <div class="footer-title">
                        <h5>House Tags</h5>
                    </div>
                    <div class="tag">
                        <a href="https://www.facebook.com/hashtag/Creative">CREATIVE</a>
                        <a href="https://www.facebook.com/hashtag/DEVELOPMENT">DEVELOPMENT</a>
                        <a href="https://www.facebook.com/hashtag/BEACH">BEACH</a>
                        <a href="https://www.facebook.com/hashtag/VILLA">VILLA</a>
                        <a href="https://www.facebook.com/hashtag/CLEAN">CLEAN</a>
                        <a href="https://www.facebook.com/hashtag/SEO">SEO</a>
                        <a href="https://www.facebook.com/hashtag/APPERTMENT">APPERTMENT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bot">
        <div class="container">
            <div class="row">
                <p>©2022, Copy Right By Solverwp. All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
<div class="back-to-top">
        <span class="back-to-top">
            <i class="fa-solid fa-chevron-up"></i>
        </span>
</div>
</div>
<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="./assets/slick-1.8.1/slick/slick.min.js"></script>
<script>
    $(document).ready(function() {
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

        });
    });
</script>
<button id="myBtn"><i class="fa-solid fa-chevron-up"></i></button>
<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {

        if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    document.getElementById('myBtn').addEventListener("click", function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>
<!-- w3 tabs -->

</body>

</html>
