<?php
include 'component/header_2.php';
require_once('utils/utility.php');
require_once('db/dbhelper.php');

$productList  = executeResult('select * from products');
$productList_01  = executeResult('select * from products where id >= 5 and id <= 8');
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
    <title>SKINLELE.COM</title>
    <?php include('css-libary.php') ?>
</head>

<body>
    <!-- 
    <div>
        <video width="100%" autoplay muted>
            <source src="images/video-sneaker-08.mp4" type="video/mp4">
        </video>
    </div> -->

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sữa Sinh Trắc Học Cao Cấp</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Start Single Tab -->
                <div class="tab-pane fade show active" id="man" role="tabpanel">
                    <div class="tab-single">
                        <div class="row">

                            <?php
                            foreach ($productList as $item) {
                                echo '<div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product-details.php?id=' . $item['id'] . '">
                                                        <img class="default-img" src="' . $item['thumbnail'] . '" alt="#">
                                                        <img class="hover-img" src="' . $item['thumbnail'] . '" alt="#">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.php?id=' . $item['id'] . '">' . $item['title'] . '</a></h3>
                                                    <div class="product-price">
                                                        <span>$' . $item['price'] . '</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('jquery.php') ?>
</body>

</html>

<?php
include 'component/footer.php'
?>