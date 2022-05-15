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
        <style>
            #hoten{
                border:none!important;
            }
            #hoten:focus{
                border:1px solid #dddddd!important;
            }
            label[for="hoten"]{
                cursor: pointer;
            }
            #sodienthoai{
                border:none!important;
            }
            #sodienthoai:focus{
                border:1px solid #dddddd!important;
            }
            label[for="sodienthoai"]{
                cursor: pointer;
            }
            #taikhoan{
                border:none!important;
            }
            #taikhoan:focus{
                border:1px solid #dddddd!important;
            }
            label[for="taikhoan"]{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <?php include 'header.php';?>
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="#">Trang chủ</a></li>
                                <li class="list-inline-item"><span>||</span> THÔNG TIN TÀI KHOẢN</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="register">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h2>THÔNG TIN</h2>
                    <a href="<?php if (isset($_GET["doimatkhau"])) {
                        echo "thongtin.php";
                    }else{
                        echo "?doimatkhau";
                    } ?>" style="font-weight:bold;color:white;padding-top:7px;width:fit-content" class="d-block btn btn-success"><?php if (isset($_GET["doimatkhau"])) {
                        echo "ĐỔI HỌ TÊN";
                    }else{
                        echo "ĐỔI MẬT KHẨU";
                    } ?></a>
                </div>
                <?php 
                    if (isset($_GET["doimatkhau"])) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                    if (isset($_POST["doimatkhau"])) {
                                        $matkhau = md5($_POST["matkhau"]);
                                        $nlmatkhau = md5($_POST["nlmatkhau"]);
                                        $matkhaucu = md5($_POST["matkhaucu"]);
                                        if ($matkhau!==$nlmatkhau) {
                                            $error ='Nhập lại mật khẩu không chính xác';
                                        }else{
                                            if (rowCount("SELECT * FROM taikhoan WHERE id=$id_nguoidung AND matkhau='$matkhaucu'")==1) {
                                                selectAll("UPDATE taikhoan SET matkhau='$nlmatkhau' WHERE id=$id_nguoidung");
                                                $success='Đổi mật khẩu thành công';
                                            }else{
                                                $error ='Mật khẩu cũ không chính xác';
                                            }
                                        }
                                    }
                                ?>
                                <form action="" method="post">
                                    <h5 style="font-family: Tahoma;">ĐỔI MẬT KHẨU</h5>
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
                                            <label>Nhập mật khẩu cũ*</label>
                                            <input style="border: 1px solid #dddddd;width: 100%;height: 45px;-webkit-border-radius: 30px;-moz-border-radius: 30px;-ms-border-radius: 30px;border-radius: 30px;padding-left: 15px;margin-bottom: 35px;" type="password" name="matkhaucu" required placeholder="Nhập mật khẩu cũ" >
                                        </div>
                                        <div class="col-md-12" style="font-family: Tahoma;">
                                            <label>Mật khẩu mới*</label>
                                            <input style="border: 1px solid #dddddd;width: 100%;height: 45px;-webkit-border-radius: 30px;-moz-border-radius: 30px;-ms-border-radius: 30px;border-radius: 30px;padding-left: 15px;margin-bottom: 35px;" type="password" name="matkhau" required placeholder="Nhập mật khẩu mới">
                                        </div>
                                        <div class="col-md-12" style="font-family: Tahoma;">
                                            <label>Nhập lại mật khẩu mới*</label>
                                            <input style=" border: 1px solid #dddddd;width: 100%;height: 45px;-webkit-border-radius: 30px;-moz-border-radius: 30px;-ms-border-radius: 30px;border-radius: 30px;padding-left: 15px;margin-bottom: 35px;" type="password" name="nlmatkhau" required placeholder="Vui lòng nhập mật khẩu">
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <button type="submit" name="doimatkhau">Thay đổi mật khẩu</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }else{
                        ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php 
                                    foreach (selectAll("SELECT * FROM taikhoan WHERE id=$id_nguoidung") as $item) {
                                        $tencu = $item['hoten'];
                                        $taikhoancu = $item['taikhoan'];
                                        $sdtcu = $item['sdt'];
                                        $anhcu = $item['anh'];
                                    }
                                    if (isset($_POST["doihoten"])) {
                                        $hoten = $_POST["hoten"];
                                        $sodienthoai = $_POST["sodienthoai"];
                                        $anh = $_FILES['anh']['name'];
                                        $tmp1 = $_FILES['anh']['tmp_name'];
                                        $type1 = $_FILES['anh']['type'];
                                        $dir = './images/';
                                        move_uploaded_file($tmp1, $dir . $anh);
                                        if (empty($anh)) {
                                            selectAll("UPDATE taikhoan SET hoten='$hoten',sdt='$sodienthoai' WHERE id=$id_nguoidung");
                                        }
                                        else{
                                        selectAll("UPDATE taikhoan SET hoten='$hoten',anh='$anh',sdt='$sodienthoai' WHERE id=$id_nguoidung");
                                        }
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                ?>
                                <div class="col-md-12" style="font-family: Tahoma;">
                                    <div>
                                        <label for="hoten" class="d-flex justify-content-between"><p style="font-weight:bold">Họ tên*</p><i class="fa fa-edit"></i></label>
                                        <input value="<?= $tencu ?>" id="hoten" style="width: 100%;height: 45px;-webkit-border-radius: 30px;-moz-border-radius: 30px;-ms-border-radius: 30px;border-radius: 30px;padding-left: 15px;margin-bottom: 35px;" type="text" name="hoten"  required>
                                    </div>
                                    <div>
                                        <label for="sodienthoai" class="d-flex justify-content-between"><p style="font-weight:bold">Số điện thoại*</p><i class="fa fa-edit"></i></label>
                                        <input value="<?= $sdtcu ?>" id="sodienthoai" style="width: 100%;height: 45px;-webkit-border-radius: 30px;-moz-border-radius: 30px;-ms-border-radius: 30px;border-radius: 30px;padding-left: 15px;margin-bottom: 35px;" type="text" name="sodienthoai"  required>
                                    </div>
                                    <div>
                                        <label for="taikhoan" class="d-flex justify-content-between"><p style="font-weight:bold">Email*</p></label>
                                        <input disabled value="<?= $taikhoancu ?>" id="taikhoan" style="width: 100%;height: 45px;-webkit-border-radius: 30px;-moz-border-radius: 30px;-ms-border-radius: 30px;border-radius: 30px;padding-left: 15px;margin-bottom: 35px;" type="text" name="taikhoan"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="anhdaidien" class="d-flex justify-content-between"><p style="font-weight:bold">Ảnh Đại Diện</p></label>
                                        <label >Upload ảnh -></label>
                                        <label for="imgInp" style="cursor:pointer">
                                            <img id="blah"  width="50" height="50" src="<?= empty($anhcu)?'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsYElAJVdc_nUeBp5o-DiTGiVjNn7aVG2twi2cSfIDsuaHnvk7YSvk1IHe1LsK8qE2Hr4&usqp=CAU':'./images/'.$anhcu.'' ?>">
                                        
                                        </label>
                                        <input hidden type="file" name="anh" accept="image/*" id="imgInp" class="form-control" >
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <button type="submit" name="doihoten">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                            <script>
                                imgInp.onchange = evt => {
                                    const [file] = imgInp.files
                                    if (file) {
                                        blah.src = URL.createObjectURL(file)
                                    }
                                }
                            </script>
                        <?php
                    }
                ?>
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
