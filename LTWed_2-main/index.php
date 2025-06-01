<?php
session_start();
include_once('cauhinh/ketnoi.php');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Shop Dép - Siêu xịn</title>
    <link rel="icon" type="image/x-icon" href="quantri/anh/icon.jpg">
    <link rel="stylesheet" type="text/css" href="css/trangchu.css">
    <link rel="stylesheet" type="text/css" href="css/chitietsp.css">
    <link rel="stylesheet" type="text/css" href="css/khuyenmai.css">

    <!-- Icon libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div id="wrapper">
        <!-- HEADER -->


        <!-- TOP BAR -->
        <div id="head-container">
            <!-- Logo -->
            <div><a href="index.php"><img class="logo-img" src="quantri/anh/logo_bieutuong.png" alt=""></a></div>

            <!-- Search -->
            <div id="search-bar">
                <?php include_once('chucnang/timkiem/timkiem.php'); ?>
            </div>

            <!-- Auth + Mạng xã hội + Giỏ hàng -->
            <div class="auth-container">
                <?php if (isset($_SESSION['username'])): ?>
                    <p>Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
                    <a href="logout.php" class="auth-link">Đăng xuất</a>
                <?php else: ?>
                    <a href="login.php" class="auth-link"><i class='bx bxs-user-circle'></i></a>
                <?php endif; ?>

                <div class="logo-fb"><i class='bx bxl-facebook-circle'></i></div>
                <div class="logo-tiktok"><a href="https://www.tiktok.com/@tqtuan295?lang=vi-VN"><i class='bx bxl-tiktok'></i></a></div>

                <div id="logo">
                    <a href="index.php"><img width="50px" height="40px" src="quantri/anh/giohang.jpg" /></a>
                </div>

                <?php include_once('chucnang/giohang/giohangcuaban.php'); ?>
            </div>
        </div>

        <!-- NAVIGATION BAR -->
        <nav class="navbar navbar-expand">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?page_layout=gioithieu">Giới thiệu</a></li>
                <li><a href="index.php?page_layout=depnam">Dép nam</a></li>
                <li><a href="index.php?page_layout=depnu">Dép nữ</a></li>
                <li><a href="index.php?page_layout=tatcasanpham">Tất cả sản phẩm</a></li>
                <li><a href="index.php?page_layout=khuyenmai">Khuyến mãi</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
                    <li><a href="quantri/quantri.php">Trang Admin</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- SLIDE (chỉ khi không có page_layout) -->
        <?php
        if (!isset($_GET['page_layout'])) {
            echo '<div class="slide">';
            include_once('Slide/slide.php');
            echo '</div>';
        }
        ?>

        <!-- MAIN CONTENT -->
        <div id="main">
            <?php
            if (isset($_GET['page_layout'])) {
                switch ($_GET['page_layout']) {
                    case 'tatcasanpham':
                        include_once('chucnang/menungang/tatcasanpham.php');
                        break;
                    case 'chitietsp':
                        include_once('chucnang/sanpham/chitietsp.php');
                        break;
                    case 'khuyenmai':
                        include_once('chucnang/menungang/khuyenmai.php');
                        break;
                    case 'giohang':
                        include_once('chucnang/giohang/giohang.php');
                        break;
                    case 'muahang':
                        include_once('chucnang/giohang/muahang.php');
                        break;
                    case 'gioithieu':
                        include_once('chucnang/menungang/gioithieu.php');
                        break;
                    case 'depnu':
                        include_once('chucnang/menungang/depnu.php');
                        break;
                    case 'depnam':
                    default:
                        include_once('chucnang/menungang/depnam.php');
                        break;
                }
            } else {
                include_once('chucnang/sanpham/spmoi.php');
                echo '<div class="slide">';
                include_once('Slide/slide2.php');
                echo '</div>';
                include_once('chucnang/sanpham/spdacbiet.php');
                include_once('chucnang/menungang/khuyenmai.php');
            }
            ?>
        </div>

        <!-- FOOTER -->
        <div id="footer">
            <div id="footer-item">
                <h4>Cửa hàng Website bán dép <b>Nguyệt Dạ Lâu</b> uy tín Việt Nam</h4>
                <p><span>Địa chỉ:</span> 170 - An Dương Vương, Thành Phố Quy Nhơn | <span>Hotline: 0946042975</span></p>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="./javacsript/slider.js"></script>
</body>

</html>