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
$laymatk = $_GET['matk'];
if($laymatk > 0)
{
    if($p->themxoasua("DELETE FROM taikhoan WHERE MaTK = '$laymatk' LIMIT 1") == 1){
        $p->themxoasua("DELETE FROM tthongtinnguoidung WHERE MaTK = '$laymatk' LIMIT 1");
        header( "refresh:0;url=../../view/actors/adminitors/quantrivien_nguoidung.php" );
        echo '<script> alert("Xóa người dùng thành công");</script>';
    }
}

?>