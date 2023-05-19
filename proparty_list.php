<?php
$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");
if (isset($_GET['purpose']) || isset($_GET['location']) || isset($_GET['locationindex']) || isset($_GET['purposeindex'])|| isset($_GET['search']) || isset($_GET['sort'])  || isset($_GET['pricesort'])) {
   if (isset($_GET['locationindex']) && isset($_GET['purposeindex']) && isset($_GET['pricesort'])) {
       $locationindex = $_GET['locationindex'];
       $purposeindex = $_GET['purposeindex'];
       $pricesort = $_GET['pricesort'];
       if ($pricesort=='<100k') {
           $priceget = 'price < 100000';
       }
       if ($pricesort=='>100k') {
           $priceget = 'price > 100000';
       }
       if ($pricesort=='100k-1000k') {
           $priceget = 'price BETWEEN 100000 AND 1000000';
       }
       $sqlQuery = "SELECT * FROM house as h JOIN  housealbum as a ON h.id = a.houseid WHERE location LIKE '%$locationindex%' AND purpose LIKE '%$purposeindex' AND $priceget AND purposeimg = 'image'" ;
   }

    if (isset($_GET['purpose'])) {
        $purpose = $_GET['purpose'];
        $sqlQuery = "SELECT h.equipment as equipment, h.livingroom as livingroom, h.status as status, h.locationdetails as locationdetails, h.length as length, h.width as width, h.location as location, h.yearbuilding as yearbuilding, h.description as description, h.title as title, h.id as id, h.purpose as purpose, h.price as price, h.bedrooms as bedrooms, h.bathrooms as bathrooms, h.area as area, a.name as name, a.purposeimg as purposeimg 
                        FROM housealbum as a JOIN house as h ON a.houseid = h.id WHERE purposeimg = 'image' AND purpose = '$purpose'";
    }
    if (isset($_GET['location'])) {
        $location = $_GET['location'];
        $sqlQuery = "SELECT * FROM house as h JOIN housealbum as a ON h.id = a.houseid  WHERE location = '$location' AND purposeimg = 'image'";
    }
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        if ($sort == 'area') {
            $condition = 'ORDER BY h.area DESC';
        }
        if ($sort == 'pricemin') {
            $condition = 'ORDER BY h.price + 0 ASC ';
        }
        if ($sort == 'pricemax') {
            $condition = 'ORDER BY h.price + 0 DESC';
        }
        $sqlQuery = "SELECT h.equipment as equipment, h.livingroom as livingroom, h.status as status, h.locationdetails as locationdetails, h.length as length, h.width as width, h.location as location, h.yearbuilding as yearbuilding, h.description as description, h.title as title, h.id as id, h.purpose as purpose, h.price as price, h.bedrooms as bedrooms, h.bathrooms as bathrooms, h.area as area, a.name as name, a.purposeimg as purposeimg 
                        FROM housealbum as a JOIN house as h ON a.houseid = h.id WHERE purposeimg = 'image'  $condition";
    }
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $key = $_GET['search'];
        $sqlQuery = "SELECT * FROM housealbum as a JOIN house as h ON a.houseid = h.id WHERE purposeimg = 'image' AND  location LIKE '%$key%' OR purposeimg = 'image' AND description LIKE '%$key%' OR type LIKE '%$key%' OR purposeimg = 'image' AND locationdetails LIKE '%$key%' OR purposeimg = 'image' AND orienten LIKE '%$key%'";
    }

} else {
    $sqlQuery = "SELECT * FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE purposeimg = 'image'";
}

$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
$dataHouse = $stmt -> fetchAll();


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

$sqlQueryRent= "SELECT * FROM house WHERE purpose ='rent'"  ;
$stmtRent = $connect->prepare($sqlQueryRent);
$stmtRent ->execute();
$dataRent = $stmtRent->fetchAll();

