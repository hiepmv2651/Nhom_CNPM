<?php
include '../header.php';
$id = $_GET['MaKH'];

$index = 0;

for ($i = 0; $i < count($xml_data->KhachHang); $i++) {
  if (strcmp($xml_data->KhachHang[$i]->MaKH, $id) == 0) {
    $index = $i;
    break;
  }
}

?>
<div class="title">Thay đổi thông tin khách hàng</div>
<div class="content">
  <form action="edit_qlkh.php" method="POST" enctype="multipart/form-data">
    <div class="user-details">
      <div class="input-box">
        <span class="details">Mã khách hàng</span>
        <input type="text" name="MaKH" value="<?php echo $xml_data->KhachHang[$index]->MaKH ?>" readonly>
      </div>
      <div class="input-box">
        <span class="details">Tên khách hàng</span>
        <input type="text" name="HoTenKH" value="<?php echo $xml_data->KhachHang[$index]->HoTenKH ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Số điện thoại</span>
        <input type="text" name="SDT" value="<?php echo $xml_data->KhachHang[$index]->SDT ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Địa chỉ</span>
        <input type="text" name="DiaChi" value="<?php echo $xml_data->KhachHang[$index]->DiaChi ?>" required>
      </div>
      <div class="input-box">
        <span class="details">Ảnh khách hàng</span>
        <input type="file" name="AnhKH" value="../../image/khach_hang/<?php echo $xml_data->KhachHang[$index]->AnhKH ?>" required>
      </div>
      <div class="button">
        <input type="submit" value="Sửa" name="edit" class="btn">
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="submit" value="Thoát" name="exit" class="btn" formnovalidate>
      </div>

    </div>



    <?php
    if (isset($_POST['edit'])) {
      for ($i = 0; $i < count($xml_data->KhachHang); $i++) {
        if ($xml_data->KhachHang[$i]->MaKH == $_POST['MaKH']) {
          $xml_data->KhachHang[$i]->HoTenKH = $_POST['HoTenKH'];
          $xml_data->KhachHang[$i]->SDT = $_POST['SDT'];
          $xml_data->KhachHang[$i]->DiaChi = $_POST['DiaChi'];
          $image = $_FILES['AnhKH']['tmp_name'];
          $file_name = $_FILES['AnhKH']['name'];
          $upload = "../../image/khach_hang/";
          move_uploaded_file($image, $upload . $file_name);
          $xml_data->KhachHang[$i]->AnhKH = $file_name;
          break;
        }
      }

      file_put_contents('../../Nhom.xml', $xml_data->asXML());
      header("Location: ../../quan_ly/qlkh.php");
    }

    if (isset($_POST['exit']))
      header("Location: ../../quan_ly/qlkh.php");
    ?>


    <?php
    include '../footer.php';
    ?>