
<?php include 'head_f/header.php';
    include 'head_f/slide.php';
include 'admin/database/dbconfig.php';

$query = "SELECT * FROM tai_lieu";
          $query_run= mysqli_query($connection,$query);
?>

        <div class="container-fluid py-2">
             <div class="container">
             <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="">Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kiến thức</li>
                </ol>
             </div>
         </div>   

         <div class="container-fluid pb-4">
             <div class="container">
                 <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                            <?php 
        
                                                while ($row=mysqli_fetch_assoc($query_run)) 
                                                { ?>                                                         
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="large" >
                                                            <?php echo '<img src="admin/anh_nhan_vien/'.$row['img'].'" width="200px;" height="270px" align="left" alt="Image">' ?>                                                           
                                                            <div class="media-body" align="right" >
                                                            <a class="text-dark"><h5 class="mt-0 mb-0"> <?php echo $row['TuaDe']; ?></h5></a>
                                                            <p class="date-time hidden-xs hidden-sm"><i class="fa fa-calendar" aria-hidden="true"></i> <span>11-09-2019</span>
                                                            </p>
                                                                <p style="font-size:15px"><?php echo $row['TomTat']; ?></p>
                                                                <p><strong> 
                                                                    <a class="lienket" href="<?= $row['url']; ?>" target="_blank"><span style="color:#ffffff;">DOWNLOAD</span></a>                                                               
                                                                </strong></p>
                                                            </div>
                                                        </div>

                                                       
                                                </li>
                                                <?php     
          
                                                    } 
                                                ?>


                                                                                                                                    
                            </div>
                    
                        </div>
                     </div>
                    </div>
                
                <div class="col-md-4">
                <div class="card">
                                    <div class="card-header bg-white" style="border-top:3px solid black;"><h5>Các khóa học</h5></div>
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                            
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/gt.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-anh-giao-tiep.php"><h6 class="mt-0 mb-0">Tiếng Anh giao tiếp</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-anh-giao-tiep.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/kid.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-anh-tre-em.php"><h6 class="mt-0 mb-0">Tiếng Anh trẻ em</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-anh-tre-em.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>   
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/toeic.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="luyen-thi-toeic.php"><h6 class="mt-0 mb-0">Luyện thi Toeic</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="luyen-thi-toeic.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>     
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/nhat.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-nhat-so-cap.php"><h6 class="mt-0 mb-0">Tiếng Nhật sơ cấp</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-nhat-so-cap.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>   
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/nhatct.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-nhat-cap-toc.php"><h6 class="mt-0 mb-0">Tiếng Nhật cấp tốc</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-nhat-cap-toc.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>    
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/han.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-han-so-cap.php"><h6 class="mt-0 mb-0">Tiếng Hàn sơ cấp</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-han-so-cap.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>     
                                                   <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/hanct.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-han-cap-toc.php"><h6 class="mt-0 mb-0">Tiếng Hàn cấp tốc</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-han-cap-toc.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li> 
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/duc.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-duc-so-cap.php"><h6 class="mt-0 mb-0">Tiếng Đức sơ cấp</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-duc-so-cap.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>      
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/ducct.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-duc-cap-toc.php"><h6 class="mt-0 mb-0">Tiếng Hàn sơ cấp</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-duc-cap-toc.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>    
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/duconthi.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-duc-on-thi.php"><h6 class="mt-0 mb-0">Ôn thi tiếng Đức</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-duc-on-thi.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>                                                 
                                            </ul>
                                        </div>
                                </div>
                    </div>
                 </div>
            </div>
         </div>
         </div>

    <?php 
    include 'head_f/footer.php';
?>

        
        <script>
                $(document).ready(function () {
                    $(".owl-carousel").owlCarousel({
                        loop: true,
                        margin: 30,
                        responsive: {
                            0: {
                                items: 1
                            },
                            1000: {
                                items: 4
                            }
                        }
                    });
                });
            </script>
            <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
 