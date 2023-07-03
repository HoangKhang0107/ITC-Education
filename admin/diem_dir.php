<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_director.php';
 ?>  

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Ca Học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="diem_danh_code_dir.php" method="POST">

        <div class="modal-body">           
            
              <?php 
              $chuc_vu ="SELECT * FROM lop_hoc WHERE TinhTrang ='Đang Học'";
              $run = mysqli_query($connection,$chuc_vu);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Mã Lớp </label>
                    <select name="ma_lop" class="form-control ">                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option value="<?php echo $row['MaLop'] ?>" > <?php echo $row['MaLop'] ?> </option>
                       <?php     
                         }
                      ?>                                                    
                    </select>
                  </div>
                 <?php
              }
              else{
                echo "No Data Available";
              }           
             ?>  
              <?php 
              $chuc_vu ="SELECT * FROM nhan_vien where ChucVu='Giáo Viên'";
              $run = mysqli_query($connection,$chuc_vu);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Mã Giáo Viên </label>
                    <select name="ma_gv" class="form-control ">                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option value="<?php echo $row['MaNhanVien'] ?>" > <?php echo $row['MaNhanVien'] ?> - <?php echo $row['TenNhanVien'] ?> </option>
                       <?php     
                         }
                      ?>                                                    
                    </select>
                  </div>
                 <?php
              }
              else{
                echo "No Data Available";
              }           
             ?>   
            

              <div class="form-group">
                <label> Mô Tả </label>
                <input type="text" name="mo_ta" class="form-control" >
              </div>

              <div class="form-group">
                <label> Ngày </label>
                <input type="date" name="ngay" value="<?php echo date("Y-m-d"); ?>" class="form-control" >
              </div>

              <div class="form-group">
                <label> Giờ </label>
                <input type="time" name="gio"  class="form-control" >
              </div>

              <div class="form-group">
                <label> Nội Dung </label>
                <input type="text" name="noi_dung"  class="form-control" >
              </div>

              <div class="form-group">
                <label> Nhận Xét Chung </label>
                <input type="text" name="nhan_xet_chung"  class="form-control" >
              </div>
            
        </div>
        <div class="modal-footer"> 

            <button type="submit" name="add_btn" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Điểm học sinh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <!-- <div class="card-header py-3">
    
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Ca Học
      </button>
      <a class="btn btn-info "  href="diem_danh_view_dir.php" >View All</a>
      <a class="btn btn-info "  href="diem_danh_lop_dir.php" >Danh Sách Lớp Học</a>
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
          
          $query = "SELECT * FROM ca_hoc ORDER BY MaCaHoc DESC";
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
           <th>EDIT </th>
           <th>DELETE </th>
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
                      <form action="diem_hs_dir.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $row['MaCaHoc']; ?>">
                          <button type="submit" name="view_btn" class="btn btn-info"> Nhập điểm</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="diem_danh_edit_dir.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="diem_danh_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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