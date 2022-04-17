<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                selectAll("DELETE FROM binhluan WHERE id={$_GET['id']}");
                header('location:binhluan.php');
            }
            ?>
            <a class="btn btn-success my-3 ml-3">Bình luận / đánh giá sản phẩm</a>
            <table class="table">
                <tr>
                    <th style="padding-left:20px">STT</th>
                    <th>Sản phẩm</th>
                    <th>Khách hàng</th>
                    <th>Nội dung bình luận</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                $stt = 1;
                foreach (selectAll("SELECT * FROM binhluan") as $row) {
                ?>
                    <tr>
                        <td style="padding-left:25px"><?= $stt++ ?></td>
                        <td>
                            <p style="display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;word-break: break-word;">
                                <?php 
                                    foreach (selectAll("SELECT * FROM sanpham WHERE id={$row['id_sanpham']}") as $item) {
                                        echo $item['ten'];
                                    }
                                ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php 
                                    foreach (selectAll("SELECT * FROM taikhoan WHERE id={$row['id_taikhoan']}") as $item) {
                                        echo $item['hoten'];
                                    }
                                ?>
                            </p>
                        </td>
                        <td>
                            <?= $row['noidung'] ?>
                        </td>
                        <td>
                            <a href="../chitiet.php?id=<?= $row['id_sanpham'] ?>#binhluan">Chi tiết</a>
                            <a class="btn btn-danger" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn xóa người dùng này không ?')">Xóa</a>
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
