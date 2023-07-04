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
   <title>ITC | Quản Trị Viên | Khóa Học</title>
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
   <link rel="stylesheet" href="../../../css/user.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="../../../css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="../../../images/fevicon.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
      integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <script src="../../../js/jquery-3.6.0.js"></script>
   <script src="../../../js/bootstrap.js"></script>
   <script>
      var count = 1;
      $(document).ready(function () {

         //-------------//
         function kttdn() {
            var regten = /^(([A-Z]{2,5})([0-9]{3,5})(_)([A-Za-z]{2,10}))$/;
            var ten = $("#tendangnhap").val();
            if (regten.test(ten)) {
               $("#tdn").html("*")
               return true;
            }
            else {
               $("#tdn").html("X")
               return false;
            }
         }
         $("#tendangnhap").blur(kttdn)
         //--------//
         function ktten() 
         {
            var regten = /^([A-Z|Đ]{1}[a-z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ]*\s)*([A-Z|Ý|Đ]{1}[a-z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ|a-z]*)$/;
            var ten = $("#hovaten").val();
            if (regten.test(ten)) {
               $("#ten").html("*")
               return true;
            }
            else {
               $("#ten").html("X")
               return false;
            }
         }
         $("#hovaten").blur(ktten)
         //------------//
         //Kiểm tra ngày tham gia

         var txtngay = $("#ngaysinh");
         var tbngay = $("#ns");
         function KiemTraNgay() {
            if (txtngay.val() == "") {
               tbngay.html("Bắt buộc chọn ngày sinh");
               return false;
            }
            var day = new Date(txtngay.val());
            var today = new Date();
            today.setDate(today.getDate() - 4320);
            if (day >= today) {
               tbngay.html("Bạn chưa đủ tuổi!!!");
               return false;
            }
            tbngay.html("*");
            return true;
         }
         txtngay.blur(KiemTraNgay);

         //-----------//
         function ktnoisinh() {
            var regten = /^([A-Z|Đ]{1}[a-z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ]*\s)*([A-Z|Ý|Đ]{1}[a-z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ|a-z]*)$/;
            var ten = $("#noisinh").val();
            if (regten.test(ten)) {
               $("#nsinh").html("*")
               return true;
            }
            else {
               $("#nsinh").html("X")
               return false;
            }
         }
         $("#noisinh").blur(ktnoisinh)
         //------------//
         function ktemail() {
            var regten = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            var ten = $("#email").val();
            if (regten.test(ten)) {
               $("#emaill").html("*")
               return true;
            }
            else {
               $("#emaill").html("X")
               return false;
            }
         }
         $("#email").blur(ktemail)

         //------------//
         function ktsdt() {
            var regten = /^((0)+([1|3|5|7|8|9])+([0-9]{8}))$/;

            var ten = $("#sodienthoai").val();
            if (regten.test(ten)) {
               $("#sdt").html("*")
               return true;
            }
            else {
               $("#sdt").html("X")
               return false;
            }
         }
         $("#sodienthoai").blur(ktsdt)
         //------------//
         function ktcccd() {
            var regten = /^([0-9]{9,12})$/;

            var ten = $("#cccdan").val();
            if (regten.test(ten)) {
               $("#cccd").html("*")
               return true;
            }
            else {
               $("#cccd").html("X")
               return false;
            }
         }
         $("#cccdan").blur(ktcccd)

         $("#btn-basic-form").click(function()
          { if (kttdn()==false) {
               alert("Tên đăng nhập không Hợp Lệ! Vui lòng nhập lại");
               return false;
            }
            
            //----//
            if (ktten()==false) {
               alert("Tên người dùng không Hợp Lệ! Vui lòng nhập lại");
               return false;
            }
            if (KiemTraNgay()==false) {
               alert("Ngày sinh không hợp lệ! Vui lòng nhập lại");
               return false;
            }
            if (ktnoisinh()==false) {
               alert("Nơi sinh không hợp lệ! Vui lòng nhập lại");
               return false;
            }
            if(ktemail()==false) 
                    {
                    alert("Email không hợp lệ! Vui lòng nhập lại");
                    return false;
                    }
            if (ktsdt()==false) {
            alert(" Số điện thoại không hợp lệ! Vui lòng nhập lại");
               return false;
            }
            if (ktcccd()==false) {
               alert(" Số CCCD không hợp lệ! Vui lòng nhập lại");
               return false;
            }
         })

      })
   
   
      'use strict';
      var textInput = document.querySelector('input');
      var inputWrap = textInput.parentElement;
      var inputWidth = parseInt(getComputedStyle(inputWrap).width);
      var svgText = Snap('.line');
      var qCurve = inputWidth / 2; // For correct curving on diff screen sizes
      var textPath = svgText.path("M0 0 " + inputWidth + " 0");
      var textDown = function () {
         textPath.animate({
            d: "M0 0 Q" + qCurve + " 40 " + inputWidth + " 0"
         }, 150, mina.easeout);
      };
      var textUp = function () {
         textPath.animate({
            d: "M0 0 Q" + qCurve + " -30 " + inputWidth + " 0"
         }, 150, mina.easeout);
      };
      var textSame = function () {
         textPath.animate({
            d: "M0 0 " + inputWidth + " 0"
         }, 200, mina.easein);
      };
      var textRun = function () {
         setTimeout(textDown, 200);
         setTimeout(textUp, 400);
         setTimeout(textSame, 600);
      };

      (function () {
         textInput.addEventListener('focus', function () {
            var parentDiv = this.parentElement;
            parentDiv.classList.add('active');
            textRun();
            this.addEventListener('blur', function () {
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
   <!-- <div class="loader_bg">
         <div class="loader"><img src="../../../images/loading.gif" alt="#"/></div>
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
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                     aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link " href="quantrivien_nguoidung.php">Người dùng</a>
                        </li>
                        <li class="nav-item ">
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
         <section class="content bgcolor-4">
            <form action="" method="post">
               <h1>THÔNG TIN NGƯỜI DÙNG <span class="blue_light">
                     <?php echo $p->laycot("SELECT Hovatennguoidung FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?>
                  </span></h1>
               
                  <span class="input input--ruri">
                     <input class="input__field input__field--ruri" placeholder="Tên đăng nhập" type="text"
                        id="tendangnhap" name="tendangnhap"
                        value="<?php echo $p->laycot("SELECT Tendangnhap FROM taikhoan WHERE MaTK = '$laymatk' LIMIT 1"); ?>" />
                        <label class="input__label input__label--ruri" for="input-26">
                        <span  id="tdn" style="color: red; float: right;"></span>
                     </label>
                    
                  </span>
               
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Họ và tên" type="text" id="hovaten"
                     name="hovaten"
                     value="<?php echo $p->laycot("SELECT Hovatennguoidung FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?>" />
                  <label class="input__label input__label--ruri" for="input-27">
                  <span  id="ten" style="color: red; float: right;"></span>
               </label>
               </span>

               <span class="input input--ruri">
                  <select class="input__field input__field--ruri" id="phanquyen"
                     style="background-color: RGB(47, 50, 56); color: white" name="phanquyen">
                     <?php
                     $p->load_selectionvaitro("SELECT * FROM vaitro");
                     ?>
                  </select>
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <span class="input input--ruri">
                  <select class="input__field input__field--ruri" id="trangthai"
                     style="background-color: RGB(47, 50, 56); color: white" name="trangthai">
                     <?php
                     $p->load_selectiontrangthai("SELECT * FROM trangthai");
                     ?>
                  </select>
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Ngày Sinh" type="date" id="ngaysinh"
                     name="ngaysinh"
                     value="<?php echo $p->laycot("SELECT NgaySinh FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?>" />
                  <label class="input__label input__label--ruri" for="input-26">
                  <span  id="ns" style="color: red; float: right;"></span>
               </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Nơi Sinh" type="text" id="noisinh"
                     name="noisinh"
                     value="<?php echo $p->laycot("SELECT NoiSinh FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?>" />
                  <label class="input__label input__label--ruri" for="input-27">
                  <span  id="nsinh" style="color: red; float: right;"></span>
               </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Email" type="email" id="email"
                     name="email"
                     value="<?php echo $p->laycot("SELECT Email FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?>" />
                  <label class="input__label input__label--ruri" for="input-26">
                  <span  id="emaill" style="color: red; float: right;"></span>
               </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Số Điện Thoại" type="tel" id="sodienthoai"
                     name="sodienthoai"
                     value="<?php echo $p->laycot("SELECT Sdt FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?>" />
                  <label class="input__label input__label--ruri" for="input-27">
                  <span  id="sdt" style="color: red; float: right;"></span>
               </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="CCCD/CMND" type="text" id="cccdan"
                     name="cccdan"
                     value="<?php echo $p->laycot("SELECT CCCD FROM thongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1"); ?>" />
                  <label class="input__label input__label--ruri" for="input-27">
                  <span  id="cccd" style="color: red; float: right;"></span> 
               </label>
               </span>
               <br>
               <span>
               <div>
               <input type="button" style="border: 2px solid navy; padding: 20px ; border-radius: 20px; color: blue; font-size: 15px; margin-right: 20px;" id="btn-trove" name="btn-trove" value="Trở về">
               <input type="submit" id="btn-basic-form" name="btn-basic-form" value="Sửa thông tin">
               </div>
               </span>
            </form>
            <?php
            switch ($_POST['btn-basic-form'] ?? null) {
               case 'Sửa thông tin': {
                     $tendangnhap = $_REQUEST['tendangnhap'];
                     $hovaten = $_REQUEST['hovaten'];
                     $phanquyen = $_REQUEST['phanquyen'];
                     $ngaysinh = $_REQUEST['ngaysinh'];
                     $email = $_REQUEST['email'];
                     $trangthai = $_REQUEST['trangthai'];
                     $noisinh = $_REQUEST['noisinh'];
                     $sodienthoai = $_REQUEST['sodienthoai'];
                     $cccd = $_REQUEST['cccdan'];
                     if ($hovaten != '' && $phanquyen != '' && $email != '' && $sodienthoai != '' && $trangthai != '') {
                        if ($p->themxoasua("UPDATE taikhoan SET TenDangNhap = '$tendangnhap', PhanQuyen = '$phanquyen', Trangthai = '$trangthai' WHERE MaTK = $laymatk LIMIT 1") == 1) {
                           if ($p->themxoasua("UPDATE thongtinnguoidung SET Hovatennguoidung = '$hovaten', Ngaysinh = '$ngaysinh', Noisinh = '$noisinh', Email = '$email', Sdt = '$sodienthoai', CCCD = '$cccd' WHERE MaTK = $laymatk LIMIT 1") == 1) {
                              echo '<script> alert("Cập nhật thông tin người dùng thành công");</script>';
                              header("refresh:0;url=quantrivien_nguoidung.php");
                           }
                        } else {
                           echo '<script> alert("Cập nhật thông tin không thành công. Vui lòng kiểm tra lại thông tin người dùng");</script>';
                        }
                     } else {
                        echo '<script> alert("Vui lòng nhập đầy đủ thông tin người dùng để cập nhật");</script>';
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
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>Địa chỉ : 12 Nguyễn Văn Bảo, Phường 4, Gò
                           Vấp, Tp. Hồ Chí Minh
                        </li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>Hotline : +01 1234567890</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> Email :
                              itceducation@gmail.com</a></li>
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