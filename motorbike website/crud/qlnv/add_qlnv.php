<?php
include '../header.php';
?>
<div class="title">Thêm nhân viên</div>
<div class="content">
  <form action="add_qlnv.php" method="POST" enctype="multipart/form-data">
    <div class="user-details">
      <div class="input-box">
        <span class="details">Mã nhân viên</span>
        <input type="text" name="MaNV" placeholder="Nhập mã" required>
      </div>
      <div class="input-box">
        <span class="details">Tên nhân viên</span>
        <input type="text" name="TenNV" placeholder="Nhập tên" required>
      </div>
      <div class="input-box">
        <span class="details">Ngày sinh</span>
        <input type="datetime-local" name="NgaySinh" placeholder="" required>
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
        <span class="details">Lương</span>
        <input type="text" name="Luong" placeholder="Nhập lương" required>
      </div>
      <div class="input-box">
        <span class="details">Tài khoản</span>
        <input type="text" name="TaiKhoanNV" placeholder="Username" required>
      </div>
      <div class="input-box">
        <span class="details">Mật khẩu</span>
        <input type="password" name="MatKhauNV" placeholder="Password" required>
      </div>
      <div class="input-box">
        <span class="details">Ảnh nhân viên</span>
        <input type="file" name="AnhNV" required>
      </div>

      <?php
      include "../button.php";
      ?>

    </div>

    <?php
    if (isset($_POST['add'])) {
      $image = $_FILES['AnhNV']['tmp_name'];
      $file_name = $_FILES['AnhNV']['name'];
      $upload = "../../image/nhan_vien/";
      move_uploaded_file($image, $upload . $file_name);
      $NhanVien = $xml_data->addChild('NhanVien');
      $NhanVien->addChild('MaNV', $_POST['MaNV']);
      $NhanVien->addChild('TenNV', $_POST['TenNV']);
      $NhanVien->addChild('NgaySinh', $_POST['NgaySinh']);
      $NhanVien->addChild('SDT', $_POST['SDT']);
      $NhanVien->addChild('DiaChi', $_POST['DiaChi']);
      $NhanVien->addChild('Luong', $_POST['Luong']);
      $NhanVien->addChild('TaiKhoanNV', $_POST['TaiKhoanNV']);
      $NhanVien->addChild('MatKhauNV', md5($_POST['MatKhauNV']));
      $NhanVien->addChild('AnhNV', $file_name);
      file_put_contents('../../Nhom.xml', $xml_data->asXML());
    }


    if (isset($_POST['exit']))
      header("Location: ../../quan_ly/qlnv.php");
    ?>

    <?php
    include '../footer.php';
    ?>