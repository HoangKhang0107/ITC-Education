<?php
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_student.php';
$makh = $_GET['kh'];
?>
<div class="container-fluid py-4" style="background: #f7f7f7;">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-danger">ĐĂNG KÝ LỘ TRÌNH HỌC TẬP</h1>
                <p><i>Hãy để lại thông tin của bạn, Trung Tâm tin học ITC sẽ giúp xây dựng lộ trình học kỹ năng tin học tốt nhất dành riêng cho bạn.</i></p>
                <?php
                $email = $_SESSION['email'];
                $query = "SELECT * FROM register,hoc_sinh  WHERE register.Ma = hoc_sinh.MaHocSinh AND register.email = '$email'";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $row) {
                ?>
            </div>
            <div class="col-md-5">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <h2>Đăng ký</h2>
                        <form action="dangkykhoahoc_code.php" method="POST" enctype=multipart/form-data>
                        <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" readonly  name="email" value="<?php echo $_SESSION['email'] ?>">
                            </div>    
                        <div class="form-group">
                                <label for="">Họ Và Tên</label>
                                <input type="text" class="form-control"  name="ten" >
                            </div>

                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" name="sdt">

                            </div>
                            <div class="form-group">
                                <label for="">Trình độ học hiện tại </label>
                                <input type="text" class="form-control" name="trinhdohoc">
                            </div>

                            <div class="form-group">
                                <label for="">Khóa học</label>
                                <input type="text" class="form-control" readonly name="khoahoc" value="<?php echo $_GET['kh'] ?>">
                            </div>
                            <button type="submit" name="dangky" class="btn btn-primary">Đăng Ký lớp học</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>