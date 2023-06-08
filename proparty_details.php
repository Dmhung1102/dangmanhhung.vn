<?php
session_start();
$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");
$id = $_GET['id'];
$sqlQuery = "SELECT * FROM house as h JOIN housealbum as a ON  h.id = a.houseid WHERE h.id = $id";
$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
$house = $stmt -> fetch();
$amenities = json_decode($house['amenities']);

$sqlQueryUser = "SELECT * FROM user as u JOIN house as h ON u.id = h.userid WHERE h.id = '$id' ";
$stmtUser = $connect->prepare($sqlQueryUser);
$stmtUser -> execute();
$dataUser = $stmtUser->fetch();

$sqlQueryAlbum = "SELECT * FROM housealbum WHERE houseid = $id AND purposeimg = 'album'";
$stmtAlbum = $connect->prepare($sqlQueryAlbum);
$stmtAlbum ->execute();
$dataAlbum = $stmtAlbum->fetchAll();


$sqlQueryEstate = "SELECT * FROM housealbum WHERE houseid = $id AND purposeimg = 'estate'";
$stmtEstate = $connect->prepare($sqlQueryEstate);
$stmtEstate ->execute();
$dataEstate = $stmtEstate->fetchAll();


$sqlQueryfloor = "SELECT * FROM housealbum WHERE houseid = $id AND purposeimg = 'floor'";
$stmtfloor = $connect->prepare($sqlQueryfloor);
$stmtfloor ->execute();
$datafloor = $stmtfloor->fetchAll();


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

$sqlQueryRent = "SELECT COUNT(id) AS counthn FROM house WHERE purpose ='rent'";
$stmtRent = $connect->prepare($sqlQueryRent);
$stmtRent ->execute();
$dataRent = $stmtRent->fetch();

$sqlQuerySell = "SELECT COUNT(id) AS counthn FROM house WHERE purpose ='sell'";
$stmtSell = $connect->prepare($sqlQuerySell);
$stmtSell ->execute();
$dataSell = $stmtSell->fetch();

