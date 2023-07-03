<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<?php 

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "adminpanel";

$connection= mysqli_connect($server_name,$db_username,$db_password);
$dbconfig = mysqli_select_db($connection,$db_name);
mysqli_set_charset($connection, 'UTF8');

if ($dbconfig) {
	# code...
	//echo "Database Connected";

} 
else 
{
	# code...

	echo '
			<div class="container">
				
	          <!-- 404 Error Text -->
	          <div class="text-center">
	            <div class="card-title bg-danger text-white" data-text="404">Database Connection Failed</div>
	            <p class="lead text-gray-800 mb-5">Please Check Your Database Connection</p>
	            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
	            <a href="#">:(</a>
	          </div>

	        </div>
	        <!-- /.container-fluid -->

	      </div>

	';
}


 ?>

