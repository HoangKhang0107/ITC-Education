<?php 
  include 'security.php';
  include 'includes/header.php';
  include 'includes/navbar_admin.php';

  if(isset($_GET['page']))
  {
      $page = $_GET['page'];
  }
  else
  {
    $page =1;
  }
  $num_per_page =25;
  $start_from = ($page-1)*$num_per_page;

  $query ="SELECT * FROM thu_chi LIMIT $start_from,$num_per_page";
  $result = mysqli_query($connection,$query);

 
 ?>


<div class="modal fade" id="addadminprofile1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo Khoản Thu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="quan_ly_thu_chi_code_dir.php" method="POST">

        <div class="modal-body">
            <input type="hidden"  name="thu_chi" value="Thu"> 
            <div class="form-group">
                <label> Ngày Tháng </label>
                <input type="date" name="ngay_thang" value="<?php echo date("Y-m-d");?>" class="form-control" required>
            </div>

            
             <?php       
              $query  ="SELECT * FROM hoc_sinh ";
              $run = mysqli_query($connection,$query);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group"  >
                    <label> Tên Học Sinh </label>
                    <select name="ma_hs" class="form-control " >                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option value="<?php echo $row['MaHocSinh'] ?>" > <?php echo $row['MaHocSinh'] ?> - <?php echo $row['TenHocSinh'] ?></option>
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
              <?php 
              $loai_thu_chi ="SELECT * FROM loai_thu_chi Where Loai = 'Thu'";
              $run = mysqli_query($connection,$loai_thu_chi);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Loại Thu </label>
                    <select id="loai_thu" name="loai" class="form-control " >                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option value="<?php echo $row['TenLoai'] ?>" > <?php echo $row['TenLoai'] ?> </option>
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
            
              
            <?php 
              $chuc_vu ="SELECT * FROM nhan_vien Where ChucVu = 'Kế Toán'";
              $run = mysqli_query($connection,$chuc_vu);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Người </label>
                    <select name="nguoi" class="form-control ">                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option value="<?php echo $row['MaNhanVien'] ?>" > <?php echo $row['MaNhanVien'] ?> - <?php echo $row['TenNhanVien'] ?> </option>
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
                <label>Nội Dung </label>
                <input type="text" name="noi_dung" class="form-control" required="" >
            </div> 
            
            <div id="thu" class="form-group" >
                <label >Số Tiền Thu</label>
                <input  type="text" name="tien_thu" class="form-control" required=""   >
            </div> 
            <div class="form-group">
                <label>Ghi Chú</label>
                <input type="text" name="ghi_chu" class="form-control" >
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

<div class="modal fade" id="addadminprofile2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo Khoản Chi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="quan_ly_thu_chi_code.php" method="POST">

        <div class="modal-body">
            <input type="hidden"  name="thu_chi" value="Chi"> 
            <div class="form-group">
                <label> Ngày Tháng </label>
                <input type="date" name="ngay_thang" value="<?php echo date("Y-m-d");?>" class="form-control" required>
            </div>
               <?php 
              $loai_thu_chi ="SELECT * FROM loai_thu_chi Where Loai = 'Chi'";
              $run = mysqli_query($connection,$loai_thu_chi);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Loại Chi </label>
                    <select id="loai_chi" name="loai" class="form-control ">                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option value="<?php echo $row['TenLoai'] ?>" > <?php echo $row['TenLoai'] ?> </option>
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
             
            <?php 
              $chuc_vu ="SELECT * FROM nhan_vien Where ChucVu = 'Kế Toán'";
              $run = mysqli_query($connection,$chuc_vu);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Người </label>
                    <select name="nguoi" class="form-control ">                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option value="<?php echo $row['MaNhanVien'] ?>" > <?php echo $row['MaNhanVien'] ?> - <?php echo $row['TenNhanVien'] ?> </option>
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
                <label>Nội Dung </label>
                <input type="text" name="noi_dung" class="form-control" required="" >
            </div> 
            
           
            <div id="chi" class="form-group" >
                <label >Số Tiền Chi</label>
                <input type="text" name="tien_chi"  class="form-control" >
            </div>            
            <div class="form-group">
                <label>Ghi Chú</label>
                <input type="text" name="ghi_chu" class="form-control" >
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

