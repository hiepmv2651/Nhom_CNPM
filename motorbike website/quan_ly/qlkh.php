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
          <button onclick="window.location.href='../crud/qlkh/add_qlkh.php'" name="add">Thêm</button>
          <table class="table" id="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              for ($i = 0; $i < count($xml_data->KhachHang); $i++) {
                $j = $i + 1; ?>
                <tr>
                  <td><?php echo $j ?></td>
                  <td><?php echo $xml_data->KhachHang[$i]->MaKH ?></td>
                  <td><?php echo $xml_data->KhachHang[$i]->HoTenKH ?></td>
                  <td><?php echo $xml_data->KhachHang[$i]->SDT ?></td>
                  <td><?php echo $xml_data->KhachHang[$i]->DiaChi ?></td>
                  <td>
                    <button onclick="window.location.href='../crud/qlkh/edit_qlkh.php?MaKH=<?php echo $xml_data->KhachHang[$i]->MaKH; ?>'" name="edit">Sửa</button>
                    <button onclick="if (confirm('Bạn chắc chắn muốn xóa?')) window.location.href='../crud/qlkh/delete_qlkh.php?MaKH=<?php echo $xml_data->KhachHang[$i]->MaKH; ?>'">Xóa</button>
                    <button onclick="window.location.href='../crud/qlkh/details_qlkh.php?MaKH=<?php echo $xml_data->KhachHang[$i]->MaKH; ?>'" name="add">Chi tiết</button>
                  </td>
                </tr>
              <?php } ?>


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