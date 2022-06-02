<?php
include '../header.php';
$id = $_GET['MaNV'];

$index = 0;

for ($i = 0; $i < count($xml_data->NhanVien); $i++) {
  if (strcmp($xml_data->NhanVien[$i]->MaNV, $id) == 0) {
    $index = $i;
    break;
  }
}
?>
<div class="title">Thay đổi thông tin nhân viên</div>
<div class="content">
  <form action="edit_qlnv.php" method="POST" enctype="multipart/form-data">
    <div class="user-details">
      <div class="input-box">
        <span class="details">Mã nhân viên</span>
        <input type="text" name="MaNV" value="<?php echo $xml_data->NhanVien[$index]->MaNV ?>" readonly>
      </div>
      <div class="input-box">
        <span class="details">Tên nhân viên</span>
        <input type="text" name="TenNV" value="<?php echo $xml_data->NhanVien[$index]->TenNV ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Ngày sinh</span>
        <input type="datetime-local" value="<?php echo $xml_data->NhanVien[$index]->NgaySinh ?>" name="NgaySinh" required>
      </div>
      <div class="input-box">
        <span class="details">Số điện thoại</span>
        <input type="text" name="SDT" value="<?php echo $xml_data->NhanVien[$index]->SDT ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Địa chỉ</span>
        <input type="text" name="DiaChi" value="<?php echo $xml_data->NhanVien[$index]->DiaChi ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Lương</span>
        <input type="text" name="Luong" value="<?php echo $xml_data->NhanVien[$index]->Luong ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Tài khoản</span>
        <input type="text" name="TaiKhoanNV" value="<?php echo $xml_data->NhanVien[$index]->TaiKhoanNV ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Mật khẩu</span>
        <input type="password" name="MatKhauNV" value="<?php echo $xml_data->NhanVien[$index]->MatKhauNV ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Ảnh nhân viên</span>
        <input type="file" name="AnhNV" required>
      </div>

      <div class="button">
        <input type="submit" value="Sửa" name="edit" class="btn">
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="submit" value="Thoát" name="exit" class="btn" formnovalidate>
      </div>
    </div>

    <?php
    if (isset($_POST['edit'])) {
      for ($i = 0; $i < count($xml_data->NhanVien); $i++) {
        if ($xml_data->NhanVien[$i]->MaNV == $_POST['MaNV']) {
          $xml_data->NhanVien[$i]->TenNV = $_POST['TenNV'];
          $xml_data->NhanVien[$i]->NgaySinh = $_POST['NgaySinh'];
          $xml_data->NhanVien[$i]->Luong = $_POST['Luong'];
          $xml_data->NhanVien[$i]->TaiKhoanNV = $_POST['TaiKhoanNV'];
          $xml_data->NhanVien[$i]->MatKhauNV = $_POST['MatKhauNV'];
          $xml_data->NhanVien[$i]->SDT = $_POST['SDT'];
          $xml_data->NhanVien[$i]->DiaChi = $_POST['DiaChi'];
          $image = $_FILES['AnhNV']['tmp_name'];
          $file_name = $_FILES['AnhNV']['name'];
          $upload = "../../image/nhan_vien/";
          move_uploaded_file($image, $upload . $file_name);
          $xml_data->NhanVien[$i]->AnhNV = $file_name;
          break;
        }
      }

      file_put_contents('../../Nhom.xml', $xml_data->asXML());
      header("Location: ../../quan_ly/qlnv.php");
    }


    if (isset($_POST['exit']))
      header("Location: ../../quan_ly/qlnv.php");
    ?>

    <?php
    include '../footer.php';
    ?>