<?php
session_start();
if(isset($_SESSION['matk']) && $_SESSION['matk'] != NULL){
unset($_SESSION['matk']);
header('location:index.php');
}
?>