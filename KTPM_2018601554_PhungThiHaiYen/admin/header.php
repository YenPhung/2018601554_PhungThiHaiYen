<?php 
    include 'connect.php';
    if (isset($_GET["logout"])) {
        setcookie("user", null, -1, '/');
        header('location:../dangnhap.php');
    }
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            ?>
                <!DOCTYPE html>

                <html lang="en">

                <head>
                    <meta charset="utf-8" />
                    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
                    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
                    <title>Quản lý website</title>
                    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
                    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
                    <link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
                    <link href="./assets/css/demo.css?v=<?php echo time(); ?>" rel="stylesheet" />
                </head>
                <body>
                    <div class="wrapper">
                        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
                            <div class="sidebar-wrapper">
                                <div class="logo">
                                    <a href="../index.php" class="simple-text">
                                        Trở về website
                                    </a>
                                </div>
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">
                                            <i class="nc-icon nc-chart-pie-35"></i>
                                            <p>Danh mục</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="hangsx.php">
                                            <i class="nc-icon nc-circle-09"></i>
                                            <p>Hãng sản xuất </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="sanpham.php">
                                            <i class="nc-icon nc-circle-09"></i>
                                            <p>Sản phẩm</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="nguoidung.php">
                                            <i class="nc-icon nc-notes"></i>
                                            <p>Người dùng</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="binhluan.php">
                                            <i class="nc-icon nc-paper-2"></i>
                                            <p>Bình Luận</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="giohang.php">
                                            <i class="nc-icon nc-atom"></i>
                                            <p>Giỏ hàng</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="slide.php">
                                            <i class="nc-icon nc-pin-3"></i>
                                            <p>Slide</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="setting.php">
                                            <i class="nc-icon nc-bell-55"></i>
                                            <p>Setting</p>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="main-panel">
                            <!-- Navbar -->
                            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                                <div class="container-fluid">
                                    <form action="" class="">
                                        <input type="search" name="filter" onkeyup="myFunction()" id="txtFind" style="padding:5px 10px;border:1px solid #00aefd" placeholder="Tìm kiếm">
                                    </form>
                                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link" href="user.php">
                                                    <span class="no-icon">Chào Admin</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                    <a class="nav-link" href="?logout">
                                                        <span class="no-icon">Đăng xuất</span>
                                                    </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <div id="sample">
                </div>
                            <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
                <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
            <?php
        }else{
            include '404.php';
        }
    }else{
        include '404.php';
    }
?>

