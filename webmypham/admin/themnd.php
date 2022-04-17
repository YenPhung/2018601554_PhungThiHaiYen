<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_POST['them'])) {
                $ten = $_POST["ten"];
                $phanquyen = $_POST["phanquyen"];
                $email = $_POST["email"];
                $ten = $_POST["ten"];
                $matkhau = md5($_POST["matkhau"]);
                $anh = $_FILES['anh']['name'];
                $tmp1 = $_FILES['anh']['tmp_name'];
                $type1 = $_FILES['anh']['type'];
                $dir = '../images/';
                move_uploaded_file($tmp1, $dir . $anh);
                if (empty($_FILES['anh']['name'])) {
                    selectAll("INSERT INTO taikhoan VALUES(null,'$email','$matkhau','$ten','',$phanquyen)");
                }
                else{
                    selectAll("INSERT INTO taikhoan VALUES(null,'$email','$matkhau','$ten','',$phanquyen)");
                }
                header('location:nguoidung.php');
            }
            ?>
            <form action="" method="post" class="ml-3 mt-3" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" name="ten" class="form-control"  required placeholder="Nhập Họ và tên">
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
                    <input type="text" name="email" class="form-control" required placeholder="Nhập Email">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="matkhau" class="form-control" required placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh đại diện</label>
                    <label for="imgInp" style="cursor:pointer">
                        <img id="blah" src="https://cdn.pixabay.com/photo/2019/06/25/12/59/click-here-4298145_1280.png" alt="your image" width="50" height="50" />
                    </label>
                    <input hidden type="file" name="anh" accept="image/*" id="imgInp" class="form-control" >
                </div>
                <button name="them" type="submit" class="btn btn-success" style="cursor: pointer;">
                Thêm người dùng
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