$sqlQuerySell = "SELECT * FROM house WHERE purpose ='sell'"  ;
$stmtSell = $connect->prepare($sqlQuerySell);
$stmtSell ->execute();
$dataSell = $stmtSell->fetchAll();

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
    <title>Proparty-List</title>
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
                            <h2 class="page-tittle">Proparty List</h2>
                            <ul class="page-list">
                                <a href="./index.php">
                                    <li>Home ></li>
                                </a>
                                <li>Proparty List</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
        <div class="proparty-list-area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 px-5 ">
                        <div class="search-proparty">
                            <h3>
                                <?php
                                $soluong = count($dataHouse) ;
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
                                    <li><a class="dropdown-item" href="?sort=area" ">Area</a></li>
                                    <li><a class="dropdown-item" href="?sort=pricemin">Price (Min -> Max)</a></li>
                                    <li><a class="dropdown-item" href="?sort=pricemax">Price (Max -> Min)</a></li>
                                </ul>
                              </div>
                           <div class="list-icon-right">
                                <i class="fa-solid fa-list"></i>
                           </div>
                        </div>
                        <div class="w3-content mt-5">
                            <div class="mySlides">
                                <div class="list-proparty">
                                    <div class="row ">
                                        <?php  foreach ($dataHouse as $datahousekey => $houseid): ?>
                                        <div class="col-lg-6 mb-3">
                                            <a href="./proparty_details.php?id= <?= $houseid['id']?>"><img src="photo/<?= $houseid['name']?>"></a>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="in4-apartment p-3">
                                                <div class="propartes-wrap-details">
                                                    <h4 class="mt-2">
                                                        <?= $houseid['title'] ?>
                                                    </h4>
                                                    <ul class="propartes-inner">
                                                        <li>
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            <?= $houseid['area']?>, <?= $houseid['locationdetails']?>, <?= $houseid['location'] ?>
                                                        </li>
                                                        <li>
                                                            <a href="" class="text-light">For <?= $houseid['purpose']?></a>
                                                        </li>
                                                    </ul>
                                                    <p class="fs-6"><?= $houseid['description'] ?></p>
                                                    <span>$ <?= number_format($houseid['price'])?></span>
                                                    <ul>
                                                        <li>Bedrooms : <?= $houseid['bedrooms']?></li>
                                                        <li>Bathrooms : <?= $houseid['bathrooms']?></li>
                                                        <li>Size :<?=  $ceiled =  ceil($area = $houseid['width'] * $houseid['length']) ?> sqft</li>
                                                    </ul>
                                                    <ul>
                                                        <li>Yearbuilding : <?= $houseid['yearbuilding']?></li>
                                                        <li class="text-capitalize">Equipment : <?= $houseid['equipment']?></li>
                                                        <li class="text-capitalize">Status: <?= $houseid['status']?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mySlides">
                                <div class="list-proparty">
                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <a href="./proparty_details.php"><img src="./assets/img/proparty-details/png8.jpg" alt=""></a>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="in4-apartment p-3">
                                                <div class="propartes-wrap-details">
                                                    <h4 class="mt-2">
                                                        Daily Apartment 1
                                                    </h4>
                                                    <ul class="propartes-inner">
                                                        <li>
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            New York
                                                        </li>
                                                        <li>
                                                            <a href="">For Sell</a>
                                                        </li>
                                                    </ul>
                                                    <p class="fs-6">Lorem ipsum dolor consectetur </p>
                                                    <span>$ 80,650.00</span>
                                                    <ul>
                                                        <li>Bedroom : 3</li>
                                                        <li>Bathroom : 2</li>
                                                        <li>Size : 1026 sq ft</li>
                                                    </ul>
                                                    <a href="#">
                                                        <i class="fa-solid fa-user-tie"></i>
                                                        MD Mrikon
                                                    </a>
                                                    <span>|</span>
                                                    <a href="#">
                                                        Compare
                                                    </a>
                                                    <span>|</span>
                                                    <a href="#">
                                                        Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-proparty">
                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <a href="./proparty_details.php"><img src="./assets/img/proparty-details/png10.png" alt=""></a>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="in4-apartment p-3">
                                                <div class="propartes-wrap-details">
                                                    <h4 class="mt-2">
                                                        Daily Apartment 1
                                                    </h4>
                                                    <ul class="propartes-inner">
                                                        <li>
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            New York
                                                        </li>
                                                        <li>
                                                            <a href="">For Sell</a>
                                                        </li>
                                                    </ul>
                                                    <p class="fs-6">Lorem ipsum dolor consectetur </p>
                                                    <span>$ 80,650.00</span>
                                                    <ul>
                                                        <li>Bedroom : 3</li>
                                                        <li>Bathroom : 2</li>
                                                        <li>Size : 1026 sq ft</li>
                                                    </ul>
                                                    <a href="#">
                                                        <i class="fa-solid fa-user-tie"></i>
                                                        MD Mrikon
                                                    </a>
                                                    <span>|</span>
                                                    <a href="#">
                                                        Compare
                                                    </a>
                                                    <span>|</span>
                                                    <a href="#">
                                                        Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mySlides">
                                <div class="list-proparty">
                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <a href="./proparty_details.php"><img src="./assets/img/proparty-details/png10.png" alt=""></a>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="in4-apartment p-3">
                                                <div class="propartes-wrap-details">
                                                    <h4 class="mt-2">
                                                        Daily Apartment 1
                                                    </h4>
                                                    <ul class="propartes-inner">
                                                        <li>
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            New York
                                                        </li>
                                                        <li>
                                                            <a href="">For Sell</a>
                                                        </li>
                                                    </ul>
                                                    <p class="fs-6">Lorem ipsum dolor consectetur </p>
                                                    <span>$ 80,650.00</span>
                                                    <ul>
                                                        <li>Bedroom : 3</li>
                                                        <li>Bathroom : 2</li>
                                                        <li>Size : 1026 sq ft</li>
                                                    </ul>
                                                    <a href="#">
                                                        <i class="fa-solid fa-user-tie"></i>
                                                        MD Mrikon
                                                    </a>
                                                    <span>|</span>
                                                    <a href="#">
                                                        Compare
                                                    </a>
                                                    <span>|</span>
                                                    <a href="#">
                                                        Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-proparty">
                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <a href="./proparty_details.php"><img src="./assets/img/proparty-details/png10.png" alt=""></a>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="in4-apartment p-3">
                                                <div class="propartes-wrap-details">
                                                    <h4 class="mt-2">
                                                        Daily Apartment 1
                                                    </h4>
                                                    <ul class="propartes-inner">
                                                        <li>
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            New York
                                                        </li>
                                                        <li>
                                                            <a href="">For Sell</a>
                                                        </li>
                                                    </ul>
                                                    <p class="fs-6">Lorem ipsum dolor consectetur </p>
                                                    <span>$ 80,650.00</span>
                                                    <ul>
                                                        <li>Bedroom : 3</li>
                                                        <li>Bathroom : 2</li>
                                                        <li>Size : 1026 sq ft</li>
                                                    </ul>
                                                    <a href="#">
                                                        <i class="fa-solid fa-user-tie"></i>
                                                        MD Mrikon
                                                    </a>
                                                    <span>|</span>
                                                    <a href="#">
                                                        Compare
                                                    </a>
                                                    <span>|</span>
                                                    <a href="#">
                                                        Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                        <div class="w3-center mb-5">
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
                    <div class="col-lg-4 px-5 ">

                        <div class="price-area">
                            <div class="comment">
                                <h3>Categories</h3>
                            </div>
                            <div class="categories-in4 justify-content-between">
                                <div class="categories-left">
                                    <ul>
                                        <li>Rent</li>
                                        <li>Sell</li>
                                    </ul>
                                </div>
                                <div class="categories-right text-center">
                                    <ul>
                                        <li> (<?php
                                            $soluong = count($dataRent) ;
                                            echo  $soluong ;
                                            ?>)
                                        </li>
                                        <li>(<?php
                                            $soluong = count($dataSell) ;
                                            echo  $soluong ;
                                            ?>)
                                        </li>
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
                                <?php foreach ($dataPopular as $housell => $propertysell):?>
                                    <div class="popular-feed-inner border-bottom mt-2">
                                        <a href="proparty_details.php?id= <?= $propertysell['id']?>">
                                            <div class="thumbnail mt-2 ">
                                                <img src="photo/<?= $propertysell['name']?>" >
                                            </div>
                                        </a>

                                        <div class="details mt-2 py-2">
                                            <h5><?= $propertysell['title'] ?></h5>
                                            <ul>
                                                <li>
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <p><?= $propertysell['location']?></p>

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
    </body>
</html>