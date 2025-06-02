<style>
    #cart {
        position: relative;
        display: inline-block;
        margin-left: 10px;
    }



    .cart-count {
        position: absolute;
        top: -30px;
        right: -1px;
        background-color: #999;
        color: white;
        font-size: 12px;
        font-weight: bold;
        padding: 2px 8px;
        border-radius: 50%;
        position: absolute !important;
    }
</style>
<div id="cart">
    <a href="index.php?page_layout=giohang">

        <span class="cart-count">
            <?php
            if (isset($_SESSION['giohang'])) {
                echo count($_SESSION['giohang']);
            } else {
                echo 0;
            }
            ?>
        </span>

    </a>
</div>