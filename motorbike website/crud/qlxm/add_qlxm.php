<?php
include '../header.php';
?>
<div class="title">Thêm xe máy</div>
<div class="content">
    <form action="add_qlxm.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Mã xe máy</span>
                <input type="text" name="MaXM" placeholder="Nhập mã xe" required>
            </div>
            <div class="input-box">
                <span class="details">Tên xe máy</span>
                <input type="text" name="TenXM" placeholder="Nhập tên" required>
            </div>
            <div class="input-box">
                <span class="details">Mã hãng</span>
                <select name="MaHang">
                    <?php
                    for ($i = 0; $i < count($xml_data->XeMay); $i++) {
                        echo '<option>' . $xml_data->XeMay[$i]->MaHang . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="input-box">
                <span class="details">Số lượng</span>
                <input type="text" name="SoLuong" placeholder="Nhập số lượng" required>
            </div>
            <div class="input-box">
                <span class="details">Giá xe</span>
                <input type="text" name="DonGia" placeholder="Nhập giá xe" required>
            </div>
            <div class="input-box">
                <span class="details">Ảnh xe máy</span>
                <input type="file" name="AnhXM" required>
            </div>

            <?php
            include "../button.php";
            ?>

        </div>

        <?php
        if (isset($_POST['add'])) {
            $image = $_FILES['AnhXM']['tmp_name'];
            $file_name = $_FILES['AnhXM']['name'];
            $upload = "../../image/xe_may/";
            move_uploaded_file($image, $upload . $file_name);
            $XeMay = $xml_data->addChild('XeMay');
            $XeMay->addChild('TenXM', $_POST['TenXM']);
            $XeMay->addChild('MaXM', $_POST['MaXM']);
            $XeMay->addChild('MaHang', $_POST['MaHang']);
            $XeMay->addChild('SoLuong', $_POST['SoLuong']);
            $XeMay->addChild('DonGia', $_POST['DonGia']);
            $XeMay->addChild('AnhXM', $file_name);
            file_put_contents('../../Nhom.xml', $xml_data->asXML());
        }


        if (isset($_POST['exit']))
            header("Location: ../../quan_ly/qlxm.php");
        ?>

        <?php
        include '../footer.php';
        ?>