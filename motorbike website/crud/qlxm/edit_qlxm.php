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
<div class="title">Thay đổi thông tin xe máy</div>
<div class="content">
    <form action="edit_qlxm.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Mã xe máy</span>
                <input type="text" name="MaXM" value="<?php echo $xml_data->XeMay[$index]->MaXM ?>" readonly>
            </div>
            <div class="input-box">
                <span class="details">Tên xe máy</span>
                <input type="text" name="TenXM" value="<?php echo $xml_data->XeMay[$index]->TenXM; ?>" required>
            </div>
            <div class=" input-box">
                <span class="details">Mã hãng</span>
                <input type="text" name="MaHang" value="<?php echo $xml_data->XeMay[$index]->MaHang ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Số lượng</span>
                <input type="text" name="SoLuong" value="<?php echo $xml_data->XeMay[$index]->SoLuong ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Giá xe</span>
                <input type="text" name="DonGia" value="<?php echo $xml_data->XeMay[$index]->DonGia ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Ảnh xe máy</span>
                <input type="file" name="AnhXM" required>
            </div>

            <div class="button">
                <input type="submit" value="Sửa" name="edit" class="btn">
            </div>

            <div class="button">
                <input type="submit" value="Thoát" name="exit" class="btn" formnovalidate>
            </div>

        </div>

        <?php
        if (isset($_POST['edit'])) {
            for ($i = 0; $i < count($xml_data->XeMay); $i++) {
                if ($xml_data->XeMay[$i]->MaXM == $_POST['MaXM']) {
                    $xml_data->XeMay[$i]->TenXM = $_POST['TenXM'];
                    $xml_data->XeMay[$i]->MaHang = $_POST['MaHang'];
                    $xml_data->XeMay[$i]->SoLuong = $_POST['SoLuong'];
                    $xml_data->XeMay[$i]->DonGia = $_POST['DonGia'];
                    $image = $_FILES['AnhXM']['tmp_name'];
                    $file_name = $_FILES['AnhXM']['name'];
                    $upload = "../../image/xe_may/";
                    move_uploaded_file($image, $upload . $file_name);
                    $xml_data->XeMay[$i]->AnhXM = $file_name;
                    break;
                }
            }

            file_put_contents('../../Nhom.xml', $xml_data->asXML());
            header("Location: ../../quan_ly/qlxm.php");
        }



        if (isset($_POST['exit']))
            header("Location: ../../quan_ly/qlxm.php");
        ?>

        <?php
        include '../footer.php';
        ?>