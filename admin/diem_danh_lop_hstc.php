<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_teacher.php';
 ?>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Điểm Danh - Nhận Xét</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">    
      <a class="btn btn-info"  href="diem_danh_loptc.php" >Back</a>
    
  </div>
  <div class="table-responsive">

        
     
  <div class="card-body">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Mã Học Sinh</th> 
           <th>Tên Học Sinh</th>
           <th>Tình Hình Học Tập</th> 
          </tr>
        </thead>
        <tbody>
         <?php 
        if(isset($_POST['ma_lop_id']))
        {
             $ma_lop = $_POST['ma_lop'];
             $query = "SELECT  * FROM hoc_sinh Where Lop='$ma_lop'";
             $query_run= mysqli_query($connection,$query);
             $serial_number=0;                
          while ($row=mysqli_fetch_array($query_run)) 
          {
             $serial_number++;
            // $ghi_chu = $row['GhiChu']
            ?>      
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['MaHocSinh']; ?></td> 
                  <td> <?php echo $row['TenHocSinh']; ?></td>                  
                   <td>
                      <form action="diem_danh_thhttc.php" method="POST">
                        <input type="hidden" name="ma_hs" value="<?php echo $row['MaHocSinh']; ?>">
                        <input type="submit" name="ma_hs_id" value="Tình Hình Học Tập" class="btn btn-primary">
                        
                      </form>
                  </td>
                 
              </tr>
      <?php 
       
          }
        

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