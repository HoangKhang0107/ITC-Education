<?php 
include 'security.php';

$connection->query("SET NAMES 'utf8'");

if (isset($_POST['add_tt'])) 
{
  $tua_de = $_POST['tua_de'];
  $image = $_FILES['image']['name'];
  $tintuc = $_POST['tin_tuc'];
  $video = $_POST['video']; 
  $manhanvien = $_POST['ma_nhan_vien'];     

      $query = "
      INSERT INTO tin_tuc(TuaDe,TinTuc,img,video,MaNhanVien) 
      VALUES('$tua_de','$tintuc','$image','$video','$ma_nhan_vien')"; 
      $query_run = mysqli_query($connection,$query);

      if ($query_run) 
      { 
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Thêm Thành Công";
        header('Location: pq/sa/tin_tuc.php');
      } 
      else {
        
        $_SESSION['status']="Thêm Thất Bại";
        header('Location: pq/sa/tin_tuc.php ');
        
      }
  
}  



if(isset($_POST['update_btn']))
 {
 		
	 	$id =$_POST['edit_id'];
    $td = $_POST['tuad'];
	 	$tt= $_POST['tint'];	
		$ima = $_FILES['image']['name'];
    $vid = $_POST['vid']; 
    $mnv = $_POST['manv']; 
 		$query= "
    UPDATE tin_tuc
    SET TuaDe ='$tuad',
        TinTuc ='$tt',         
        img='$ima', 
        video='$vid' 
        MaNhanVien='$mnv',         
    WHERE id ='$id'";
 		$query_run = mysqli_query($connection,$query);

    if ($query_run) {
    
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_nhan_vien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Sửa Thành Công";
        header('Location: pq/sa/tin_tuc.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: pq/sa/tin_tuc.php');
    }
 	
 		
 }
 	
  
  if(isset($_POST['delete_btn']))
 {
 		$id = $_POST['delete_id'];
 		
 		$query= "DELETE FROM tin_tuc WHERE  id ='$id'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			
 			$_SESSION['success']= "Xóa Thành Công";
 			header('Location: pq/sa/tin_tuc.php');
 		} else {
 			
 			$_SESSION['status']= "Xóa Thất Bại";
 			header('Location: pq/sa/tin_tuc.php');
 		}
 }


$output ='';

if(isset($_POST['query'])){
  $search=$_POST['query'];
  $stmt=$connection->prepare("SELECT * FROM tin_tuc WHERE 
TuaDe LIKE CONCAT('%',?,'%')") ;
  $stmt->bind_param("ss",$search,$search);


}
else{
  $stmt=$connection->prepare("SELECT * FROM tin_tuc ");

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
           <th>Tựa Đề </th>
           <th>Tin Tức</th>
           <th>Hình Ảnh</th>          
           <th>Video </th>
           <th>Mã Nhân Viên </th> 
               <th>EDIT </th>
               <th>DELETE </th> 
             </tr>
             </thead>
             <tbody>';
              while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;                      
              $output.='
          <tr>
                  <td>'.$serial_number.'</td>
                  <td>'.$row['TuaDe'].'</td>
                  <td>'.$row['TinTuc'].'</td>
                  <td><img src="anh_nhan_vien/'.$row['img'].'" width="100px;" height="100px" alt="Image"></td>
  
                  <td>'.$row['video'].'</td>                 
                  <td>'.$row['MaNhanVien'].'</td>
                                          
                  <td>
                      <form action="pq/sa/tin_tuc_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="'.$row['id'].'" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="pq/sa/tin_tuc_code.php" method="POST">
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