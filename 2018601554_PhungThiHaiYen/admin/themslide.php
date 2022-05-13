<?php 
    include 'header.php';
    if (isset($_POST["them"])) {
        $link = $_POST["link"];
        $anh = $_FILES['anh']['name'];
        $tmp1 = $_FILES['anh']['tmp_name'];
        $type1 = $_FILES['anh']['type'];
        $dir = '../images/';
        move_uploaded_file($tmp1, $dir . $anh);
        if (empty($anh)) {
            $error = 'Vui lòng chọn ảnh';
        }else{
            selectAll("INSERT INTO slide VALUES(NULL,'$link','$anh')");
            header("location:slide.php");
        }
    }
?>
    <form action="" method="post" class="ml-3 mt-3" enctype="multipart/form-data">
        <?php 
            if (isset($error)) {
                ?>
                    <p class="text-danger"><?= $error ?></p>
                <?php
            }
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Link</label>
            <input type="text" name="link" class="form-control" value=""  required placeholder="Nhập Link">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ảnh</label>
            <label for="imgInp" style="cursor:pointer">
                <img id="blah" style="object-fit:cover" src="https://cdn.pixabay.com/photo/2019/06/25/12/59/click-here-4298145_1280.png" alt="your image" width="50" height="50" />
            </label>
            <input hidden type="file" name="anh" accept="image/*" id="imgInp" class="form-control" >
        </div>
        <button name="them" type="submit" class="btn btn-success" style="cursor: pointer;">
            Thêm slide
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
?>