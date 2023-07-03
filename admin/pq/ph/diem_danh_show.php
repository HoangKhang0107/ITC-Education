<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_phuhuynh.php';
 ?>



<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Điểm Danh - Nhận Xét</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
      <a class="btn btn-info"  href="pq/ph/diem_danh_view.php" >Back</a>
     
      <?php 
        if(isset($_POST['ma_ca_id']))
        {
            $ca_hoc = $_POST['ma_ca'];
           
            ?>           
            <?php
        }
       ?>
     
 	    
  </div>
  <div class="table-responsive">      
    <div class="card-body">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          
           <th>Nội Dung Bài Học</th> 
           <th>Nhận Xét Chung</th>
           <th>Giáo Viên</th>  
           
          </tr>
        </thead>
        <tbody>

        <?php 
        if(isset($_POST['ma_ca_id']))
        {
              $ca_hoc = $_POST['ma_ca'];
              $query ="SELECT * FROM ca_hoc INNER JOIN diem_danh ON ca_hoc.MaCaHoc = diem_danh.MaCaHoc INNER JOIN hoc_sinh ON diem_danh.MaHocSinh = hoc_sinh.MaHocSinh WHERE ca_hoc.MaCaHoc = '$ca_hoc'";
              
             //$query = "SELECT *  FROM diem_danh1 ";
              $query_run= mysqli_query($connection,$query);

              $serial_number=0;
             
     
          if ($row=mysqli_fetch_array($query_run)) 
          {
            
             $noi_dung = $row['MoTa'].'<br>'.$row['NoiDung'];
            ?>      
            <tr>
                   
                  <td> <?php echo $noi_dung; ?></td>
                  <td> <?php echo $row['NhanXetChung']; ?></td>
                  <td> <?php echo $row['MaGV']; ?></td> 
                 
                 
                 
              </tr>
      <?php 
       
          }
        

        }
       
        ?>
          
      
        
        </tbody>
      </table>
     
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Mã Học Sinh</th> 
           <th>Tên Học Sinh</th>
           <th>Điểm Danh</th>  
           <th>Điểm</th> 
           <th>Ghi Chú</th>
           <th>Link</th>
          </tr>
        </thead>
        <tbody>

        <?php 
        if(isset($_POST['ma_ca_id']))
        {
             $ca_hoc = $_POST['ma_ca'];
            
             $query ="SELECT * FROM ca_hoc INNER JOIN diem_danh ON ca_hoc.MaCaHoc = diem_danh.MaCaHoc INNER JOIN hoc_sinh ON diem_danh.MaHocSinh = hoc_sinh.MaHocSinh WHERE ca_hoc.MaCaHoc = '$ca_hoc'";
              
             //$query = "SELECT *  FROM diem_danh1 ";
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
                  <td> <?php echo $row['DiemDanh']; ?></td> 
                  <td> <?php echo $row['Diem']; ?></td>
                  <td> <?php echo $row['Ghi_Chu']; ?></td> 
                  <td> <?php echo $row['Link']; ?></td> 
                 
                 
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