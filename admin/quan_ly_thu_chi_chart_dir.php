<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_director.php';
 ?>

<?php 
if(isset($_POST['chart']))
        {   
            $nam = $_POST['nam'];
            $thang = $_POST['thang'];

           
          $query ="SELECT Loai, sum(LuyKe) as LuyKe,Nam,Thang from thu_chi WHERE Nam ='$nam' AND Thang='$thang' group by Loai";            
          $query_run= mysqli_query($connection,$query);
          
          $chart_data = '';
          while($row = mysqli_fetch_array($query_run))
          {
           $chart_data .= "{ Loai:'".$row["Loai"]."', LuyKe:".$row["LuyKe"].", }, ";
          }
          $chart_data = substr($chart_data, 0, -2);

        }

 ?>



<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Thu Chi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3"> 
      <form action="quan_ly_thu_chi_ngay_dir.php" method="POST">   
      <a class="btn btn-info"  href="quan_ly_thu_chi_view.php" >Back</a> 

      <?php 
        if(isset($_POST['chart']))
        {
           
            ?>
           
              <input type="hidden" name="nam" value="<?php echo $_POST['nam']; ?>">
              <input type="hidden" name="thang" value="<?php echo $_POST['thang']; ?>">
              <button type="submit" name="date" class="btn btn-primary"> Thu Chi Theo Ngày </button>                              
           
            <?php
        }
       ?>
       </form>
       <br>
       <form action="quan_ly_thu_chi_pdf_dir.php" method="POST">   
      <?php 
        if(isset($_POST['chart']))
        {
           
            ?>
           
              <input type="hidden" name="nam" value="<?php echo $_POST['nam']; ?>">
              <input type="hidden" name="thang" value="<?php echo $_POST['thang']; ?>">
              <button type="submit" name="xuat_pdf_loai" class="btn btn-primary"> Xuất PDF </button>                              
           
            <?php
        }
       ?>
       </form>
  </div>
  
   <div class="table-responsive">      
    <div class="card-body" >
      <p class="h3 mb-2 text-gray-800" align="center"> Thu chi tháng <?php echo $thang; ?> năm <?php echo $nam; ?></p>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          
           <th>Thu</th> 
           <th>Chi</th>
           <th>Luỹ Kế</th>  
           
          </tr>
        </thead>
        <tbody>

        <?php 
        if(isset($_POST['chart']))
        {
              $nam = $_POST['nam'];
              $thang = $_POST['thang'];
              $query ="SELECT * FROM thu_chi WHERE Nam = '$nam' AND Thang ='$thang'";
             
              $query_run= mysqli_query($connection,$query);
              $tong_thu =0;
              $tong_chi =0;

          while ($row=mysqli_fetch_array($query_run)) 
          {                  
              $thu = $row['SoTienThu'];
              $chi = $row['SoTienChi'];
              $tong_thu = $tong_thu + $thu; 
              $tong_chi = $tong_chi + $chi;
              $luy_ke = $tong_thu - $tong_chi;  
            ?>      
           
      <?php 
       
          }
        }
       
        ?>
          <tr>                   
                  <td> <?php echo number_format($tong_thu); ?></td>
                  <td> <?php echo number_format($tong_chi); ?></td>
                  <td> <?php echo number_format($luy_ke); ?></td>                  
          </tr> 
      
        
        </tbody>
      </table> 
      <br>
        <p class="h3 mb-2 text-gray-800" align="center"> Số Tiền Dư</p>
        
        <?php 
        if(isset($_POST['chart']))
        {
              $nam = $_POST['nam'];
              $thang = $_POST['thang'];
              $query1 ="SELECT * FROM thu_chi WHERE Nam = '$nam' AND Thang <='$thang'";
              $query_run1= mysqli_query($connection,$query1);
              $query2 ="SELECT * FROM thu_chi WHERE Nam < '$nam' ";
              $query_run2= mysqli_query($connection,$query2);
             
              $luy_ke =0;
              $luy_ke_nam=0;
           if(mysqli_num_rows($query_run)>0)
            {
                 while ($row=mysqli_fetch_array($query_run2)) 
                  {                              
                    $luy_ke_nam= $luy_ke_nam + $row['LuyKe'];          
                  }   
            }   
          while ($row=mysqli_fetch_array($query_run1)) 
          {                  
             
              $luy_ke= $luy_ke + $row['LuyKe'];
       
          }
           $so_du =$luy_ke_nam + $luy_ke;
        }
       
        ?>
          <p class="h3 mb-2 text-gray-800" align="center"><?php echo number_format($so_du); ?></p>
       
        <div id="chart">
          
        </div>
        <br>
        <p class="h3 mb-2 text-gray-800" align="center"> Thống kê thu chi theo loại</p>
        <br>
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          
           
           <th>Loại</th>
           <th>Số Tiền</th>  
           
          </tr>
        </thead>
        <tbody>

        <?php 
        if(isset($_POST['chart']))
        {
              $nam = $_POST['nam'];
              $thang = $_POST['thang'];
              $query ="SELECT Loai, sum(LuyKe) as LuyKe,Nam,Thang from thu_chi WHERE Nam ='$nam' AND Thang='$thang' group by Loai";
              $query_run= mysqli_query($connection,$query);
              

          while ($row=mysqli_fetch_array($query_run)) 
          {                  
              $loai = $row['Loai'];
              $luy_ke = $row['LuyKe'];             
            ?>      
            <tr>                   
                  <td> <?php echo $loai; ?></td>
                  <td> <?php echo number_format($luy_ke); ?></td>
                       
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


<script>

Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Loai',
 ykeys:['LuyKe'],
 labels:['Số Tiền'],
 hideHover:'auto',
 barColors:['green', 'red'],
 stacked:true
});


</script>


 <?php 
  include 'includes/scripts.php';
  include 'includes/footer.php';
   ?>