<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET['id'])) {
                selectAll("DELETE FROM donhang WHERE id={$_GET['id']}");
                header('location:giohang.php');
            }
            if (isset($_GET["id_taikhoan"])) {
                selectall("UPDATE donhang SET status=2 WHERE id_taikhoan={$_GET["id_taikhoan"]} && status=1");
                header('location:giohang.php');
            }
        ?>
        <table class="table">
            <tr>
                <th style="padding-left:20px">STT</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiên</th>
                <th>Địa chỉ</th>
                <th>Thời gian đặt</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            <?php 
               $stt=1;
                foreach (selectAll("SELECT * FROM `donhang` WHERE STATUS = 1 OR status = 2") as $row) {
                ?>
                    <tr>
                        <td style="padding-left:25px"><?= $stt++ ?></td>
                        <td>
                            <?php 
                                foreach (selectAll("SELECT * FROM taikhoan WHERE id={$row['id_taikhoan']}") as $item) {
                                    echo $item['hoten'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php foreach (selectAll("SELECT * FROM sanpham WHERE id={$row['id_sanpham']}") as $item) {
                                ?>
                                    <p title="<?= $item['ten'] ?>" style="display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;max-width:200px;">
                                        <img title="<?= $item['ten'] ?>" src="../images/<?= $row['anh1'] ?>" style="width:50px;height:50px">
                                        <?= $item['ten'] ?>
                                    </p>
                                <?php
                            }?>
                        </td>
                        <td>
                            <?= $row['soluong'] ?>
                        </td>
                        <td>
                            <?= $row['tongtien'] ?>
                        </td>
                       
                        <td>
                            <p style="display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;max-width:200px;"><?= $row['diachi'] ?></p>
                        </td>
                        <td>
                            <?= $row['thoigian'] ?>
                        </td>
                        <td>
                            <?= $row['status']==1 ?'Đang giao':'<span class="text-success">Đã giao</span>' ?>
                        </td>
                        <td>
                            <?php 
                                if ($row['status']==1) {
                                   ?>
                                        <a href="?id_taikhoan=<?= $row['id_taikhoan'] ?>" onclick="return confirm('Bạn có muốn xác nhận đơn hàng này đã giao thành công ?')" class="btn btn-success">Cập nhật</a>
                                   <?php
                                }
                            ?>
                            <a href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này khỏi giỏ hàng không ?')" class="btn btn-danger">
                                Xoá
                        </a>
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
