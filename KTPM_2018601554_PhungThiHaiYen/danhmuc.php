<?php include './admin/connect.php';
    if (isset($_GET["id"])) {
        foreach (selectAll("SELECT * FROM danhmuc WHERE id={$_GET['id']}") as $item) {
           $tendanhmuc = $item['danhmuc'];
            $iddanhmuc = $item['id'];
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
                                <li class="list-inline-item"><span>||</span> <?= $tendanhmuc ?></li>
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
                    <div class="col-md-3">
                    <div class="menu-widget">
                            <p style="font-family: Tahoma;"><i class="fa fa-bars"></i>DANH MỤC SẢN PHẨM</p>
                            <ul class="list-unstyled">
                                <?php 
                                    foreach (selectAll("SELECT * FROM danhmuc") as $item) {
                                        ?>
                                            <li <?= $item['id']=== $iddanhmuc?'style="font-weight:bold"':'' ?>><a href="danhmuc.php?id=<?= $item['id'] ?>"><?= $item['danhmuc'] ?></a></li>
                                        <?php
                                    }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product-box">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="grid" role="tabpanel">
                                    <div class="row">
                                        <?php 
                                        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
                                        $current_page = !empty($_GET['page'])?$_GET['page']:1;
                                        $offset = ($current_page - 1) * $item_per_page;
                                        $numrow = rowCount("SELECT * FROM sanpham WHERE id_danhmuc=$iddanhmuc && status=0");
                                        $totalpage = ceil($numrow / $item_per_page);
                                            foreach (selectAll("SELECT * FROM sanpham WHERE id_danhmuc=$iddanhmuc && status=0 LIMIT $item_per_page OFFSET $offset") as $row) {
                                                $getid = ($_GET["id"]);
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
                                                            <p><a href="chitiet.php?id=<?= $row['id'] ?>"><?= $row['ten'] ?></a></p>
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
                                                                        <li class="list-inline-item" style="font-size: 14px">
                                                                            <?= $row['giakm']==0?number_format($row['gia']):number_format($row['gia']*((100-$row['giakm'])/100)) ?>đ
                                                                        </li>
                                                                        <li class="list-inline-item" style="font-size: 14px"><?= $row['giakm']==0?'':number_format($row['gia']).'đ' ?></li>
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
                                        ?>
                                        <div class="col-lg-12">
                                            <div class="pageination">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-center">
                                                    <?php 
                                                        if ($current_page>1){
                                                            $prev_page = $current_page - 1;
                                                    ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="category.php?id=<?= $getid?>&per_page=<?=$item_per_page?>&page=<?=$prev_page?>" aria-label="Previous">
                                                                <i class="ti-angle-double-left"></i>
                                                            </a>
                                                        </li>
                                                    <?php 
                                                    } ?>
                                                        
                                                        <?php for($num = 1; $num <=$totalpage;$num++) { ?>
                                                            <?php 
                                                                if ($num != $current_page){ 
                                                            ?>
                                                                <?php if ($num > $current_page-3 && $num < $current_page+3){ ?>
                                                                <li class="page-item"><a class="page-link" href="category.php?id=<?= $getid?>&per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                                                                <?php } ?>
                                                            <?php 
                                                            } 
                                                            else{ 
                                                            ?>
                                                                <strong class="page-item"><a class="page-link"><?=$num?></a></strong>
                                                            <?php 
                                                            }
                                                        } 
                                                        ?>

                                                    <?php 
                                                        if ($current_page < $totalpage - 1){
                                                            $next_page = $current_page + 1;
                                                    ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="category.php?id=<?= $getid?>&per_page=<?=$item_per_page?>&page=<?=$next_page?>" aria-label="Next">
                                                                <i class="ti-angle-double-right"></i>
                                                            </a>
                                                        </li>
                                                    <?php 
                                                        } ?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
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