$sqlQueryPopular = "SELECT  * FROM housealbum as a JOIN house as h ON a.houseid = h.id WHERE purposeimg = 'album'  LIMIT 3";
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
    <div class="banner-newfeed">
        <div class="banner-contact" style="background: #000">
            <div class="container">
                <div class="banner-inner">
                    <div class="section-tittle text-center">
                        <h2 class="page-tittle">Proparty Details</h2>
                        <ul class="page-list">
                            <a href="./index.php">
                                <li>Home ></li>
                            </a>
                            <li>Proparty Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="product-price">
        <div class="container">
            <div class="row">
                <div class="product-price-top mt-5">
                    <div class="row gx-0 bg-white">
                        <div class="col-md-7 col-12">
                            <div class="product-left pt-3 px-3">
                                <h4 class="mb-0">Product information</h4>
                                <h4 class="fs-2"><?= $house['title']?></h4>
                                <i class="fa-solid fa-location-dot"></i>
                                <span><?= $house['area']?>, <?= $house['locationdetails']?>,
                                        <?= $house['location']?> </span>
                                <ul class="mt-2">
                                    <li>Bedroom : <?= $house['bedrooms']?></li>
                                    <li>Bathroom : <?= $house['bathrooms']?></li>
                                    <li>Size : <?= $house['width'] * $house['length']?> sq ft</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="product-right pt-3 px-3">
                                <?php
                                if ($_SESSION['userid'] == $house['userid']) {
                                    echo " <a href='editpage.php?id=$house[houseid] 'class='btn-owner btn btn-success px-2 py-0'>Edit</a>";
                                    echo " <a href='delete.php?id=$house[houseid]' class='btn-owner btn btn-success px-2 p-0' onclick='return confirmDelete()'>Delete</a>";
                                } else {
                                    echo "<a href=login.php>Edit</a>";
                                }
                                ?>
                                <h4 class="fs-2">$ <?=number_format($house['price'])?></h4>
                                <div class="product-right-mid mt-2">
                                    <ul class="text-uppercase">
                                        <li><?= $house['type'] ?></li>
                                        <li><?= $house['orienten']?></li>
                                        <li><?= $house['purpose'] ?></li>
                                    </ul>
                                </div>
                                <div class="product-right-bot px-2">
                                    <ul class="mt-2">
                                        <li>
                                                <span>
                                                    <i class="fa-regular fa-calendar-days m-0"></i>
                                                    <?= $house ['yearbuilding'] ?>
                                                </span>
                                        </li>
                                        <li class="px-2">
                                                <span>
                                                    <i class="fa-regular fa-eye m-0"></i>
                                                    4263
                                                </span>
                                        </li>
                                        <li>
                                                <span>
                                                    <i class="fa-regular fa-message m-0"></i>
                                                    68
                                                </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sync1" class="owl-carousel ">
                    <!--                        <div class="item">-->
                    <!--                            <div class="itemzoom">-->
                    <!--                                <div id='img_div'>-->
                    <!--                                    --><?php
                    //                                    echo "<img src='photo/".$house['name']."' >";
                    //                                    ?>
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <?php foreach ($dataAlbum as $row): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['data']); ?>"
                             alt="<?php echo $row['name']; ?>">
                    <?php endforeach; ?>
                </div>
                <div id="sync2" class="owl-carousel ">
                    <!--                        <div class="item">-->
                    <!--                            <div id='img_div'>-->
                    <!--                            --><?php
                    //                                echo "<img src='photo/".$house['name']."' >";
                    //                            ?>
                    <!--                            </div>-->
                    <!---->
                    <!--                        </div>-->
                    <?php foreach ($dataAlbum as $row): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['data']); ?>"
                             alt="<?php echo $row['name']; ?>">
                    <?php endforeach; ?>
                </div>
                <div class="daily-apartment">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-12 mt-5">
                                <div class="property-amenities">
                                    <h3><?= $house['title']?></h3>
                                    <p>
                                        <?= $house['description']?>
                                    </p>
                                </div>
                                <div class="property-amenities mt-5">
                                    <div class="proparty-attachment">
                                        <h3>Detailed Price</h3>
                                        <div class="detailed-price">
                                            <span class="title-price text-secondary">Detailed price</span>
                                            <span class="fw-bold fs-5"><?=number_format($house['price']) ?>$</span>
                                            <span
                                                class="title-price">~<?= round($house['price'] / ($house['width'] * $house['length'])) ?>$
                                                    /sqft</span>
                                        </div>
                                        <div class="detailed-area">
                                            <span class="title-price text-secondary">Area</span>
                                            <span class="fw-bold fs-5"><?= $house['width'] * $house['length']?>
                                                    sqft</span>
                                        </div>
                                        <div class="negotiatied-price">
                                            <span class="title-price text-secondary">Negotiated price</span>
                                            <span
                                                class="title-price text-capitalize fs-5 fw-bold"><?= $house['negotiatedprice']?></span>
                                        </div>
                                        <div class="legaldocuments">
                                            <span class="title-price text-secondary">Legal documents</span>
                                            <span class="title-price text-capitalize fs-5 fw-bold">House ownership
                                                    certificate</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="poperty-details-daily mt-5">
                                    <h3>Poperty Details</h3>
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <ul>
                                                <li>Bedrooms: <?= $house['bedrooms'] ?></li>
                                                <li>All Rooms:
                                                    <?= $allroom = $house['kitchen'] + $house['bedrooms'] + $house['bathrooms'] + $house['livingroom'] ?>
                                                </li>
                                                <li>Kitchen: <?= $house['kitchen'] ?></li>
                                                <li>Type: <?= $house['type'] ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <ul>
                                                <li>Bathrooms: <?= $house['bathrooms'] ?></li>
                                                <li>Livingroom: <?= $house['livingroom'] ?></li>
                                                <li>Year Built: <?= $house['yearbuilding'] ?></li>

                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <ul>
                                                <li>Orienten: <?= $house['orienten'] ?></li>
                                                <li>Area: <?= $area =  $house['width'] * $house['length'] ?></li>
                                                <li>Garages: <?= $house['garages'] ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-amenities mt-5 row">
                                    <h3>Amenities</h3>
                                    <div class="amenities-options">
                                        <ul class="amenities-inner d-flex flex-wrap">
                                            <?php
                                            foreach ($amenities as $amenitieskey => $option):
                                                ?>
                                                <li class="w-25 ">
                                                    <i class="fa-solid fa-check"></i><span
                                                        class="text-capitalize"><?= $option?></span>
                                                </li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-amenities mt-5">
                                    <div class="addition-details">
                                        <h3>Additional Details</h3>
                                        <div class="row">
                                            <div class="col-sm-4 col-6">
                                                <ul>
                                                    <li>Remodel Year :
                                                        <?= $remodelyear = 2023 - $house ['yearbuilding']?></li>

                                                    <li>Equipment: <?= $house ['equipment']?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 col-6 p-0">
                                                <ul>
                                                    <li>Floor: <?= $house ['floors']?></li>

                                                    <li>Additional Room: <?= $house ['additionalroom']?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 col-6">
                                                <ul>
                                                    <li>Ground: <?= $house ['ground']?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-amenities mt-5">
                                    <div class="estate-location">
                                        <h3>Estate Location</h3>
                                        <div id="sync3" class="owl-carousel ">
                                            <?php foreach ($dataEstate as $row): ?>
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['data']); ?>"
                                                     alt="<?php echo $row['name']; ?>">
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-amenities mt-5">
                                    <div class="floor-plans">
                                        <h3>Floor Plans</h3>
                                        <div id="sync4" class="owl-carousel ">
                                            <?php foreach ($datafloor as $row): ?>
                                                <img
                                                    src="data:image/jpeg;base64,<?php echo base64_encode($row['data']); ?>"
                                                    alt="<?php echo $row['name']; ?>">
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-amenities mt-5">
                                    <div class="nearby-area-details">
                                        <h3>Some properties nearby </h3>
                                        <?php foreach ($dataPopular as $nearby): ?>
                                            <div class="nearby-area d-flex mt-3 justify-content-between">

                                                <div class="nearby-in4 px-2 d-flex">
                                                    <img
                                                        src="data:image/jpeg;base64,<?php echo base64_encode($nearby['data']); ?>"
                                                        alt="<?php echo $nearby['name']; ?>">
                                                    <div class="nearby-in4img px-2">
                                                        <h5><?= $nearby['title'] ?></h5>
                                                        <p> Location: <?= $nearby['location'] ?></p>
                                                        <p> Type: <?= $nearby['type'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="nearby-rebviews">
                                                    <h4>Status: <?= $nearby['status'] ?></h4>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="estate-agent-area mt-5">
                                    <div class="property-amenities d-flex">
                                        <div class="circle-avt px-3">
                                            <img class="rounded-circle"
                                                 src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png"
                                                 alt="">
                                        </div>
                                        <div class="estate-details">
                                            <h5><?= $dataUser['username'] ?></h5>
                                            <div class="agent-rate">
                                                <span>Phone number:</span>
                                                <h3 class="info-user">0<?= $dataUser['phonenumber'] ?></h3>
                                                <span>Email:</span>
                                                <h3 class="info-user"><?= $dataUser['email'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-your-comment mt-5">
                                    <div class="property-amenities">
                                        <h3>Location On Google Maps</h3>
                                        <div class="location-gg">
                                            <iframe class="w-100" src="<?= $house['iframe'] ?>" alt="None data"
                                                    width="600" height="450" style="border:0;"
                                                    allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-lg-4 mt-5 px-4">
                                <div class="price-area pb-0">
                                    <div class="comment">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="categories-in4 justify-content-between">
                                        <div class="categories-left">
                                            <ul>
                                                <a class="text-dark" href="proparty_list.php?purpose=rent">
                                                    <li>Rent</li>
                                                </a>
                                                <a class="text-dark" href="proparty_list.php?purpose=sell">
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
                                <div class="price-area mt-5 pb-0">
                                    <div class="place-area  ">
                                        <div class="newfeed-categories pt-3">
                                            <div class="comment">
                                                <h3>Place</h3>
                                            </div>
                                            <ul class="p-0">
                                                <a href="proparty_list.php?location=Ninh Binh">
                                                    <li>
                                                        Ninh Binh
                                                        <span>
                                                                <?php
                                                                echo $dataNB[0];
                                                                ?>
                                                            </span>
                                                    </li>
                                                </a>
                                                <a href="proparty_list.php?location=Hoa Binh">
                                                    <li>
                                                        Hoa Binh
                                                        <span>
                                                                <?php
                                                                echo $dataHB[0];
                                                                ?>
                                                            </span>
                                                    </li>
                                                </a>
                                                <a href="proparty_list.php?location=Ha Noi">
                                                    <li>
                                                        Ha Noi
                                                        <span>
                                                                <?php
                                                                echo $dataHN[0];
                                                                ?>
                                                            </span>
                                                    </li>
                                                </a>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-area mt-5">
                                    <div class="newfeed-categories pt-3">
                                        <div class="comment">
                                            <h3>Popular Property</h3>
                                        </div>
                                        <?php foreach ($dataPopular as $housesell => $houseid): ?>
                                            <div class="popular-feed-inner border-bottom p-2">
                                                <div class="thumbnail mt-2 ">
                                                    <a href="./proparty_details.php?id= <?= $houseid['id']?> ">
                                                        <img src="photo/<?= $houseid['name']?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="details mt-3">
                                                    <h5><?= $houseid['title']?></h5>
                                                    <ul>
                                                        <li>
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            <p><?= $houseid['location']?></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
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
                    <div class="col-md-3 col-6 ">
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
                    <div class="col-md-3 col-6 ">
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
                    <div class="col-md-3 col-6 ">
                        <h4>Categories</h4>
                        <div class="quick-link">
                            <ul>
                                <li><a href="https://idesign.vn/graphic-design/design-art-s-khac-bi-t-8740.php">Arts
                                        & Design</a> </li>
                                <li><a href="https://www.facebook.com/hashtag/Business/">Business</a> </li>
                                <li><a href="https://www.facebook.com/hashtag/ComputerScience/">Computer Science</a>
                                </li>
                                <li><a href="https://www.facebook.com/hashtag/DataScience/">Data Science</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
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
</div>
<button id="myBtn"><i class="fa-solid fa-chevron-up"></i></button>
<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="./assets/slick-1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="./assets/owl/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<script>
    var tabLinks = document.querySelectorAll(".tablinks");
    var tabContent = document.querySelectorAll(".tabcontent");

    tabLinks.forEach(function(el) {
        el.addEventListener("click", openTabs);
    });


    function openTabs(el) {
        var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
        var electronic = btn.dataset.electronic; // lấy giá trị trong data-floor

        tabContent.forEach(function(el) {
            el.classList.remove("active");
        });

        tabLinks.forEach(function(el) {
            el.classList.remove("active");
        });

        document.querySelector("#" + electronic).classList.add("active");

        btn.classList.add("active");
    }
</script>
<script>
    var tabLinkss = document.querySelectorAll(".tablinkss");
    var tabContentt = document.querySelectorAll(".tabcontentt");

    tabLinkss.forEach(function(el) {
        el.addEventListener("click", openTabs);
    });


    function openTabs(el) {
        var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
        var floor = btn.dataset.floor; // lấy giá trị trong data-floor

        tabContentt.forEach(function(el) {
            el.classList.remove("active");
        });

        tabLinkss.forEach(function(el) {
            el.classList.remove("active");
        });

        document.querySelector("#" + floor).classList.add("active");

        btn.classList.add("active");
    }
</script>
<!-- range -->
<script>
    var rangeSlider = function() {
        var slider = $('.range-slider'),
            range = $('.range'),
            value = $('.range');

        slider.each(function() {

            value.each(function() {
                var value = $(this).prev().attr('value');
                $(this).html(value);
            });

            range.on('input', function() {
                $(this).next(value).html(this.value);
            });
        });
    };

    rangeSlider();
</script>
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
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
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
<!-- sync -->
<script>
    $(document).ready(function() {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var sync3 = $("#sync3");
        var sync4 = $("#sync4");

        var slidesPerPage = 4;
        var syncedSecondary = true;

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: false,
            dots: true,
            loop: true,
            responsiveRefreshRate: 200,

        }).on('changed.owl.carousel', syncPosition);

        sync3.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: false,
            dots: true,
            loop: true,
            responsiveRefreshRate: 200,

        }).on('changed.owl.carousel', syncPosition);

        sync4.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: false,
            dots: true,
            loop: true,
            responsiveRefreshRate: 200,

        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function() {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: true,
                nav: true,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage,
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync3.data('owl.carousel').to(number, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync4.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
    });
