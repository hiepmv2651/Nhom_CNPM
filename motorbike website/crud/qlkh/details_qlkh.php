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
<div class="title">Chi tiết khách hàng</div>
<div class="content">
    <form action="">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Ảnh khách hàng</span>
                <img src="../../image/khach_hang/<?php echo $xml_data->KhachHang[$index]->AnhKH ?>">
            </div>
            <div class="input-box">
                <span class="details">Mã khách hàng</span>
                <input type="text" name="MaKH" value="<?php echo $xml_data->KhachHang[$index]->MaKH ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Tên khách hàng</span>
                <input type="text" name="HoTenKH" value="<?php echo $xml_data->KhachHang[$index]->HoTenKH ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Số điện thoại</span>
                <input type="text" name="SDT" value="<?php echo $xml_data->KhachHang[$index]->DiaChi ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Địa chỉ</span>
                <input type="text" name="DiaChi" value="<?php echo $xml_data->KhachHang[$index]->SDT ?>" disabled>
            </div>


        </div>


        <?php
        include '../footer.php';
        ?>