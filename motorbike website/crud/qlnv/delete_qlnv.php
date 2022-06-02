<?php
	
	$id = $_GET['MaNV'];

	$xml_data = simplexml_load_file('../../Nhom.xml');

	$index = 0;

	for ($i = 0; $i < count($xml_data->NhanVien); $i++) {
		if(strcmp($xml_data->NhanVien[$i]->MaNV, $id) == 0){
			$index = $i;
			break;
		}
	}

	unset($xml_data->NhanVien[$index]);
    file_put_contents('../../Nhom.xml', $xml_data->asXML());

	header('location: ../../quan_ly/qlnv.php');
