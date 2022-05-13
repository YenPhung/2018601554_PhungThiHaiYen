<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                foreach (selectAll("SELECT * FROM sanpham WHERE id={$_GET['id']}") as $item) {
                    $ten = $item['ten'];
                    $gia = $item['gia'];
                    $giakm = $item['giakm'];
                    $chitiet = $item['chitiet'];
                }
            }
            if (isset($_POST['sua'])) {
                $ten = $_POST["ten"];
                $chitiet = $_POST["chitiet"];
                $danhmuc = $_POST["danhmuc"];
                $gia = $_POST["gia"];
                $giakm = isset($_POST['giakm']) ? $_POST['giakm'] : 0;
                $anh = $_FILES['anh']['name'];
                $tmp1 = $_FILES['anh']['tmp_name'];
                $type1 = $_FILES['anh']['type'];
                $anh1 = $_FILES['anh1']['name'];
                $tmp2 = $_FILES['anh1']['tmp_name'];
                $type2 = $_FILES['anh1']['type'];
                $anh2 = $_FILES['anh2']['name'];
                $tmp3 = $_FILES['anh2']['tmp_name'];
                $type3 = $_FILES['anh2']['type'];
                $id_product = $_POST["id_product"];
                $dir = '../images/';
                move_uploaded_file($tmp1, $dir . $anh);
                move_uploaded_file($tmp2, $dir . $anh1);
                move_uploaded_file($tmp3, $dir . $anh2);
                if (empty($_FILES['anh']['name'] || $_FILES['anh1']['name'] || $_FILES['anh2']['name'])) {
                    selectAll("UPDATE sanpham SET ten='$ten',gia='$gia',giakm='$giakm',chitiet='$chitiet' WHERE id={$_GET["id"]}");
                    header('location:sanpham.php');
                }else{
                    selectAll("UPDATE sanpham SET ten='$ten',danhmuc = '$danhmuc', gia='$gia',anh='$anh',anh1='$anh1',anh2='$anh2'giakm='$giakm',chitiet='$chitiet' WHERE id={$_GET["id"]}");
                    header('location:sanpham.php');
                }
            }
            ?>
            <form action="" method="post" class="ml-3 mt-3" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" value="<?= $ten ?>" required name="ten" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Danh mục </label>
                    <select required name="danhmuc" id="input" class="form-control">
                        <?php
                        foreach (selectAll("SELECT * FROM danhmuc") as $item) {
                        ?>
                            <option value="<?= $item['id'] ?>"><?= $item['danhmuc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá</label>
                    <input type="text" value="<?= $gia ?>" required name="gia" class="form-control" placeholder="Nhập Giá">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá Khuyến Mãi (Đơn vị %)</label>
                    <input type="text" required name="giakm" value="<?= $giakm ?>" class="form-control" placeholder="Nhập Giá Khuyến Mãi (Đơn vị %)">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                    <input type="file" name="anh" class="form-control">
                    <input type="file" name="anh1" class="form-control">
                    <input type="file" name="anh2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Chi tiết</label>
                    <textarea required name="chitiet" class="form-control" rows="3" placeholder="Nhập chi tiết"><?= $chitiet ?></textarea>
                </div>
                <button name="sua" type="submit" class="btn btn-success" style="cursor: pointer;">
                    Sửa sản phẩm
                </button>
            </form>
            <?php
        }
    }

?>