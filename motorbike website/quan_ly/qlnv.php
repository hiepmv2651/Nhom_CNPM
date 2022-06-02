<?php

$xml_data = simplexml_load_file("../Nhom.xml");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin</title>
  <link rel="stylesheet" href="../css/style_admin.css" />
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="shortcut icon" type="image/png" href="../image/favicon.png" />
</head>

<body>
  <div class="container">
    <?php
    include 'header.php';
    ?>


    <section class="main">

      <section class="attendance">
        <div class="attendance-list">
          <h1>Danh sách chi tiết</h1>
          <button onclick="window.location.href='../crud/qlnv/add_qlnv.php'" name="add">Thêm</button>
          <table class="table" id="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Mã nhân viên</th>
                <th>Ngày sinh</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Lương</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              for ($i = 0; $i < count($xml_data->NhanVien); $i++) {
                $j = $i + 1; ?>
                <tr>
                  <td><?php echo $j ?></td>
                  <td><?php echo $xml_data->NhanVien[$i]->MaNV ?></td>
                  <td><?php echo $xml_data->NhanVien[$i]->TenNV ?></td>
                  <td><?php echo $xml_data->NhanVien[$i]->NgaySinh ?></td>
                  <td><?php echo $xml_data->NhanVien[$i]->SDT ?></td>
                  <td><?php echo $xml_data->NhanVien[$i]->DiaChi ?></td>
                  <td><?php echo $xml_data->NhanVien[$i]->Luong ?></td>

                  <td>
                    <button onclick="window.location.href='../crud/qlnv/edit_qlnv.php?MaNV=<?php echo $xml_data->NhanVien[$i]->MaNV; ?>'" name="edit">Sửa</button>
                    <button onclick="if (confirm('Bạn chắc chắn muốn xóa?')) window.location.href='../crud/qlnv/delete_qlnv.php?MaNV=<?php echo $xml_data->NhanVien[$i]->MaNV; ?>'">Xóa</button>
                    <button onclick="window.location.href='../crud/qlnv/details_qlnv.php?MaNV=<?php echo $xml_data->NhanVien[$i]->MaNV; ?>'" name="add">Chi tiết</button>

                  </td>
                </tr>
              <?php  } ?>


            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

  <?php
  include 'footer.php';
  ?>

</body>

</html>