<?php
include './admin/connect.php';
if (isset($_GET["id"])) {
    $idSanpham = $_GET['id'];
    selectAll("UPDATE sanpham SET luotxem=luotxem+1 WHERE id=$idSanpham");
    foreach (selectAll("SELECT * FROM sanpham WHERE id=$idSanpham") as $row) {
        $tensp = $row['ten'];
        $gia = $row['gia'];
        $anh3 = $row['anh3'];
        $anh1 = $row['anh1'];
        $anh2 = $row['anh2'];
        $luotxem = $row['luotxem'];
        $cateid = $row['id_danhmuc'];
        $chitiet = $row['chitiet'];
        foreach (selectAll("SELECT * FROM danhmuc WHERE id={$row['id_danhmuc']}") as $item) {
            $danhmuc = $item['danhmuc'];
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

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
    <link rel="stylesheet" href="css/assets/bootstrap.min.css">

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="css/assets/font-awesome.min.css">

    <!-- Animate Css -->
    <link rel="stylesheet" href="css/assets/animate.css">

    <!-- Owl Slider -->
    <link rel="stylesheet" href="css/assets/owl.carousel.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="css/assets/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/assets/responsive.css">
    <style>
        .form-rep{
            display: none;
        }
        .showformrepcmt:checked + .form-rep{
            display: block;
        }
    </style>
</head>

<body style="scroll-behavior: smooth;">
    <?php include 'header.php';?>
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-box text-center">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="#">Trang chủ</a></li>
                            <li class="list-inline-item"><span>||</span> <?= $tensp ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumb Area -->

    <!-- Single Product Area -->
    <section class="sg-product">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="sg-img">
                                <!-- Tab panes -->
                                <?php 
                                    foreach (selectAll("SELECT * FROM sanpham WHERE id=$idSanpham") as $item) {
                                      ?>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="sg1" role="tabpanel">
                                                <img style="width: 324px;height: 349px;" src="images/<?= $item['anh1'] ?>" alt="" class="img-fluid">
                                            </div>
                                            <div class="tab-pane" id="sg2" role="tabpanel">
                                                <img style="width: 324px;height: 349px;" src="images/<?= $item['anh2'] ?>" alt="" class="img-fluid">
                                            </div>
                                            <div class="tab-pane" id="sg3" role="tabpanel">
                                                <img style="width: 324px;height: 349px;" src="images/<?= $item['anh3'] ?>" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="nav d-flex justify-content-between">
                                            <a class="nav-item nav-link active" data-toggle="tab" href="#sg1"><img src="images/<?= $item['anh1'] ?>" alt=""></a>
                                            <a class="nav-item nav-link" data-toggle="tab" href="#sg2"><img src="images/<?= $item['anh2'] ?>" alt=""></a>
                                            <a class="nav-item nav-link" data-toggle="tab" href="#sg3"><img src="images/<?= $item['anh3'] ?>" alt=""></a>
                                        </div>
                                      <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="sg-content">
                                <div class="pro-tag">
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><a href="#"><?= $danhmuc ?></a></li>
                                    </ul>
                                </div>
                                <div class="pro-name">
                                    <p><?= $tensp ?></p>
                                </div>
                                <div class="pro-rating">
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item" style="margin-left: unset;"><i class="fa fa-star-o"></i></li>  
                                    </ul>
                                </div>
                                <div class="pro-price">
                                    <?php
                                    foreach (selectAll("SELECT * FROM sanpham WHERE id=$idSanpham") as $item) {
                                        $giatien = $item['gia'];
                                        $giakm = $item['giakm'];
                                        $anh1 = $item['anh1'];
                                        ?>
                                        <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">
                                                    <?= $item['giakm'] == 0 ? number_format($item['gia']) : number_format($item['gia'] * ((100 - $item['giakm']) / 100)) ?>đ
                                                </li>
                                                <li class="list-inline-item"><?= $item['giakm'] == 0 ? '' : number_format($item['gia']) . 'đ' ?></li>
                                        </ul>
                                        <?php
                                    }
                                    ?>
                                    <p style="font-family: Tahoma;">Khả dụng : <span>Số lượng</span> <label>(13 còn trong kho)</label></p>
                                </div>
                                <form class="colo-siz" method="POST">
                                    <div class="color">
                                        <ul class="list-unstyled list-inline">
                                            <!-- <li>Color :</li>
                                            <li class="list-inline-item">
                                                <input type="radio" id="color-1" name="color" value="color-1">
                                                <label for="color-1"><span><i class="fa fa-check"></i></span></label>
                                            </li>
                                            <li class="list-inline-item">
                                                <input type="radio" id="color-2" name="color" value="color-2">
                                                <label for="color-2"><span><i class="fa fa-check"></i></span></label>
                                            </li>
                                            <li class="list-inline-item">
                                                <input type="radio" id="color-3" name="color" value="color-3">
                                                <label for="color-3"><span><i class="fa fa-check"></i></span></label>
                                            </li>
                                            <li class="list-inline-item">
                                                <input type="radio" id="color-4" name="color" value="color-4">
                                                <label for="color-4"><span><i class="fa fa-check"></i></span></label>
                                            </li>
                                            <li class="list-inline-item">
                                                <input type="radio" id="color-5" name="color" value="color-5">
                                                <label for="color-5"><span><i class="fa fa-check"></i></span></label>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <div class="size">
                                        <ul class="list-unstyled list-inline">
                                            <!-- <li>Size :</li>
                                            <li class="list-inline-item">
                                                <input type="radio" id="size-1" name="size" value="size-1">
                                                <label for="size-1">S</label>
                                            </li>
                                            <li class="list-inline-item">
                                                <input type="radio" id="size-2" name="size" value="size-2">
                                                <label for="size-2">M</label>
                                            </li>
                                            <li class="list-inline-item">
                                                <input type="radio" id="size-3" name="size" value="size-3">
                                                <label for="size-3">L</label>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <div class="qty-box">
                                        <ul class="list-unstyled list-inline">
                                            <li class="list-inline-item" style="font-family: Tahoma;">Số lượng :</li>
                                            <li class="list-inline-item quantity buttons_added">
                                                <input type="button" value="-" class="minus">
                                                <input type="number" hidden name="giatien" value="<?= $giakm == 0 ? $giatien : $giatien * ((100 - $item['giakm']) / 100) ?>">
                                                <input type="number" name="soluong" step="1" min="1" max="100" value="1" class="qty text" size="4" readonly>
                                                <input type="button" value="+" class="plus">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pro-btns">
                                        <?php 
                                            if (isset($_POST["addcart"])) {
                                                if (isset($_COOKIE["user"])) {
                                                    $taikhoan = $_COOKIE["user"];
                                                    $soluong = $_POST["soluong"];
                                                    $giatien = $_POST["giatien"];
                                                    $tongtien = $soluong*$giatien;
                                                    foreach (selectAll("SELECT * FROM `taikhoan` WHERE taikhoan='$taikhoan'") as $item) {
                                                        $id_nguoidung = $item['id'];
                                                    }
                                                    if (rowCount("SELECT * FROM donhang WHERE id_sanpham=$idSanpham && status=0 && id_taikhoan=$id_nguoidung")>0) {
                                                        selectAll("UPDATE donhang SET soluong=$soluong+soluong WHERE id_sanpham=$idSanpham && status=0 && id_taikhoan=$id_nguoidung");
                                                    }else{
                                                        selectAll("INSERT INTO donhang VALUES(NULL,$idSanpham,$id_nguoidung,$giatien,$soluong,$tongtien,'$anh1',0,null,null)");
                                                    }
                                                    echo "<meta http-equiv='refresh' content='0'>";
                                                }else{
                                                    echo "<script>alert('Vui lòng đăng nhập để mua hàng')</script>";
                                                }
                                            }
                                        ?>
                                        <button class="btn btn-danger" name="addcart" style="font-family:Tahoma">Thêm vào giỏ hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12" id="binhluan">
                            <br><br>
                            <?php 
                                if (isset($_POST["repcomment"])) {
                                    $noidungtraloi = $_POST["noidungtraloi"];
                                    $idbinhluan = $_POST["idbinhluan"];
                                    selectAll("INSERT INTO `tlbinhluan`(`id`, `id_binhluan`, `noidung`) VALUES (NULL,$idbinhluan,'$noidungtraloi')");
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }
                            ?>
                            <?php 
                                foreach (selectAll("SELECT * FROM binhluan WHERE id_sanpham=$idSanpham") as $row) {
                                    ?>
                                        <?php 
                                            foreach (selectAll("SELECT * FROM taikhoan WHERE id={$row['id_taikhoan']}") as $item) {
                                                ?>
                                                <div class="d-flex my-3">
                                                        <div>
                                                            <img src="./images/<?= empty($item['anh'])?'user.jfif':$item['anh'] ?>" alt="" width="50" height="50">  
                                                        </div>
                                                        <div class="ml-2">
                                                            <div class="d-flex">
                                                                <p class="font-weight-bold"><?= $item['hoten'] ?></p>
                                                                <?php 
                                                                if (isset($_COOKIE["user"])) {
                                                                    $user = $_COOKIE["user"];
                                                                    foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $rowCheck) {
                                                                        $idcheck = $rowCheck['id'];
                                                                    }
                                                                    if ($row['id_taikhoan']==$idcheck) {
                                                                        ?>
                                                                            <?php 
                                                                                if (isset($_POST["idcomment"])) {
                                                                                    selectAll("DELETE FROM binhluan WHERE id={$_POST["idcomment"]}");
                                                                                    echo "<meta http-equiv='refresh' content='0'>";
                                                                                }
                                                                            ?>
                                                                            <?php 
                                                                                if (rowCount("SELECT * FROM tlbinhluan WHERE id_binhluan={$row['id']}")<1) {
                                                                                    ?>
                                                                                    <div>
                                                                                        <form method="POST">
                                                                                            <input type="text" name="idcomment" hidden value="<?= $row['id'] ?>">
                                                                                            <button onclick="return confirm('Bạn có muốn xoá bình luận này không ?')" style="border:none;background:transparent" type="submit"><img src="https://img.icons8.com/ios/2x/trash--v2.png" alt="" style="width:15px;height:15px;margin-left:10px;margin-top:3px;display:block"></button>
                                                                                        </form>
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="d-flex">
                                                                <p>
                                                                    <?= $row['noidung'] ?>
                                                                </p>
                                                            </div>
                                                            <?php 
                                                                if (isset($_COOKIE["user"])) {
                                                                    $user= $_COOKIE["user"];
                                                                    if ($user=='admin@gmail.com') {
                                                                        ?>
                                                                        <p>
                                                                            <label for="showcomment<?= $row['id'] ?>" style="display:block;font-weight:bold;margin-left:10px;cursor:pointer">
                                                                                Trả lời
                                                                            </label>
                                                                        </p>
                                                                            <input type="checkbox" class="showformrepcmt" name="" id="showcomment<?= $row['id'] ?>" hidden>
                                                                            <form action="" method="POST" class="form-rep">
                                                                                <input type="text" name="idbinhluan" value="<?= $row['id'] ?>" hidden>
                                                                                <textarea name="noidungtraloi" class="p-3" placeholder="Nhập nội dung bình luận" style="width:100%;height:100px;resize:none" id="" cols="30" rows="10"></textarea>
                                                                                <button type="submit" name="repcomment" class="btn btn-success">Trả lời</button>
                                                                            </form>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                        
                                                </div>
                                                <?php 
                                                    foreach (selectAll("SELECT * FROM tlbinhluan WHERE id_binhluan={$row['id']}") as $rep) {
                                                        ?>
                                                        <div class="d-flex my-3" style="margin-left:70px;">
                                                            <div>
                                                                <img src="./images/user.jfif" alt="" width="50" height="50">  
                                                            </div>
                                                            <div class="ml-2">
                                                                <p class="font-weight-bold">Admin</p>
                                                                <span><?= $rep['noidung'] ?></span>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>
                                                <?php
                                            }
                                        ?>
                                    <?php
                                }
                            ?>
                            <?php 
                                if (isset($_POST["comment"])) {
                                    if (isset($_COOKIE["user"])) {
                                        $noidung = $_POST["noidung"];
                                        $taikhoan = $_COOKIE["user"];
                                        foreach (selectAll("SELECT * FROM `taikhoan` WHERE taikhoan='$taikhoan'") as $item) {
                                            $id_nguoidung = $item['id'];
                                        }
                                        selectAll("INSERT INTO `binhluan` VALUES (NULL, $id_nguoidung, $idSanpham,'$noidung')");
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }else{
                                        echo "<script>alert('Vui lòng đăng nhập để bình luận')</script>";
                                    }
                                }
                            ?>
                            <form action="" method="POST">
                                <textarea name="noidung" class="p-3" required placeholder="Nhập nội dung bình luận" style="width:100%;height:100px;resize:none" id="" cols="30" rows="10"></textarea>
                                <button type="submit" name="comment" class="btn btn-success">Bình luận</button>
                            </form>
                                <?= $chitiet ?>
                        </div>
                        <div class="col-md-12">
                            <div class="sim-pro">
                                <div class="sec-title">
                                    <h5>Sản phẩm liên quan</h5>
                                </div>
                                <div class="sim-slider owl-carousel">
                                   <?php 
                                    foreach (selectAll("SELECT * FROM sanpham WHERE id_danhmuc = $cateid AND NOT(id = $idSanpham) LIMIT 1") as $item) {
                                        ?>
                                         <div class="sim-item">
                                        <div class="sim-img">
                                            <img class="main-img img-fluid" src="images/<?= $item['anh1'] ?>" alt="">
                                            <img class="sec-img img-fluid" src="images/<?= $item['anh2'] ?>" alt="">
                                            <div class="layer-box">
                                                <a href="#" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="images/it-comp.png" alt=""></a>
                                                <a href="#" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="images/it-fav.png" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="sim-heading">
                                            <p><a href="detail.php?id=<?= $item['id'] ?>"><?= $item['ten'] ?></a></p>
                                        </div>
                                        <div class="img-content d-flex justify-content-between">
                                            <div>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">
                                                        <?= $item['giakm']==0?number_format($item['gia']):number_format($item['gia']*((100-$item['giakm'])/100)) ?>đ
                                                    </li>
                                                    <li class="list-inline-item"><?= $item['giakm']==0?'':number_format($item['gia']).'đ' ?></li>
                                                </ul>
                                            </div>
                                            <div>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart"><img src="images/it-cart.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                   ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ht-offer">
                        <div class="sec-title">
                            <h6>Hot Offer</h6>
                        </div>
                        <div class="ht-body owl-carousel">
                        <?php 
                            foreach (selectAll("SELECT * FROM sanpham ORDER BY giakm DESC LIMIT 2") as $item) {
                                ?>
                                    <div class="ht-item">
                                        <div class="ht-img">
                                        <a href="chitiet.php?id=<?= $item['id'] ?>"><img src="images/<?= $item['anh1'] ?>" alt="" style="width: 214px;height: 230px;" class="img-fluid"></a>
                                            <span><?= $item['giakm'] ?>%</span>
                                        </div>
                                        <div class="ht-content">
                                        <p title="<?= $item['ten'] ?>" style="display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;"><a href="#"><?= $item['ten'] ?></a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item" style="font-size: 11px">
                                                        <?= $item['giakm']==0?number_format($item['gia']):number_format($item['gia']*((100-$item['giakm'])/100)) ?>đ
                                                    </li>
                                                    <li class="list-inline-item" style="font-size: 11px"><?= $item['giakm']==0?'':number_format($item['gia']).'đ' ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                        </div>
                    </div>
                    <div class="add-box">
                        <a href="#"><img src="images/s-banner1.jpg" alt="" class="img-fluid"></a>
                    </div>
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