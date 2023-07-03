<?php 
//include 'security.php';
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$connect = mysqli_connect("localhost","root","","adminpanel");
mysqli_set_charset($connect, 'UTF8');

if(isset($_POST['xuat_pdf'])){
 
	$ca_hoc = $_POST['ma_ca_hoc'];	
    $query ="SELECT * FROM ca_hoc 
    		INNER JOIN diem_danh ON ca_hoc.MaCaHoc = diem_danh.MaCaHoc 
    		INNER JOIN hoc_sinh ON diem_danh.MaHocSinh = hoc_sinh.MaHocSinh 
    		INNER JOIN nhan_vien ON nhan_vien.MaNhanVien = ca_hoc.MaGV
    		WHERE ca_hoc.MaCaHoc = '$ca_hoc'"; 
       
    $document = new Dompdf();
   
	
	$result1 =mysqli_query($connect,$query);
	$result2 =mysqli_query($connect,$query);
	$result3 =mysqli_query($connect,$query);
	$output ='
		
		<style>
			h1,h3{
				font-family: DejaVu Sans, sans-serif; 
			}

			table{
				font-family: DejaVu Sans, sans-serif; 
				border-collapse: collapse;
				width:100%;
			}
			td,th{

				border: 1px solid #dddddd;
				text-align:left;
				padding:8px;
			}
			tr:nth-child(even){
				background-color:#dddddd;
			}
		</style>
		<h1>NHẬN XÉT BUỔI HỌC</h1>'
		;
		if($row = mysqli_fetch_array($result1)) 
		{ 
			$output.='
			<h3>Lớp:'.$row['MaLop'].'</h3>
			<h3>Giáo Viên:'.$row['TenNhanVien'].'</h3>
			<h3>Ngày:'.$row['Ngay'].'</h3>
			<h3>Giờ:'.$row['Gio'].'</h3>
			';
		}
		$output .='
		<br>
		<table>
        <thead>
          <tr>         
           <th>Nội Dung Bài Học</th> 
           <th>Nhận Xét Chung</th>
                    
          </tr>
        </thead>
        <tbody>	
		';
		if($row = mysqli_fetch_array($result2)) 
		{
			$noi_dung = $row['MoTa'].'<br>'.$row['NoiDung'];
			
			$output.='
				<tr>
				  <td>'.$noi_dung.'</td>
                  <td>'.$row['NhanXetChung'].'</td>                 
				</tr>
			';
		}
		$output .='
		  </tbody>	
		  </table>
		  <br>
		  <table >
		  	 <thead align="center">
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
		';
		 $serial_number=0;
		while ($row = mysqli_fetch_array($result3)) 
		{
			$serial_number++;
			$output.='

				<tr>
					<td>'.$serial_number.'</td>					
                  	<td>'.$row['MaHocSinh'].'</td>
                  	<td>'.$row['TenHocSinh'].'</td>
                  	<td>'.$row['DiemDanh'].'</td> 
                  	<td>'.$row['Diem'].'</td>
                  	<td>'.$row['Ghi_Chu'].'</td> 
                  	<td>'.$row['Link'].'</td>

				</tr>
			';
		}

		$output .='
		</tbody>
		<table >
		';


		$document->loadHtml($output);
		$document->setPaper('A4','landscape');
		$document->render();

		$document->stream("lop_hoc",array("Attachment"=>1));
}

if(isset($_POST['xuat_pdf_hs'])){
 
	
    
	$ma_hs = $_POST['ma_hs'];	
    
    $query1 ="SELECT * FROM hoc_sinh  WHERE MaHocSinh = '$ma_hs'";
    $query2 ="SELECT * FROM ca_hoc INNER JOIN diem_danh ON ca_hoc.MaCaHoc = diem_danh.MaCaHoc INNER JOIN hoc_sinh ON diem_danh.MaHocSinh = hoc_sinh.MaHocSinh WHERE diem_danh.MaHocSinh = '$ma_hs'";    
    $document = new Dompdf();
    
	
	$result1 =mysqli_query($connect,$query1);
	$result2 =mysqli_query($connect,$query2);

	$output ='
		
		<style>
			h1,h3,label{
				font-family: DejaVu Sans, sans-serif; 
			}

			table{
				font-family: DejaVu Sans, sans-serif; 
				border-collapse: collapse;
				width:100%;
			}
			td,th{

				border: 1px solid #dddddd;
				text-align:left;
				padding:8px;
			}
			tr:nth-child(even){
				background-color:#dddddd;
			}
		</style>
		<h1>TÌNH HÌNH HỌC TẬP</h1>'
		;
		if($row = mysqli_fetch_array($result1)) 
		{ 
			$output.='
			<label>Tên Học Sinh:'.$row['TenHocSinh'].'</label> <br>
            <label>Lớp: '.$row['Lop'].'</label> <br>
            <label>Ngày Sinh:'.$row['NgaySinh'].'</label> <br>
         
			';
		}
		$output .='		 
		  <br>
		  <table >
		  	 <thead align="center">
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
		';
		$serial_number=0;
		while ($row = mysqli_fetch_array($result2)) 
		{
			$serial_number++;
			$output.='

				<tr>
					<td>'.$serial_number.'</td>
                  	<td>'.$row['Ngay'].'</td>
                  	<td>'.$row['Gio'].'</td>
                  	<td>'.$row['DiemDanh'].'</td> 
                  	<td>'.$row['Diem'].'</td>
                  	<td>'.$row['Ghi_Chu'].'</td> 
                  	<td>'.$row['Link'].'</td> 

				</tr>
			';
		}

		$output .='
		</tbody>
		<table >
		';


		$document->loadHtml($output);
		$document->setPaper('A4','landscape');
		$document->render();

		$document->stream("tinh_hinh_hoc_tap",array("Attachment"=>1));
}


 ?>



