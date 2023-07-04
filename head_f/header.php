<?php 
include 'admin/database/dbconfig.php'; 
 $query = "SELECT * FROM thongtin_web";
          $query_run= mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <link REL="SHORTCUT ICON" HREF="admin/anh_nhan_vien/ITC.svg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="js\fontawesome.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/phantrang.css">
    <link rel="shortcut icon" type="image/jpg" href="img/logo-img/icon.jpg">
    <style>       
        .breadcrumb {
            background-color: #ffffff
            /* box-shadow: 0 2px 3px rgb(209, 209, 209); */
        }
        .lienket {
            display: inline-block;
            padding: 5px 10px;
            color: #fff;
            background: red;
            margin: 10px 0;
            font-weight: 600;
          }
          .img-tua{
            text-align: center;
            font-size: 12px;
            color: red;
          }
    </style>
    <title>Trung Tâm Tin Học ITC</title>
</head>


<body data-spy="scroll"  data-target="#navbarResponsive">

      <div id="home">
                  
            <nav class="navbar navbar-expand-md navbar-white bg-white fixed-top">
              <?php while ($row=mysqli_fetch_assoc($query_run)) 
          {            
            ?>  
               <a class="navbar-brand" href="index.php"> <img style="height:100px;transition: ease 0.3s;" src="admin/anh_nhan_vien/<?= $row['logo'];  ?>"  alt="logo"> </a>
               <?php } ?>
               
              <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                  <li class="nav-item"><a class="nav-link" href="gioithieu.php">Giới thiệu</a></li>
                
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Khóa học
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="khoa-hoc-tieng-anh.php">Khóa học tin học văn phòng</a>
                        <a class="dropdown-item" href="khoa-hoc-tieng-nhat.php">Khóa học powerpoint</a>
                      </div>
                    </li>
             
                  <li class="nav-item"><a class="nav-link" href="tin-tuc.php">Tin Tức</a></li>                 
                  <li class="nav-item"><a class="nav-link" href="lien-he.php">Liên Hệ</a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="./admin/login.php">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Đăng nhập</button>
                  </form> &nbsp;
                  <!-- <form class="form-inline my-2 my-lg-0" action="./admin/signup.php">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Đăng ký tài khoản</button>
                  </form> -->
              </div>
            </nav>
  

             
      </div> 
