<?php
session_start();
$connect = new PDO("mysql:host=127.0.0.1;dbname=mingrand;charset=utf8",
    "root", "Dmhung1102!");
$id = $_GET['id'];
$_SESSION['id'] = $id;
$sqlQuery = "SELECT * FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE h.id = $id";
$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
$house = $stmt -> fetch();
$amenities = json_decode($house['amenities'], true);

$sqlQueryImage = "SELECT name FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE  a.purposeimg = 'image' AND h.id= $id";
$stmtImage = $connect->prepare($sqlQueryImage);
$stmtImage ->execute();
$image = $stmtImage->fetch();

$sqlQueryAlbum = "SELECT name FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE  a.purposeimg = 'album' AND h.id= $id";
$stmtAlbum = $connect->prepare($sqlQueryAlbum);
$stmtAlbum ->execute();
$album = $stmtAlbum->fetchAll();

$sqlQueryEstate = "SELECT name FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE  a.purposeimg = 'estate' AND h.id= $id";
$stmtEstate = $connect->prepare($sqlQueryEstate);
$stmtEstate->execute();
$estate= $stmtEstate -> fetchAll();

$sqlQueryFloor= "SELECT name FROM house as h JOIN housealbum as a ON h.id = a.houseid WHERE  a.purposeimg = 'floor' AND h.id= $id";
$stmtFloor= $connect->prepare($sqlQueryFloor);
$stmtFloor->execute();
$floor= $stmtFloor -> fetchAll();

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
                        <h2 class="page-tittle">Edit page</h2>
                        <ul class="page-list">
                            <a href="./index.php">
                                <li>Home ></li>
                            </a>
                            <li>Edit page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="add-area-property ">
        <div class="container bg-light p-0">
            <div class="add-property d-flex">
                <button class="add-property-button" data-tab="#propertytype">Property Type</button>
                <button class="add-property-button border-end" data-tab="#description">Description</button>
                <button class="add-property-button border-end" data-tab="#setlocation">Set Location</button>
                <button class="add-property-button border-end" data-tab="#gallary">Gallary</button>
                <button class="add-property-button border-end" data-tab="#additionalinfo">Additional Info</button>

            </div>
            <div class="list-property py-5 px-3 border">
                <form action="updateproparty.php" method="post" enctype="multipart/form-data">
                    <div id="propertytype" class="add-area active">
                        <div class="row">
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Image</div>
                                    <div class="input-imgs">
                                        <!--                                    <input type="text" class="form-control" name="image" value="-->
                                        <?php //=$house['image'] ?><!--" >-->
                                        <label for="image_uploads" class="position-absolute">Choose image to update
                                            (PNG, JPG)</label>
                                        <input type="file" name="upimage" id="inputimage" onchange="previewImage(this)"
                                               class="position-relative" value="<?= $image['name'] ?>"/>

                                        <div id="previewimage" class="setpreviewimg mt-4"></div>
                                        <?php
                                        echo "<a class='delete-album' href = './deleteimg.php?name=". $image['name'] ."&houseid=" . $id ."&purpose=image'>X</a>";
                                        echo "<img src='photo/" . $image['name'] . "' >";
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-label">Album</div>
                                <div class="input-imgs m-0 ">
                                    <label for="image_uploads" class="position-absolute">Choose images to upload (PNG, JPG)</label>
                                    <input type="file" name="upimages[]" id="input" onchange="previewImage(this)" multiple class="position-relative" />
                                    <div id="preview" class="setpreviewimg mt-4">
                                        <?php foreach ($album as $albumkey => $imgalbum): ?>
                                            <?php
                                            echo "<a class='delete-album' href = './deleteimg.php?name=". $imgalbum['name'] ."&houseid=" . $id ."&purpose=album'>X</a>";
                                            echo "<img src='photo/" . $imgalbum['name'] . "' >";
                                            ?>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-6 mt-2">
                                <div class="form-label">Estate location</div>
                                <div class="input-imgs">
                                    <label for="image_uploads" class="position-absolute">Choose images estate location to upload (PNG, JPG)</label>
                                    <input type="file" name="upestate[]" id="inputestate" onchange="previewImage(this)" multiple class="position-relative" />
                                    <div id="previewestate" class="setpreviewimg mt-4">
                                        <?php foreach ($estate as $estatekey => $imgestate): ?>
                                            <?php
                                            echo "<a class='delete-album' href = './deleteimg.php?name=". $imgestate['name'] ."&houseid=" . $id ."&purpose=estate'>X</a>";
                                            echo "<img src='photo/" . $imgestate['name'] . "' >";
                                            ?>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-6 mt-2">
                                <div class="form-label">Floors Plans</div>
                                <div class="input-imgs">
                                    <label for="image_uploads" class="position-absolute">Choose images floor plans to upload (PNG, JPG)</label>
                                    <input type="file" name="upfloor[]" id="inputfloor" onchange="previewImage(this)" multiple class="position-relative" />
                                    <div id="previewfloor" class="setpreviewimg mt-4">
                                        <?php foreach ($floor as $floorkey => $imgfloor): ?>
                                            <?php
                                            echo "<a class='delete-album' href = './deleteimg.php?name=". $imgfloor['name'] ."&houseid=" . $id ."&purpose=floor'>X</a>";
                                            echo "<img src='photo/" . $imgfloor['name'] . "' >";
                                            ?>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="proparty-type">
                                    <div class="form-label">Location on google maps</div>
                                    <input type="text" class="form-control" name="iframe" value="<?=$house['iframe'] ?>" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Negotiated price</div>
                                    <select class="form-select" name="negotiatedprice">
                                        <option selected></option>
                                        <option value="yes" <?= $house['negotiatedprice'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                                        <option value="no" <?= $house['negotiatedprice'] == 'no' ? 'selected' : '' ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Purpose</div>
                                    <select class="form-select" name="purpose">
                                        <option value="sell" <?= $house['purpose'] == 'sell' ? 'selected' : '' ?>>Sell</option>
                                        <option value="relax" <?= $house['purpose'] == 'relax' ? 'selected' : ''?>>Relax</option>
                                        <option value="rent" <?= $house['purpose'] == 'rent' ? 'selected' : ''?>>Rent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" onclick="setActiveTab('#description')" class="btn">
                            Next
                        </a>
                    </div>
                    <div id="description" class="add-area ">
                        <div class="row">
                            <div class="col-12">
                                <div class="proparty-tittle">
                                    <div class="form-label">Proparty Tittle</div>
                                    <input type="text" class="form-control" name="title" value="<?=  $house['title']  ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Proparty Type</div>
                                    <select class="form-select" name="type">
                                        <option ><?=$house['type'] ?></option>
                                        <option value="villa">Villa</option>
                                        <option value="resort">Resort</option>
                                        <option value="bungalow">Bungalow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Garages</div>
                                    <select class="form-select" name="garages">
                                        <option value="1" <?= $house['garages'] == '1' ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $house['garages'] == '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= $house['garages'] == '3' ? 'selected' : '' ?>>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Bedrooms</div>
                                    <select class="form-select" name="bedrooms">
                                        <option value="1" <?= $house['bedrooms'] == '1' ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $house['bedrooms'] == '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= $house['bedrooms'] == '3' ? 'selected' : '' ?>>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Bathrooms</div>
                                    <select class="form-select" name="bathrooms">
                                        <option value="1" <?= $house['bathrooms'] == '1' ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $house['bathrooms'] == '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= $house['bathrooms'] == '3' ? 'selected' : '' ?>>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Kitchen</div>
                                    <select class="form-select" name="kitchen">
                                        <option value="1" <?= $house['kitchen'] == '1' ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $house['kitchen'] == '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= $house['kitchen'] == '3' ? 'selected' : '' ?>>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Living Room</div>
                                    <select class="form-select" name="livingroom">
                                        <option value="1" <?= $house['livingroom'] == '1' ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $house['livingroom'] == '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= $house['livingroom'] == '3' ? 'selected' : '' ?>>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" onclick="setActiveTab('#setlocation')" class="btn">
                            Next
                        </a>
                    </div>
                    <div id="setlocation" class="add-area">
                        <div class="row">
                            <div class="col-12">
                                <div class="proparty-tittle">
                                    <div class="form-label">Location</div>
                                    <input type="text" class="form-control" name="location" value="<?=$house['location'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Location Details</div>
                                    <input type="text" class="form-control" name="locationdetails" value="<?=$house['locationdetails'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Floor (Apartment)</div>
                                    <input type="text" class="form-control" name="floorapartment" value="<?=$house['floorapartment'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Area</div>
                                    <input type="text" class="form-control" name="area" value="<?=$house['area'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Price</div>
                                    <input type="text" class="form-control" name="price" value="<?=$house['price'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Floors</div>
                                    <select class="form-select" name="floors">
                                        <option value="1" <?= $house['floors'] == '1' ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $house['floors'] == '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= $house['floors'] == '3' ? 'selected' : '' ?>>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Orienten</div>
                                    <select class="form-select" name="orienten">
                                        <option value="east" <?= $house['orienten'] == 'east' ? 'selected' : '' ?>>East</option>
                                        <option value="west" <?= $house['orienten'] == 'west' ? 'selected' : '' ?>>West</option>
                                        <option value="south" <?= $house['orienten'] == 'south' ? 'selected' : '' ?>>South</option>
                                        <option value="north" <?= $house['orienten'] == 'north' ? 'selected' : '' ?>>North</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" onclick="setActiveTab('#gallary')" class="btn">
                            Next
                        </a>
                    </div>
                    <div id="gallary" class="add-area">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="proparty-tittle">
                                    <div class="form-label">Length</div>
                                    <input type="text" class="form-control" name="length" value="<?=$house['length'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="proparty-tittle">
                                    <div class="form-label">Width</div>
                                    <input type="text" class="form-control" name="width" value="<?=$house['width'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="proparty-tittle">
                                    <div class="form-label">Height</div>
                                    <input type="text" class="form-control" name="height" value="<?=$house['height'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Year Building</div>
                                    <input type="text" class="form-control" name="yearbuilding" value="<?=$house['yearbuilding'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Ground</div>
                                    <input type="text" class="form-control" name="ground" value="<?=$house['ground'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Pool Size</div>
                                    <input type="text" class="form-control" name="poolsize" value="<?=$house['poolsize'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Additional Room</div>
                                    <input type="text" class="form-control" name="additionalroom" value="<?=$house['additionalroom'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="proparty-tittle">
                                    <div class="form-label">Description</div>
                                    <input type="text" class="form-control" name="description" value="<?=$house['description'] ?>">
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" onclick="setActiveTab('#additionalinfo')" class="btn mt-1">
                            Next
                        </a>
                    </div>
                    <div id="additionalinfo" class="add-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Equipment</div>
                                    <select class="form-select" name="equipment">
                                        <option ><?=$house['equipment'] ?></option>
                                        <option value="none">None</option>
                                        <option value="full">Full</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Status</div>
                                    <select class="form-select" name="status">
                                        <option ><?=$house['status'] ?></option>
                                        <option value="In stock">In stock</option>
                                        <option value="sold out">Sold out</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-label">
                                Amenities
                                <div class="col-12 border p-2 ">
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Air Conditioner</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="airconditioner"<?= in_array('airconditioner' ,$amenities) ? 'checked' :''?>>
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Fencing</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="fencing" <?= in_array('fencing',$amenities) ? 'checked' : '' ?>>
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Internet</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="internet" <?= in_array('internet',$amenities) ? 'checked' : ''?>>
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Hospital</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="hospital" <?= in_array('hospital',$amenities) ? 'checked' : ''?>>
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">School</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="school" <?= in_array('school',$amenities) ? 'checked' : ''?>>
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Park</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="park" <?= in_array('park',$amenities) ? 'checked' : ''?>>
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">DishWater</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="dishwater"<?= in_array('dishwater',$amenities) ? 'checked' : ''?>>
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Floor Convering</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="floorconvering"<?= in_array('floorconvering',$amenities) ? 'checked' : ''?>>
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Wardrobes</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="wardrobes" <?= in_array('wardrobes',$amenities) ? 'checked' : '' ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button name="saveupdate" class="btnsave mt-2 border-0 px-2 py-1 rounded-2">
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

<!--    image-->
<script>
    // Lấy thẻ input và đăng ký sự kiện khi chọn tệp
    const input = document.getElementById('input');
    input.style.opacity = 0 ;
    input.addEventListener('change', function(e) {
        // Lấy danh sách các tệp được chọn
        const files = e.target.files;
        // Duyệt qua từng tệp để đọc và hiển thị
        for (let i = 0; i < files.length; i++) {
            // Đọc nội dung của tệp bằng FileReader
            const reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function() {
                // Tạo thẻ img và hiển thị ảnh được chọn
                const img = document.createElement('img');
                img.src = reader.result;
                document.getElementById('preview').appendChild(img);
            }
        }
    });
</script>
<!--    album-->
<script>
    // Lấy thẻ input và đăng ký sự kiện khi chọn tệp
    const inputimage = document.getElementById('inputimage');
    inputimage.style.opacity = 0 ;
    inputimage.addEventListener('change', function(e) {
        // Lấy danh sách các tệp được chọn
        const files = e.target.files;
        // Duyệt qua từng tệp để đọc và hiển thị
        for (let i = 0; i < files.length; i++) {
            // Đọc nội dung của tệp bằng FileReader
            const reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function() {
                // Tạo thẻ img và hiển thị ảnh được chọn
                const img = document.createElement('img');
                img.src = reader.result;
                document.getElementById('previewimage').appendChild(img);
            }
        }
    });
</script>
<!--    estate-->
<script>
    // Lấy thẻ input và đăng ký sự kiện khi chọn tệp
    const inputestate = document.getElementById('inputestate');
    inputestate.style.opacity = 0 ;
    inputestate.addEventListener('change', function(e) {
        // Lấy danh sách các tệp được chọn
        const files = e.target.files;
        // Duyệt qua từng tệp để đọc và hiển thị
        for (let i = 0; i < files.length; i++) {
            // Đọc nội dung của tệp bằng FileReader
            const reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function() {
                // Tạo thẻ img và hiển thị ảnh được chọn
                const img = document.createElement('img');
                img.src = reader.result;
                document.getElementById('previewestate').appendChild(img);
            }
        }
    });
</script>
<!--    floor-->
<script>
    // Lấy thẻ input và đăng ký sự kiện khi chọn tệp
    const inputfloor = document.getElementById('inputfloor');
    inputfloor.style.opacity = 0 ;
    inputfloor.addEventListener('change', function(e) {
        // Lấy danh sách các tệp được chọn
        const files = e.target.files;
        // Duyệt qua từng tệp để đọc và hiển thị
        for (let i = 0; i < files.length; i++) {
            // Đọc nội dung của tệp bằng FileReader
            const reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function() {
                // Tạo thẻ img và hiển thị ảnh được chọn
                const img = document.createElement('img');
                img.src = reader.result;
                document.getElementById('previewfloor').appendChild(img);
            }
        }
    });
</script>

</body>

</html>
