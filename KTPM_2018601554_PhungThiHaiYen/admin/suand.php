<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                foreach (selectAll("SELECT * FROM taikhoan WHERE id={$_GET['id']}") as $item) {
                   $taikhoan = $item['taikhoan'];
                   $matkhau = $item['matkhau'];
                   $hoten = $item['hoten'];
                   $anha = $item['anh'];
                   $phanquyen = $item['phanquyen'];
                }
            }
            if (isset($_POST['sua'])) {
                $ten = $_POST["ten"];
                $phanquyen = $_POST["phanquyen"];
                $email = $_POST["email"];
                $ten = $_POST["ten"];
                $anh = $_FILES['anh']['name'];
                $tmp1 = $_FILES['anh']['tmp_name'];
                $type1 = $_FILES['anh']['type'];
                $dir = '../images/';
                move_uploaded_file($tmp1, $dir . $anh);
                if (empty($anh)) {
                   selectAll("UPDATE `taikhoan` SET `taikhoan`='$email',`hoten`='$ten',`phanquyen`='$phanquyen' WHERE id={$_GET["id"]}");
                }
                else{
                selectAll("UPDATE `taikhoan` SET `taikhoan`='$email',`hoten`='$ten',`anh`='$anh',`phanquyen`='$phanquyen' WHERE id={$_GET["id"]}");
                }
                header('location:nguoidung.php');
            }
            ?>
            <form action="" method="post" class="ml-3 mt-3" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" name="ten" value="<?= $hoten ?>" class="form-control"  placeholder="Nhập Họ và tên">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phân quyền</label>
                    <select name="phanquyen" id="input" class="form-control" >
                        <option value="1">Admin</option>
                        <option value="0">Khách hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $taikhoan ?>" placeholder="Nhập Giá">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh đại diện</label>
                    <label for="imgInp" style="cursor:pointer">
                        <img id="blah"  width="50" height="50" src="<?= empty($anha)?'https://cdn.pixabay.com/photo/2019/06/25/12/59/click-here-4298145_1280.png':'../images/'.$anha.'' ?>">
                       
                    </label>
                    <input hidden type="file" name="anh" accept="image/*" id="imgInp" class="form-control" >
                </div>
                <button name="sua" type="submit" class="btn btn-success" style="cursor: pointer;">
                    Cập nhật
                </button>
            </form>
            <?php
            ?>
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