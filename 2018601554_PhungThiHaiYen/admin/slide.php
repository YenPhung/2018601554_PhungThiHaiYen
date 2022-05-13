<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                selectAll("DELETE FROM slide WHERE id={$_GET['id']}");
                header('location:slide.php');
            }
            ?>
            <a href="themslide.php" class="btn btn-success my-3 ml-3">Thêm Slide</a>
            <table class="table">
                <tr>
                    <th style="padding-left:20px">STT</th>
                    <th>Ảnh</th>
                    <th>Link</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                $stt = 1;
                foreach (selectAll("SELECT * FROM slide") as $row) {
                ?>
                    <tr>
                        <td style="padding-left:25px"><?= $stt++ ?></td>
                        <td>
                            <img width="50" height="50" src="../images/<?= $row['anh'] ?>" alt="">
                        </td>
                        <td>
                            <?= $row['link'] ?>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="suaslide.php?id=<?= $row['id'] ?>">Sửa</a>
                            <a class="btn btn-danger" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn xóa Slide này không ?')">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            
            </table>
            <?php            
        }
    }
