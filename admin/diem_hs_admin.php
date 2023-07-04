<?php
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
?>



<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Nhập điểm</h1>

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
                            <th>Điểm TK1</th>
                            <th>Điểm TK2</th>
                            <th>Điểm TK3</th>
                            <th>Điểm GK</th>
                            <th>Điểm CK</th>
                            <th>Ghi Chú</th>

                        </tr>
                    </thead>
                    <tbody>
                        <form action="diem_code_admin.php" method="post">
                            <?php
                            if (isset($_POST['view_btn'])) {

                                $ca_hoc = $_POST['id'];
                            ?>
                                <div class="card-header py-3">
                                    <button type="submit" name="submit_diem" class="btn btn-info"> Nhập Điểm </button>
                                    <input type="hidden" name="update_diemhs" value="<?php echo $_POST['id']; ?>">
                                    <a class="btn btn-info" href="diem_admin.php">Back</a>
                                </div>
                                <?php
                                $query = "SELECT * FROM ca_hoc INNER JOIN lop_hoc ON ca_hoc.MaLop = lop_hoc.MaLop INNER JOIN hoc_sinh ON lop_hoc.MaLop = hoc_sinh.Lop  WHERE ca_hoc.MaCaHoc = '$ca_hoc'";
                                $query_run = mysqli_query($connection, $query);
                                $serial_number = 0;
                                $counter = 0;

                                while ($row = mysqli_fetch_array($query_run)) {
                                    $serial_number++;
                                ?>
                                    <tr>
                                        <td> <?php echo $serial_number; ?></td>

                                        <input type="hidden" value="<?php echo $row['MaCaHoc']; ?>" name="ma_ca[]">
                                        <td> <?php echo $row['MaHocSinh']; ?>
                                            <input type="hidden" value="<?php echo $row['MaHocSinh']; ?>" name="ma_hoc_sinh[]">
                                        </td>

                                        <td> <?php echo $row['TenHocSinh']; ?>
                                            <input type="hidden" value="<?php echo $row['TenHocSinh']; ?>" name="ten_hoc_sinh[]">
                                        </td>
                                        <td>
                                            <input type="text" name="diemtk1[]" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="diemtk2[]" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="diemtk3[]" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="diemgk[]" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="diemck[]" class="form-control">
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