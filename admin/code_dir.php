<?php 
include 'security.php';

if (isset($_POST['registerbtn'])) 
{
	$email = $_POST['email'];
 	# code...
 	$username = $_POST['username']; 	
 	$password = md5 ($_POST['password']);
 	$cpassword = $_POST['confirmpassword'];
 	$usertype = $_POST['usertype'];
    $ma = $_POST['ma'];

 	if ($password===$cpassword) {
 		# code...
 		$query = "INSERT INTO register(email,username,password,usertype,Ma) VALUES('$email','$username','$password','$usertype','$ma')";
	 	$query_run = mysqli_query($connection,$query);
	 	if ($query_run) {
	 		# code...
	 		//echo "Saved";
	 		$_SESSION['success']="Thêm tài khoản thành công";
	 		header('Location: register_dir.php');
	 	} else {
	 		# code...
	 		$_SESSION['status']="Thêm tài khoản thất bại";
	 		header('Location: register_dir.php');
	 		//echo "Not Saved";
	 	}
 	} else {
 		# code...
 		$_SESSION['status']="Password and Comfirm Password Does Not Macth";
	 	header('Location: register_dir.php');
 	}
 }	


if(isset($_POST['updatebtn']))
 {
 		
 		$username =$_POST['edit_username'];
 		$email =$_POST['edit_email'];
 		$password =$_POST['edit_password'];
 		$usertype_update = $_POST['update_usertype'];
        $ma = $_POST['edit_ma'];

 		$query= "UPDATE register SET username='$username', password ='$password', usertype ='$usertype_update',Ma ='$ma' WHERE Ma ='$ma' LIMIT 1";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			# code...
 			$_SESSION['success']= "Cập nhật tài khoản thành công";
 			header('Location: register_dir.php');
 		} else {
 			# code...
 			$_SESSION['status']= "Cập nhật tài khoản thất bại";
 			header('Location: register_dir.php');
 		}
 		
 }
 	
  
  if(isset($_POST['delete_btn']))
 {
 		$email = $_POST['delete_email'];
 		
 		$query= "DELETE FROM register WHERE  email ='$email'";
 		$query_run = mysqli_query($connection,$query);

 		if ($query_run) {
 			# code...
 			$_SESSION['success']= "Tài khoản đã xóa";
 			header('Location: register_dir.php');
 		} else {
 			# code...
 			$_SESSION['status']= "Xóa tài hoản thất bại";
 			header('Location: register_dir.php');
 		}
 }







 

if(!isset($_SESSION['user']))
{
    $_SESSION['user'] = session_id();
}
$uid = $_SESSION['user'];  // set your user id settings
$datetime_string = date('c',time());    
    
if(isset($_POST['action']) or isset($_GET['view']))
{
    if(isset($_GET['view']))
    {
        header('Content-Type: application/json');
        $start = mysqli_real_escape_string($connection,$_GET["start"]);
        $end = mysqli_real_escape_string($connection,$_GET["end"]);
        
        $result = mysqli_query($connection,"SELECT `id`, `start` ,`end` ,`title` FROM  `events` where (date(start) >= '$start' AND date(start) <= '$end') and uid='".$uid."'");
        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row; 
        }
        echo json_encode($events); 
        exit;
    }
    elseif($_POST['action'] == "add")
    {   
        mysqli_query($connection,"INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                    `uid` 
                    )
                    VALUES (
                    '".mysqli_real_escape_string($connection,$_POST["title"])."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."',
                    '".mysqli_real_escape_string($connection,$uid)."'
                    )");
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($connection).'"}';
        exit;
    }
    elseif($_POST['action'] == "update")
    {
        mysqli_query($connection,"UPDATE `events` set 
            `start` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
            `end` = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 
            where uid = '".mysqli_real_escape_string($connection,$uid)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        exit;
    }
    elseif($_POST['action'] == "delete") 
    {
        mysqli_query($connection,"DELETE from `events` where uid = '".mysqli_real_escape_string($connection,$uid)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        if (mysqli_affected_rows($connection) > 0) {
            echo "1";
        }
        exit;
    }
}

?>
