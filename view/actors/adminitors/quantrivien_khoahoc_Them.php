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
   <title>ITC | Quản Trị Viên | Thêm người dùng</title>
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
   <link rel="stylesheet" href="../../../css/style-form.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="../../../css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="../../../images/fevicon.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <script>
      'use strict';
      var textInput = document.querySelector('input');
      var inputWrap = textInput.parentElement;
      var inputWidth = parseInt(getComputedStyle(inputWrap).width);
      var svgText = Snap('.line');
      var qCurve = inputWidth / 2; // For correct curving on diff screen sizes
      var textPath = svgText.path("M0 0 " + inputWidth + " 0");
      var textDown = function() {
         textPath.animate({
            d: "M0 0 Q" + qCurve + " 40 " + inputWidth + " 0"
         }, 150, mina.easeout);
      };
      var textUp = function() {
         textPath.animate({
            d: "M0 0 Q" + qCurve + " -30 " + inputWidth + " 0"
         }, 150, mina.easeout);
      };
      var textSame = function() {
         textPath.animate({
            d: "M0 0 " + inputWidth + " 0"
         }, 200, mina.easein);
      };
      var textRun = function() {
         setTimeout(textDown, 200);
         setTimeout(textUp, 400);
         setTimeout(textSame, 600);
      };

      (function() {
         textInput.addEventListener('focus', function() {
            var parentDiv = this.parentElement;
            parentDiv.classList.add('active');
            textRun();
            this.addEventListener('blur', function() {
               var rg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.]{3,9})+\.([A-Za-z]{2,4})$/;
               this.value == 0 ? parentDiv.classList.remove('active') : null;
               !rg.test(this.value) && this.value != 0 ?
                  (parentDiv.classList.remove('valid'), parentDiv.classList.add('invalid'), parentDiv.style.transformOrigin = "center") :
                  rg.test(this.value) && this.value != 0 ?
                  (parentDiv.classList.add('valid'), parentDiv.classList.remove('invalid'), parentDiv.style.transformOrigin = "bottom") : null;
            });
            parentDiv.classList.remove('valid', 'invalid')
         });
      })();
   </script>
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
                        <li class="nav-item active">
                           <a class="nav-link" href="quantrivien_khoahoc.php">Khóa học</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="quantrivien_lophoc.php">Lớp học</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="quantrivien_kythi.php">Kỳ thi</a>
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
                  <h3><a href="index_quantrivien.php" class="d-block" style="color: white;"><?php echo $p->laycot("SELECT TenDangNhap FROM taikhoan WHERE MaTK = '$layid_dangnhap' LIMIT 1"); ?></a></h3>
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
         <section class="content bgcolor-4">
            <form action="" method="post">
               <h1>THÔNG TIN NGƯỜI DÙNG <span class="blue_light"><?php echo $p->laycot("SELECT Hovatennguoidung FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?></span></h1>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Tên đăng nhập" type="text" id="tendangnhap" name="tendangnhap" />
                  <label class="input__label input__label--ruri" for="input-26">
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Tên người dùng" type="text" id="hovaten" name="hovaten" />
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <span class="input input--ruri">
                  <select class="input__field input__field--ruri" id="vaitro" style="background-color: RGB(47, 50, 56); color: white" name="vaitro">
                     <?php
                     $p->load_selectionvaitro("SELECT * FROM vaitro");
                     ?>
                  </select>
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <span class="input input--ruri">
                  <select class="input__field input__field--ruri" id="trangthai" style="background-color: RGB(47, 50, 56); color: white" name="trangthai">
                     <?php
                     $p->load_selectiontrangthai("SELECT * FROM trangthai");
                     ?>
                  </select>
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Ngày Sinh" type="date" id="ngaysinh" name="ngaysinh" />
                  <label class="input__label input__label--ruri" for="input-26">
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Nơi Sinh" type="text" id="noisinh" name="noisinh" />
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Email" type="email" id="email" name="email" />
                  <label class="input__label input__label--ruri" for="input-26">
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Số Điện Thoại" type="tel" id="sodienthoai" name="sodienthoai" />
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="CCCD/CMND" type="text" id="cccd" name="cccd" />
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <br>
               <input type="button" id="btn-basic-form" name="btn-basic-form" value="Trở về">
               <input type="submit" id="btn-basic-form" name="btn-basic-form" value="Thêm người dùng">
            </form>
            <?php
            switch ($_POST['btn-basic-form'] ?? null) {
               case 'Thêm người dùng': {
                     $tendangnhap = $_REQUEST['tendangnhap'];
                     $hovaten = $_REQUEST['hovaten'];
                     $phanquyen = $_REQUEST['vaitro'];
                     $ngaysinh = $_REQUEST['ngaysinh'];
                     $noisinh = $_REQUEST['noisinh'];
                     $trangthai = $_REQUEST['trangthai'];
                     $email = $_REQUEST['email'];
                     $sodienthoai = $_REQUEST['sodienthoai'];
                     $cccd = $_REQUEST['cccd'];
                     if ($tendangnhap != '' && $hovaten != '' && $phanquyen != '' && $email != '' && $ngaysinh != '' && $noisinh != '' && $trangthai != '' && $cccd != '') {
                        if (($p->themxoasua("INSERT INTO taikhoan(TenDangNhap,PhanQuyen,Trangthai) VALUES('$tendangnhap','$phanquyen','$trangthai')")) == 1 && $p->themxoasua("INSERT INTO thongtinnguoidung(Hovatennguoidung,Ngaysinh,Noisinh,Email,Sdt,CCCD) VALUES('$hovaten','$ngaysinh','$noisinh','$email','$sodienthoai','$cccd')") == 1) {
                           echo '<script> alert("Thêm người dùng thành công");</script>';
                           header("refresh:0;url=quantrivien_nguoidung.php");
                        } else {
                           echo '<script> alert("Thêm người dùng không thành công. Thông tin đã có. Vui lòng kiểm tra lại thông tin người dùng");</script>';
                        }
                     } else {
                        echo '<script> alert("Vui lòng nhập đầy đủ thông tin người dùng");</script>';
                     }
                     break;
                  }
            }
            ?>
         </section>
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