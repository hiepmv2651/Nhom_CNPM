<?php

	$id = $_GET['MaKH'];

	$xml_data = simplexml_load_file('../../Nhom.xml');

	$index = 0;

	for ($i = 0; $i < count($xml_data->KhachHang); $i++) {
		if(strcmp($xml_data->KhachHang[$i]->MaKH, $id) == 0){
			$index = $i;
			break;
		}
	}

	unset($xml_data->KhachHang[$index]);
    file_put_contents('../../Nhom.xml', $xml_data->asXML());

	header('location: ../../quan_ly/qlkh.php');
