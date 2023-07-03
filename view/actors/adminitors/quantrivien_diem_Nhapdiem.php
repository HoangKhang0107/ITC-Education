<?php
ob_start();
session_start();
if (isset($_SESSION['matk'])) {
    $layid_dangnhap = $_SESSION['matk'];
}
include("../../../class/class-lms.php");
$p = new lms();
if (isset($_SESSION['matk'])) {
    $phanquyen = $p->laycot("SELECT PhanQuyen FROM taikhoan WHERE MaTK = '$layid_dangnhap' LIMIT 1");
    if ($phanquyen != 1) {
        header('location: ../../../login.php');
    }
} else {
    header('location: ../../../login.php');
}
$laymatk = 0;
if (isset($_REQUEST['matk'])) {
    $laymatk = $_REQUEST['matk'];
}
$laymalh = 0;
if (isset($_REQUEST['malh'])) {
    $laymalh = $_REQUEST['malh'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>ITC | Quản Trị Viên | Điểm</title>
    <link REL="SHORTCUT ICON" HREF="../../../images/ITC.svg">
    <meta name="keywords" content="ITC">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/table.css">
    <link rel="stylesheet" href="../../../css/btn.css">
    <link rel="stylesheet" href="../../../css/user.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../../../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../../../images/fevicon.png" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script>
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({
                'padding-right': scrollWidth
            });
        }).resize();
    </script>
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <!-- <div class="loader_bg">
        <div class="loader"><img src="../../../images/loading.gif" alt="#" /></div>
    </div> -->
    <!-- end loader -->
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="index.html"><img src="../../../images/ITC.svg" alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item ">
                                    <a class="nav-link" href="quantrivien_nguoidung.php">Người dùng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="quantrivien_khoahoc.php">Khóa học</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="quantrivien_lophoc.php">Lớp học</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="quantrivien_lichthi.php">Lịch thi</a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link" href="quantrivien_diem.php">Điểm</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2  d_none">
                    <ul class="email text_align_right">
                    <li class="dropdown">
                     <a href="index_quantrivien.php" class="dropbtn" class="d-block active" style="color: white;"><?php echo $p->laycot("SELECT TenDangNhap FROM taikhoan WHERE MaTK = '$layid_dangnhap' LIMIT 1"); ?></a>
                     <div class="dropdown-content">
                        <a href="index_quantrivien.php">Trang quản trị viên</a>
                        <a href="../student/index_hocvien.php">Trang học viên</a>
                        <a href="../teachers/index_giangvien.php">Trang giảng viên</a>
                        <a href="../ministry/index_giaovu.php">Trang Giáo vụ</a>
                        <a href="../director/index_giamdoctt.php">Trang GDTT</a>
                        <a href="../../../logout.php">LOGOUT</a>
                     </div>
                  </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->
    <!-- top -->
    <div class="full_bg">
    </div>
    <!-- end banner -->

    <!-- domain -->
    <div class="domain">
        <div class="container">
            <div class="row">
                <section>
                    <h1>Nhập điểm <span class="blue_light"><?php echo $p->laycot("SELECT Hovatennguoidung FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?></span></h1>
                    <form method="post" action="">
                        <input type="text" placeholder="Lần 1" name="l1" value="<?php echo $p->laycot("SELECT DiemL1 FROM diemhocvien WHERE MaHV = '$laymatk' LIMIT 1"); ?>">
                        <input type="text" placeholder="Lần 2" name="l2" value="<?php echo $p->laycot("SELECT DiemL2 FROM diemhocvien WHERE MaHV = '$laymatk' LIMIT 1"); ?>">
                        <input type="text" placeholder="Lần 3" name="l3" value="<?php echo $p->laycot("SELECT DiemL3 FROM diemhocvien WHERE MaHV = '$laymatk' LIMIT 1"); ?>">
                        <input type="text" placeholder="Lần 4" name="l4" value="<?php echo $p->laycot("SELECT DiemL4 FROM diemhocvien WHERE MaHV = '$laymatk' LIMIT 1"); ?>">
                        <input type="text" placeholder="Lần 5" name="l5" value="<?php echo $p->laycot("SELECT DiemL5 FROM diemhocvien WHERE MaHV = '$laymatk' LIMIT 1"); ?>">
                        <input type="submit" value="Nhập điểm" name="btn_nhapdiem" id="btn_nhapdiem">
                    </form>
                    <?php
                    switch ($_POST['btn_nhapdiem'] ?? null) {
                        case 'Nhập điểm': {
                                $l1 = $_REQUEST['l1'];
                                $l2 = $_REQUEST['l2'];
                                $l3 = $_REQUEST['l3'];
                                $l4 = $_REQUEST['l4'];
                                $l5 = $_REQUEST['l5'];
                                
                                if ($p->themxoasua("SELECT MaHV,MaLH FROM diemhocvien WHERE MaHV IN('.$laymatk.') AND MaLH IN('.$laymalh.');") == 1) {
                                    if (($p->themxoasua("UPDATE diemhocvien SET MaHV = '$laymatk', DiemL1 = '$l1', DiemL2 = '$l2', DiemL3 = '$l3', DiemL4 = '$l4', DiemL5 = '$l5' WHERE MaHV = '$laymatk' LIMIT 1") == 1)) {
                                        echo '<script> alert("Sửa điểm thành công");</script>';
                                        header("refresh:0;url=quantrivien_diem_danhsachhocviencualophoc.php?malh=$laymalh");
                                    } else {
                                        echo '<script> alert("Sửa điểm thất bại. Vui lòng kiểm tra lại.");</script>';
                                    }
                                } else {
                                    if ($p->themxoasua("INSERT INTO diemhocvien(MaHV,MaLH,DiemL1,DiemL2,DiemL3,DiemL4,DiemL5) VALUES('$laymatk',$laymalh,'$l1','$l2','$l3','$l4','$l5')") == 1) {
                                        echo '<script> alert("Nhập điểm học viên thành công");</script>';
                                        header("refresh:0;url=quantrivien_diem_danhsachhocviencualophoc.php?malh=$laymalh");
                                    }
                                }
                                break;
                            }
                    }
                    ?>
                </section>
            </div>
        </div>
    </div>
    <!-- end domain -->
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="infoma text_align_left">
                            <h3>ITC</h3>
                            <ul class="commodo">
                                <li>Commodo</li>
                                <li>consequat. Duis a</li>
                                <li>ute irure dolor</li>
                                <li>in reprehenderit </li>
                                <li>in voluptate </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="infoma">
                            <h3>Thông tin liên hê</h3>
                            <ul class="conta">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Địa chỉ : 12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Tp. Hồ Chí Minh
                                </li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Hotline : +01 1234567890</li>
                                <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> Email : itceducation@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="infoma">
                            <h3>ITC Education</h3>
                            <ul class="menu_footer">
                                <li><a href="index.html">Trang chủ</a></li>
                                <li><a href="about.html">Khóa học </a></li>
                                <li><a href="domain.html">Báo cáo</a></li>
                                <li><a href="hosting.html">Kết quả học tập</a></li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="infoma text_align_left">
                            <h3>Services.</h3>
                            <ul class="commodo">
                                <li>Commodo</li>
                                <li>consequat. Duis a</li>
                                <li>ute irure dolor</li>
                                <li>in reprehenderit </li>
                                <li>in voluptate </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2023 All Rights Reserved <a href="#">ITC</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <!-- sidebar -->
    <script src="../../../js/custom.js"></script>
</body>

</html>