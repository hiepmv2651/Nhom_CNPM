<?php
include '../header.php';
?>
<div class="title">Thêm khách hàng</div>
<div class="content">
  <form action="add_qlkh.php" method="POST" enctype="multipart/form-data">
    <div class="user-details">
      <div class="input-box">
        <span class="details">Mã khách hàng</span>
        <input type="text" name="MaKH" placeholder="Nhập mã" required>
      </div>
      <div class="input-box">
        <span class="details">Tên khách hàng</span>
        <input type="text" name="HoTenKH" placeholder="Nhập tên" required>
      </div>
      <div class="input-box">
        <span class="details">Số điện thoại</span>
        <input type="text" name="SDT" placeholder="Nhập số điện thoại" required>
      </div>
      <div class="input-box">
        <span class="details">Địa chỉ</span>
        <input type="text" name="DiaChi" placeholder="Nhập địa chỉ" required>
      </div>
      <div class="input-box">
        <span class="details">Ảnh khách hàng</span>
        <input type="file" name="AnhKH" required>
      </div>

      <?php
      include "../button.php";
      ?>

    </div>

    <?php
    if (isset($_POST['add'])) {
      $image = $_FILES['AnhKH']['tmp_name'];
      $file_name = $_FILES['AnhKH']['name'];
      $upload = "../../image/khach_hang/";
      move_uploaded_file($image, $upload . $file_name);
      $KhachHang = $xml_data->addChild('KhachHang');
      $KhachHang->addChild('MaKH', $_POST['MaKH']);
      $KhachHang->addChild('HoTenKH', $_POST['HoTenKH']);
      $KhachHang->addChild('DiaChi', $_POST['DiaChi']);
      $KhachHang->addChild('SDT', $_POST['SDT']);
      $KhachHang->addChild('AnhKH', $file_name);
      file_put_contents('../../Nhom.xml', $xml_data->asXML());
    }

    if (isset($_POST['exit']))
      header("Location: ../../quan_ly/qlkh.php");
    ?>


    <?php
    include '../footer.php';
    ?>