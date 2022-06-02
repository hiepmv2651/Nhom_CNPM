<?php
include '../header.php';

$id = $_GET['MaXM'];

$index = 0;

for ($i = 0; $i < count($xml_data->XeMay); $i++) {
    if (strcmp($xml_data->XeMay[$i]->MaXM, $id) == 0) {
        $index = $i;
        break;
    }
}

?>
<div class="title">Chi tiết xe máy</div>
<div class="content">
    <form action="">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Ảnh xe máy</span>
                <img src="../../image/xe_may/<?php echo $xml_data->XeMay[$index]->AnhXM ?>">
            </div>
            <div class="input-box">
                <span class="details">Mã xe máy</span>
                <input type="text" name="MaXM" value="<?php echo $xml_data->XeMay[$index]->MaXM ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Tên xe máy</span>
                <input type="text" name="TenXM" value="<?php echo $xml_data->XeMay[$index]->TenXM; ?>" disabled>
            </div>
            <div class=" input-box">
                <span class="details">Mã hãng</span>
                <input type="text" name="MaHang" value="<?php echo $xml_data->XeMay[$index]->MaHang ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Số lượng</span>
                <input type="text" name="SoLuong" value="<?php echo $xml_data->XeMay[$index]->SoLuong ?>" disabled>
            </div>
            <div class="input-box">
                <span class="details">Giá xe</span>
                <input type="text" name="DonGia" value="<?php echo $xml_data->XeMay[$index]->DonGia ?>" disabled>
            </div>


        </div>


        <?php
        include '../footer.php';
        ?>