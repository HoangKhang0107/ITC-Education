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
   if ($phanquyen != 2) {
      header('location: ../../../login.php');
   }
} else {
   header('location: ../../../login.php');
}
$laymalh = 0;
if (isset($_REQUEST['malh'])) {
   $laymalh = $_REQUEST['malh'];
}
$laymakh = $p->laycot("SELECT MaKH FROM lophoc WHERE MaLH = '.$laymalh.'");
$laymaph = $p->laycot("SELECT MaPH FROM lophoc WHERE MaLH = '.$laymalh.'");
$laymach = $p->laycot("SELECT MaCaHoc FROM lophoc WHERE MaLH = '.$laymalh.'");
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
   <title>ITC | Giáo Vụ | Kỳ Thi</title>
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
   <script src="../../../js/jquery-3.6.0.js"></script>
   <script src="../../../js/bootstrap.js"></script>
   <script>
       var count = 1;
      $(document).ready(function () {

         //-------------//
        
         function ktten() 
         {
            var regten = /^((LH)+[0-9]{4,7})$/;
            var ten = $("#malophoc").val();
            if (regten.test(ten)) {
               $("#mlh").html("*")
               return true;
            }
            else {
               $("#mlh").html("X")
               return false;
            }
         }
         $("#malophoc").blur(ktten)
         //-----//
         
         function kttenlop() 
         {
            var regten = /^(([A-Z|Đ]{1}[a-z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ]*\s)*([A-Z|Ý|Đa-z]{1}[a-z|á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ|a-z]*\s)+([|(|MOS|)|])*\s([0-9]{3}))$/;
            var ten = $("#lophoc").val();
            if (regten.test(ten)) {
               $("#tenlop").html("*")
               return true;
            }
            else {
               $("#tenlop").html("X")
               return false;
            }
         }
         $("#lophoc").blur(kttenlop)
        
         //------------//
         function ktss() 
         {
            var regten =/^([0-9]{2})$/; 
            var ten = $("#siso").val();
            if (regten.test(ten)) {
               $("#ss").html("*")
               return true;
            }
            else {
               $("#ss").html("X")
               return false;
            }
         }
         $("#siso").blur(ktss)
         //Kiểm tra ngày tham gia

         var txtngay = $("#ngaybatdau");
         var tbngay = $("#nbd");
         function KiemTraNgay() {
            if (txtngay.val() == "") {
               tbngay.html("Bắt buộc chọn ngày");
               return false;
            }
            var day = new Date(txtngay.val());
            var today = new Date();
            today.setDate(today.getDate()-1440);
            if (day >= today) {
               tbngay.html("*");
               return true;
            }
            tbngay.html("X");
            return false;
         }
         txtngay.blur(KiemTraNgay);

         //-----------//
         var txtng = $("#ngayketthuc");
         var tbng = $("#nkt");
        var txtbd = $("#ngaybatdau");
         function KiemTra() {
            if (txtng.val() == "") {
               tbng.html("Bắt buộc chọn ngày");
               return false;
            }
            var day = new Date(txtng.val());
            var dayy = new Date(txtbd.val());
          dayy.setDate(dayy.getDate() + 90);
            if (day > dayy )  {
               tbng.html("*");
               return true;
            }
            tbng.html("X");
            return false;
         }
         txtng.blur(KiemTra);
         

         $("#btn-basic-form").click(function()
          { 
            //----//
            if (ktten()==false) {
               alert("Mã lớp không Hợp Lệ! Vui lòng nhập lại");
               return false;
            }
            if (kttenlop()==false) {
               alert("Tên lớp không Hợp Lệ! Vui lòng nhập lại");
               return false;
            }
            if (ktss()==false) {
               alert("Sĩ số không Hợp Lệ! Vui lòng nhập lại");
               return false;
            }
            if (KiemTraNgay()==false) {
               alert("Ngày bắt đầu không hợp lệ! Vui lòng nhập lại");
               return false;
            }
            if (KiemTra()==false) {
               alert("Ngày kết thúc không hợp lệ! Vui lòng nhập lại");
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
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="giaovu_khoahoc.php">Khóa học</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="giaovu_lophoc.php">Lớp học</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="giaovu_lichthi.php">Lịch thi</a>
                        </li>

                        <li class="nav-item active">
                           <a class="nav-link" href="giaovu_diem.php">Điểm</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="col-md-2  d_none">
               <ul class="email text_align_right">
               <li class="dropdown">
                     <a href="index_giaovu.php" class="dropbtn" class="d-block active" style="color: white;"><?php echo $p->laycot("SELECT TenDangNhap FROM taikhoan WHERE MaTK = '$layid_dangnhap' LIMIT 1"); ?></a>
                     <div class="dropdown-content">
                        <a href="index_giaovu.php">Trang Giáo vụ</a>
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
               <h1>THÔNG TIN LỚP HỌC</h1>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Mã Lớp Học VD: LH0001" type="text" id="malophoc" name="malophoc" />
                  <label class="input__label input__label--ruri" for="input-26">
                  <span  id="mlh" style="color: red; float: right;"></span>
                  </label>
               </span>
               <span class="input input--ruri">
                  <select class="input__field input__field--ruri" id="khoahoc" style="background-color: RGB(47, 50, 56); color: white" name="khoahoc">
                  <option value="">Chọn khóa học</option>
                     <?php
                     $p->load_selectionKH("SELECT * FROM khoahoc ");
                     ?>
                  </select>
                  <label class="input__label input__label--ruri" for="input-27">
                  <span  id="kh" style="color: red; float: right;"></span>
                  </label>
               </span>
               <span class="input input--ruri">
                  <select class="input__field input__field--ruri" id="phonghoc" style="background-color: RGB(47, 50, 56); color: white" name="phonghoc">
                  <option value="">Chọn Phòng học</option>
                     <?php
                     $p->load_selectionPH("SELECT * FROM phonghoc");
                     ?>
                  </select>
                  <label class="input__label input__label--ruri" for="input-27">
                  <span  id="ph" style="color: red; float: right;"></span>
                  </label>
               </span>
               <span class="input input--ruri">
                  <select class="input__field input__field--ruri" id="cahoc" style="background-color: RGB(47, 50, 56); color: white" name="cahoc">
                  <option value="">Chọn Ca học</option>
                     <?php
                     $p->load_selectioncahoc("SELECT * FROM cahoc");
                     ?>
                  </select>
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Tên Lớp Học" type="text" id="lophoc" name="lophoc" />
                  <label class="input__label input__label--ruri" for="input-26">
                  <span  id="tenlop" style="color: red; float: right;"></span>
                  </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Sỉ số" type="number" id="siso" name="siso" />
                  <label class="input__label input__label--ruri" for="input-26">
                  <span  id="ss" style="color: red; float: right;"></span>
               </label>
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Ngày bắt đầu" type="date" id="ngaybatdau" name="ngaybatdau" title="Ngày Bắt đầu" style="color: greenyellow;"/>
                  <label class="input__label input__label--ruri" for="input-26">
                  <span  id="nbd" style="color: red; float: right;"></span>
               </label>
                  
               </span>
               <span class="input input--ruri">
                  <input class="input__field input__field--ruri" placeholder="Ngày kết thúc" type="date" id="ngayketthuc" name="ngayketthuc" title="Ngày Kết Thúc" style="color: red;"/>
                  <label class="input__label input__label--ruri" for="input-26">
                  <span  id="nkt" style="color: red; float: right;"></span>
                  </label>
               </span>
               <span class="input input--ruri">
                  <select class="input__field input__field--ruri" id="trangthai" style="background-color: RGB(47, 50, 56); color: white" name="trangthai">
                  <option value="">Chọn Trạng Thái lớp học</option>
                     <?php
                     $p->load_selectiontrangthaiLH("SELECT * FROM trangthailophoc");
                     ?>
                  </select>
                  <label class="input__label input__label--ruri" for="input-27">
                  </label>
               </span>
               <br>
               <a href="quantrivien_lophoc.php"><input type="submit" style="border: 2px solid navy; padding: 20px ; border-radius: 20px; color: blue; font-size: 15px; margin-right: 20px;" id="btn-trove" name="btn-trove" value="Trở về"></a>
               <input type="submit" id="btn-basic-form" name="btn-basic-form" value="Thêm lớp học mới">
            </form>
            <?php
            switch ($_POST['btn-basic-form'] ?? null) {
               case 'Thêm lớp học mới': {
                     $malophoc = $_REQUEST['malophoc'];
                     $khoahoc = $_REQUEST['khoahoc'];
                     $phonghoc = $_REQUEST['phonghoc'];
                     $cahoc = $_REQUEST['cahoc'];
                     $lophoc = $_REQUEST['lophoc'];
                     $siso = $_REQUEST['siso'];
                     $trangthai = $_REQUEST['trangthai'];
                     $ngaybatdau = $_REQUEST['ngaybatdau'];
                     $ngayketthuc = $_REQUEST['ngayketthuc'];
                     if ($malophoc != '' && $khoahoc != '' && $phonghoc != '' && $cahoc != '' && $lophoc != '' && $siso != '' && $trangthai != '' && $ngaybatdau != '' && $ngayketthuc != '') {
                        if ($p->themxoasua("INSERT INTO lophoc SET (MaLH,MaKH,MaPH,MaCaHoc,TenLopHoc,SiSo,Trangthai,NgayBD,NgayKT) VALUES('$malophoc','$khoahoc','$phonghoc','$cahoc','$lophoc','$siso','$trangthai','$ngaybatdau','$ngayketthuc') WHERE MaLH = '$laymalh' LIMIT 1") == 1) {
                           echo '<script> alert("Thêm lớp học thành công");</script>';
                           header("refresh:0;url=giaovu_lophoc.php");
                        } else {
                           echo '<script> alert("Thêm lớp học không thành công. Vui lòng kiểm tra lại thông tin lớp học");</script>';
                        }
                     } else {
                        echo '<script> alert("Vui lòng nhập đầy đủ thông tin lớp học");</script>';
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