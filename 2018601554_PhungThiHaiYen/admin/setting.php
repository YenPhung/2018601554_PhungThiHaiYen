<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            ?>
            <h3 class="pl-5">Quản trị Thông tin Website</h3>
            <table class="table">
                <tr>
                    <th class="text-center">Logo</th>
                    <th>Địa chỉ</th>
                    <th class="text-center">Slogan</th>
                    <th>Số điện thoại</th>
                    <th class="text-center">Email</th>
                </tr>
                <?php 
                   $stt=1;
                    foreach (selectAll("SELECT * FROM website") as $row) {
                    ?>
                        <tr>
                            <td style="padding-left:25px">
                                <img src="../images/<?= $row['logo'] ?>" alt="" style="width:50px;height:50px;object-fit:cover">
                            </td>
                            <td><?= $row['diachi'] ?></td>
                            <td><?= $row['slogan'] ?></td>
                            <td><?= $row['sdt'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <a class="btn btn-secondary" href="suasetting.php?id=<?= $row['id'] ?>">Sửa</a>
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

