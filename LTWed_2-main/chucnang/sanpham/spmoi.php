<div class="prd-block">
    <h2>Sản phẩm mới về</h2>
    <div class="pr-list">
        <?php
        $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 10";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="prd-item">
                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img width="230" height="250" src="quantri/anh/<?php echo $row['anh_sp'] ?>" /></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a></h3>
                <p>Tình trạng: <?php echo $row['tinh_trang'] ?></p>
                <p class="price">Giá: <span><?php echo $row['gia_sp'] ?>đ</span></p>
            </div>
        <?php
        }
        ?>
        <!-- <div class="clear"></div> -->
    </div>
</div>