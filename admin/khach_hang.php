<?php 
  include 'security.php';
  include 'includes/header.php';
  include 'includes/navbar_admin.php';
 ?>
<!-- Add Button -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Khách Hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="khach_hang_code.php" method="POST" enctype=multipart/form-data>

        <div class="modal-body">   
            <div class="form-group">
                <label>Họ Tên </label> 
                <input type="text" name="ten" class="form-control" >
            </div>        
            <div class="form-group">
                <label>Số Điện Thoại </label> 
                <input type="text" name="sdt" class="form-control" >
            </div>
            <div class="form-group">
                <label>Trình độ Hiện Tại</label>
                <input type="text" name="trinhdo" class="form-control" >
            </div>

            <div class="form-group">
                <label>Khóa Học</label>
                <input type="text" name="khoahoc" class="form-control" >
            </div>  
            <div class="form-group">
                <label>Tình Trạng Tư Vấn</label>
                <input type="text" name="tinhtrang" class="form-control" >
            </div>          
        </div>
        <div class="modal-footer">           
            <button type="submit" name="add_kh" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Khách Hàng</h1>

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
        Thêm Khách Hàng
      </button>     
  </div>
        <div class="card-body">      
         <div class="table-responsive">

        <?php  
          
          $query = "SELECT * FROM khach_hang_dang_ky";
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
           <th>Họ Tên </th>
           <th>Số Điện Thoại </th>
           <th>Trình Độ Hiện Tại </th>          
           <th>Khóa Học </th>
           <th>Tình Trạng Tư Vấn </th>
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
                  <th><?php echo $row['HoTen']; ?></th>             
                  <td> <?php echo $row['Sdt']; ?></td>                 
                  <td> <?php echo $row['TrinhDoHienTai']; ?></td>
                  
                  <td> <?php echo $row['KhoaHoc']; ?></td>  
                  <td> <?php echo $row['TinhTrang']; ?></td>                               
                  <td>
                      <form action="khach_hang_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="khach_hang_code.php" method="POST">
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
        url:'khach_hang_code.php',
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