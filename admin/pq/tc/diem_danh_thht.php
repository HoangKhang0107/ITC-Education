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
    
      <a class="btn btn-info"  href="pq/tc/diem_danh_lop.php" >Back</a>
 	    <?php 
        if(isset($_POST['ma_hs_id']))
        {
           
            ?>
            <form action="pq/tc/diem_danh_pdf.php" method="POST">
              <input type="hidden" name="ma_hs" value="<?php echo $_POST['ma_hs']; ?>">
              <button type="submit" name="xuat_pdf_hs" class="btn btn-primary"> Xuất PDF </button>                              
            </form>
            <?php
        }
       ?>
  </div>
  <div class="table-responsive">      
    <div class="card-body">
     
        <?php 
        if(isset($_POST['ma_hs_id']))
        {
              $hs = $_POST['ma_hs'];
             $query ="SELECT * FROM hoc_sinh  WHERE MaHocSinh = '$hs'";
              
             //$query = "SELECT *  FROM diem_danh1 ";
              $query_run= mysqli_query($connection,$query);

           
          if ($row=mysqli_fetch_array($query_run)) 
          {
             
            
            ?>  
            <label>Tên Học Sinh: <?php echo $row['TenHocSinh']; ?> </label> <br>
            <label>Lớp: <?php echo $row['Lop']; ?> </label> <br>
            <label>Ngày Sinh: <?php echo $row['NgaySinh']; ?> </label> <br>
            <label>Phụ Huynh: <?php echo $row['MaPH']; ?> </label> <br>
            <br>                  
            
      <?php 
       
          }
        

        }
       
        ?>
          
      
      
     
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Ngày</th> 
           <th>Giờ</th>
           <th>Điểm Danh</th>  
           <th>Điểm</th> 
           <th>Ghi Chú</th>
           <th>Link</th>
          </tr>
        </thead>
        <tbody>

        <?php 
        if(isset($_POST['ma_hs_id']))
        {
              $ma_hs = $_POST['ma_hs'];
             $query ="SELECT * FROM ca_hoc INNER JOIN diem_danh ON ca_hoc.MaCaHoc = diem_danh.MaCaHoc INNER JOIN hoc_sinh ON diem_danh.MaHocSinh = hoc_sinh.MaHocSinh WHERE diem_danh.MaHocSinh = '$ma_hs'";
              
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
                  <td> <?php echo $row['Ngay']; ?></td>
                  <td> <?php echo $row['Gio']; ?></td>
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