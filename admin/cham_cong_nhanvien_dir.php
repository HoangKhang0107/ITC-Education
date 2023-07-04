<?php
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_director.php';
?>



<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Chấm công</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">


        <div class="table-responsive">

            <div class="card-body">


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT </th>
                            <th>Mã Học Sinh</th>
                            <th>Tên Học Sinh</th>
                            <th>Chấm Công</th>
                            <th>Ghi Chú</th>

                        </tr>
                    </thead>
                    <tbody>
                        <form action="cham_cong_nhanvien_code_dir.php" method="post">
                            <?php
                            if (isset($_POST['view_btn'])) {

                                $ca_hoc = $_POST['id'];
                            ?>
                                <div class="card-header py-3">
                                    <button type="submit" name="submit_diem" class="btn btn-info"> Chấm công </button>
                                    <input type="hidden" name="update_diemhs" value="<?php echo $_POST['id']; ?>">
                                    <a class="btn btn-info" href="cham_cong_nhanvien_dir.php">Back</a>
                                </div>
                                <?php
                                $query = "SELECT * FROM ca_hoc INNER JOIN lop_hoc ON ca_hoc.MaLop = lop_hoc.MaLop INNER JOIN nhan_vien ON lop_hoc.MaGV = nhan_vien.MaNhanVien  WHERE ca_hoc.MaCaHoc = '$ca_hoc'";
                                $query_run = mysqli_query($connection, $query);
                                $serial_number = 0;
                                $counter = 0;

                                while ($row = mysqli_fetch_array($query_run)) {
                                    $serial_number++;
                                ?>
                                    <tr>
                                        <td> <?php echo $serial_number; ?></td>

                                        <input type="hidden" value="<?php echo $row['MaCaHoc']; ?>" name="ma_ca[]">
                                        <td> <?php echo $row['MaNhanVien']; ?>
                                            <input type="hidden" value="<?php echo $row['MaNhanVien']; ?>" name="ma_nhan_vien[]">
                                        </td>

                                        <td> <?php echo $row['TenNhanVien']; ?>
                                            <input type="hidden" value="<?php echo $row['TenNhanVien']; ?>" name="ten_nhan_vien[]">
                                        </td>
                                        <td>
                                            <select name="chamcong[]" class="form-control">
                                                <option value="Có mặt">Có Mặt</option>
                                                <option value="Vắng mặt">Vắng Mặt</option>
                                                <option value="Đi trễ">Đo Trễ</option>
                                        </td>
                                        </td>
                                        <td>
                                            <input type="text" name="ghi_chu[]" class="form-control">
                                        </td>


                                    </tr>
                            <?php
                                    $counter++;
                                }
                            }

                            ?>



                    </tbody>
                </table>

                </form>
            </div>
        </div>
    </div>


    <?php
    include 'includes/scripts.php';
    include 'includes/footer.php';
    ?>