<?php
session_start();

require_once('utils/utility.php');
require_once('db/dbhelper.php');
include 'database/database.php';

$cart = [];
if (isset($_COOKIE['cart'])) {
    $json = $_COOKIE['cart'];
    $cart = json_decode($json, true);
}
$idList = [];
foreach ($cart as $item) {
    $idList[] = $item['id'];
}
if (count($idList) > 0) {
    $idList = implode(',', $idList);


    $sql = "select * from products where id in ($idList) ";
    $cartList = executeResult($sql);
} else {
    $cartList = [];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>THEGIOISUA.COM</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<style>
    .list-main li :hover{
        font-weight: bold;
        font-size: 20px;
    }
    .header.shop .nav li:hover a{
        background: #2ac37d;
        border-radius: 30px;
    }
</style>
<body>
    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar" style="background-color:#e28585 ;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li  style="color:#ffff ;"><i  style="color:#ffff ;" class="ti-headphone-alt"></i> +84 0979 840 906</li>
                                <li  style="color:#ffff ;"><i  style="color:#ffff ;" class="ti-email"></i> support@shopnxd.com</li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                <li  style="color:#ffff ;"><i  style="color:#ffff ;" class="ti-location-pin"></i> Địa chỉ</li>
                                <li  ><i  style="color:#ffff ;" class="ti-alarm-clock"></i> <a style="color:#ffff ;" href="#">Daily deal</a></li>
                                <!-- <?php
                                if (empty($_SESSION['fullname'])) { ?> -->
                                    <li  ><i  style="color:#ffff ;" class="ti-power-off"></i><a style="color:#ffff ;" href="database/login.php">Login</a></li>
                                    <!-- <li><i class="ti-power-off"></i><a href="database/logout.php">Logout</a></li> -->
                                <!-- <?php } else { ?> -->
                                    <li><i style="color:#ffff ;" class="ti-power-off"></i><a style="color:#ffff ;" href="database/logout.php">Logout</a></li>
                                <!-- <?php } ?> -->
                                <!-- <li>
                                    <p class="hint-text"><?php
                                                            if ($_SESSION) {
                                                                echo $_SESSION["fullname"];
                                                            } ?>
                                    </p>
                                </li> -->
                            </ul>
                        </div>
                        <!-- End Top Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="./images/logoo.png" alt="logo" style="max-width: 60%;"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form class="search-form">
                                    <input type="text" placeholder="Nhập..." name="search">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12" style="margin-top: 40px;">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <select>
                                    <option selected="selected">All</option>
                                </select>
                                <form>
                                    <input name="search" placeholder="Nhập thông tin tìm kiếm..." type="search">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12" style="margin-top: 40px;">
                        <div class="right-bar">
                            <!-- Search Form -->
                            <div class="sinlge-bar">
                                <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="sinlge-bar">
                                <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="sinlge-bar shopping">
                                <?php
                                $cart = [];
                                if (isset($_COOKIE['cart'])) {
                                    $json = $_COOKIE['cart'];
                                    $cart = json_decode($json, true);
                                }
                                $count = 0;
                                foreach ($cart as $item) {
                                    $count += $item['num'];
                                }
                                ?>
                                <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= $count ?></span></a>
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    <?php
                                    $count = 0;
                                    $total = 0;
                                    foreach ($cartList as $item) {
                                        $num = 0;

                                        foreach ($cart as $value) {
                                            if ($value['id'] == $item['id']) {
                                                $num = $value['num'];
                                                break;
                                            }
                                        }
                                        $total  += $num * $item['price'];
                                        echo '<ul class="shopping-list">
                                        <li>
                                        <a href="#" onclick="deleteCart(' . $item['id'] . ')"><i class="ti-trash remove-icon" ></i></a>
                                            <a class="cart-img" href="#"><img src="' . $item['thumbnail'] . '" alt="#"></a>
                                            <p class="quantity">1x - <span class="amount">$' . $item['price'] . '</span></p>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">$134.00</span>
                                        </div>
                                        <a href="checkout.php" class="btn animate">Checkout</a>
                                    </div>';
                                    }
                                    ?>

                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Inner -->
        <div class="header-inner" style="background-color: #ffff;margin-bottom: 30px;">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav" style="margin-left: 300px;">
                                                <li><a style="color:gray ;" href="index.php">Trang Chủ</a></li>
                                                <li><a style="color:gray ;" href="#">Sản Phẩm</a></li>
                                                <li><a style="color:gray ;" href="#">Cửa Hàng<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                    <ul class="dropdown">
                                                        <li><a style="color:gray ;" href="cart.php">Giỏ Hàng</a></li>
                                                        <li><a style="color:gray ;" href="checkout.php">Thanh Toán</a></li>
                                                    </ul>
                                                </li>
                                                <li><a style="color:gray ;" href="#">Blog<i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a style="color:gray ;" href="blog-single-sidebar.php">Blog Single Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a style="color:gray ;" href="contact.php">Liên Hệ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Color JS -->
    <script src="js/colors.js"></script>
    <!-- Slicknav JS -->
    <script src="js/slicknav.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="js/owl-carousel.js"></script>
    <!-- Magnific Popup JS -->
    <script src="js/magnific-popup.js"></script>
    <!-- Waypoints JS -->
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown JS -->
    <script src="js/finalcountdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="js/nicesellect.js"></script>
    <!-- Flex Slider JS -->
    <script src="js/flex-slider.js"></script>
    <!-- ScrollUp JS -->
    <script src="js/scrollup.js"></script>
    <!-- Onepage Nav JS -->
    <script src="js/onepage-nav.min.js"></script>
    <!-- Easing JS -->
    <script src="js/easing.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>