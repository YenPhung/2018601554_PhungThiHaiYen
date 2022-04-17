<?php include './admin/connect.php';
    
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
            .menu-widget{
                margin-bottom: 10px;
            }
            .menu-widget p {
                font-size: 15px;
                color: #fff;
                background: #5677fc;
                padding: 12px 20px;
                text-transform: uppercase;
                font-weight: 700;
            }

            .menu-widget p i {
                font-size: 14px;
                margin-right: 10px;
            }

            .menu-widget ul {
                border: 1px solid #e5e5e5;
                border-top: none;
            }

            .menu-widget ul li a {
                display: block;
                font-size: 15px;
                padding: 8px 20px;
                border-bottom: 1px solid #eeeeee;
            }

            .menu-widget ul li a:hover {
                background: #f5f5f5;
                font-weight: 600;
            }

            .menu-widget ul li a img {
                margin-top: -3px;
                margin-right: 12px;
            }

            .menu-widget ul li a i {
                font-size: 14px;
                color: #969696;
                float: right;
                margin-top: 4px;
            }

            .menu-widget ul li:last-child a {
                border-bottom: none;
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
                                <li class="list-inline-item"><a href="#">Trang chủ</a></li>
                                <li class="list-inline-item"><span>||</span> Sản phẩm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Category Area -->
        <section class="category">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-box">
                            <div class="cat-box d-flex justify-content-between">
                                <!-- Nav tabs -->
                                <div class="view">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#grid"><i class="fa fa-th-large"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="sortby">
                                    <span>Sắp xếp theo</span>
                                    <select class="sort-box">
                                        <option>Giá tiền</option>
                                        <option>Tên</option>
                                    </select>
                                </div>
                                <div class="show-item">
                                    <span>Hiển thị</span>
                                    <select class="show-box">
                                        <option>12</option>
                                        <option>24</option>
                                        <option>36</option>
                                    </select>
                                </div>
                                <div class="page">
                                    <span>Trang 1 / 20</span>
                                </div>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="grid" role="tabpanel">
                                    <div class="row">
                                       <?php 
                                        if (isset($_GET["q"])) {
                                            $keyword = $_GET["q"];
                                            if (rowCount("SELECT * FROM `sanpham` WHERE `ten` LIKE '%$keyword%'")>0) {
                                                foreach (selectAll("SELECT * FROM `sanpham` WHERE `ten` LIKE '%$keyword%'") as $row) {
                                                    ?>
                                                         <div class="col-lg-4 col-md-6">
                                                            <div class="tab-item">
                                                                <div class="tab-img">
                                                                    <img class="main-img img-fluid" src="images/<?= $row['anh1'] ?>" style="width: 253px;height: 272px;" alt="">
                                                                    <img class="sec-img img-fluid" src="images/<?= $row['anh2'] ?>" style="width: 253px;height: 272px;" alt="">
                                                                    <div class="layer-box">
                                                                        <a href="#" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="images/it-comp.png" alt=""></a>
                                                                        <a href="#" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="images/it-fav.png" alt=""></a>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-heading">
                                                                    <p><a href="#"><?= $row['ten'] ?></a></p>
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
                                                                            <li class="list-inline-item" style="font-size: 11px">
                                                                                <?= $row['giakm']==0?number_format($row['gia']):number_format($row['gia']*((100-$row['giakm'])/100)) ?>đ
                                                                            </li>
                                                                            <li class="list-inline-item" style="font-size: 11px"><?= $row['giakm']==0?'':number_format($row['gia']).'đ' ?></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <a href="chitiet.php?id=<?= $row['id'] ?>"><img src="images/it-cart.png" alt=""></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                            }else{
                                                ?>
                                                    <p>Không tìm thấy sản phẩm</p>
                                                <?php
                                            }
                                        }else{
                                            foreach (selectAll("SELECT * FROM sanpham") as $row) {
                                                ?>
                                                     <div class="col-lg-4 col-md-6">
                                                        <div class="tab-item">
                                                            <div class="tab-img">
                                                                <img class="main-img img-fluid" src="images/<?= $row['anh1'] ?>" style="width: 253px;height: 272px;" alt="">
                                                                <img class="sec-img img-fluid" src="images/<?= $row['anh2'] ?>" style="width: 253px;height: 272px;" alt="">
                                                                <div class="layer-box">
                                                                    <a href="#" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="images/it-comp.png" alt=""></a>
                                                                    <a href="#" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="images/it-fav.png" alt=""></a>
                                                                </div>
                                                            </div>
                                                            <div class="tab-heading">
                                                                <p><a href="#"><?= $row['ten'] ?></a></p>
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
                                                                        <li class="list-inline-item" style="font-size: 11px">
                                                                            <?= $row['giakm']==0?number_format($row['gia']):number_format($row['gia']*((100-$row['giakm'])/100)) ?>đ
                                                                        </li>
                                                                        <li class="list-inline-item" style="font-size: 11px"><?= $row['giakm']==0?'':number_format($row['gia']).'đ' ?></li>
                                                                    </ul>
                                                                </div>
                                                                <div>
                                                                    <a href="chitiet.php?id=<?= $row['id'] ?>"><img src="images/it-cart.png" alt=""></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        }
                                       ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list" role="tabpanel">
                                    <div class="row">
                                        <?php 
                                            foreach (selectAll("SELECT * FROM sanpham WHERE id_danhmuc=$iddanhmuc") as $row) {
                                                ?>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="tab-item2">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-12">
                                                                    <div class="tab-img">
                                                                        <img class="main-img img-fluid" style="width: 254px;height: 274px;" src="images/<?= $row['anh1'] ?>" alt="">
                                                                        <img class="sec-img img-fluid" style="width: 254px;height: 274px;" src="images/<?= $row['anh2'] ?>" alt="">
                                                                        <span class="sale">Sale</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-8 col-md-12">
                                                                    <div class="item-heading d-flex justify-content-between">
                                                                        <div class="item-top">
                                                                            <ul class="list-unstyled list-inline cate">
                                                                                <li class="list-inline-item"><a href="#">Home Appliance,</a></li>
                                                                                <li class="list-inline-item"><a href="#">Smart Led</a></li>
                                                                            </ul>
                                                                            <p><a href="#"><?= $row['ten'] ?></a></p>
                                                                            <ul class="list-unstyled list-inline fav">
                                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="item-price">
                                                                            <ul class="list-unstyled list-inline price">
                                                                                <li class="list-inline-item" style="font-size: 11px">
                                                                                        <?= $row['giakm']==0?number_format($row['gia']):number_format($row['gia']*((100-$row['giakm'])/100)) ?>đ
                                                                                </li>
                                                                                <li class="list-inline-item" style="font-size: 11px"><?= $row['giakm']==0?'':number_format($row['gia']).'đ' ?></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-content">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem atque dolores aliquid culpa maiores beatae est quod officia veniam fugit? Molestiae, illum voluptatibus nisi error recusandae cum expedita. Laborum, expedita!</p>
                                                                        <a href="chitiet.php?id=<?= $row['id'] ?>" class="it-cart"><span class="it-img"><img src="images/it-cart.png" alt=""></span><span class="it-title">Mua</span></a>
                                                                    </div>
                                                                </div>
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
                </div>
            </div>
        </section>
        <section class="brand2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="tp-bnd owl-carousel">
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-01.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-02.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-03.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-04.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-05.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-06.png" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="images/brand-07.png" alt="" class="img-fluid"></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
       <?php include 'footer.php';?>
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
