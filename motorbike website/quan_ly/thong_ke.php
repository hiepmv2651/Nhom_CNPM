<?php

$xml_data = simplexml_load_file("../Nhom.xml");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="../css/style_admin.css" />
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="shortcut icon" type="image/png" href="../image/favicon.png" />
    <?php
    include 'export.php';
    ?>
</head>

<body>
    <div class="container">
        <?php
        include 'header.php';
        ?>


        <section class="main">

            <section class="attendance">
                <div class="attendance-list">
                    <h1>Danh sách chi tiết</h1>
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody>
                            <tr>
                                <td>Min số lượng:</td>
                                <td><input type="text" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Max số lượng:</td>
                                <td><input type="text" id="max" name="max"></td>
                            </tr>
                        </tbody>

                    </table>

                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã hóa đơn</th>
                                <th>Mã xe</th>
                                <th>Đơn giá (VNĐ)</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền (VNĐ)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($xml_data->ChiTietHoaDon); $i++) {
                                $j = $i + 1;
                                echo '<tr>
                  <td>' . $j . '</td>
                  <td>' . $xml_data->ChiTietHoaDon[$i]->MaHD . '</td>
                  <td>' . $xml_data->ChiTietHoaDon[$i]->MaXM . '</td>
                  <td>' . $xml_data->ChiTietHoaDon[$i]->DonGia . '</td>
                  <td>' . $xml_data->ChiTietHoaDon[$i]->SoLuong . '</td>
                  <td>' . $xml_data->ChiTietHoaDon[$i]->TongTien . '</td>
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