<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                foreach (selectAll("SELECT * FROM slide WHERE id={$_GET['id']}") as $item) {
                    $anh = $item['anh'];
                    $link = $item['link'];
                }
            }
            if (isset($_POST["sua"])) {
                $link = $_POST["link"];
                $anh = $_FILES['anh']['name'];
                $tmp1 = $_FILES['anh']['tmp_name'];
                $type1 = $_FILES['anh']['type'];
                $dir = '../images/';
                move_uploaded_file($tmp1, $dir . $anh);
                if (empty($anh)) {
                    selectAll("UPDATE slide SET link='$link' WHERE id={$_GET['id']}");
                }else{
                    selectAll("UPDATE slide SET link='$link' ,anh='$anh' WHERE id={$_GET['id']}");
                }
                header("location:slide.php");
            }
        ?>
            <form action="" method="post" class="ml-3 mt-3" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" name="link" class="form-control" value="<?= $link ?>"  required placeholder="Nhập Link">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh</label>
                    <label for="imgInp" style="cursor:pointer">
                        <img id="blah" style="object-fit:cover" src="../images/<?= $anh ?>" alt="your image" width="50" height="50" />
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