<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_teacher.php';
 ?>  


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Điểm Danh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <!-- <div class="card-header py-3">
    
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Ca Học
      </button>
      <a class="btn btn-info "  href="diem_danh_viewtc.php" >View All</a>
      <a class="btn btn-info "  href="diem_danh_loptc.php" >Danh Sách Lớp Học</a>
  </div> -->

        <div class="card-body">

       <?php 
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
          echo '
          <div class="alert alert-success">
            '.$_SESSION['success'].'
          </div>'
          ;
          unset($_SESSION['success']);
        }

        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
          echo '
          <div class="alert alert-danger">
            '.$_SESSION['status'].'
          </div>';
          unset($_SESSION['status']);
        }
      ?>

          <div class="table-responsive">

        <?php  
          
          $email = $_SESSION['email'];;
          $query = "SELECT * FROM ca_hoc,register WHERE ca_hoc.MaGV = register.Ma AND register.email = '$email' ORDER BY MaCaHoc DESC";
          $query_run= mysqli_query($connection,$query);
        ?>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Mã Ca Học </th>
           <th>Mã Lớp </th>
           <th>Mã Giáo Viên </th>
           <th>Mô Tả </th>
           <th>Ngày </th>
           <th>Giờ </th>
           <th>Nội Dung </th>
           <th>Nhận Xét Chung </th>
           <th>Điểm Danh </th>
          </tr>
        </thead>
        <tbody>

        <?php 
        if(mysqli_num_rows($query_run)>0)
        {
          $serial_number=0;
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
            $serial_number++;
            $thoigian = $row['Ngay'];
            $date = date("d-m-Y", strtotime($thoigian));
            ?>      
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['MaCaHoc']; ?></td>                 
                  <td> <?php echo $row['MaLop']; ?> </td>
                  <td> <?php echo $row['MaGV']; ?> </td>
                  <td> <?php echo $row['MoTa']; ?></td>                 
                  <td> <?php echo $date; ?> </td>
                  <td> <?php echo $row['Gio']; ?> </td>
                  <td> <?php echo $row['NoiDung']; ?> </td>
                  <td> <?php echo $row['NhanXetChung']; ?> </td>
                   <td>
                      <form action="diem_danh_hstc.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $row['MaCaHoc']; ?>">
                          <button type="submit" name="view_btn" class="btn btn-info"> Điểm Danh</button>                        
                      </form>
                  </td>
              </tr>
      <?php     
          }
        }
        else{
          echo "No record found";
        } 
      ?>
       
        
        </tbody>
      </table>

    </div>
  </div>
</div>


 <?php 
  include 'includes/scripts.php';
  include 'includes/footer.php';
  ?>