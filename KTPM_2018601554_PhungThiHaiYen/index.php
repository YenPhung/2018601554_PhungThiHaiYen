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
        <section class="slider-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-0">
                        <div class="menu-widget">
                            <p style="font-family: Tahoma;"><i class="fa fa-bars"></i>DANH MỤC SẢN PHẨM</p>
                            <ul class="list-unstyled">
                                <?php 
                                    foreach (selectAll("SELECT * FROM danhmuc") as $item) {
                                        ?>
                                            <li><a href="danhmuc.php?id=<?= $item['id'] ?>"><?= $item['danhmuc'] ?></a></li>
                                        <?php
                                    }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 padding-fix-l20">
                        <div class="owl-carousel owl-slider">
                            <?php 
                                $stt=1;
                                foreach (selectAll("SELECT * FROM slide") as $item) {
                                   ?>
                                        <div class="slider-item slider-item<?=$stt++?>">
                                            <img src="images/<?= $item['anh'] ?>" alt="" class="img<?=$stt++?> wow fadeInRight effect"  data-wow-duration="1s" data-wow-delay="0s">
                                            <div class="slider-box">
                                                <div class="slider-table">
                                                    <div class="slider-tablecell">
                                                        <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.5s">
                                                            <h5>Khuyến Mãi Lớn</h5>
                                                        </div>
                                                        <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.6s">
                                                            <!-- <h2>Bộ Sưu Tập Sản Phẩm Mới</h2> -->
                                                            <h2> Sản Phẩm Mới</h2>
                                                        </div>
                                                        <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.7s">
                                                            <p>Giảm giá tới 25%</p>
                                                        </div>
                                                        <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.8s">
                                                            <a href="#">Mua ngay</a>
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
        </section>
        <!-- End Slider Area -->
        <!-- Product Area-->
        <section class="product-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bt-deal">
                                    <div class="sec-title">
                                        <h6 style="font-family:Tahoma;">SẢN PHẨM NỔI BẬT</h6>
                                    </div>
                                    <div class="bt-body owl-carousel">
                                        <div class="bt-items">
                                            <?php 
                                                foreach (selectAll("SELECT * FROM sanpham WHERE status=0 ORDER BY luotxem ASC LIMIT 4") as $item) {
                                                    ?>
                                                    <div class="bt-box d-flex">
                                                        <div class="bt-img">
                                                            <a href="#"><img src="images/<?= $item['anh1'] ?>" style="width: 85px;height: 85px" alt=""></a>
                                                        </div>
                                                        <div class="bt-content">
                                                            <p title="<?= $item['ten'] ?>" style="display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;"><a href="chitiet.php?id=<?= $item['id'] ?>"><?= $item['ten'] ?></a></p>
                                                            <ul class="list-unstyled list-inline fav">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline price">
                                                                    <li class="list-inline-item" style="font-size: 12px">
                                                                        <?= $item['giakm']==0?number_format($item['gia']):number_format($item['gia']*((100-$item['giakm'])/100)) ?>đ
                                                                    </li>
                                                                    <li class="list-inline-item" style="font-size: 12px"><?= $item['giakm']==0?'':number_format($item['gia']).'đ' ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="bt-items">
                                            <?php 
                                                foreach (selectAll("SELECT * FROM sanpham WHERE status=0 ORDER BY luotxem DESC LIMIT 4") as $item) {
                                                    ?>
                                                    <div class="bt-box d-flex">
                                                        <div class="bt-img">
                                                            <a href="#"><img src="images/<?= $item['anh1'] ?>" style="width: 85px;height: 85px" alt=""></a>
                                                        </div>
                                                        <div class="bt-content">
                                                            <p title="<?= $item['ten'] ?>" style="display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;"><a href="chitiet.php?id=<?= $item['id'] ?>"><?= $item['ten'] ?></a></p>
                                                            <ul class="list-unstyled list-inline fav">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline price">
                                                                    <li class="list-inline-item" style="font-size: 12px">
                                                                        <?= $item['giakm']==0?number_format($item['gia']):number_format($item['gia']*((100-$item['giakm'])/100)) ?>đ
                                                                    </li>
                                                                    <li class="list-inline-item" style="font-size: 12px"><?= $item['giakm']==0?'':number_format($item['gia']).'đ' ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="ht-offer">
                                    <div class="sec-title">
                                        <h6>Giảm giá cực sốc</h6>
                                    </div>
                                    <div class="ht-body owl-carousel">
                                        <?php 
                                            foreach (selectAll("SELECT * FROM sanpham WHERE status=0 ORDER BY giakm DESC LIMIT 2") as $item) {
                                                ?>
                                                    <div class="ht-item">
                                                        <div class="ht-img">
                                                            <a href="#"><img src="images/<?= $item['anh1'] ?>" alt="" style="width: 214px;height: 230px;" class="img-fluid"></a>
                                                            <span><?= $item['giakm'] ?>%</span>
                                                        </div>
                                                        <div class="ht-content">
                                                        <p title="<?= $item['ten'] ?>" style="display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;"><a href="chitiet.php?id=<?= $item['id'] ?>"><?= $item['ten'] ?></a></p>
                                                            <ul class="list-unstyled list-inline fav">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline price">
                                                                    <li class="list-inline-item" style="font-size: 12px">
                                                                        <?= $item['giakm']==0?number_format($item['gia']):number_format($item['gia']*((100-$item['giakm'])/100)) ?>đ
                                                                    </li>
                                                                    <li class="list-inline-item" style="font-size: 12px"><?= $item['giakm']==0?'':number_format($item['gia']).'đ' ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="nw-ltr">
                                    <div class="sec-title">
                                        <h6>Thông tin</h6>
                                    </div>
                                    <div class="nw-box">
                                        <p>Để lại email để nhận ưu đãi cũng như chương trình khuyến mãi từ chúng tôi</p>
                                        <form class="nw-form" action="#">
                                            <input type="text" style="font-family: Tahoma;" name="email" placeholder="Vui lòng nhập email..." required>
                                            <button type="submit" name="button">Đăng ký</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="row">
                            <div class="col-md-12 padding-fix-l20">
                                <div class="ftr-product">
                                    <div class="tab-box d-flex justify-content-between">
                                        <div class="sec-title">
                                            <h5>ĐƯỢC TÌM KIẾM NHIỀU NHẤT</h5>
                                        </div>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="all" role="tabpanel">
                                            <div class="tab-slider owl-carousel">
                                                <?php 
                                                    foreach (selectAll("SELECT * FROM sanpham WHERE status=0 ORDER BY luotxem DESC") as $item) {
                                                        ?>
                                                            <div class="tab-item">
                                                                <div class="tab-heading">
                                                                    <p><a href="chitiet.php?id=<?= $item['id'] ?>"><?= $item['ten'] ?></a></p>
                                                                </div>
                                                                <div class="tab-img">
                                                                    <img class="main-img img-fluid" src="images/<?= $item['anh1'] ?>"style="width: 253px;height: 272px;" alt="">
                                                                    <img class="sec-img img-fluid" src="images/<?= $item['anh2'] ?>"style="width: 253px;height: 272px;" alt="">
                                                                    <div class="layer-box">
                                                                        <a href="#" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="images/it-comp.png" alt=""></a>
                                                                        <a href="#" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="images/it-fav.png" alt=""></a>
                                                                    </div>
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
                                                                        <a href="chitiet.php?id=<?= $item['id'] ?>" ><img src="images/it-cart.png" alt=""></a>
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
                            <div class="col-md-12 padding-fix-l20">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="banner">
                                            <a href="#"><img src="images/banne4.jpeg" alt="" class="img-fluid"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="banner">
                                            <a href="#"><img src="images/banne5.jpeg" alt="" class="img-fluid"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 padding-fix-l20">
                                <div class="new-product">
                                    <div class="sec-title">
                                        <h5>Sản phẩm mới</h5>
                                    </div>
                                    <div class="new-slider owl-carousel">
                                        <?php 
                                            foreach (selectAll("SELECT * FROM sanpham WHERE status=0 ORDER BY id DESC LIMIT 10") as $item) {
                                               ?>
                                                <div class="new-item">
                                                    <div class="tab-heading">
                                                        <!-- <ul class="list-unstyled list-inline">
                                                            <li class="list-inline-item"><a href="#">Home Appliance,</a></li>
                                                            <li class="list-inline-item"><a href="#">Smart Led</a></li>
                                                        </ul> -->
                                                        <p><a href="chitiet.php?id=<?= $item['id'] ?>"><?= $item['ten'] ?></a></p>
                                                    </div>
                                                    <div class="new-img">
                                                        <img class="main-img img-fluid" src="images/<?= $item['anh1'] ?>" style="width: 253px;height: 272px;" alt="">
                                                        <img class="sec-img img-fluid" src="images/<?= $item['anh2'] ?>" style="width: 253px;height: 272px;" alt="">
                                                        <div class="layer-box">
                                                            <a href="#" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="images/it-comp.png" alt=""></a>
                                                            <a href="#" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="images/it-fav.png" alt=""></a>
                                                        </div>
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
                                                            <a href="chitiet.php?id=<?= $item['id'] ?>" data-toggle="tooltip" data-placement="top" title="Add to Cart"><img src="images/it-cart.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                               <?php
                                            }
                                        ?>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 padding-fix-l20">
                                <div class="banner-two">
                                    <a href="#"><img src="images/bannertop.jpeg" style="width:835px;height:185px;object-fit:cover" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                            
                            <div class="col-md-12 padding-fix-l20">
                                <div class="hm-blog">
                                    <div class="sec-title">
                                        <h5>Tin tức</h5>
                                    </div>
                                    <div class="blog-slider owl-carousel">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="https://cocolux.com/tin-tuc/cach-trang-diem-mat-dep-tu-nhien-i.129"><img style="width:248px;height:195px;object-fit:cover" src="images/1646794281922-trang-diem-mat-dep-600x600.png" alt="" class="img-fluid"></a>
                                            </div>
                                            <div class="blog-content">
                                                <h6><a href="https://cocolux.com/tin-tuc/cach-trang-diem-mat-dep-tu-nhien-i.129" style = "font-size:16px; font-weight: bold;color:black">Hướng dẫn cách trang điểm mắt đẹp tự nhiên cho nàng</a></h6>
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-calendar"></i>12/10/2020</li>
                                                </ul>
                                                <p style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;">
                                                    Đôi mắt là cửa sổ của tâm hồn, trang điểm mắt không những giúp cho khuôn mặt bạn có chiều 
                                                    sâu và đặc biệt có sức hút với người đối diện. Những bạn nữ yêu thích phong cách nhẹ nhàng, 
                                                    không quá cầu kỳ thì đừng bỏ qua cách trang điểm mắt đẹp tự nhiên dưới đây của Cosmetic nhé!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="https://cocolux.com/tin-tuc/tac-dung-cua-bot-tra-xanh-trong-cham-soc-da-i.128"><img style="width:248px;height:195px;object-fit:cover" src="images/1646724998187-bot-tra-xanh-1-600x600.jpeg" alt="" class="img-fluid"></a>
                                            </div>
                                            <div class="blog-content">
                                                <h6><a href="https://cocolux.com/tin-tuc/tac-dung-cua-bot-tra-xanh-trong-cham-soc-da-i.128" style = "font-size:16px; font-weight: bold;color:black">Tác dụng của bột trà xanh trong chăm sóc da</a></h6>
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-calendar"></i>17/3/2022</li>
                                                </ul>
                                                <p style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;">
                                                    Trà xanh là một thức uống có lợi rất nhiều cho sức khỏe. Bên cạnh đó, trà xanh còn là một 
                                                    nguyên liệu hữu hiệu trong làm đẹp và chăm sóc da. Bột trà xanh cung cấp nhiều chất dinh dưỡng 
                                                    cho làm da giúp da chắc khỏe, mịn màng, ngăn ngừa lão hoá. Hãy cùng Cosmetic tìm hiểu chi tiết 
                                                    về tác dụng của bột trà xanh cũng như những công thức chăm sóc da với bột trà xanh.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="https://cocolux.com/tin-tuc/bha-hieu-qua-cho-nguoi-moi-bat-dau-i.126"><img style="width:248px;height:195px;object-fit:cover" src="images/1646454191149-bha-cho-nguoi-moi-bat-dau-3-500x500.jpeg" alt="" class="img-fluid"></a>
                                            </div>
                                            <div class="blog-content">
                                                <h6><a href="https://cocolux.com/tin-tuc/bha-hieu-qua-cho-nguoi-moi-bat-dau-i.126" style = "font-size:16px; font-weight: bold;color:black">Hướng dẫn sử dụng BHA hiệu quả cho người mới bắt đầu</a></h6>
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-calendar"></i>17/3/2022</li>
                                                </ul>
                                                <p style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;">
                                                    BHA thành phần “vàng” trong hỗ trợ điều trị những vấn đề trên da như các loại 
                                                    mụn, cải thiện tình trạng lỗ chân lông, tẩy da chết. Nhưng đây là một hoạt chất hoạt 
                                                    động mạnh người sử dụng cần phải lưu ý. Trong bài viết này Cosmetic sẽ hướng dẫn chi 
                                                    tiết nhất cách dùng BHA cho người mới bắt đầu để mang lại hiệu quả tốt nhất, cùng theo dõi nhé!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <a href="https://cocolux.com/tin-tuc/5-loai-kem-chong-nang-nang-tone-i.125"><img style="width:248px;height:195px;object-fit:cover" src="images/1646453876034-kem-chong-nang-nang-tone-2-500x500.jpeg" alt="" class="img-fluid"></a>
                                            </div>
                                            <div class="blog-content">
                                                <h6><a href="https://cocolux.com/tin-tuc/5-loai-kem-chong-nang-nang-tone-i.125" style = "font-size:16px; font-weight: bold;color:black">Gợi ý cho nàng 5 loại kem chống nắng nâng tone</a></h6>
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-calendar"></i>17/3/2022</li>
                                                </ul>
                                                <p style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;">
                                                    Kem chống nắng được biết đến với với công dụng bảo vệ làn da bạn khỏi những tác nhân 
                                                    gây hại như ánh nắng, môi trường… Trên thị trường mỹ phẩm hiện nay đã có rất nhiều kem 
                                                    chống nắng tích hợp giữa chống nắng và trang điểm vô cùng tiện lợi. Cùng Cosmetic tham khảo 
                                                    5 loại kem chống nắng nâng tone đang được yêu thích trên thị trường nhé!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tp-bnd owl-carousel">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->

        <!-- Footer Area -->
       <?php 
        include 'footer.php';
       ?>
        
        <!-- End Footer Area -->
        <!-- jQuery JS -->
        <script src="js/assets/vendor/jquery-1.12.4.min.js"></script>

        <!-- Bootstrap -->
        <script src="js/assets/popper.min.js"></script>
        <script src="js/assets/bootstrap.min.js"></script>

        <!-- Owl Slider -->
        <script src="js/assets/owl.carousel.min.js"></script>

        <!-- Wow Animation -->
        <script src="js/assets/wow.min.js"></script>

        <!-- Price Filter -->
        <script src="js/assets/price-filter.js"></script>

        <!-- Mean Menu -->
        <script src="js/assets/jquery.meanmenu.min.js"></script>

        <!-- Custom JS -->
        <script src="js/plugins.js"></script>
        <script src="js/custom.js"></script>

    </body>

<!-- Mirrored from www.thetahmid.com/themes/xemart-v1.0/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Mar 2022 13:48:17 GMT -->
</html>
