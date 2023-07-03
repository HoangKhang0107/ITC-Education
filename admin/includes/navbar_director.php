   

   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index_giamdoctrungtam.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">GIÁM ĐỐC TRUNG TÂM <br>ITC</div>
  
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index_giamdoctrungtam.php">
    <i class="fa fa-home"></i>
    <span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<li class="nav-item">
  <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      
      <a class="collapse-item" href="tin_tucsa.php">Quản Lý Tin Tức</a>
      <a class="collapse-item" href="thong_tin.php">Quản Lý Thông Tin Website</a>
      <a class="collapse-item" href="gioi_thieu.php">Quản Lý Giới Thiệu</a>
      <a class="collapse-item" href="tai_lieusa.php">Quản Lý Tài Liệu</a>

    </div>
  </div>
</li>
<!-- Nav Item - Quản Lý Hệ Thống -->


<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
    <i class="fas fa-fw fa-cog"></i>
    <span>Quản Lý Hệ Thống</span>
  </a>
  <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      
      <a class="collapse-item" href="register_dir.php">Quản Lý Tài Khoản</a>
      <a class="collapse-item" href="chuc_vu_dir.php">Quản Lý Chức Vụ</a>    

    </div>
  </div>
</li>

<!-- Nav Item - Quản Lý Lớp Học -->


<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
    <i class="fa fa-id-badge"></i>
    <span>Quản Lý Thông Tin</span>
  </a>
  <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      
      
      <a class="collapse-item" href="nhan_vien_dir.php">Nhân Viên/Giáo Viên</a>
      <a class="collapse-item" href="hoc_sinh_dir.php">Học Sinh</a>     
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
    <i class="fas fa-fw fa-cog"></i>
    <span>Quản Lý Lớp Học</span>
  </a>
  <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="lop_hoc_dir.php">Quản Lý Lớp Học</a>
      <a class="collapse-item" href="lich_hoc_dir.php">Quản Lý Lịch Học</a>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" href="quan_ly_thu_chi_view_dir.php">
    <i class="fa fa-check-square"></i>
    <span>Quản Lý Thu Chi</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="cham_cong_dir.php">
    <i class="fa fa-check-square"></i>
    <span>Chấm công nhân viên</span></a>
</li>
<!-- Nav Item - Điểm -->

<!-- <li class="nav-item">
  <a class="nav-link" href="diem_dir.php">
    <i class="fa fa-check-square"></i>
    <span>Nhập điểm học sinh</span></a>
</li> -->
<li class="nav-item">
  <a class="nav-link" href="../test.php" data-toggle="modal" data-target="#logoutModal">
    <i class="fa fa-calculator"></i>
    <span>Đăng Xuất</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
                <?php echo $_SESSION['email'];  ?>
                  
                </span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../index.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">XÁC NHẬN ĐĂNG XUẤT</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Bạn chắc chắn muốn đăng xuất </div>
        <div class="modal-footer">
          

          <form action="logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Đăng Xuất</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          </form>

          
        </div>
      </div>
    </div>
  </div>