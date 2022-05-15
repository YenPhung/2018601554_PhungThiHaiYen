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
                                <li class="list-inline-item"><span>||</span> LỊCH SỬ</li>
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
                            <a href="giohang.php" class="btn btn-success" style="float:right;padding-top:7px">Đơn hàng của bạn</a>
                                <?php 
                                if (rowCount("SELECT * FROM donhang WHERE id_taikhoan=$idtaikhoan && status!=0") > 0) {
                                    ?>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="t-pro">Sản Phẩm</th>
                                            <th class="t-price">Giá Tiền</th>
                                            <th class="t-qty">Số lượng</th>
                                            <th class="t-total">Thành tiền</th>
                                            <th class="t-total">Trạng thái</th>
                                            <th class="t-rem">Thời gian đặt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach (selectAll("SELECT * FROM donhang WHERE id_taikhoan=$idtaikhoan && status!=0") as $item) {
                                        ?>
                                            <tr>
                                                <td class="t-pro d-flex">
                                                    <div class="t-img">
                                                        <a href="#"><img src="./images/<?= $item['anh1'] ?>" width="100" alt=""></a>
                                                    </div>
                                                    <div class="t-content">
                                                        <?php 
                                                            foreach (selectAll("SELECT * FROM sanpham WHERE id={$item['id_sanpham']}") as $row) {
                                                                ?>
                                                                    <p class="t-heading" title="<?= $row['ten'] ?>" style="max-width:100px;display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;"><a href="chitiet.php?id=<?= $row['id'] ?>"><?= $row['ten'] ?></a></p>

                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="t-price"><p><?= number_format($item['gia']) ?>đ</p></td>
                                                <td class="t-qty">
                                                    <div class="qty-box">
                                                        <div class="buttons_added">
                                                            <p><?= $item['soluong'] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="t-total"><p><?= number_format($item['tongtien']) ?>đ</p></td>
                                                <td>
                                                    <?= $item['status']==1?'<span class="text-warning">Đang giao . . .</span>':'<span class="text-success">Thành công</span>' ?>
                                                </td>
                                                <td>
                                                    <p><?= $item['thoigian'] ?></p>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                    }
                                    ?>
                                    <tr>
                                                <td>
                                                    TỔNG TIỀN
                                                </td>
                                                <td colspan="4">
                                                <p style="padding-right:50px;font-weight:bold;font-size:30px;">
                                                    <?php 
                                                        foreach (selectAll("SELECT SUM(tongtien) FROM donhang WHERE id_taikhoan=$idtaikhoan && status=2") as $item) {
                                                            $tongtien = $item['SUM(tongtien)'];
                                                            $phiship = 30000;
                                                            $tong = $tongtien-30000;
                                                            echo number_format($tongtien)."đ";
                                                        }
                                                    ?>
                                                </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
