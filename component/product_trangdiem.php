<?php
require_once('./db/connect.php');

$sql_so_san_pham="select count(*) from san_pham where danh_muc=N'Trang Điểm'";
$arr_so_san_pham=mysqli_query($connect,$sql_so_san_pham);
$ket_qua=mysqli_fetch_array($arr_so_san_pham);
$so_san_pham=$ket_qua['count(*)'];
$so_san_pham_mot_trang=8;
$so_trang=ceil($so_san_pham / $so_san_pham_mot_trang);

$trang="";
if(isset($_GET['trang'])){
    $trang=$_GET['trang'];
}else{
    $trang=1;
}
$bo_qua=$so_san_pham_mot_trang*($trang-1);

$sql = "select * from san_pham where danh_muc=N'Trang Điểm' limit $so_san_pham_mot_trang offset $bo_qua";
$result = mysqli_query($connect, $sql);

?>
<?php foreach ($result as $value) : ?>
    <div class="col-xs-6 col-sm-3">
        <div class="single-product">
            <div class="product-img">
                <a href="product-details.php?id=<?php echo $value['id'] ?>">
                    <img class="default-img" src="<?php echo $value['anh'] ?>" alt="#">
                    <img class="hover-img" src="<?php echo $value['anh'] ?>" alt="#">
                </a>
                <div class="button-head">
                    <div class="product-action">
                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                    </div>
                    <div class="product-action-2">
                        <a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="product-content">
                <h3><a href="product-details.php" style="display: -webkit-box;
                            max-height: 3.2rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp: 2;
                            line-height: 1.6rem;
                            margin-top: 10px;"><?php echo $value['ten_san'] ?></a></h3>
                <p style="display: -webkit-box;
                            max-height: 3.2rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp: 1;
                            line-height: 1.6rem;
                            margin-top: 10px;"><?php echo $value['mo_ta'] ?></p>
                <div class="product-price">
                    <span style="color: #74140d;font-weight: bold;font-size: 18px;"><?php echo $value['gia'] ?> đ</span>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>