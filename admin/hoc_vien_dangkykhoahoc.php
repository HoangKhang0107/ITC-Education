<?php 
  include 'security.php';
  include 'includes/header.php';
  include 'includes/navbar_admin.php';
 ?>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý học viên đăng ký khóa học</h1>

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
        <div class="card-body">      
         <div class="table-responsive">

        <?php  
          
          $query = "SELECT * FROM hocviendangkykhoahoc";
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
                  <th><?php echo $row['TenHocVien']; ?></th>             
                  <td> <?php echo $row['Sdt']; ?></td>                 
                  
                  <td> <?php echo $row['MaLopHoc']; ?></td>  
                  <td> <?php echo $row['TinhTrang']; ?></td>                               
                  <td>
                      <form action="dangky_khoahoc_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="hoc_vien_code.php" method="POST">
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
        url:'hocviendangkykhoahoc.php',
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