<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>
<?php require 'config.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
	</head>
	<body>
	<h3 style ="text-align: center;">Thêm nhân viên</h3><hr>
		<form style ="text-align: center;"class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import">Import</button>
		</form>

		<hr>
		
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$TenNhanVien = $row[0];
				$MaNhanVien = $row[1];
				$DiaChi = md5($row[2]);
				$SDT =$row[3];
				$Email = $row[4];
                $TrinhDo=$row[5];
                $ChucVu=$row[6];
                $NgaySinh=$row[7];
				mysqli_query($conn, "INSERT INTO nhan_vien VALUES('','$TenNhanVien', '$MaNhanVien', '$DiaChi', '$SDT','$Email','$TrinhDo',' $ChucVu','$NgaySinh','')");
			}

			echo
			"
			<script>
			alert('Succesfully Imported');
			document.location.href = '';
			</script>
			";
		}
		?>
		
        <div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Nhân Viên - Giáo Viên</h1>

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

        <div class="card-body">      
         <div class="table-responsive">

        <?php  
          
          $query = "SELECT * FROM nhan_vien";
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
           <th>Mã Nhân Viên </th>
           <th>Hình Ảnh </th>
           <th>Tên Nhân Viên </th>          
           <th>Email </th>
           
           <th>Chức Vụ </th>  
           <th>Địa Chỉ </th>
           <th>Số Điện Thoại </th>                
           <th>Trình Độ Chuyên Môn </th>
           <th>Ngày Sinh </th>        
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
                  <th><?php echo $row['MaNhanVien']; ?></th>
                  <td> <?php echo '<img src="anh_nhan_vien/'.$row['img'].'" width="100px;" height="100px" alt="Image">' ?></td>
                  <td> <?php echo $row['TenNhanVien']; ?></td>                 
                  <td> <?php echo $row['Email']; ?></td>
                  
                  <td> <?php echo $row['ChucVu']; ?></td>                 
                  <td> <?php echo $row['DiaChi']; ?></td>
                  <td> <?php echo $row['SDT']; ?></td>
                  <td> <?php echo $row['TrinhDo']; ?></td>
                  <td> <?php echo $row['NgaySinh']; ?></td>
                  <td>
                      <form action="nhan_vien_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="nhan_vien_code.php" method="POST">
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
        url:'nhan_vien_code.php',
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
	</body>
</html>
<?php 
	include 'includes/scripts.php';
  	include 'includes/footer.php';
  ?>