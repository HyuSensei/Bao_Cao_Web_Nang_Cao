<?php
require_once('utils/utility.php');
require_once('db/dbhelper.php');

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
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>SKINLELE.COM</title>
   <?php include('css-libary.php') ?>
</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                                <li><i class="ti-email"></i> support@shopnxd.com</li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                <li><i class="ti-location-pin"></i> Store location</li>
                                <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
                                <li><i class="ti-power-off"></i><a href="database/login.php">Login</a></li>
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
                            <a href="index.php"><img src="./images/design_sua/logo.png" alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form class="search-form">
                                    <input type="text" placeholder="Search here..." name="search">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <select>
                                    <option selected="selected">All Category</option>
                                </select>
                                <form>
                                    <input name="search" placeholder="Search Products Here....." type="search">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
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
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li><a href="index.php">Home</a></li>
                                                <li><a href="#">Product</a></li>
                                                <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                    <ul class="dropdown">
                                                        <li><a href="cart.php">Cart</a></li>
                                                        <li><a href="checkout.php">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <li class="active"><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li class="active"><a href="blog-single-sidebar.php">Blog Single Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.php">Contact Us</a></li>
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

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.php">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.php">Blog Single Sidebar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="image">
                                    <img src="./images/design_sua/blog_1.png" alt="#">
                                </div>
                                <div class="blog-detail">
                                    <h2 class="blog-title">Milk and other dairy products are the top source of saturated fat in the American diet, contributing to heart disease, type 2 diabetes, and Alzheimer’s disease. Studies have also linked dairy to an increased risk of breast, ovarian, and prostate cancers.</h2>
                                    <div class="blog-meta">
                                        <span class="author"><a href="#"><i class="fa fa-user"></i>By Admin</a><a href="#"><i class="fa fa-calendar"></i>Dec 24, 2018</a><a href="#"><i class="fa fa-comments"></i>Comment (15)</a></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="blog-title">Saturated Fat and Heart Disease</h2>
                                        <p>Milk and other dairy products are the top sources of artery-clogging saturated fat in the American diet. Milk products also contain cholesterol. Diets high in fat, saturated fat, and cholesterol increase the risk of heart disease, which remains America’s top killer. Cheese is especially dangerous. Typical cheeses are 70 percent fat.</p>
                                        <h2 class="blog-title">Lactose Intolerance</h2>
                                        <blockquote> <i class="fa fa-quote-left"></i> Infants and children produce enzymes that break down lactose, the sugar found in breast milk and cow’s milk, but as we grow up, many of us lose this capacity. Lactose intolerance is common, affecting about 95 percent of Asian Americans, 74 percent of Native Americans, 70 percent of African Americans, 53 percent of Mexican Americans, and 15 percent of Caucasians. Symptoms include upset stomach, diarrhea, and gas.</blockquote>
                                        <h2 class="blog-title">Bone Health</h2>Cancer
                                        <blockquote> <i class="fa fa-quote-left"></i> Research shows that dairy products have little or no benefit for bone health. According to an analysis published in the British Medical Journal, most studies fail to show any link between dairy intake and broken bones, or fractures. In one study, researchers tracked the diets, exercise, and stress fracture rates of adolescent girls and concluded that dairy products and calcium do not prevent stress fractures. Another study of more than 96,000 people found that the more milk men consumed as teenagers, the more bone fractures they experienced as adults. Learn about how to build strong bones on a plant-based diet. </blockquote>
                                        <h2 class="blog-title">Cancer</h2>
                                        <p>Research has linked the high fat content and hormones in milk, cheese, and other dairy products to breast cancer.

                                            One study of nearly 10,000 women found that those who consume low-fat diets have a 23% lower risk for breast cancer recurrence. They also have a 17% lower risk of dying from the disease.

                                            A 2017 study funded by the National Cancer Institute that compared the diets of women diagnosed with breast cancer to those without breast cancer found that those who consumed the most American, cheddar, and cream cheeses had a 53% higher risk for breast cancer.

                                            The Life After Cancer Epidemiology study found that, among women previously diagnosed with breast cancer, those consuming one or more servings of high-fat dairy products (e.g., cheese, ice cream, whole milk) daily had a 49% higher breast cancer mortality, compared with those consuming less than one-half serving daily.

                                            Research funded by the National Cancer Institute, the National Institutes of Health, and the World Cancer Research Fund, found that women who consumed 1/4 to 1/3 cup of cow’s milk per day had a 30% increased chance for breast cancer. One cup per day increased the risk by 50%, and 2-3 cups were associated with an 80% increased chance of breast cancer. But the study cites research showing that vegans, but not lacto-ovo-vegetarians, experience less breast cancer than nonvegetarians.

                                            Regular consumption of dairy products has also been linked to prostate cancer.

                                            High intakes of dairy products including whole and low-fat milk increase the risk for prostate cancer, according to a meta-analysis that looked at 32 studies. In another study, men who consumed three or more servings of dairy products a day had a 141% higher risk for death due to prostate cancer compared to those who consumed less than one serving.

                                            But avoiding dairy products and eating a more plant-based diet may help protect the prostate. A study published in the American Journal of Clinical Nutrition found that men who followed a vegan diet had a 35% lower prostate cancer risk than those following a nonvegetarian, lacto-ovo-vegetarian, pesco-vegetarian, or semi-vegetarian diet. </p>


                                        <h2 class="blog-title">Health Concerns About Dairy Fact Sheet</h2>

                                        <p>Many Americans, including some vegetarians, still consume substantial amounts of dairy products. And government policies still promote these products, despite scientific evidence that questions their health benefits and indicates their potential health risks. Though dairy is marketed as an essential food for strong bones, there is more to the story. Some important things to consider include potential health problems like heart disease, certain cancers, digestive problems, and type 1 diabetes.</p>
                                    </div>
                                </div>
                                <div class="share-social">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-tags">
                                                <h4>Tags:</h4>
                                                <ul class="tag-inner">
                                                    <li><a href="#">Glass</a></li>
                                                    <li><a href="#">Pant</a></li>
                                                    <li><a href="#">t-shirt</a></li>
                                                    <li><a href="#">swater</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="comments">
                                    <h3 class="comment-title">Comments (3)</h3>
                                    <!-- Single Comment -->
                                    <div class="single-comment">
                                        <img src="https://via.placeholder.com/80x80" alt="#">
                                        <div class="content">
                                            <h4>Alisa harm <span>At 8:59 pm On Feb 28, 2018</span></h4>
                                            <p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee Phosfluorescently leverage.</p>
                                            <div class="button">
                                                <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Comment -->
                                    <!-- Single Comment -->
                                    <div class="single-comment left">
                                        <img src="https://via.placeholder.com/80x80" alt="#">
                                        <div class="content">
                                            <h4>john deo <span>Feb 28, 2018 at 8:59 pm</span></h4>
                                            <p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee Phosfluorescently leverage.</p>
                                            <div class="button">
                                                <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Comment -->
                                    <!-- Single Comment -->
                                    <div class="single-comment">
                                        <img src="https://via.placeholder.com/80x80" alt="#">
                                        <div class="content">
                                            <h4>megan mart <span>Feb 28, 2018 at 8:59 pm</span></h4>
                                            <p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee Phosfluorescently leverage.</p>
                                            <div class="button">
                                                <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Comment -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="reply">
                                    <div class="reply-head">
                                        <h2 class="reply-title">Leave a Comment</h2>
                                        <!-- Comment Form -->
                                        <form class="form" action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Your Name<span>*</span></label>
                                                        <input type="text" name="name" placeholder="" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Your Email<span>*</span></label>
                                                        <input type="email" name="email" placeholder="" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Your Message<span>*</span></label>
                                                        <textarea name="message" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <button type="submit" class="btn">Post comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Comment Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <div class="form">
                                <input type="email" placeholder="Search Here...">
                                <a class="button" href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Blog Categories</h3>
                            <ul class="categor-list">
                                <li><a href="#">Men's Apparel</a></li>
                                <li><a href="#">Women's Apparel</a></li>
                                <li><a href="#">Bags Collection</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Sun Glasses</a></li>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!-- <div class="single-widget recent-post">
                            <h3 class="title">Recent post</h3>
                            
                            <div class="single-post">
                                <div class="image">
                                    <img src="https://via.placeholder.com/100x100" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
                                    <ul class="comment">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>Jan 11, 2020</li>
                                        <li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li>
                                    </ul>
                                </div>
                            </div>
                     
                            <div class="single-post">
                                <div class="image">
                                    <img src="https://via.placeholder.com/100x100" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
                                    <ul class="comment">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>Mar 05, 2019</li>
                                        <li><i class="fa fa-commenting-o" aria-hidden="true"></i>59</li>
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="single-post">
                                <div class="image">
                                    <img src="https://via.placeholder.com/100x100" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
                                    <ul class="comment">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>June 09, 2019</li>
                                        <li><i class="fa fa-commenting-o" aria-hidden="true"></i>44</li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div> -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget side-tags">
                            <h3 class="title">Tags</h3>
                            <ul class="tag">
                                <li><a href="#">business</a></li>
                                <li><a href="#">wordpress</a></li>
                                <li><a href="#">html</a></li>
                                <li><a href="#">multipurpose</a></li>
                                <li><a href="#">education</a></li>
                                <li><a href="#">template</a></li>
                                <li><a href="#">Ecommerce</a></li>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget newsletter">
                            <h3 class="title">Newslatter</h3>
                            <div class="letter-inner">
                                <h4>Subscribe & get news <br> latest updates.</h4>
                                <div class="form-inner">
                                    <input type="email" placeholder="Enter your email">
                                    <a href="#">Submit</a>
                                </div>
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="index.php"><img src="images/logo2.png" alt="#"></a>
                            </div>
                            <p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
                            <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Customer Service</h4>
                            <ul>
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Money-back</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Get In Tuch</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>NO. 342 - London Oxford Street.</li>
                                    <li>012 United Kingdom.</li>
                                    <li>info@eshop.com</li>
                                    <li>+032 3456 7890</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a> - All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="right">
                                <img src="images/payments.png" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /End Footer Area -->

   <?php include('jquery.php') ?>
</body>

</html>