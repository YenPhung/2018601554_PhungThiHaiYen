<?php 
    include './admin/connect.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- Mirrored from www.thetahmid.com/themes/xemart-v1.0/06-shopping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Mar 2022 13:48:42 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Web mỹ phẩm</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/assets/bootstrap.min.css">

		<!-- Fontawesome Icon -->
        <link rel="stylesheet" href="./css/assets/font-awesome.min.css">

		<!-- Animate Css -->
        <link rel="stylesheet" href="./css/assets/animate.css">

        <!-- Owl Slider -->
        <link rel="stylesheet" href="./css/assets/owl.carousel.min.css">

        <!-- Custom Style -->
        <link rel="stylesheet" href="./css/assets/normalize.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/assets/responsive.css">
        <style>
            .cart-table.table-responsive::-webkit-scrollbar{
                display:none;
            }
        </style>
    </head>
        <?php 
            include 'header.php';
        ?>
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="#">Trang chủ</a></li>
                                <li class="list-inline-item"><span>||</span> Giỏ hàng</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Shopping Cart -->
        <section class="shopping-cart">
            <div class="container">
                <?php 
                 if (isset($_COOKIE["user"])) {
                    $taikhoan = $_COOKIE["user"];
                    foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$taikhoan'") as $row) {
                        $idtaikhoan = $row['id'];
                    }
                ?>
                <form class="row" method="POST">
                    <div class="col-md-12">
                        <div class="cart-table table-responsive">
                            <a href="lichsu.php" class="btn btn-success" style="float:right;padding-top:7px">Lịch sử đặt hàng</a>
                                <?php 
                                if (rowCount("SELECT * FROM donhang WHERE id_taikhoan=$idtaikhoan && status=0") > 0) {
                                    ?>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="t-pro">Sản Phẩm</th>
                                            <th class="t-price">Giá Tiền</th>
                                            <th class="t-qty">Số lượng</th>
                                            <th class="t-total">Thành tiền</th>
                                            <th class="t-rem"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach (selectAll("SELECT * FROM donhang WHERE id_taikhoan=$idtaikhoan && status=0") as $item) {
                                        ?>
                                            <tr>
                                                <td class="t-pro d-flex">
                                                    <div class="t-img">
                                                        <a href="#"><img src="./images/<?= $item['anh1'] ?>" width="150" alt=""></a>
                                                    </div>
                                                    <div class="t-content">
                                                        <?php 
                                                            foreach (selectAll("SELECT * FROM sanpham WHERE id={$item['id_sanpham']}") as $row) {
                                                                ?>
                                                                    <p class="t-heading"><a href="#"><?= $row['ten'] ?></a></p>
                                                                <?php
                                                            }
                                                        ?>
                                                        <ul class="list-unstyled list-inline rate">
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="t-price"><?= number_format($item['gia']) ?>đ</td>
                                                <td class="t-qty">
                                                    <div class="qty-box">
                                                        <div class="buttons_added">
                                                            <p><?= $item['soluong'] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="t-total"><?= number_format($item['tongtien']) ?>đ</td>
                                                <td class="t-rem"><a href="?removeproduct=<?= $item['id_sanpham'] ?>"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                            <?php
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="shipping">
                                    <h6>Nhập địa chỉ nhận hàng</h6>
                                    <br>
                                    <div action="#">
                                        <textarea name="diachi" required placeholder="Vui lòng nhập địa chỉ nhận hàng" id="" cols="30" rows="10" style="padding:20px;width:100%;height:100px;resize:none"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="crt-sumry">
                                    <h5>Thanh toán</h5>
                                    <?php 
                                        foreach (selectAll("SELECT SUM(tongtien) FROM donhang WHERE id_taikhoan=$idtaikhoan && status=0") as $item) {
                                            $tongtien = $item['SUM(tongtien)'];
                                            $phiship = 30000;
                                            $tong = $tongtien-30000;
                                        }
                                        ?>
                                        <ul class="list-unstyled">
                                            <li>Tống tiền <span><?= number_format($tongtien) ?>đ</span></li>
                                            <li>Phí ship <span><?= number_format($phiship) ?>đ</span></li>
                                            <li>Tổng cộng <span><?= number_format($tong) ?>đ</span></li>
                                        </ul>
                                        <?php
                                    ?>
                                    <div class="cart-btns text-right">
                                        <button type="submit" name="dathang" class="chq-out">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                                            <?php
                                        }else{
                                            ?>
                                                <h2>Giỏ hàng của bạn đang trống</h2>
                                            <?php
                                        }
                                        ?>
                                        
                <?php
                }
                ?>
                <?php 
                    if (isset($_POST["dathang"])) {
                        $diachi = $_POST["diachi"];
                        selectall("UPDATE donhang SET diachi='$diachi',thoigian='$today',status=1 WHERE id_taikhoan=$idtaikhoan && status=0");
                        echo "<script>alert('Đặt hàng thành công')
                            location.href='giohang.php'
                        </script>";
                    }
                ?>
            </div>
        </section>
        <?php 
            include 'footer.php';
        ?>
      
        </script>
        <script src="js/assets/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/assets/popper.min.js"></script>
        <script src="js/assets/bootstrap.min.js"></script>
        <script src="js/assets/owl.carousel.min.js"></script>
        <script src="js/assets/wow.min.js"></script>
        <script src="js/assets/price-filter.js"></script>
        <script src="js/assets/jquery.meanmenu.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/custom.js"></script>

    </body>

</html>
