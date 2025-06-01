<style>
    .prd-block {
        padding: 5px
    }

    .cart {
        color: red;
    }

    .cart td {
        color: rgb(172, 18, 18);
        font-size: 20px;
    }

    .cart table,
    tr,
    td {
        margin-top: 10px;
        padding: 5px;
    }

    table {
        border: 1px solid black;
        margin: 0 auto;
    }

    .cart p {
        margin: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        color: black;
    }

    .cart p span {
        color: red;
    }

    .cart .cart_button {
        display: flex;
        justify-content: center;
        gap: 30px;
    }

    .cart .cart_button a {
        text-decoration: none;
        color: white;
        border: 1px solid black;
        border-radius: 15px;
        padding: 7px;
        background-color: #a70c1b
    }

    .cart .cart_button a:hover {
        background-color: rgba(107, 42, 190, 0.46);
    }

    input[type="number"] {
        width: 30px;
        margin-right: 30px;
    }

    button {
        margin-left: 270px;
        border: none;
        background: none;
    }

    button a {
        padding: 5px;
        color: red;
    }

    button a:hover {
        text-decoration: none;
    }
</style>
<div class="prd-block">
    <h2>Giỏ hàng của bạn</h2>
    <div class="cart">
        <?php
        if (isset($_SESSION['giohang'])) {
            if (isset($_POST['sl'])) {
                foreach ($_POST['sl'] as $id_sp => $sl) {
                    //Nếu sl nhập vào là 0 thì unset sản phẩm đó
                    if ($sl == 0) {
                        unset($_SESSION['giohang'][$id_sp]);
                    } else {
                        $_SESSION['giohang'][$id_sp] = $sl;
                    }
                }
            }
            $arrId = array();
            //lấy ra id sản phẩm từ mảng session
            foreach ($_SESSION['giohang'] as $id_sp => $sl) {
                $arrId[] = $id_sp;
            }
            //Tách mảng arrId thành 1 chuỗi và ngăn cách bởi dấu phẩy
            $strID = implode(',', $arrId);
            if (isset($sl)) {
                $sql = "SELECT *FROM sanpham WHERE id_sp IN ($strID)";
                $query = mysqli_query($conn, $sql);
                $totalPriceAll = 0;
        ?>
                <form method="post" id="giohang">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        $totalPrice = $_SESSION['giohang'][$row['id_sp']] * $row['gia_sp'];
                    ?>
                        <table width="50%">
                            <tr>
                                <td class="cart-item-img" width="25%" rowspan="5"><img width="100" height="110" src="quantri/anh/<?php echo $row['anh_sp'] ?>" /></td>
                                <td width="25%">Sản phẩm:</td>
                                <td class="cart-item-title" width="50%"><?php echo $row['ten_sp'] ?></td>
                            </tr>
                            <tr>
                                <td>Giá:</td>
                                <td><span><?php echo $row['gia_sp'] ?> VNĐ</span></td>
                            </tr>
                            <tr>
                                <td>Size:</td>
                                <td><select name="size" id="" style="padding:5px">
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Số lượng:</td>
                                <td><input type="number" name="sl[<?php echo $row['id_sp'] ?>]" value="<?php echo $_SESSION['giohang'][$row['id_sp']] ?>" /><button><a href="chucnang/giohang/xoahang.php?id_sp=<?php echo $row['id_sp'] ?>">Xóa</a></button></td>
                            </tr>

                            <tr>
                                <td>Tổng tiền:</td>
                                <td><span><?php echo $totalPrice ?> VNĐ</span></td>
                            </tr>
                        </table>
                    <?php
                        $totalPriceAll += $totalPrice;
                    }
                    ?>
                </form>

                <p>Tổng giá trị giỏ hàng là: <span><?php echo $totalPriceAll ?>đ</span></p>
                <div class="cart_button">
                    <p><a href="#" onclick="document.getElementById('giohang').submit();">Cập nhật lại giỏ hàng</a></p>
                    <p><a href="index.php">Mua thêm sản phẩm</a> </p>
                    <p><a href="chucnang/giohang/xoahang.php?id_sp=0">Xóa hết sản phẩm</a></p>
                    <p><a href="index.php?page_layout=muahang"> Thanh toán</a></p>
                </div>
        <?php
            } else {
                echo 'Giỏ hàng rỗng';
            }
        } else {
            echo 'Giỏ hàng rỗng';
        }
        ?>
    </div>
</div>