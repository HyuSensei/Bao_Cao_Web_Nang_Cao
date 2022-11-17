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
<style>
    #sidebar {
        float: left;
        background: #fff;
        padding: 13px 0 0 45px;
        height: 1400px;
        border-right: 2px solid #eee;
    }

    li a:hover {
        font-weight: bold;
    }
</style>

<body>
    <?php include 'component/header_2.php' ?>
    <!-- Start Product Area -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="sidebar" style="width: 100%;">
                    <h2 style="font-family: 'Times New Roman', Times, serif;">DANH MỤC</h2>
                    <div>
                        <ul style="margin-top: 20px;">
                            <li><a style="font-weight: bold;" href="">Chăm Sóc Da</a>
                                <ul style="margin-top: 15px;">
                                    <li style="margin-top: 15px;"><a href="">Giải Pháp Làn Da</a></li>
                                    <li style="margin-top: 15px;"><a href="">Chăm Sóc Cơ Thể</a></li>
                                    <li style="margin-top: 15px;"><a href="">Quy Trình Dưỡng Da</a></li>
                                    <li style="margin-top: 15px;"><a href="">Làm Đẹp</a></li>
                                </ul>
                            </li>
                            <li style="margin-top: 15px;"><a style="font-weight: bold;" href=""><span></span>Trang Điểm</a>
                                <ul>
                                    <li style="margin-top: 15px;"><a href="">Mắt</a></li>
                                    <li style="margin-top: 15px;"><a href="">Mặt</a></li>
                                    <li style="margin-top: 15px;"><a href="">Môi</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <img style="margin-top: 20px;" src="https://theme.hstatic.net/1000006063/1000748098/14/home_brandlist_item_1_banner_d_1024x1024.jpg?v=10908" alt="" width="100%">
                </div>
            </div>
            <div class="col-sm-8">
                <img src="./images/banner4.webp" alt="" width="100%">
                <div class="product-area section" style="margin-top: -70px;">
                    <div class="container">
                        <p style="font-size: 25px;font-weight: bold;font-family: 'Times New Roman', Times, serif;color: #c05353;margin-bottom: 20px;">CHĂM SÓC DA</p>
                        <div class="row" style="margin-top: -30px;">
                            <div class="col-12">
                                <div class="product-info">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="man" role="tabpanel">
                                            <div class="tab-single">
                                                <div class="row">
                                                    <?php include('./component/product_chamsocda.php') ?>
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
                    <ul class="pagination" style="display: flex;justify-content: center;margin-top: -50px">
                        <?php for ($i = 1; $i <= $so_trang; $i++) { ?>
                            <li style="height: 20px;">
                                <a href="?trang=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php mysqli_close($connect) ?>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
include 'component/footer.php'
?>

</html>
<?php include('jquery.php') ?>