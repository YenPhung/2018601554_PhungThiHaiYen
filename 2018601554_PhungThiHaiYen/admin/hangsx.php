<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            
            if (isset($_GET["id"])) {
                if(rowCount("SELECT * FROM sanpham WHERE masx={$_GET['id']}")>0){
                    echo '<script>alert("Chỉ được xóa hãng sản xuất không có sản phẩm")</script>';
                }
                else {
                    selectAll("DELETE FROM hangsx WHERE masx={$_GET['id']}");
                    header('location:hangsx.php');
                }
            }
            ?>
            <a href="themhangsx.php" class="btn btn-success my-3 ml-3">Thêm hãng sản xuất</a>
            <table class="table">
                <tr>
                    <th style="padding-left:20px">STT</th>
                    <th>Nhà sản xuất</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Chức năng</th>
                </tr>
                <?php 
                   $stt=1;
                    foreach (selectAll("SELECT * FROM hangsx") as $row) {
                    ?>
                        <tr>
                            <td style="padding-left:25px"><?= $stt++ ?></td>
                            <td><?= $row['tensx'] ?></td>
                            <td><?= rowCount("SELECT * FROM sanpham WHERE masx={$row['masx']}") ?></td>
                            <td>
                                <a class="btn btn-secondary" href="suahangsx.php?id=<?= $row['masx'] ?>">Sửa</a>
                                <a class="btn btn-danger" href="?id=<?= $row['masx'] ?>" onclick="return confirm('Bạn có muốn xóa hãng sản xuất này không ?')">Xóa</a>
                            </td>
                        </tr>
                    <?php
                    }
                ?>
               
            </table>
            <script src="./search.js?v=<?php echo time()?>"></script>
            <?php            
        }
    }
