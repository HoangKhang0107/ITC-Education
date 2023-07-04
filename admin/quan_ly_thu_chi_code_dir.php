<?php 
include 'security.php';

$connection->query("SET NAMES 'utf8'");
if (isset($_POST['add_btn'])) 
{
	$id = $_POST['id'];
 	# code...
 	$ngay_thang = $_POST['ngay_thang']; 	
 	$thu_chi = $_POST['thu_chi']; 
  $loai= $_POST['loai'];	
 	$nguoi = $_POST['nguoi'];
 	$noi_dung = $_POST['noi_dung'];
 	$tien_thu = $_POST['tien_thu'];
 	$tien_chi = $_POST['tien_chi'];
 	$ghi_chu = $_POST['ghi_chu'];

 	$luy_ke= $tien_thu - $tien_chi;
  $khoa='visible'; //
  
  $ma_hs= $_POST['ma_hs'];

  $year = date('Y', strtotime($ngay_thang));

  $month = date('m', strtotime($ngay_thang));

  if($month =='01'||$month =='02'||$month =='03')
  {
    $quy=1;
  }
  elseif ($month =='04'||$month =='05'||$month =='06') {
    $quy=2;
  }
  elseif ($month =='07'||$month =='08'||$month =='09') {
    $quy=3;
  }
  else $quy=4;
  $search1 ='-';
  $replace1 ='';
  $date = str_replace($search1, $replace1, $ngay_thang);
  $ma_thu = $date."_".$ma_hs;

 	$query = "INSERT INTO thu_chi(NgayThang,ThuChi,Loai,Nguoi,NoiDung,SoTienThu,SoTienChi,LuyKe,GhiChu,Nam,Thang,Quy,Khoa) 
 				  VALUES('$ngay_thang','$thu_chi','$loai','$nguoi','$noi_dung','$tien_thu','$tien_chi','$luy_ke','$ghi_chu','$year','$month','$quy','$khoa')";
 	$query2 = "INSERT INTO thu_tien_hoc(MaThu,NgayThang,MaHocSinh,SoTien,NoiDung,NguoiThu) 
          VALUES('$ma_thu','$ngay_thang','$ma_hs','$tien_thu','$noi_dung','$nguoi')";
	 	$query_run = mysqli_query($connection,$query);
  $query_run2 = mysqli_query($connection,$query2);
	 	if ($query_run) {
	 		
	 		$_SESSION['success']="Thêm Thành Công";
	 		header('Location: quan_ly_thu_chi.php');
	 	} else {
	 	
	 		$_SESSION['status']="Thêm Thất Bại";
	 		header('Location: quan_ly_thu_chi.php');
	 		
	 	}
 	  if ($query_run2) {
      
      $_SESSION['success']="Thêm Thành Công";
      header('Location: quan_ly_thu_chi.php');
    } else {
    
      $_SESSION['status']="Thêm Thất Bại";
      header('Location: quan_ly_thu_chi.php');
      
    }
 }	


