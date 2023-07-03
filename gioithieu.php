<?php include 'head_f/header.php';
include 'head_f/slide.php';
          include 'admin/database/dbconfig.php';
          $query = "SELECT * FROM gioi_thieu";
          $query_run= mysqli_query($connection,$query);
        
?>


        <div class="container-fluid py-2">
             <div class="container">
             <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="">Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Giới Thiệu</li>
                </ol>
             </div>
         </div>   

         <div class="container-fluid pb-4">
             <div class="container">
                 <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="card">
                            <div class="card-body">
                        <div class="blog-post">
                             <?php while ($row=mysqli_fetch_assoc($query_run)) 
          {            
            ?>      
              <?php echo $row['Content']; ?>
              <?php } ?>
                                

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
                                                           <img class="mr-3 rounded" src="img/course-img/topik.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-han-cap-toc.php"><h6 class="mt-0 mb-0">Ôn Thi Topik</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="on-thi-topik.php" role="button">Chi tiết</a>
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
                                                            <a class="text-dark" href="tieng-duc-cap-toc.php"><h6 class="mt-0 mb-0">Tiếng Đức cấp tốc</h6></a>
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
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/trung.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-trung-so-cap.php"><h6 class="mt-0 mb-0">Tiếng Trung Sơ Cấp</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-trung-so-cap.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>                                 <<li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/trungct.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="tieng-trung-cap-toc.php"><h6 class="mt-0 mb-0">Tiếng Trung Cấp Tốc</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="tieng-trung-cap-toc.php" role="button">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>          
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="img/course-img/trungghsk.png" alt="" style="width:90px;">
                                                            <div class="media-body">
                                                            <a class="text-dark" href="on-thi-hsk.php"><h6 class="mt-0 mb-0">Ôn thi tiếng Đức</h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="on-thi-hsk.php" role="button">Chi tiết</a>
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
 
