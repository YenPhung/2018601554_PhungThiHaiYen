<?php 
    foreach (selectAll("SELECT * FROM website") as $item) {
        $diachi = $item['diachi'];
        $sdt = $item['sdt'];
        $email = $item['email'];
        $logo = $item['logo'];
    }
    ?>
    <section class="footer-top">      
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="f-contact">
                            <h5>Thông tin liên hệ</h5>
                            <div class="f-add">
                                <i class="fa fa-map-marker"></i>
                                <span>Địa chỉ :</span>
                                <p><?= $diachi ?></p>
                            </div>
                            <div class="f-email">
                                <i class="fa fa-envelope"></i>
                                <span>Email :</span>
                                <p><?= $email ?></p>
                            </div>
                            <div class="f-phn">
                                <i class="fa fa-phone"></i>
                                <span>Số điện thoại :</span>
                                <p><?= $sdt ?></p>
                            </div>
                            <div class="f-social">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-cat">
                            <h5 style="font-family: Tahoma;">Danh mục</h5>
                            <ul class="list-unstyled">
                                <?php 
                                    foreach (selectAll("SELECT * FROM danhmuc LIMIT 7") as $item) {
                                        ?>
                                            <li><a href="danhmuc.php?id=<?= $item['id'] ?>"><?= $item['danhmuc'] ?></a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-link">
                            <h5 style="font-family: Tahoma;">HƯỚNG DẪN</h5>
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Tài khoản</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Mua Hàng</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Liên hệ</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Thanh toán</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Lịch sử đặt hàng</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Đăng nhập</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Hệ thống cửa hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-sup">
                            <h5 style="font-family: Tahoma;">CHÍNH SÁCH</h5>
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Điều khoản sử dụng</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Chính sách đổi trả sản phẩm</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Chính sách và quy định chung</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Chính sách và giao nhận thanh toán</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Chính sách bảo mật thông tin </a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Quyền lợi thành viên</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Thông tin thành viên</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Trường Đại Học Công nghiệp Hà Nội</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <!-- <img src="images/payment.png" alt="" class="img-fluid"> -->
                    </div>
                </div>
            </div>
            <div class="back-to-top text-center">
                <img src="images/backtotop.png" alt="" class="img-fluid">
            </div>
    </section>
    <?php
?>