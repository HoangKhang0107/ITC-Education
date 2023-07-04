<?php

class lms
{

	private function connect()
	{
		$con = mysqli_connect("localhost", "root", "", "adminpanel");
		if (!$con) {
			die("Không kết nối được với CSDL!");
			exit();
		} else {
			mysqli_set_charset($con, "utf8");
			return $con;
		}
	}
	public function laycot($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$kq = '';
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$id = $row[0];
				$kq = $id;
			}
		}
		return $kq;
	}


}
