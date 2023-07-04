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
          
          $query = "SELECT distinct MaCaHoc FROM diem_danh ORDER BY MaCaHoc DESC";
          $query_run= mysqli_query($connection,$query);
        ?>
     
  <div class="card-body">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Mã Ca Học</th> 
           <th>Show Attendance</th> 
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
                  <td> <?php echo $row['MaCaHoc']; ?></td> 
                   <td>
                      <form action="diem_danh_show_dir.php" method="POST">
                        <input type="hidden" name="ma_ca" value="<?php echo $row['MaCaHoc']; ?>">
                        <input type="submit" name="ma_ca_id" value="Show Attendance" class="btn btn-primary">
                        
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