<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        if ($permission==1) {
            if (isset($_GET["id"])) {
                if(rowCount("SELECT * FROM sanpham WHERE id={$_GET['id']} && status=1 ")>0){
                    selectall("UPDATE sanpham SET status=0 WHERE id={$_GET["id"]} && status=1");
                    header('location:sanpham.php');
                  }
                  else {
                    selectall("UPDATE sanpham SET status=1 WHERE id={$_GET["id"]} && status=0");
                    header('location:sanpham.php');
                  }
            }
            ?>
            <a href="themsp.php" class="btn btn-success my-3 ml-3">Thêm sản phẩm</a>
            <table class="table">
                <tr>
                    <th style="padding-left:20px">STT</th>
                    <th>Sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                <?php 
                   $stt=1;
                    foreach (selectAll("SELECT * FROM sanpham") as $row) {
                    ?>
                        <tr>
                            <td style="padding-left:25px"><?= $stt++ ?></td>
                            <td><?= $row['ten'] ?></td>
                            <td><?= number_format($row['gia']) ?>đ</td>
                            <td>
                                <img src="../images/<?= $row['anh1'] ?>" width="50" alt="">
                                <img src="../images/<?= $row['anh2'] ?>" width="50" alt="">
                                <img src="../images/<?= $row['anh3'] ?>" width="50" alt="">
                            </td>
                            <td>
                            <?php 
                                if ($row['status']==0) {
                                    ?>
                                    <span>Đang Bán</span>
                                <?php 
                                }else{
                                    ?>
                                    <span>Dừng Bán</span>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="suasp.php?id=<?= $row['id'] ?>">Sửa</a>
                                <?php 
                                $status = $row['status'];
                                if ($status==0) {
                                    ?>
                                    <a type="button" class="btn btn-danger btn-icon-text" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn dừng bán sản phẩm này không?')">
                                    <i class="mdi mdi-cart-off btn-icon-prepend"></i> Dừng Bán </a>
                                <?php 
                                }else{
                                    ?>
                                    <a type="button" class="btn btn-danger btn-icon-text" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn tiếp tục bán sản phẩm này không?')">
                                    <i class="mdi mdi-cart-outline btn-icon-prepend"></i> Bán </a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                ?>
               
            </table>
            <script src="./search.js?v=<?php echo time()?>"></script>
            <?php
        }
    }

