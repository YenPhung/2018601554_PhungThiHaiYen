<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                if(rowCount("SELECT * FROM donhang WHERE id_taikhoan={$_GET['id']} && status=2")>0){
                    echo '<script>alert("Chỉ được xóa tài khoản chưa đặt đơn hàng nào")</script>';
                }
                
                else {
                    selectAll("DELETE FROM taikhoan WHERE id={$_GET['id']}");
                    header('location:nguoidung.php');
                }
            }
            ?>
            <a href="themnd.php" class="btn btn-success my-3 ml-3">Thêm tài khoản</a>
            <table class="table">
                <tr>
                    <th style="padding-left:20px">STT</th>
                    <th>Tên</th>
                    <th>Emai</th>
                    <th>Ảnh đại diện</th>
                    <th>Phân quyền</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                $stt = 1;
                foreach (selectAll("SELECT * FROM taikhoan") as $row) {
                ?>
                    <tr>
                        <td style="padding-left:25px"><?= $stt++ ?></td>
                        <td><?= $row['hoten'] ?></td>
                        <td><?= $row['taikhoan'] ?></td>
                        <td>
                            <img style="width: 50px;height: 50px;" src="../images/<?= empty($row['anh']) ? 'user.jfif' : $row['anh'] ?>" alt="">
                        </td>
                        <td>
                            <?= $row['phanquyen'] == 1 ? 'Admin' : 'Khách hàng' ?>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="suand.php?id=<?= $row['id'] ?>">Sửa</a>
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
