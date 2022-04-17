<?php 
    if (isset($_GET["checkout"])) {
        setcookie("user", null, -1, '/');
        header('location:dangnhap.php');
    }
    foreach (selectAll("SELECT * FROM website") as $item) {
        $diachi = $item['diachi'];
        $sdt = $item['sdt'];
        $email = $item['email'];
        $logo = $item['logo'];
    }
    ?>
            <section class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <div class="top-left d-flex">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="top-right text-right">
                                <?php 
                                    if (isset($_COOKIE["user"])) {
                                        $taikhoan = $_COOKIE["user"];
                                        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$taikhoan'") as $item) {
                                            $ten = $item['hoten'];
                                            $phanquyen = $item['phanquyen'];
                                        }
                                        ?>
                                            <ul class="list-unstyled list-inline">
                                                <li class="list-inline-item"><a style="font-family: Tahoma;" href="#"><img src="images/user.png" alt="">Chào <?= $ten ?></a></li>
                                                <?php 
                                                    if ($phanquyen==1) {
                                                        ?>
                                                            <li class="list-inline-item"><a style="font-family: Tahoma;" href="admin"><img src="images/user.png" alt="">Quản trị</a></li>
                                                        <?php
                                                    }
                                                ?>
                                                <li class="list-inline-item"><a style="font-family: Tahoma;" href="thongtin.php"><img src="images/wishlist.png" alt="">Thông tin tài khoản</a></li>
                                                <li class="list-inline-item"><a style="font-family: Tahoma;" href="?checkout"><img src="images/checkout.png" alt="">Đăng xuất</a></li>
                                                <!-- <li class="list-inline-item"><a href="#"><img src="images/login.png" alt="">Login</a></li> -->
                                            </ul>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <ul class="list-unstyled list-inline">
                                                <li class="list-inline-item"><a style="font-family: Tahoma;" href="dangky.php"><img src="images/checkout.png" alt="">Đăng ký</a></li>
                                                <li class="list-inline-item"><a style="font-family: Tahoma;" href="dangnhap.php"><img src="images/login.png" alt="">Đăng nhập</a></li>
                                            </ul>
                                        <?php
                                        
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="logo-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php"><img style="width:150px;height:80px;object-fit:cover" src="./images/<?= $logo ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-5 padding-fix">
                        <form action="sanpham.php" class="search-bar" method="GET" autocomplete="off">
                            <input type="text" name="q" placeholder="Nhập từ khóa để tìm kiếm">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="carts-area d-flex">
                            <div class="call-box d-flex">
                                <div class="call-ico">
                                    <img src="images/call.png" alt="">
                                </div>
                                <div class="call-content">
                                    <span>Liên hệ</span>
                                    <p><?= $sdt ?></p>
                                </div>
                            </div>
                            <div class="cart-box ml-auto text-center">
                                <a href="#" class="cart-btn">
                                    <img src="images/cart.png" alt="cart">
                                    <?php 
                                        if (isset($_COOKIE["user"])) {
                                            $taikhoan = $_COOKIE["user"];
                                            foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan ='$taikhoan'") as $item) {
                                                $id_nguoidung = $item['id'];
                                            }
                                            if (rowCount("SELECT * FROM donhang WHERE id_taikhoan=$id_nguoidung && status=0")>0) {
                                                ?>
                                                <span><?= rowCount("SELECT * FROM donhang WHERE id_taikhoan=$id_nguoidung && status=0") ?></span>
                                                <?php
                                            }
                                        }
                                    ?>
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="cart-body">
            <div class="close-btn">
                <button class="close-cart"><img src="images/close.png" alt="">Đóng</button>
            </div>
            <div class="crt-bd-box">
                <div class="cart-heading text-center">
                    <h5><a href="giohang.php" style="color:#00aefd;font-family:Tahoma">Giỏ hàng của bạn</a></h5>
                </div>
                <div class="cart-content">
                    <?php 
                        if (isset($_GET['removeproduct'])) {
                            selectAll("DELETE FROM donhang WHERE id_taikhoan=$id_nguoidung && status=0 && id_sanpham={$_GET['removeproduct']}");
                            header('location:giohang.php');
                        }
                        if (isset($_COOKIE["user"])) {
                            foreach (selectAll("SELECT * FROM donhang WHERE id_taikhoan=$id_nguoidung && status=0 ") as $item) {
                                ?>
                                    <div class="content-item d-flex justify-content-between">
                                        <div class="cart-img">
                                            <a href="#"><img src="images/<?= $item['anh1'] ?>" alt="" style="width: 100px;height: 70px;"></a>
                                        </div>
                                        <div class="cart-disc">
                                            <?php 
                                                foreach (selectAll("SELECT * FROM sanpham WHERE id={$item['id_sanpham']}") as $row) {
                                                    ?>
                                                        <p title="<?= $row['ten'] ?>" style="display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;"><a href="chitiet.php?id=<?= $row['id'] ?>"><?= $row['ten'] ?></a></p>
                                                    <?php
                                                }
                                            ?>
                                            <span><?= $item['soluong'] ?> x <?= number_format($item['gia']) ?>đ</span>
                                        </div>
                                        <div class="delete-btn">
                                            <a href="?removeproduct=<?= $item['id_sanpham'] ?>"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                    
                </div>
                <div class="cart-btm">
                    <?php 
                    if (isset($_COOKIE["user"])) {
                        foreach (selectAll("SELECT SUM(tongtien) FROM donhang WHERE id_taikhoan=$id_nguoidung && status=0") as $item) {
                            $tongtien = $item['SUM(tongtien)'];
                        }
                        ?>
                         <p class="text-right">Thành tiền: <span><?= number_format($tongtien) ?>đ</span></p>
                        <a href="giohang.php">Đặt hàng</a>
                        <?php
                    }
                    ?>
                   
                </div>
            </div>
        </div>
        <div class="cart-overlay"></div>
        <!-- End Cart Body -->
        <!-- Menu Area -->
        <section class="menu-area" style="margin-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-menu">
                            <ul class="list-unstyled list-inline">
                                <li  class="list-inline-item"><a href="index.php" style="font-family: Tahoma;">TRANG CHỦ</a>
                                </li>
                                <li  class="list-inline-item mega-menu"><a style="font-family: Tahoma;">GIỚI THIỆU</a>
                                </li>
                                <li  class="list-inline-item"><a style="font-family: Tahoma;">TIN TỨC </a>
                                </li>
                                <li  class="list-inline-item"><a style="font-family: Tahoma;">LIÊN HỆ</a>
                                </li>
                                <li class="list-inline-item trac-btn"><a style="font-family: Tahoma;" href="giohang.php">Đơn hàng của bạn</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
?>