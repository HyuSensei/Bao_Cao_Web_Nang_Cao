<?php
include 'component/header_2.php';
require_once('utils/utility.php');
require_once('db/dbhelper.php');

$productList  = executeResult('select * from products');
$productList_01  = executeResult('select * from products where id >= 5 and id <= 8');
$productList_02  = executeResult('select * from products where id >= 1 and id <= 4');
// sua tuoi
$productList_03  = executeResult('select * from products where id >= 10 and id <= 17');
$productList_04  = executeResult('select * from products where id >= 10 and id <= 13');
//sua chua
$productList_05  = executeResult('select * from products where id >= 18 and id <= 25');
//sua cho me bau
$productList_06  = executeResult('select * from products where id >= 26 and id <= 34');
//sua cho ong ba
$productList_07  = executeResult('select * from products where id >= 35 and id <= 42');

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
    <?php include('silder.php') ?>
    <div class="product-area section" style="margin-top: -30px;">
        <div class="container">
            <p style="font-size: 25px;font-weight: bold;font-family: 'Times New Roman', Times, serif;color: black;margin-bottom: 20px;">SẢN PHẨM MỚI</p>
            <div class="row" style="margin-top: -30px;">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                          
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        <?php include('./component/new_product.php') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <img src="./images/sale.png" alt="" width="200px">
    </div>
    <?php include('carouselsp.php') ?>
    <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 offset-lg-3 col-12">
                            <h4 style="margin-top:100px;font-size:14px; font-weight:500; color:#F7941D; display:block; margin-bottom:5px;">Eshop Free Lite</h4>
                            <h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.<h3>
                                    <p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">Please, purchase full version of the template to get all pages, features and commercial license</p>
                                    <div class="button" style="margin-top:30px;">
                                        <a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php include('jquery.php') ?>

</html>

<?php
include 'component/footer.php'
?>