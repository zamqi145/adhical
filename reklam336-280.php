<?php
	header('Access-Control-Allow-Origin: *'); 
	include("connect.php");	
	$sor = $conn->query("SELECT * FROM verilenreklamlar WHERE genislik = '336' && yukseklik = '280' && kalanodeme>'0.60' && durumu = '1' && aonay='1' ORDER BY RAND() LIMIT 1 ");
	while ($oku = mysqli_fetch_array($sor)) {
		$id = $oku['id'];
		$yukseklik = $oku['yukseklik'];	
		$genislik = $oku['genislik'];
		$resim = htmlspecialchars($oku['resim']);
		$link = htmlspecialchars($oku['link']);
		$ip = $_SERVER['REMOTE_ADDR'];
		$gorme= $oku['gorme'];
		$gor = $gorme + 1;
		$kalanodeme = $oku['kalanodeme'];
		$kalan = $kalanodeme;		
		$title = htmlspecialchars($oku['title']);
		$alt = htmlspecialchars($oku['alt']);
		$say = $conn->query("SELECT * FROM goripler WHERE ip='$ip' ");
		$rows = $say->num_rows;
		$saat = date("H:i:s");
		if($rows>0 ){
			$sayi = $conn->query("SELECT * FROM ggorme WHERE ip='$ip' ");
			$row = $sayi->num_rows;
			if($row==0){
				$addip = $conn->query("INSERT INTO ggorme(ip) VALUES('$ip')");
			}
		}
		else {
			$tarih = date("Y-m-d");
			$ipekle = $conn->query("INSERT INTO goripler(ip,tarih,saat) VALUES('$ip','$tarih','$saat')");
			$guncelle = $conn->query("UPDATE verilenreklamlar SET gorme=$gor WHERE id=$id");
			$guncel = $conn->query("UPDATE verilenreklamlar SET kalanodeme=$kalan WHERE id=$id ");
		}
		$data = new stdClass;
		$data->yukseklik = $yukseklik;
		$data->genislik = $genislik;
		$data->id = $id;
		$data->title = $title;
		$data->alt = $alt;
		$data->src = $resim;
		$data->link = $link;
		$data->saat = $saat;
		echo json_encode($data);
	}	
?>