if(isset($_POST['update_btn']))
 {
 		
 		$id = $_POST['edit_id'];
	 	# code...
	 	$ngay_thang = $_POST['ngay_thang']; 	
	 	$thu_chi = $_POST['thu_chi']; 
    $loai = $_POST['loai']; 	
	 	$nguoi = $_POST['nguoi'];
	 	$noi_dung = $_POST['noi_dung'];
	 	$tien_thu = $_POST['tien_thu'];
	 	$tien_chi = $_POST['tien_chi'];
	 	$ghi_chu = $_POST['ghi_chu'];
    $luy_ke = $tien_thu - $tien_chi;
 		$query= "UPDATE thu_chi
 				SET 
 				NgayThang='$ngay_thang', 
 				ThuChi ='$thu_chi', 
        Loai ='$loai', 
 				Nguoi = '$nguoi',
 				NoiDung ='$noi_dung' ,				
 				SoTienThu ='$tien_thu', 
 				SoTienChi ='$tien_chi',
        LuyKe ='$luy_ke',
 				GhiChu = '$ghi_chu'
 				WHERE id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			
 			$_SESSION['success']= "Sửa Thành Công";
 			header('Location: quan_ly_thu_chi.php');
 		} else {
 			
 			$_SESSION['status']= "Sửa Thất Bại";
 			header('Location: quan_ly_thu_chi.php');
 		}
 		
 }
 	
  
  if(isset($_POST['delete_btn']))
 {
 		$id = $_POST['delete_id'];
 		
 		$query= "DELETE FROM thu_chi
 				 WHERE  id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			# code...
 			$_SESSION['success']= "Xóa Thành Công";
 			header('Location: quan_ly_thu_chi.php');
 		} else {
 			# code...
 			$_SESSION['status']= "Xóa Thất Bại";
 			header('Location: quan_ly_thu_chi.php');
 		}
 }

 if(isset($_POST['khoa']))
 {
    $thang_nam = $_POST['thang_nam'];
    $thang = substr("$thang_nam", 0,2); 
    $nam = substr("$thang_nam", 2,4); 
   
   
    $query= "UPDATE thu_chi
        SET 
        Khoa ='hidden'
        WHERE Thang ='$thang' AND Nam ='$nam'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
      # code...
      $_SESSION['success']= "Khóa Dữ Liệu Thành Công";
      header('Location: quan_ly_thu_chi.php');
    } else {
      # code...
      $_SESSION['status']= "Khóa Dữ Liệu Thất Bại";
      header('Location: quan_ly_thu_chi.php');
    }
 }

$output ='';

if(isset($_POST['query'])){
  $search=$_POST['query'];
  $stmt=$connection->prepare("SELECT * FROM thu_chi WHERE 
Loai LIKE CONCAT('%',?,'%') OR NoiDung LIKE CONCAT('%',?,'%')  ") ;
  $stmt->bind_param("ss",$search,$search);


}
else{
  $stmt=$connection->prepare("SELECT * FROM thu_chi   ");

}
$stmt->execute();
$result=$stmt->get_result();

if ($result->num_rows>0) {
  $luy_ke =0;
  $serial_number=0;
  $output .='
  <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead align="center">
              <tr>
               	<th >STT</th>
              	<th >Ngày Tháng</th>
              	<th >Thu/Chi</th>  
                <th >Loại</th>                                                 
              	<th >Người</th>
              	<th >Nội Dung</th>
              	<th >Thu</th> 
              	<th >Chi</th> 
              	<th >Lũy Kế Thu Chi</th>
              	<th>Ghi Chú</th>
              	<th>EDIT </th>
              	<th>DELETE </th>
             </tr>
             </thead>
             <tbody>';
             while ($row=$result->fetch_assoc()) {
              $tien = $row['LuyKe'];
              $luy_ke = $luy_ke + $tien;
              $serial_number++;
              $thoigian = $row['NgayThang'];
              $date = date("d-m-Y", strtotime($thoigian));
              $khoa =$row['Khoa'];
              
               $output.='
               <tr>
                  <td>'.$serial_number.'</td>
                  <td>'.$date.'</td>               
                  <td>'.$row['ThuChi'].'</td>
                  <td>'.$row['Loai'].'</td>
                  <td>'.$row['Nguoi'].'</td>
                  <td>'.$row['NoiDung'].'</td>
                  <td>'.number_format($row['SoTienThu']).'</td>
                  <td>'.number_format($row['SoTienChi']).'</td>
                  <td>'.number_format($luy_ke).'</td>
                  <td>'.$row['GhiChu'].'</td>
                  
                  <td>
                      <form action="quan_ly_thu_chi_edit_dir.php" method="POST">
                          <input type="hidden" name="edit_id" value="'.$row['id'].'" >
                          <button type="submit" name="edit_btn" class="btn btn-success" style="visibility:'.$khoa.';"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="quan_ly_thu_chi_code_dir.php" method="POST">
                        <input type="hidden" name="delete_id" value="'.$row['id'].'">
                        <button type="submit" name="delete_btn" class="btn btn-danger" style="visibility: '.$khoa.';" > DELETE</button>
                      </form>
                  </td>
              </tr>';              
             }
             
                 
             $output.="</tbody>";

             echo $output;  
} else {
  echo "<h3> No Records Found!</h3>";
}
  

 


?>