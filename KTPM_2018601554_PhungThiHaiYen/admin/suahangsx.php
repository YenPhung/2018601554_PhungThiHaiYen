<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                foreach (selectAll("SELECT * FROM hangsx WHERE masx={$_GET["id"]}") as $item) {
                    $tendm = $item['tensx'];
                };
            }
            if (isset($_POST['sua'])) {
                $hangsx = $_POST["hangsx"];
                selectAll("UPDATE hangsx SET tensx='$hangsx' WHERE masx={$_GET["id"]}");
                header('location:hangsx.php');
            }
            ?>
                <form action="" method="post" class="ml-3 mt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên hãng sản xuất</label>
                        <input type="text" name="hangsx" value="<?= $tendm ?>" class="form-control" required  placeholder="Nhập tên hãng sản xuất">
                    </div>
                    <button name="sua" type="submit" class="btn btn-success" style="cursor: pointer;">
                        Sửa hãng sản xuất
                    </button>
                </form>
            <?php
        }
    }

?>