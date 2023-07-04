<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_director.php';
 ?>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Điểm Danh - Nhận Xét</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">    
      <a class="btn btn-info"  href="diem_danh.php" >Back</a>
    
  </div>
  <div class="table-responsive">

        <?php  
          
          $query = "SELECT  * FROM lop_hoc ORDER BY  TinhTrang  DESC";
          $query_run= mysqli_query($connection,$query);
        ?>
     
  <div class="card-body">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Mã Lớp Học</th> 
           <th>Tên Lớp</th>
           <th>Giáo Viên</th>
           <th>Tình Trạng</th>
           <th>Danh Sách Học Sinh</th> 
          </tr>
        </thead>
        <tbody>

        <?php 
        $serial_number=0;
        
        if(mysqli_num_rows($query_run)>0)
        {
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;
            ?>      
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['MaLop']; ?></td> 
                  <td> <?php echo $row['TenLop']; ?></td> 
                  <td> <?php echo $row['MaGV']; ?></td>
                  <td> <?php echo $row['TinhTrang']; ?></td>                 
                   <td>
                      <form action="diem_danh_lop_hs_dir.php" method="POST">
                        <input type="hidden" name="ma_lop" value="<?php echo $row['MaLop']; ?>">
                        <input type="submit" name="ma_lop_id" value="Danh Sách Học Sinh" class="btn btn-primary">
                        
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