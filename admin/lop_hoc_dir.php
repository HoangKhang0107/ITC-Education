<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_director.php';
 ?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Lớp Học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="lop_hoc_code_dir.php" method="POST"> 

        <div class="modal-body">

            <div class="form-group">
                <label>Mã Lớp</label>
                <input type="text" name="ma_lop" class="form-control" required="">
            </div>
            <div class="form-group">
                <label>Tên Lớp</label>
                <input type="text" name="ten_lop" class="form-control" required="">
            </div>
            <div class="form-group">
                <label>Giáo Viên Phụ Trách</label>
                <input type="text" name="giao_vien" class="form-control" required="">
            </div>
              <?php 
              $chuc_vu ="SELECT * FROM nhan_vien Where ChucVu = 'Giáo Viên'";
              $run = mysqli_query($connection,$chuc_vu);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Giáo Viên </label>
                    <select name="giao_vien" class="form-control ">                     
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
                <label> Tình Trạng</label>
                <select name="tinh_trang" class="form-control" required="">
                  <option value="Đã Học Xong"> Đã Học Xong </option>  
                  <option value="Đang Học"> Đang Học </option>            
                  <option value="Dự Kiến"> Dự Kiến </option>             
                </select>
              </div>
        </div>
        <div class="modal-footer">           
            <button type="submit" name="add_lop" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Lớp Học</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Lớp Học
      </button>
 
  </div>

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
          
          $query = "SELECT * FROM lop_hoc   ORDER BY  TinhTrang  DESC, MaLop ASC";
          $query_run= mysqli_query($connection,$query);
        ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Mã Lớp </th>
           <th>Tên Lớp </th>
           <th>Giáo Viên </th>
           <th>Tình Trạng </th>
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
            ?>      
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['MaLop']; ?></td>                 
                  <td> <?php echo $row['TenLop']; ?> </td>
                  <td> <?php echo $row['MaGV']; ?> </td>
                  <td> <?php echo $row['TinhTrang']; ?> </td>
                  <td>
                      <form action="lop_hoc_edit_dir.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="lop_hoc_code_dir.php" method="POST">
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