<?php
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';

// $email = $_SESSION['email'];
// $query = "SELECT * FROM register WHERE register.email = '$email'";
// $query_run = mysqli_query($connection, $query);

// if (isset($_SESSION['usertype']) != 'admin') {
//   // Nếu người dùng không phải admin
//   header('Location: login.php');
//   echo '<script> alert("Xin lỗi bạn không có quyền truy cập vào trang này. Vui lòng đăng nhập để truy cập. Xin cảm ơn.");</script>';
// }
?>



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">


  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Home</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>

                <?php


                $query = "SELECT email FROM register ORDER BY email";
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);

                echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $row . '</h1>';
                ?>


              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Học Sinh </div>
                <?php


                $queryhs = "SELECT * FROM hoc_sinh";
                $query_run1 = mysqli_query($connection, $queryhs);
                $row1 = mysqli_num_rows($query_run1);

                echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $row1 . '</h1>';
                ?>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lớp Học</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <?php


                    $querylh = "SELECT * FROM lop_hoc";
                    $query_run2 = mysqli_query($connection, $querylh);
                    $row2 = mysqli_num_rows($query_run2);

                    echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $row2 . '</h1>';
                    ?>
                  </div>

                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nhân viên/giáo viên</div>
                <?php


                $querynv = "SELECT * FROM nhan_vien";
                $query_run3 = mysqli_query($connection, $querylh);
                $row3 = mysqli_num_rows($query_run3);

                echo '<h1 class="h5 mb-0 font-weight-bold text-gray-800">' . $row3 . '</h1>';
                ?>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>