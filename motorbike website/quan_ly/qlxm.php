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
          <button onclick="window.location.href='../crud/qlxm/add_qlxm.php'" name="add">Thêm</button>
          <table class="table" id="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Mã xe</th>
                <th>Mã hãng xe</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>


              <?php
              for ($i = 0; $i < count($xml_data->XeMay); $i++) {
                $j = $i + 1; ?>
                <tr>
                  <td><?php echo $j ?></td>
                  <td><?php echo $xml_data->XeMay[$i]->MaXM ?></td>
                  <td><?php echo $xml_data->XeMay[$i]->TenXM ?></td>
                  <td><?php echo $xml_data->XeMay[$i]->MaHang ?></td>
                  <td><?php echo $xml_data->XeMay[$i]->SoLuong ?></td>
                  <td><?php echo $xml_data->XeMay[$i]->DonGia ?></td>

                  <td>
                    <button onclick="window.location.href='../crud/qlxm/edit_qlxm.php?MaXM=<?php echo $xml_data->XeMay[$i]->MaXM; ?>'" name="edit">Sửa</button>
                    <button onclick="if (confirm('Bạn chắc chắn muốn xóa?')) window.location.href='../crud/qlxm/delete_qlxm.php?MaXM=<?php echo $xml_data->XeMay[$i]->MaXM; ?>'">Xóa</button>
                    <button onclick="window.location.href='../crud/qlxm/details_qlxm.php?MaXM=<?php echo $xml_data->XeMay[$i]->MaXM; ?>'" name="add">Chi tiết</button>

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