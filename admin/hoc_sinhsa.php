<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?> 

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Học Sinh</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> 
        </button>
      </div>
      <form action="hoc_sinh_codesa.php" method="POST">
 
        <div class="modal-body">

                    
            <div class="form-group">
                <label>Tên Học Sinh</label>
                <input type="text" name="ten_hs" class="form-control" required >
            </div>
             <div class="form-group">
                <label>Ngày Sinh</label>
                <input type="date" name="ngay_sinh" class="form-control" required>
            </div>
            <?php 
                      $lop ="SELECT * FROM lop_hoc ORDER BY MaLop";
                      $run = mysqli_query($connection,$lop);
                      if(mysqli_num_rows($run) > 0)
                      {

                          ?>
                          <div class="form-group">
                            <label>Lớp Học </label>
                            <select name="lop" class="form-control ">                     
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
            <div class="form-group">
                <label>Mã Phụ Huynh</label>
                <input type="text" name="phu_huynh" class="form-control" required>
            </div>
            

            <div class="form-group">
                <label>SDT</label>
                <input type="text" name="sdt" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Địa Chỉ</label>
                <input type="text" name="dia_chi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Ghi Chú</label>
                <input type="text" name="ghi_chu" class="form-control" >
            </div>            
            <div class="form-group">
                <label>Tình Trạng</label>
                <input type="text" name="tinh_trang" class="form-control" >
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
<h1 class="h3 mb-2 text-gray-800">Thông Tin Học Sinh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Học Sinh
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
          
          $stmt = $connection->prepare("SELECT * FROM hoc_sinh ORDER BY id");
          $stmt->execute();
          $result=$stmt->get_result();

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
           <th>Mã Học Sinh </th>
           <th>Tên Học Sinh </th>
           <th>Ngày Sinh </th>
           <th>Lớp </th>
           <th>SDT </th>
           <th>Địa Chỉ </th>
           <th>Ghi Chú </th>          
           <th>Tình Trạng </th>
           <th>EDIT</th>
           <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
          <?php 
           $serial_number=0;
          while ($row=$result->fetch_assoc()) 
          {
            $serial_number++;
            $thoigian = $row['NgaySinh'];
            $date = date("d-m-Y", strtotime($thoigian));
            ?>    
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['MaHocSinh']; ?></td>               
                  <td> <?php echo $row['TenHocSinh']; ?> </td>
                  <td> <?php echo $date; ?> </td>
                  <td> <?php echo $row['Lop']; ?> </td>
                  <td> <?php echo $row['SDT']; ?> </td>
                  <td> <?php echo $row['DiaChi']; ?> </td>
                  <td> <?php echo $row['GhiChu']; ?> </td>                  
                  <td> <?php echo $row['tinhtrang']; ?> </td>
                  <td>
                      <form action="hoc_sinh_editsa.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="hoc_sinh_codesa.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                      </form>
                  </td>
              </tr>
               
      <?php     
          }
     
      // ?>
              
        </tbody>
      </table>
      <div id="dataModal" class="modal fade">  
                  <div class="modal-dialog" >  
                      <div class="modal-content">  
                            <div class="modal-header">  
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                <h4 class="modal-title">Thông tin phụ huynh</h4>  
                            </div>  
                            <div class="modal-body" id="employee_detail">  
                            </div>  
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                      </div>  
                  </div>  
            </div> 

    </div>
  </div>
</div>

<script type="text/javascript" >
  $(document).ready(function()
  {
       
    $('#search_text').keyup(function(){
      var search = $(this).val();
      $.ajax({
        url:'hoc_sinh_codesa.php',
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

  

 