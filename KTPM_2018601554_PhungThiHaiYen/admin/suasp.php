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
                    <label for="exampleInputEmail1">T??n sa??n ph????m</label>
                    <input type="text" value="<?= $ten ?>" required name="ten" class="form-control" placeholder="Nh????p t??n sa??n ph????m">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Danh mu??c </label>
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
                    <label for="exampleInputEmail1">Gia??</label>
                    <input type="text" value="<?= $gia ?>" required name="gia" class="form-control" placeholder="Nh????p Gia??">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gia?? Khuy????n Ma??i (????n vi?? %)</label>
                    <input type="text" required name="giakm" value="<?= $giakm ?>" class="form-control" placeholder="Nh????p Gia?? Khuy????n Ma??i (????n vi?? %)">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">A??nh sa??n ph????m</label>
                    <input type="file" name="anh" class="form-control">
                    <input type="file" name="anh1" class="form-control">
                    <input type="file" name="anh2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Chi ti????t</label>
                    <textarea required name="chitiet" class="form-control" rows="3" placeholder="Nh????p chi ti????t"><?= $chitiet ?></textarea>
                </div>
                <button name="sua" type="submit" class="btn btn-success" style="cursor: pointer;">
                    S???a sa??n ph????m
                </button>
            </form>
            <?php
        }
    }

?>