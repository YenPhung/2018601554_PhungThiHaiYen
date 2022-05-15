<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                foreach (selectAll("SELECT * FROM website WHERE id={$_GET['id']}") as $item) {
                    $logo = $item['logo'];
                    $diachi = $item['diachi'];
                    $slogan = $item['slogan'];
                    $sdt = $item['sdt'];
                    $email = $item['email'];
                }
            }
            if (isset($_POST["sua"])) {
                $diachi = $_POST["diachi"];
                $sdt = $_POST["sdt"];
                $email = $_POST["email"];
                $slogan = $_POST["slogan"];
                $anh = $_FILES['anh']['name'];
                $tmp1 = $_FILES['anh']['tmp_name'];
                $dir = '../images/';
                move_uploaded_file($tmp1, $dir . $anh);
                if (empty($anh)) {
                    selectAll("UPDATE `website` SET`diachi`='$diachi',`slogan`='$slogan',`sdt`='$sdt',`email`='$email' WHERE id={$_GET['id']}");
                    header('location:setting.php');
                }else{
                    selectAll("UPDATE `website` SET `logo`='$anh',`diachi`='$diachi',`slogan`='$slogan',`sdt`='$sdt',`email`='$email' WHERE id={$_GET['id']}");
                    header('location:setting.php');
                }
            }
            ?>
                <form action="" method="post" class="ml-3 mt-3" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" name="diachi" value="<?= $diachi ?>" class="form-control"  placeholder="Nhập Địa chỉ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slogan</label>
                        <input type="text" name="slogan" class="form-control" value="<?=$slogan?>" placeholder="Nhập Slogan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text" name="sdt" class="form-control" value="<?=$sdt?>" placeholder="Nhập Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ Email</label>
                        <input type="text" name="email" class="form-control" value="<?=$email?>" placeholder="Nhập Địa chỉ Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh đại diện</label>
                        <label for="imgInp" style="cursor:pointer">
                            <img id="blah" style="object-fit:cover" src="../images/<?= $logo ?>" alt="your image" width="200" height="50" />
                        </label>
                        <input hidden type="file" name="anh" accept="image/*" id="imgInp" class="form-control" >
                    </div>
                    <button name="sua" type="submit" class="btn btn-success" style="cursor: pointer;">
                        Cập nhật
                    </button>
                </form>
                <script>
                    imgInp.onchange = evt => {
                        const [file] = imgInp.files
                        if (file) {
                            blah.src = URL.createObjectURL(file)
                        }
                    }
                </script>
            <?php
        }
    }
?>