<!--giôi thieu
        <p></p>
                            <h1></h1>
                            <p></p>

                                <h2 style="text-align:center"><span style="font-size:32px; color: red">
                                    <strong>GIỚI THIỆU TRUNG TÂM NGOẠI NGỮ TOMATO HẢI PHÒNG</strong>
                                    </span>
                                </h2>
                                <p>
                                    <span style="font-size:16px">
                                        <strong>CÔNG TY CỔ PHẦN TƯ VẤN VÀ ĐÀO TẠO TOMATO</strong> hoạt động trong lĩnh vực Đào tạo ngoại ngữ (Anh - Trung - Nhật - Hàn), nhận gia sư các lớp Toán - Văn - Anh, du học Nhật Bản - Hàn Quốc, dịch thuật. Chúng tôi lấy chất lượng làm mục tiêu hàng đầu, không ngừng phát triển về quy mô đào tạo, đẩy mạnh chất lượng giảng dạy, đa dạng hóa các khóa học. Mới nhất là Công ty phát triển mạnh các khóa học ngoại ngữ ONLINE nhằm đem đến cho học viên những kiến thức cần thiết, bổ ích để có thể dễ dàng tiếp cần với ngôn ngữ, văn hóa các nước.
                                    </span>
                                </p>
                                <br> <br><br>
                                <p style="text-align:center">
                                    <span style="font-size:16px">
                                        <img alt="Trung tâm ngoại ngữ tomato" src="img/profile-img/trung-tam-tieng-trung-tomato(2).jpg" style="height: auto; width: auto;" title="Trung tâm ngoại ngữ tomato">
                                    </span>
                                </p>
                                <p class="img-tua" new="" roman="" times="">
                                    <a href="localhost/index.php">Trung tâm ngoại ngữ TOMATO tại hải phòng
                                    </a>
                                </p>
                                <p>
                                    <span style="font-size:16px">Công ty được cấp giấy chứng nhận đầu tư số: 0201636998 do Sở Kế hoạch và Đầu tư TP Hải Phòng cấp ngày 10/06/2015. Và được phê duyệt đào tạo các mảng ngoại ngữ theo quyết định của sở giáo dục đào tạo Hải Phòng
                                    </span>
                                </p>
                                <br>
                                <p>
                                    <span style="font-size:16px">Với nguồn tài chính 100% của công ty Tomato, đội ngũ nhân sự là các nhân viên của công ty, hệ thống bài giảng Online bài bản, đầy đủ kiến thức, sát thực tế với học viên ở mọi miền tổ quốc. Trung tâm mong muốn mang lại những giá trị kiến thức cụ thể đến người học ngoại ngữ.
                                    </span>
                                </p>
                                <br>
                                <p>
                                    <span style="font-size:16px">Phương pháp giảng dạy hoạt động truyền đạt kiến thức về lĩnh vực ngoại ngữ hiện đại, tốt nshât
                                    </span>
                                </p>
                                
                                <h6>10 LÝ DO CHÍNH ĐỂ BẠN CHỌN NGOẠI NGỮ TOMATO (ANH - TRUNG - NHẬT - HÀN):</h6>
                                    <span style="font-size:16px"> <strong>1.</strong>Mức học phí cực sinh viên lại đảm bảo chất lượng ưu đãi 950.000đ một khóa 3 tháng.
                                    </span>
                                    <span style="font-size:16px"> <strong>2.</strong>Được học thử miễn phí 2 buổi đầu tại Trung tâm, tổ chức thi thử và test đầu vào miễn phí.
                                    </span>
                                    <span style="font-size:16px"> <strong>3.</strong>Tất cả các khóa học tại Trung tâm ngoại ngữ Hải Phòng bạn đều có cơ hội tiếp xúc và nghe trực tiếp người nước ngoài giảng dạy thông qua các hoạt động ngoại khóa như Câu lạc bộ ngoại ngữ, thư viện sách phong phú.
                                    </span>
                                    <span style="font-size:16px"> <strong>4.</strong>Đội ngũ giáo viên có trình độ chuyên môn N1, N2, N3, giàu kinh nghiệm, giảng dạy nhiệt tình ,tâm huyết.
                                    </span>
                                    <span style="font-size:16px"> <strong>5.</strong>Trong quá trình học tập học viên bận không theo học được có quyền bảo lưu thẻ học với các lớp khác với ca phù hợp thời hạn bảo lưu đến 1 năm.
                                    </span>
                                    <span style="font-size:16px"> <strong>6.</strong>Đóng học phí một lớp có quyền tham gia học ở các lớp khác có cùng chương trình học.
                                    </span>
                                    <span style="font-size:16px"> <strong>7.</strong> Định hướng thi cấp chứng chỉ và tư vấn việc làm.
                                    </span>
                                    <span style="font-size:16px"> <strong>8.</strong>Tư vấn định hướng cho các bạn du học nước ngoài tốt nhất -> Nhật Bản, Hàn Quốc, Đài Loan, Singapore, Trung Quốc.
                                    </span>
                                    <span style="font-size:16px"> <strong>9.</strong>Có nhiều ưu đãi và phần quà hấp dẫn dành cho những học viên đăng kí học theo nhóm.
                                    </span>
                                    <span style="font-size:16px"> <strong>10.</strong>Học viên nhập học sau ngày khai giảng (2-3 buổi) được phụ đạo miễn phí đảm bảo theo kịp chương trình. Học hết một khóa học viên có nhu cầu ôn tập lại cùng với lớp khai giảng sau được miễn tiền học phí ôn tập.
                                    </span>
                                </p>
                                <br> <br>
                                <h5>Các ưu đãi khi đăng ký tại Trung tâm Tomato tại Hải Phòng:</h5>
                                    <p><span  style="font-size:16px"> <strong>+</strong>Được đăng ký học thử 1 - 2 buổi.
                                    </span>
                                    <br>
                                    <span  style="font-size:16px"> <strong>+</strong>Đăng ký và đóng học phí trước ngày khai giảng được giảm 5% học phí.
                                    </span>
                                    <br>
                                    <span style="font-size:16px"> <strong>+</strong>Đăng ký nhóm từ 3 học viên trở lên được giảm ngay 10% học phí.
                                    </span>
                                    <br>
                                    </p>     
                                    <br> <br>
                               
                                <h6>Lịch khai giảng và thời gian học: </h6>
                                <span style="font-size:16px"> <strong>+</strong>Khai giảng khóa học tiếng anh liên hệ (02256280123) để nhận thông tin!
                                    </span>
                                    <span style="font-size:16px"> <strong>+</strong>Mỗi lớp tối đa từ 8 đến 12 học viên.
                                    </span>
                                    <span style="font-size:16px"> <strong>+</strong> Thời gian học : Sáng, chiều hoặc tối phù hợp với học sinh, và người đi làm.
                                    </span>
                                    <br> <br>
                                    <h6>LIÊN HỆ: </h6>
                                        <span style="font-size:16px"><strong>Cơ sở 1:</strong> Số 300 Lạch Tray, Quận. Lê Chân, Tp. Hải Phòng - 0225 657 2222
                                        </span>
                                        <span style="font-size:16px"><strong>Cơ sở 2:</strong> Số 65 Quán Nam, Quận. Lê Chân, Tp. Hải Phòng - 0225 628 0123
                                        </span>
                                        <span style="font-size:16px"><strong>Cơ sở 3:</strong> Số 408 Trường Sơn, An Lão, Tp. Hải Phòng - 0225 6612 408
                                        </span>
                                        <span  style="font-size:16px"><strong>Cơ sở 4:</strong> Số 148 Phan Đăng Lưu, Quận. Kiến An, Tp. Hải Phòng - 0225 354 1288
                                        </span>
                                        <span style="font-size:16px"><strong>Hotline: (Zalo)</strong> 0772 334 886 - 0964 299 222
                                        </span>

                                    <br> <br>
                                <h6>Cộng đồng</h6>
                                <p>Hiện tại Trung tâm đang hoạt động trên các mạng xã hội:</p>
                                <ul>
                                    
                                    <li>
                                        <a target="_blank" rel="nofollow" href="https://www.facebook.com/trungtamngoainguhaiphongtomato/">Facebook Fanpage
                                        </a>
                                    </li>


                                    <li>
                                        <a target="_blank" rel="nofollow" href="https://www.youtube.com/channel/UCxEtCJH4_wiG0JKYgn0aZJA">Youtube
                                        </a>
                                    </li>
                                </ul>
                                -->