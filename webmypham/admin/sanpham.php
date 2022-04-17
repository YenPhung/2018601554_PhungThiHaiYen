<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                selectAll("DELETE FROM sanpham WHERE id={$_GET['id']}");
                header('location:sanpham.php');
            }
            ?>
            <a href="themsp.php" class="btn btn-success my-3 ml-3">Thêm sản phẩm</a>
            <table class="table">
                <tr>
                    <th style="padding-left:20px">STT</th>
                    <th>Sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Ảnh</th>
                    <th>Chức năng</th>
                </tr>
                <?php 
                   $stt=1;
                    foreach (selectAll("SELECT * FROM sanpham") as $row) {
                    ?>
                        <tr>
                            <td style="padding-left:25px"><?= $stt++ ?></td>
                            <td><?= $row['ten'] ?></td>
                            <td><?= number_format($row['gia']) ?>đ</td>
                            <td>
                                <img src="../images/<?= $row['anh1'] ?>" width="50" alt="">
                                <img src="../images/<?= $row['anh2'] ?>" width="50" alt="">
                                <img src="../images/<?= $row['anh3'] ?>" width="50" alt="">
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="suasp.php?id=<?= $row['id'] ?>">Sửa</a>
                                <a class="btn btn-danger" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')">Xóa</a>
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

