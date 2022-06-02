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
<div class="title">Chi tiết nhân viên</div>
<div class="content">
    <form action="">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Ảnh nhân viên</span>
                <img src="../../image/nhan_vien/<?php echo $xml_data->NhanVien[$index]->AnhNV ?>">
            </div>
            <div class="input-box">
                <span class="details">Mã nhân viên</span>
                <input type="text" name="MaNV" value="<?php echo $xml_data->NhanVien[$index]->MaNV ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Tên nhân viên</span>
                <input type="text" name="TenNV" value="<?php echo $xml_data->NhanVien[$index]->TenNV; ?>"" disabled>
            </div>
            <div class=" input-box">
                <span class="details">Ngày sinh</span>
                <input type="text" name="NgaySinh" value="<?php echo $xml_data->NhanVien[$index]->NgaySinh ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Số điện thoại</span>
                <input type="text" name="SDT" value="<?php echo $xml_data->NhanVien[$index]->SDT ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Địa chỉ</span>
                <input type="text" name="DiaChi" value="<?php echo $xml_data->NhanVien[$index]->DiaChi ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Lương</span>
                <input type="text" name="Luong" value="<?php echo $xml_data->NhanVien[$index]->Luong ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Tài khoản</span>
                <input type="text" name="TaiKhoanNV" value="<?php echo $xml_data->NhanVien[$index]->TaiKhoanNV ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Mật khẩu</span>
                <input type="password" name="MatKhauNV" value="<?php echo $xml_data->NhanVien[$index]->MatKhauNV ?>" disabled>
            </div>

        </div>

        <?php
        include '../footer.php';
        ?>