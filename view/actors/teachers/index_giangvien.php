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
   if ($phanquyen != 3 || $phanquyen != 1) {
      header('location: ../../../login.php');
   }
} else {
   header('location: ../../../login.php');
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
   <title>ITC | Giảng Viên</title>
   <link REL="SHORTCUT ICON" HREF="../../../images/ITC.svg">
   <meta name="keywords" content="ITC">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="../../../css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="../../../css/style.css">
   <link rel="stylesheet" href="../../../css/user.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="../../../css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="../../../images/fevicon.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="../../../images/loading.gif" alt="#" /></div>
   </div>
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

                        <li class="nav-item">
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
            <div class="col-md-3">
               <div id="ho_co" class="order-box_main">
                  <div class="order-box text_align_center">
                     <h3>Học Viên</h3>
                     <p>Có <span><?php echo $p->laycot("SELECT COUNT(MaTK) FROM taikhoan WHERE PhanQuyen = 4"); ?></span> học viên</p>
                     <p>Có <span><?php echo $p->laycot("SELECT COUNT(MaTK) FROM taikhoan WHERE PhanQuyen = 3"); ?></span> giảng viên</p>
                     <p>Có <span><?php echo $p->laycot("SELECT COUNT(MaTK) FROM taikhoan WHERE PhanQuyen = 2"); ?></span> quản lý đào tạo</p>
                     <p>Có <span><?php echo $p->laycot("SELECT COUNT(MaTK) FROM taikhoan WHERE PhanQuyen = 1"); ?></span> quản trị viên</p>
                     <p>Có <span><?php echo $p->laycot("SELECT COUNT(MaTK) FROM taikhoan WHERE PhanQuyen = 5"); ?></span> GDTT</p>
                     <a href="quantrivien_nguoidung.php">Xem chi tiết</a>
                  </div>
                  <!-- <a class="read_more" href="Javascript:void(0)">Buy Now</a> -->
               </div>
            </div>
            <div class="col-md-3">
               <div id="ho_co" class="order-box_main">
                  <div class="order-box text_align_center">
                     <h3>Khóa học</h3>
                     <p>Có <span><?php echo $p->laycot("SELECT COUNT(MaKH) FROM khoahoc"); ?></span> Khóa học</p>
                     <a href="quantrivien_khoahoc.php">Xem chi tiết</a>
                     <ul class="supp">
                        <li>1</li>
                        <li>2</li>
                     </ul>
                  </div>
                  <!-- <a class="read_more" href="Javascript:void(0)">Buy Now</a> -->
               </div>
            </div>
            <div class="col-md-3">
               <div id="ho_co" class="order-box_main">
                  <div class="order-box text_align_center">
                     <h3>Lớp học </h3>
                     <p>Có <span><?php echo $p->laycot("SELECT COUNT(MaLH) FROM lophoc"); ?></span> lớp học</p>
                     <a href="quantrivien_lophoc.php">Xem chi tiết</a>
                     <ul class="supp">
                        <li>1</li>
                        <li>2</li>
                     </ul>
                  </div>
                  <!-- <a class="read_more" href="Javascript:void(0)">Buy Now</a> -->
               </div>
            </div>
            <div class="col-md-3">
               <div id="ho_co" class="order-box_main">
                  <div class="order-box text_align_center">
                     <h3>Kỳ thi </h3>
                     <p>Có <span><?php echo $p->laycot("SELECT COUNT(MaLT) FROM lichthi"); ?></span> kỳ thi</p>
                     <a href="quantrivien_kythi.php">Xem chi tiết</a>
                     <ul class="supp">
                        <li>1</li>
                        <li>2</li>
                     </ul>
                  </div>
                  <!-- <a class="read_more" href="Javascript:void(0)">Buy Now</a> -->
               </div>
            </div>
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