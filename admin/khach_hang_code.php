<?php 
include 'security.php';



$connection->query("SET NAMES 'utf8'");

if (isset($_POST['add_kh'])) 
{
  $ten = $_POST['ten'];
  $sdt = $_POST['sdt'];
  $trinhdo = $_POST['trinhdohoc'];
  $khoahoc = $_POST['khoahoc']; 
  $tinhtrang = $_POST['tinhtrang'];
 

      $query = "
      INSERT INTO khach_hang_dang_ky(HoTen,Sdt,TrinhDoHIenTai,KhoaHoc,TinhTrang) 
      VALUES('$ten','$sdt','$trinhdo','$khoahoc','$tinhtrang')"; 
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      { 
       
        $_SESSION['success']="Thêm Thành Công";
        header('Location: khach_hang.php');
      } 
      else {
        
        $_SESSION['status']="Thêm Thất Bại";
        header('Location: khach_hang.php ');
        
      }
  }

if(isset($_POST['update_btn']))
 {
    
    $id =$_POST['edit_id'];
    $hten = $_POST['hten'];
    $sdthoai = $_POST['sdienthoai'];
    $trinhdo = $_POST['tdo']; 
    $khoc = $_POST['khoc'];
    $ttrang = $_POST['ttrang'];

    $query= "
    UPDATE khach_hang_dang_ky 
    SET HoTen ='$hten',
        Sdt ='$sdthoai', 
        TrinhDoHIenTai='$trinhdo', 
        KhoaHoc='$khoc', 
        TinhTrang='$ttrang'        
    WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
            
        $_SESSION['success']="Sửa Thành Công";
        header('Location: khach_hang.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: khach_hang.php');
    }
  
    
 }
  
  
  if(isset($_POST['delete_btn']))
 {
    $id = $_POST['delete_id'];
    
    $query= "DELETE FROM khach_hang_dang_ky WHERE  id ='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
      
      $_SESSION['success']= "Xóa Thành Công";
      header('Location: khach_hang.php');
    } else {
      
      $_SESSION['status']= "Xóa Thất Bại";
      header('Location: khach_hang.php');
    }
 }


$output ='';

if(isset($_POST['query'])){
  $search=$_POST['query'];
  $stmt=$connection->prepare("SELECT * FROM khach_hang_dang_ky WHERE 
HoTen LIKE CONCAT('%',?,'%')") ;
  $stmt->bind_param("ss",$search,$search);


}
else{
  $stmt=$connection->prepare("SELECT * FROM khach_hang_dang_ky ");

}
$stmt->execute();
$result=$stmt->get_result();
$serial_number=0;
if ($result->num_rows>0) {


  $output .='
  <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead align="center">
              <tr>
              <th>STT </th>
           <th>Họ Tên </th>
           <th>Số Điện Thoại </th>
           <th>Trình Độ Hiện Tại </th>          
           <th>Khóa Học </th>
           <th>Tình Trạng Tư Vấn </th>
           <th>EDIT </th>
           <th>DELETE </th>    
             </tr>
             </thead>
             <tbody>';
             while ($row=$result->fetch_assoc()) {
              $serial_number++;              
              $output.='
          <tr>
                  <td>'.$serial_number.'</td>
                  <td>'.$row['HoTen'].'</td>               
                  <td>'.$row['Sdt'].'</td>               
                  <td>'.$row['TrinhDoHIenTai'].'</td>
                  <td>'.$row['KhoaHoc'].'</td>
                  <td>'.$row['TinhTrang'].'</td>                  </td>                                
                  <td>
                      <form action="khach_hang_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="'.$row['id'].'" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="khach_hang_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="'.$row['id'].'">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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