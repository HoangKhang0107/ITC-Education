<?php
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_student.php';
$makh = $_GET['kh'];
?>

<div class="container-fluid pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="blog-post">
                            <p></p>
                            <h1></h1>
                            <p></p>

                            <h2 style="text-align:center"><span style="font-size:32px; color: red">
                                    <strong>TIN HỌC VĂN PHÒNG CƠ BẢN</strong>
                                </span>
                            </h2>
                            <br>
                            <span style="font-size:16px; color: red"> <strong>1. </strong style="color: red">Đối tượng học cần học tin học văn phòng
                            </span>
                            <p style="font-size:16px">Những người bắt đầu học về kỹ năng văn phòng</p>
                            <p style="font-size:16px">Những người có nền tảng tin học nhất định, tuy nhiên kém về các kỹ năng sử dụng.</p>
                            <p style="font-size:16px">Những người muốn củng cố kỹ năng văn phòng, đặc biệt cách sử dụng máy tính.</p>
                            <span style="font-size:16px; color: red"> <strong>2. </strong>Chi tiết khóa học tiếng anh giao tiếp Hải Phòng
                            </span>
                            <p style="font-size:16px">Học phí: 3.000.000 đ/khóa</p>
                            <p style="font-size:16px">Thời gian học tập: 24 buổi</p>
                            <p style="font-size:16px">Giáo trình học tin học "new cutting edge", face to face.</p>
                            <span style="font-size:16px; color: red"> <strong>3. </strong>Lịch khai giảng và đăng ký khóa
                            </span>
                            <p><span style="font-size:16px"> <strong>+</strong>Được đăng ký học thử 1 - 2 buổi.
                                </span>
                                <br>
                                <span style="font-size:16px"> <strong>+</strong>Đăng ký và đóng học phí trước ngày khai giảng được giảm 5% học phí.
                                </span>
                                <br>
                                <span style="font-size:16px"> <strong>+</strong>Đăng ký nhóm từ 3 học viên trở lên được giảm ngay 10% học phí.
                                </span>
                                <br>
                            </p>
                            <br>
                            </p>
                            <br> <br>
                            <a href="dangkykhoahoc_hocvien.php?kh=<?php echo $makh?>" class="btn-detail-course-box">Đăng ký khóa học tại đây</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {
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