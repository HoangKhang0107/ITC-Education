<?php 

require_once 'autoload.inc.php';

use Dompdf\Dompdf;


$document = new Dompdf();


$connect = mysqli_connect("localhost","root","","adminpanel");
mysqli_set_charset($connect, 'UTF8');
$query ="SELECT * FROM ca_hoc INNER JOIN diem_danh ON ca_hoc.MaCaHoc = diem_danh.MaCaHoc INNER JOIN hoc_sinh ON diem_danh.MaHocSinh = hoc_sinh.MaHocSinh WHERE ca_hoc.MaCaHoc = ";

$result =mysqli_query($connect,$query);

$output ='

<style>
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
<body>
		
		
  <table >
      <tr>
       <th>id </th> 
       <th>Tên Chức Vụ </th>                  
      </tr>           
';
while ($row = mysqli_fetch_array($result)) 
{
	$output.='
		<tr>
			<td>'.$row["id"].'</td>
			<td>'.$row["TenChucVu"].'</td>

		</tr>
	';
}

$output .='
</table>

';


$document->loadHtml($output);
$document->setPaper('A4','landscape');
$document->render();

$document->stream("test",array("Attachment"=>0));

 ?>