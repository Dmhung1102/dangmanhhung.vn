<?php
session_start();
if (isset($_SESSION['username']) == false) {
// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
    header('Location: http:/dangmanhhung.vn/login.php');
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
                        <h2 class="page-tittle">Add Proparty</h2>
                        <ul class="page-list">
                            <a href="./index.php">
                                <li>Home ></li>
                            </a>
                            <li>Add Proparty</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="add-area-property ">
        <div class="container bg-light p-0">
            <div class="add-property d-flex">
                <button class="add-property-button border-end" data-tab="#description">Description</button>
                <button class="add-property-button border-end" data-tab="#setlocation">Set Location</button>
                <button class="add-property-button border-end" data-tab="#gallary">Gallary</button>
                <button class="add-property-button border-end" data-tab="#additionalinfo">Additional Info</button>
                <button class="add-property-button" data-tab="#propertytype">Property Type</button>
            </div>
            <div class="list-property p-5 border">
                <form action="addproparty.php" method="post" enctype="multipart/form-data">
                    <div id="description" class="add-area active">
                        <div class="row">
                            <div class="col-12">
                                <div class="proparty-tittle">
                                    <div class="form-label">Proparty Tittle</div>
                                    <input type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Proparty Type</div>
                                    <select class="form-select" name="type">
                                        <option ></option>
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
                                        <option ></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Bedrooms</div>
                                    <select class="form-select" name="bedrooms">
                                        <option ></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Bathrooms</div>
                                    <select class="form-select" name="bathrooms">
                                        <option ></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Kitchen</div>
                                    <select class="form-select" name="kitchen">
                                        <option selected></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Living Room</div>
                                    <select class="form-select" name="livingroom">
                                        <option selected></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
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
                                    <input type="text" class="form-control" name="location">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Location Details</div>
                                    <input type="text" class="form-control" name="locationdetails"">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Floor (Apartment)</div>
                                    <input type="text" class="form-control" name="floorapartment">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Area</div>
                                    <input type="text" class="form-control" name="area">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Price</div>
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Floors</div>
                                    <select class="form-select" name="floors">
                                        <option selected></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-type">
                                    <div class="form-label">Orienten</div>
                                    <select class="form-select" name="orienten">
                                        <option selected></option>
                                        <option value="east">East</option>
                                        <option value="west">West</option>
                                        <option value="south">South</option>
                                        <option value="north">North</option>
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
                                    <input type="text" class="form-control" name="length">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="proparty-tittle">
                                    <div class="form-label">Width</div>
                                    <input type="text" class="form-control" name="width">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="proparty-tittle">
                                    <div class="form-label">Height</div>
                                    <input type="text" class="form-control" name="height">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Year Building</div>
                                    <input type="text" class="form-control" name="yearbuilding">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Ground</div>
                                    <input type="text" class="form-control" name="ground">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Pool Size</div>
                                    <input type="text" class="form-control" name="poolsize">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="proparty-tittle">
                                    <div class="form-label">Additional Room</div>
                                    <input type="text" class="form-control" name="additionalroom">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="proparty-tittle">
                                    <div class="form-label">Description</div>
                                    <input type="text" class="form-control" name="description">
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
                                        <option selected></option>
                                        <option value="none">None</option>
                                        <option value="full">Full</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proparty-type">
                                    <div class="form-label">Status</div>
                                    <select class="form-select" name="status">
                                        <option selected></option>
                                        <option value="In stock">In stock</option>
                                        <option value="Sold out">Sold out</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-label">
                                Amenities
                                <div class="col-12 border p-2 ">
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Air Conditioner</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="airconditioner">
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Fencing</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="fencing">
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Internet</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="internet">
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Hospital</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="hospital">
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">School</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="school">
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Park</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="park">
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">DishWater</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="dishwater">
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Floor Convering</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="floorconvering">
                                    </div>
                                    <div class="form-check form-check-inline col-3" >
                                        <label class="form-check-label" for="">Wardrobes</label>
                                        <input class="form-check-input" type="checkbox" name="amenities[]" value="wardrobes">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" onclick="setActiveTab('#propertytype')" class="btn">
                            Next
                        </a>
                    </div>
                    <div id="propertytype" class="add-area">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-label">Image</div>
                                <div class="input-imgs">
                                    <label for="image_uploads" class="position-absolute">Choose image to upload (PNG, JPG)</label>
                                    <input type="file" name="upimage" id="inputimage" onchange="previewImage(this)" multiple class="position-relative" />
                                    <div id="previewimage" class="setpreviewimg"></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-label">Album</div>
                                <div class="input-imgs m-0">
                                    <label for="image_uploads" class="position-absolute">Choose images to upload (PNG, JPG)</label>
                                    <input type="file" name="upimages[]" id="input" onchange="previewImage(this)" multiple class="position-relative" />
                                    <div id="preview" class="setpreviewimg"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 mt-2">
                                <div class="form-label">Estate location</div>
                                <div class="input-imgs">
                                    <label for="image_uploads" class="position-absolute">Choose images estate location to upload (PNG, JPG)</label>
                                    <input type="file" name="upestate[]" id="inputestate" onchange="previewImage(this)" multiple class="position-relative" />
                                    <div id="previewestate" class="setpreviewimg"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 mt-2">
                                <div class="form-label">Floors Plans</div>
                                <div class="input-imgs">
                                    <label for="image_uploads" class="position-absolute">Choose images floor plans to upload (PNG, JPG)</label>
                                    <input type="file" name="upfloor[]" id="inputfloor" onchange="previewImage(this)" multiple class="position-relative" />
                                    <div id="previewfloor" class="setpreviewimg"></div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="proparty-type">
                                    <div class="form-label">Location on google maps</div>
                                    <input type="text" class="form-control" name="iframe">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="proparty-type">
                                    <div class="form-label">Negotiated price</div>
                                    <select class="form-select" name="negotiatedprice">
                                        <option selected></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="proparty-type">
                                    <div class="form-label">Purpose</div>
                                    <select class="form-select" name="purpose">
                                        <option selected></option>
                                        <option value="sell">Sell</option>
                                        <option value="relax">Relax</option>
                                        <option value="rent">Rent</option>
                                    </select>
                                </div>
                            </div>

                            <!--                              <div class="col-md-6">-->
                            <!--                                  <div class="form-label">Album</div>-->
                            <!--                                  <div class="form-floating">-->
                            <!--                                      <textarea class="form-control" id="floatingTextarea" name="album"></textarea>-->
                            <!--                                  </div>-->
                            <!--                              </div>-->
                            <!--                              <div class="col-md-6">-->
                            <!--                                  <div class="form-label">Estate Location</div>-->
                            <!--                                  <div class="form-floating">-->
                            <!--                                      <textarea class="form-control"  id="floatingTextarea" name="estatelocation"></textarea>-->
                            <!--                                  </div>-->
                            <!--                              </div>-->
                            <!--                              <div class="col-md-6">-->
                            <!--                                  <div class="form-label">Floor Plans</div>-->
                            <!--                                  <div class="form-floating">-->
                            <!--                                      <textarea class="form-control" id="floatingTextarea" name="floorplans"></textarea>-->
                            <!--                                  </div>-->
                            <!--                              </div>-->
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
<!--    <script>-->
<!--        const input = document.querySelector('.input-imgs input');-->
<!--        const preview = document.querySelector('.preview');-->
<!---->
<!--        input.style.opacity = 0;-->
<!--        input.addEventListener('change', updateImageDisplay);-->
<!---->
<!--        function updateImageDisplay() {-->
<!--            while(preview.firstChild) {-->
<!--                preview.removeChild(preview.firstChild);-->
<!--            }-->
<!---->
<!--            const curFiles = input.files;-->
<!--            if (curFiles.length === 0) {-->
<!--                const para = document.createElement('p');-->
<!--                para.textContent = 'No files currently selected for upload';-->
<!--                preview.appendChild(para);-->
<!--            } else {-->
<!--                const list = document.createElement('ol');-->
<!--                preview.appendChild(list);-->
<!---->
<!--                for (const file of curFiles) {-->
<!--                    const listItem = document.createElement('li');-->
<!--                    const para = document.createElement('p');-->
<!--                    if (validFileType(file)) {-->
<!--                        para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;-->
<!--                        const image = document.createElement('img');-->
<!--                        image.src = URL.createObjectURL(file);-->
<!---->
<!--                        listItem.appendChild(image);-->
<!--                        listItem.appendChild(para);-->
<!--                    } else {-->
<!--                        para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;-->
<!--                        listItem.appendChild(para);-->
<!--                    }-->
<!---->
<!--                    list.appendChild(listItem);-->
<!--                }-->
<!--            }-->
<!--        }-->
<!---->
<!--        const fileTypes = [-->
<!--            "image/apng",-->
<!--            "image/bmp",-->
<!--            "image/gif",-->
<!--            "image/jpeg",-->
<!--            "image/pjpeg",-->
<!--            "image/png",-->
<!--            "image/svg+xml",-->
<!--            "image/tiff",-->
<!--            "image/webp",-->
<!--            "image/x-icon"-->
<!--        ];-->
<!---->
<!--        function validFileType(file) {-->
<!--            return fileTypes.includes(file.type);-->
<!--        }-->
<!--        function returnFileSize(number) {-->
<!--            if (number < 1024) {-->
<!--                return `${number} bytes`;-->
<!--            } else if (number >= 1024 && number < 1048576) {-->
<!--                return `${(number / 1024).toFixed(1)} KB`;-->
<!--            } else if (number >= 1048576) {-->
<!--                return `${(number / 1048576).toFixed(1)} MB`;-->
<!--            }-->
<!--        }-->
<!--    </script>-->
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