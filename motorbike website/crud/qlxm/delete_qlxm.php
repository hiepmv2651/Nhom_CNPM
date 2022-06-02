<?php
	
	$id = $_GET['MaXM'];

	$xml_data = simplexml_load_file('../../Nhom.xml');

	$index = 0;

	for ($i = 0; $i < count($xml_data->XeMay); $i++) {
		if(strcmp($xml_data->XeMay[$i]->MaXM, $id) == 0){
			$index = $i;
			break;
		}
	}

	unset($xml_data->XeMay[$index]);
    file_put_contents('../../Nhom.xml', $xml_data->asXML());

	header('location: ../../quan_ly/qlxm.php');
