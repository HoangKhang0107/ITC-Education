<?php
ob_start();
session_start();
if (isset($_SESSION['matk'])) {
   $layid_dangnhap = $_SESSION['matk'];
}
include("../../class/class-lms.php");
$p = new lms();
if (isset($_SESSION['matk'])) {
   $phanquyen = $p->laycot("SELECT PhanQuyen FROM taikhoan WHERE MaTK = '$layid_dangnhap' LIMIT 1");
   if ($phanquyen != 2) {
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
if($p->laycot("SELECT MaLH,MaHV FROM danhsachhocvien WHERE MaLH IN('.$laymalh.') AND MaHV NOT IN('.$laymatk.');") == 1){
    if($p->themxoasua("INSERT INTO danhsachhocvien(MaLH,MaHV) VALUES('$laymalh','$laymatk')") == 1) {
        header("refresh:0;url=../../view/actors/adminitors/giaovu_lophoc_themhocvienvaolophoc.php?malh=$laymalh");
    }
}
else{
    echo '<script> alert("Học viên đã là học viên của lớp học này. Vui lòng chonh học viên khác. Xin cảm ơn.");</script>';
    header("refresh:0;url=../../view/actors/adminitors/giaovu_lophoc_themhocvienvaolophoc.php?malh=$laymalh");
}
?>