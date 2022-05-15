<?php 
    include './admin/connect.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Web mỹ phẩm</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
        <link rel="stylesheet" href="css/assets/bootstrap.min.css">
        <link rel="stylesheet" href="css/assets/font-awesome.min.css">
        <link rel="stylesheet" href="css/assets/animate.css">
        <link rel="stylesheet" href="css/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="css/assets/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/assets/responsive.css">
    </head>
    <body>
        <?php include 'header.php';?>
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a style="font-family: Tahoma;" href="#">Trang chủ</a></li>
                                <li class="list-inline-item"><span>||</span> Đăng ký</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="register">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                            if (isset($_POST["dangky"])) {
                                $ten = $_POST["ten"];
                                $email = $_POST["email"];
                                $sdt = $_POST["sdt"];
                                $matkhau = md5($_POST["matkhau"]);
                                $nlmatkhau = md5($_POST["nlmatkhau"]);
                                if ($matkhau!==$nlmatkhau) {
                                    $error ='Nhập lại mật khẩu không chính xác';
                                }else{
                                    if (rowCount("SELECT * FROM taikhoan WHERE taikhoan='$email'")>0) {
                                        $error ='Tài khoản đã có người sử dụng';
                                    }else{
                                        selectAll("INSERT INTO taikhoan VALUES (NULL,'$email','$matkhau','$ten','$sdt','','0')");
                                        $success='Đăng ký thành công, vui lòng đăng nhập';
                                    }
                                }
                            }
                        ?>
                        <form action="" method="post">
                            <h5 style="font-family: Tahoma;">Tạo tài khoản</h5>
                            <div class="row">
                                <?php 
                                    if (isset($error)) {
                                      ?><p class="text-danger ml-3 mb-3"><?= $error ?></p><?php
                                    }
                                    if (isset($success)) {
                                        ?><p class="text-success ml-3 mb-3"><?= $success ?></p><?php
                                    }
                                ?>
                                <div class="col-md-12" style="font-family: Tahoma;">
                                    <label>Họ và tên*</label>
                                    <input type="text" name="ten" required placeholder="Nhập họ và tên" required>
                                </div>
                                <div class="col-md-12" style="font-family: Tahoma;">
                                    <label>Email *</label>
                                    <input type="text" name="email" required placeholder="Nhập địa chỉ Email">
                                </div>
                                <div class="col-md-12" style="font-family: Tahoma;">
                                    <label>Số điện thoại*</label>
                                    <input type="text" name="sdt" required placeholder="Số điện thoại">
                                </div>
                                <div class="col-md-12" style="font-family: Tahoma;">
                                    <label>Mật khẩu*</label>
                                    <input style=" border: 1px solid #dddddd;width: 100%;height: 45px;-webkit-border-radius: 30px;-moz-border-radius: 30px;-ms-border-radius: 30px;border-radius: 30px;padding-left: 15px;margin-bottom: 35px;" type="password" name="matkhau" required placeholder="Vui lòng nhập mật khẩu">
                                </div>
                                <div class="col-md-12" style="font-family: Tahoma;">
                                    <label>Nhập lại mật khẩu*</label>
                                    <input style="border: 1px solid #dddddd;width: 100%;height: 45px;-webkit-border-radius: 30px;-moz-border-radius: 30px;-ms-border-radius: 30px;border-radius: 30px;padding-left: 15px;margin-bottom: 35px;" type="password" name="nlmatkhau" required placeholder="Nhập lại mật khẩu">
                                </div>
                                <div class="col-md-5 text-right">
                                    <button type="submit" name="dangky">Đăng ký</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php 
            include 'footer.php';
        ?>
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
