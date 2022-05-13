<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_POST['them'])) {
                $danhmuc = $_POST["danhmuc"];
                selectAll("INSERT INTO danhmuc VALUES (NULL,'$danhmuc')");
                header('location:index.php');
            }
            ?>
                <form action="" method="post" class="ml-3 mt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" name="danhmuc" class="form-control" required  placeholder="Nhập tên danh mục">
                    </div>
                    <button name="them" type="submit" class="btn btn-success" style="cursor: pointer;">
                        Thêm danh mục
                    </button>
                </form>
            <?php
        }
    }
?>