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
      <form action="diem_danh_pdf_dir.php" method="POST">
      <a class="btn btn-info"  href="diem_danh_view_dir.php" >Back</a>
     
      <?php 
        if(isset($_POST['ma_ca_id']))
        {
            $ca_hoc = $_POST['ma_ca'];
           
            ?>
            
              <input type="hidden" name="ma_ca_hoc" value="<?php echo $_POST['ma_ca']; ?>">
              <button type="submit" name="xuat_pdf" class="btn btn-primary"> Xuất PDF </button>                              
            
            <?php
        }
       ?>
      </form>
      
  </div>
  <div class="table-responsive">      
    <div class="card-body">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          
           <th>Nội Dung Bài Học</th> 
           <th>Nhận Xét Chung</th>
          
          </tr>
        </thead>
        <tbody>

        <?php 
        if(isset($_POST['ma_ca_id']))
        {
              $ca_hoc = $_POST['ma_ca'];
              $query ="SELECT * FROM ca_hoc 
                      INNER JOIN diem_danh ON ca_hoc.MaCaHoc = diem_danh.MaCaHoc 
                      INNER JOIN hoc_sinh ON diem_danh.MaHocSinh = hoc_sinh.MaHocSinh 
                      INNER JOIN nhan_vien ON nhan_vien.MaNhanVien = ca_hoc.MaGV
                      WHERE ca_hoc.MaCaHoc = '$ca_hoc'";
              
            
              $query_run= mysqli_query($connection,$query);

              $serial_number=0;
             
     
          if ($row=mysqli_fetch_array($query_run)) 
          {
            
             $noi_dung = $row['MoTa'].'<br>'.$row['NoiDung'];
            ?> 
            <p class="h5 mb-2 text-gray-800" align="left">Lớp: <?php echo $row['MaLop'] ?></p>
            <p class="h5 mb-2 text-gray-800" align="left">Giáo Viên: <?php echo $row['TenNhanVien'] ?></p>
            <p class="h5 mb-2 text-gray-800" align="left">Ngày: <?php echo $row['Ngay'] ?></p> 
            <p class="h5 mb-2 text-gray-800" align="left">Giờ: <?php echo $row['Gio'] ?></p>     
            <tr>
                   
                  <td> <?php echo $noi_dung; ?></td>
                  <td> <?php echo $row['NhanXetChung']; ?></td>
                 
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