<div class="modal fade" id="addadminprofile3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Khóa Dữ Liệu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="quan_ly_thu_chi_code_dir.php" method="POST">

        <div class="modal-body">           
              <?php 
              $thang ="SELECT distinct Thang,Nam FROM thu_chi Where Khoa ='visible' ";
              $run = mysqli_query($connection,$thang);
              if(mysqli_num_rows($run) > 0)
              {

                  ?>
                  <div class="form-group">
                    <label> Tháng </label>
                    <select name="thang_nam"  class="form-control ">                     
                      <?php 
                         foreach ($run as $row) 
                         {
                        ?>
                           <option  value="<?php echo $row['Thang'] ?><?php echo $row['Nam'] ?> " > <?php echo $row['Thang'] ?> -  <?php echo $row['Nam'] ?>                           
                           </option>   
                                              
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
           
        </div>
        <div class="modal-footer">           
            <button type="submit" name="khoa" class="btn btn-primary">Khóa </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Các Khoản Thu</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3"> 

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile1">
                Tạo Khoản Thu
              </button>
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile2">
                Tạo Khoản Chi
              </button> -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile3">
                Khóa Dữ Liệu
              </button>
               <a class="btn btn-info "  href="quan_ly_thu_chi_view_dir.php" >View All</a>
               <!-- <a class="btn btn-info "  href="quan_ly_thu_chi_xp_dir.php" >Xuất Phiếu Chi</a> -->
               <a class="btn btn-info "  href="quan_ly_thu_chi_xpt_dir.php" >Xuất Phiếu Thu</a>
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
                  <thead align="center">                                 
                     </tr>
                      <th >STT</th>
                      <th >Ngày Tháng</th>
                      <th >Thu/Chi</th>  
                      <!-- <th >Loại</th>                                                  -->
                      <th >Người</th>
                      <th >Nội Dung</th>
                      <th >Thu</th> 
                      <!-- <th >Chi</th>  -->
                     
                      <th>Ghi Chú</th>
                      <th>EDIT </th>
                      <th>DELETE </th>
                    </tr>

                  </thead>
                  
                  <tbody>

                  <?php 
                      if(mysqli_num_rows($result)>0)
                      {
                        $serial_number=0;
                        $luy_ke =0;
                        while ($row=mysqli_fetch_assoc($result)) 
                        {
                          $serial_number++;
                          $tien = $row['LuyKe'];
                          $luy_ke = $luy_ke + $tien;
                          $luy_ke1 = number_format($luy_ke);
                          $thoigian = $row['NgayThang'];
                          $so_tien_thu = $row['SoTienThu'];
                          $tien_thu = number_format($so_tien_thu);
                          $so_tien_chi = $row['SoTienChi'];
                          $tien_chi = number_format($so_tien_chi);

                          $date = date("d-m-Y", strtotime($thoigian));
                          $khoa = $row['Khoa'];
                          //$vid = 'visible';
            //  $vid2= 'hidden';
                          ?>      
                          <tr>
                                <td> <?php echo $serial_number; ?></td>
                                <td> <?php echo $date; ?></td>
                                <td> <?php echo $row['ThuChi']; ?></td> 
            
                                <td> <?php echo $row['Nguoi']; ?> </td>
                                <td> <?php echo $row['NoiDung']; ?> </td>
                                <td> <?php echo $tien_thu; ?> </td>

                                
                                <td> <?php echo $row['GhiChu']; ?> </td>
                                <td>
                                    <form action="quan_ly_thu_chi_edit_dir.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                                        <button type="submit" name="edit_btn" class="btn btn-success" style="visibility:<?php echo $khoa ?>;" > EDIT</button>                        
                                    </form>
                                </td>
                                <td>
                                    <form action="quan_ly_thu_chi_code_dir.php" method="POST"  >
                                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                      <button type="submit" name="delete_btn"  class="btn btn-danger" style="visibility:<?php echo $khoa ?>;" > DELETE</button>
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

                  <?php 
                      $pr_query =" SELECT * FROM thu_chi";
                      $pr_result = mysqli_query($connection,$pr_query);
                      $total_record = mysqli_num_rows($pr_result);

                      $total_page = ceil($total_record/$num_per_page);
                      
                      if($page>1)
                      {
                          echo "<a href='quan_ly_thu_chi.php?page=".($page-1)."' class ='btn btn-info'>Previous</a>";
                      }
                      for ($i=1; $i<=$total_page ; $i++) 
                      { 
                          echo "<a href='quan_ly_thu_chi.php?page=".$i."' class ='btn btn-primary'>$i</a>";
                      }
                       if($i>$page)
                      {
                          echo "<a href='quan_ly_thu_chi.php?page=".($page+1)."' class ='btn btn-info'>Next</a>";
                      }  
                   ?>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script type="text/javascript" >
  $(document).ready(function()
  {
    $('#search_text').keyup(function(){
      var search = $(this).val();
      $.ajax({
        url:'quan_ly_thu_chi_code_dir.php',
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