<?php 
    include 'header.php';
    if (isset($_GET["id"])) {
        foreach (selectAll("SELECT * FROM danhmuc WHERE id={$_GET["id"]}") as $item) {
            $tendm = $item['danhmuc'];
        };
    }
    if (isset($_POST['sua'])) {
        $danhmuc = $_POST["danhmuc"];
        selectAll("UPDATE danhmuc SET danhmuc='$danhmuc' WHERE id={$_GET["id"]}");
        header('location:index.php');
    }
    ?>
        <form action="" method="post" class="ml-3 mt-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" name="danhmuc" value="<?= $tendm ?>" class="form-control" required  placeholder="Nhập tên danh mục">
            </div>
            <button name="sua" type="submit" class="btn btn-success" style="cursor: pointer;">
                Sửa danh mục
            </button>
        </form>
    <?php
?>