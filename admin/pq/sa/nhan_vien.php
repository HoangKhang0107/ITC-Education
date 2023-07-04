<?php 
  include 'security.php';
  include 'includes/header.php';
  include 'includes/navbar_superadmin.php';
 ?>
<!-- Add Button -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Giáo Viên - Nhân Viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="pq/sa/nhan_vien_code.php" method="POST" enctype=multipart/form-data>

        <div class="modal-body">   
            <div class="form-group">
                <label>Mã Nhân Viên/Giáo Viên </label> 
                <input type="text" name="ma_nhan_vien" class="form-control" >
            </div>        
            <div class="form-group">
                <label>Tên Nhân Viên/Giáo Viên </label> 
                <input type="text" name="ten_nhan_vien" class="form-control" >
            </div>
            <div class="form-group">
                <label>Địa Chỉ</label>
                <input type="text" name="dia_chi" class="form-control" >
            </div>

            <div class="form-group">
                <label>Số Điện Thoại</label>
                <input type="text" name="sdt" class="form-control" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" >
            </div>
            
            <div class="form-group">
                <label>Trình Độ Chuyên Môn </label>
                <input type="text" name="trinh_do" class="form-control" >
            </div>

            <?php 
              $chuc_vu ="SELECT * FROM chuc_vu";
              $run = mysqli_query($connection,$chuc_vu);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Chức Vụ </label>
                    <select name="chuc_vu" class="form-control ">                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option value="<?php echo $row['TenChucVu'] ?>" > <?php echo $row['TenChucVu'] ?> </option>
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
                <label>Ngày Sinh </label>
                <input type="date" name="ngay_sinh" class="form-control">
            </div>

             <div class="form-group">
                <label>Hình Ảnh </label>
                <input type="file" name="image"  id="image" class="form-control" >
            </div>
            
        </div>
        <div class="modal-footer">           
            <button type="submit" name="add_nv" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Nhân Viên - Giáo Viên</h1>

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
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">    
      <button type="button" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Giáo Viên - Nhân Viên
      </button>     
  </div>
        <div class="card-body">      
         <div class="table-responsive">

        <?php  
          
          $query = "SELECT * FROM nhan_vien";
          $query_run= mysqli_query($connection,$query);
        ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">
          <form action="" method="post" >
            <div class="col-sm-12 col-md-6">
            <div id="dataTable_filter" class="dataTables_filter">            
             <label for="search">Tìm kiếm             
                 <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
              </label>               
            </div>
          </div>           
          </form>         
        </div>
        <thead align="center">
          <tr>
           <th>STT </th>
           <th>Mã Nhân Viên </th>
           <th>Hình Ảnh </th>
           <th>Tên Nhân Viên </th>          
           <th>Email </th>
           
           <th>Chức Vụ </th>  
           <th>Địa Chỉ </th>
           <th>Số Điện Thoại </th>                
           <th>Trình Độ Chuyên Môn </th>
           <th>Ngày Sinh </th>        
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
                  <th><?php echo $serial_number; ?> </th>
                  <th><?php echo $row['MaNhanVien']; ?></th>
                  <td> <?php echo '<img src="anh_nhan_vien/'.$row['img'].'" width="100px;" height="100px" alt="Image">' ?></td>
                  <td> <?php echo $row['TenNhanVien']; ?></td>                 
                  <td> <?php echo $row['Email']; ?></td>
                  
                  <td> <?php echo $row['ChucVu']; ?></td>                 
                  <td> <?php echo $row['DiaChi']; ?></td>
                  <td> <?php echo $row['SDT']; ?></td>
                  <td> <?php echo $row['TrinhDo']; ?></td>
                  <td> <?php echo $row['NgaySinh']; ?></td>
                  <td>
                      <form action="pq/sa/nhan_vien_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="pq/sa/nhan_vien_code.php" method="POST">
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
    

<script type="text/javascript" >
  $(document).ready(function()
  {
    $('#search_text').keyup(function(){
      var search = $(this).val();
      $.ajax({
        url:'pq/sa/nhan_vien_code.php',
        method:'post',
        data:{query:search},
        success:function(response)
        {
           $('#dataTable').html(response);
        }
      });

    });
  });

</script>

 <?php 
  include 'includes/scripts.php';
  include 'includes/footer.php';
   ?>