<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_POST['them'])) {
                $hangsx = $_POST["hangsx"];
                selectAll("INSERT INTO hangsx VALUES (NULL,'$hangsx')");
                header('location:hangsx.php');
            }
            ?>
                <form action="" method="post" class="ml-3 mt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên hãng sản xuất</label>
                        <input type="text" name="hangsx" class="form-control" required  placeholder="Nhập tên hãng sản xuất">
                    </div>
                    <button name="them" type="submit" class="btn btn-success" style="cursor: pointer;">
                        Thêm hãng sản xuất
                    </button>
                </form>
            <?php
        }
    }

