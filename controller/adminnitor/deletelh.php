<?php
ob_start();
session_start();
if(isset($_SESSION['matk']))
{
	$layid_dangnhap = $_SESSION['matk'];
}
include("../../class/class-lms.php");
$p = new lms();
if(isset($_SESSION['matk']))
{
	$phanquyen = $p->laycot("SELECT PhanQuyen FROM taikhoan WHERE MaTK = '$layid_dangnhap' LIMIT 1");
    if($phanquyen != 1){
        header('location: ../../../login.php');
    }
}
else{
    header('location: ../../../login.php');
}
$laymalh = $_GET['malh'];
if($laymalh > 0)
{
    if($p->themxoasua("DELETE FROM lophoc WHERE MaLH = '$laymalh' LIMIT 1") == 1){
        header( "refresh:0;url=../../view/actors/adminitors/quantrivien_lophoc.php" );
        echo '<script> alert("Xóa lớp học thành công");</script>';
    }
}
?>