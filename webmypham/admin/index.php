<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                selectAll("DELETE FROM danhmuc WHERE id={$_GET['id']}");
                header('location:index.php');
            }
            ?>
            <a href="themdanhmuc.php" class="btn btn-success my-3 ml-3">Thêm danh mục</a>
            <table class="table" id="myTable">
                <tr>
                    <th style="padding-left:20px">STT</th>
                    <th>Danh mục</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Chức năng</th>
                </tr>
                <?php 
                $stt=1;
                    foreach (selectAll("SELECT * FROM danhmuc") as $row) {
                    ?>
                        <tr class="row-search">
                            <td style="padding-left:25px"><?= $stt++ ?></td>
                            <td class="content"><?= $row['danhmuc'] ?></td>
                            <td><?= rowCount("SELECT * FROM sanpham WHERE id_danhmuc={$row['id']}") ?></td>
                            <td>
                                <a class="btn btn-secondary" href="suadanhmuc.php?id=<?= $row['id'] ?>">Sửa</a>
                                <a class="btn btn-danger" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn xóa danh mục này không ?')">Xóa</a>
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