</script>

<!-- btn -->
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
<script>
    function confirmDelete() {
        if (confirm("You want to delete this house ?"))
            return true;

        return false;
    }
</script>
<script>
    $(document).ready(function() {

        var data = {
            gallery: [{
                img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/murra.jpg",
                alt: "lorem"
            }, ]
        };

        var source = $('#template').html();
        var template = Handlebars.compile(source);
        $('#content').html(template(data));

    });

    $(window).load(function() {
        var $items = $('.item');
        $items.on({
            mousemove: function(e) {
                var $that = $(this);
                $that.find('.itemzoom > img').velocity({
                    translateZ: 0,
                    translateX: Math.floor((e.pageX - $that.offset().left) - ($that
                        .width() / 2)),
                    translateY: Math.floor((e.pageY - $that.offset().top) - ($that
                        .height() / 2)),
                    scale: '2'
                }, {
                    duration: 400,
                    easing: 'linear',
                    queue: false
                });
            },
            mouseleave: function() {
                $(this).find('.itemzoom> img').velocity({
                    translateZ: 0,
                    translateX: 0,
                    translateY: 0,
                    scale: '1'
                }, {
                    duration: 1000,
                    easing: 'easeOutSine',
                    queue: false
                });
            }
        });
    });
</script>
</body>

</html>