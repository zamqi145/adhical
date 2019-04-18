<?php
	header('Access-Control-Allow-Origin: *'); 
	include("connect.php");	
	$sor = $conn->query("SELECT * FROM verilenreklamlar WHERE genislik = '728' && yukseklik = '90' && kalanodeme>'0.60' && durumu = '1' && aonay='1' ORDER BY RAND() LIMIT 1 ");
	while ($oku = mysqli_fetch_array($sor)) {
		$data = new stdClass;
		$id = $oku['id'];
		$yukseklik = $oku['yukseklik'];	
		$genislik = $oku['genislik'];
		$turu = $oku['turu'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$gorme= $oku['gorme'];
		$gor = $gorme + 1;
		$kalanodeme = $oku['kalanodeme'];
		$kalan = $kalanodeme;		
		$link = htmlspecialchars($oku['link']);
		if($turu == 1){
			$resim 		= htmlspecialchars($oku['resim']);
			$title 		= htmlspecialchars($oku['title']);
			$alt		= htmlspecialchars($oku['alt']);
			$data->title= $title;
			$data->alt 	= $alt;
			$data->src 	= $resim;
		}
		else if($turu == 2 || $turu == 3){
			$baslik 		= htmlspecialchars($oku['baslik']);
			$aciklama 		= htmlspecialchars($oku['aciklama']);
			$data->baslik 	= $baslik;
			$data->aciklama = $aciklama;
		}
		$say = $conn->query("SELECT * FROM goripler WHERE ip='$ip' ");
		$rows = $say->num_rows;
		$tarih = date("Y-m-d");
		$saat = date("H:i:s");
		if($rows>0 ){
			$sayi = $conn->query("SELECT * FROM ggorme WHERE ip='$ip' ");
			$row = $sayi->num_rows;
			if($row==0){
				$addip = $conn->query("INSERT INTO ggorme(ip,tarih) VALUES('$ip','$tarih')");
			}
		}
		else {
			$ipekle = $conn->query("INSERT INTO goripler(ip,tarih,saat) VALUES('$ip','$tarih','$saat')");
			$guncelle = $conn->query("UPDATE verilenreklamlar SET gorme=$gor WHERE id=$id");
			$guncel = $conn->query("UPDATE verilenreklamlar SET kalanodeme=$kalan WHERE id=$id ");
		}
		$data->id = $id;
		$data->yukseklik = $yukseklik;
		$data->genislik = $genislik;
		$data->turu = $turu;
		$data->link = $link;
		$data->saat = $saat;
		echo json_encode($data);
	}	
?>