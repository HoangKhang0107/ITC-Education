<?php 
  include 'security.php';
  include 'includes/header.php';
  include 'includes/navbar_teacher.php';
 ?>
<!-- Add Button -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Liệu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="tai_lieu_code.php" method="POST" enctype=multipart/form-data>

        <div class="modal-body">   
           <div class="form-group">
                <label>Tựa Đề </label> 
                <input type="text" name="tua_de" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Hình Ảnh </label>
                <input type="file" name="image"  id="image" class="form-control" required>
            </div>       
           
            <div class="form-group">
                <label>Tóm Tắt</label>
                <input type="text" name="tom_tat" class="form-control" required>
            </div>

            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mã Nhân Viên</label>
                <input type="text" name="manv" class="form-control" required>
            </div>                        
            
        </div>
        <div class="modal-footer">           
            <button type="submit" name="add_tl" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Tài Liệu</h1>

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
        Thêm Tài Liệu
      </button>     
  </div>
        <div class="card-body">      
         <div class="table-responsive">

        <?php  
          
          $query = "SELECT * FROM tai_lieu";
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
           <th>Tựa Đề </th>
           <th>Hình Ảnh </th>
           <th>Tóm Tắt</th>          
           <th>URL </th>
           
           <th>Mã Nhân Viên </th>                           
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
                  <th><?php echo $row['TuaDe']; ?></th>
                  <td> <?php echo '<img src="anh_nhan_vien/'.$row['img'].'" width="100px" height="100px" alt="Image">' ?></td>
                  <td> <?php echo $row['TomTat']; ?></td>                 
                  <td> <?php echo $row['url']; ?></td>
                  
                  <td> <?php echo $row['MaNhanVien']; ?></td>                                   
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
        url:'tai_lieu_code.php',
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