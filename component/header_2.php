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


    $sql = "select * from san_pham where id in ($idList) ";
    $cartList = executeResult($sql);
} else {
    $cartList = [];
}

?>


<style>
    .list-main li :hover {
        font-weight: bold;

    }

    .header.shop .nav li:hover a {
        background: #2ac37d;
        border-radius: 30px;
    }
</style>

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
                            <li style="color:#ffff ;"><i style="color:#ffff ;" class="ti-headphone-alt"></i> +84 0979 840 906</li>
                            <li style="color:#ffff ;"><i style="color:#ffff ;" class="ti-email"></i> support@shopnxd.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <?php if (empty($_SESSION['id'])) { ?>
                                <li><i style="color: #ffff;font-size: 14px;" class="fa-solid fa-user"></i><a style="color:#ffff ;" href="login.php">Đăng Nhập</a></li>
                                <li><i style="color: #ffff;font-size: 14px;" class="fa-solid fa-right-to-bracket"></i><a style="color:#ffff ;" href="register.php">Đăng Ký</a></li>
                            <?php } else { ?>
                                <li><i style="color: #ffff;font-size: 14px;" class="fa-solid fa-user"></i><a style="color:#ffff ;" href=""><?php echo $_SESSION['name'] ?></a></li>
                                <li><i style="color: #ffff;font-size: 14px;" class="fa-solid fa-right-from-bracket"></i><a style="color:#ffff ;" href="logout.php">Đăng Xuất</a></li>
                            <?php } ?>
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
                            <a href="../cart.php" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= $count ?></span></a>
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
                                    $total  += $num * $item['khuyen_mai'];
                                    echo '<ul class="shopping-list">
                                        <li>
                                        <a href="#" onclick="deleteCart(' . $item['id'] . ')"><i class="ti-trash remove-icon" ></i></a>
                                            <a class="cart-img" href="#"><img src="' . $item['anh'] . '" alt="#"></a>
                                            <p class="quantity">1x - <span class="amount">' . $item['khuyen_mai'] . 'đ</span></p>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">' . $total . '</span>
                                        </div>
                                    </div>';
                                }
                                ?>
                                <a href="checkout.php" class="btn animate">Checkout</a>
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
                                        <ul class="nav main-menu menu navbar-nav" style="margin-left: 310px;">
                                            <li><a style="color:gray ;" href="index.php">Trang Chủ</a></li>
                                            <li><a style="color:gray ;" href="#">Sản Phẩm<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a style="color:gray ;" href="product_1.php">Chăm Sóc Da</a></li>
                                                    <li><a style="color:gray ;" href="product_2.php">Trang Điểm</a></li>
                                                </ul>
                                            </li>
                                            <li><a style="color:gray ;" href="#">Cửa Hàng<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a style="color:gray ;" href="cart.php">Giỏ Hàng</a></li>
                                                    <li><a style="color:gray ;" href="checkout.php">Thanh Toán</a></li>
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