<?php
session_start();
$_SESSION["user"] = '';

$xml_data = simplexml_load_file("../Nhom.xml");

$cong_viec = [
  "Thiết kế ứng dụng web", "Mô tả đề tài, các yêu cầu chi tiết", "Kết quả file XSD",
  "File XML", "Thiết kế ứng dụng với XSLT"
];

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
      <div class="main-top">
        <h1>Các thành viên tham gia</h1>
      </div>
      <div class="users">
        <?php

        for ($i = 0; $i < 5; $i++) {
          echo '<div class="card">
            <img src="../image/nhan_vien/' . $xml_data->NhanVien[$i]->AnhNV . '">
            <h4>' . $xml_data->NhanVien[$i]->TenNV . '</h4>
          </div>';
        }
        ?>

      </div>

      <section class="attendance">
        <div class="attendance-list">
          <h1>Danh sách chi tiết</h1>
          <table class="table" id="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Mã Nhân Viên</th>
                <th>Phân công</th>
              </tr>
            </thead>
            <tbody>
              <?php
              for ($i = 0; $i < 5; $i++) {
                $j = $i + 1;
                echo '<tr>
                  <td>' . $j . '</td>
                  <td>' . $xml_data->NhanVien[$i]->TenNV . '</td>
                  <td>' . $xml_data->NhanVien[$i]->MaNV . '</td>
                  <td>' . $cong_viec[$i] . '</td>
                </tr>';
              }
              ?>

            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>

</html>