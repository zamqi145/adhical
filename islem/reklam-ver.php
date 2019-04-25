<meta charset="utf-8">
<?php 
	include("../connect.php");
	$userid = $_SESSION['id'];
	if($userid){
		$tursay 	= stripslashes(strip_tags(htmlspecialchars($_GET['tur'])));
		$durumu 	= '1';
		$aonay 		= 0;
		$vtarih 	= date('Y-m-d');
		$odeme      =  stripslashes(strip_tags(htmlspecialchars($_POST['odeme'])));
		if($odeme >= 10){
			$sorgu 		= $conn->query("SELECT * FROM users WHERE id='$userid' && hesapturu='1' ");
			while($veresiyeoku = mysqli_fetch_array($sorgu)){
				$veresiyelimiti = $veresiyeoku['veresiyelimiti'];
				$veresiyeharcamasi = $veresiyeoku['veresiyeharcamasi'];
			}
			if($veresiyeharcamasi==0 && $veresiyelimiti>0){
				if($veresiyelimiti<=$odeme){
					$aonay = 1;
				}
			}
			if(is_numeric($tursay)){
				if($tursay == 1){
					$bak = $conn->query("SELECT * FROM verilenreklamlar");
					while ($oku = mysqli_fetch_array($bak)) {
						$id = $oku['id'];
					}
					$sayi = $id+1;
					$link= $sayi.".png";
					$gresim = $_FILES["resim"]["name"];
					$resim = $gresim;
					$tamlink = "https://www.site.com/img/reklamresmi/".$link;
					$gecici_yol=$_FILES["resim"]["tmp_name"];
					$klasor= "../img/reklamresmi";
					$nokta = explode('.', $resim);
			    	$uzanti = $nokta[count($nokta)-1];
			    	$boyut = $_FILES["resim"]["size"];
					if($uzanti == "png" || $uzanti == "jpg" || $uzanti == "jpeg"){
						if($boyut <= 1024*1024){ 
							if(move_uploaded_file($gecici_yol, $klasor."/".$link)){	
								$alt    	=  stripslashes(strip_tags(htmlspecialchars($_POST['title'])));
								$title  	=  stripslashes(strip_tags(htmlspecialchars($_POST['title'])));
								$boy    	=  stripslashes(strip_tags(htmlspecialchars($_POST['boy'])));
								$ad     	=  stripslashes(strip_tags(htmlspecialchars($_POST['ad'])));
								$link  		=  stripslashes(strip_tags(htmlspecialchars($_POST['link'])));
								$kategori 	=  stripslashes(strip_tags(htmlspecialchars($_POST['kategori'])));
								if($boy == '728 x 90'){
									$genislik = '728';
									$yukseklik = '90'; 
									if($kategori=="E-Ticaret"){
										$kategoriid = 3;
									}
									else if($kategori=="Blog"){
										$kategoriid = 4;
									}
									else if($kategori=="Haber"){
										$kategoriid = 8;
									}
									else if($kategori=="Sağlık"){
										$kategoriid = 1;
									}
									else if($kategori=="Eğitim"){
										$kategoriid = 2;
									}
									else if($kategori=="Yazılım"){
										$kategoriid = 5;
									}
									else if($kategori=="Tasarım"){
										$kategoriid = 6;
									}
									else if($kategori=="Hosting"){
										$kategoriid = 7;
									}
									else if($kategori=="İnetrnet"){
										$kategoriid = 9;
									}
									else if($kategori=="Parfüm"){
										$kategoriid = 10;
									}
									else if($kategori=="Youtube Kanalı"){
										$kategoriid = 11;
									}
									else if($kategori=="Reklamcılık"){
										$kategoriid = 12;
									}
									else if($kategori=="Tanıtım"){
										$kategoriid = 13;
									}
									else if($kategori=="Diğer"){
										$kategoriid = 14;
									}
									$kayit = $conn->query("insert into verilenreklamlar(userid,ad,link,odeme,kalanodeme,genislik,yukseklik,alt,title,durumu,resim,kategori,turu,aonay,vtarih) values('$userid','$ad','$link','$odeme','$odeme','$genislik','$yukseklik','$alt','$title','$durumu','$tamlink','$kategoriid','$tursay','$aonay','$vtarih')");
								}
								else if($boy == '336 x 280'){
									$genislik = '336';
									$yukseklik = '280'; 
									$kayit = $conn->query("insert into verilenreklamlar(userid,ad,link,odeme,kalanodeme,genislik,yukseklik,alt,title,durumu,resim,turu,aonay,vtarih) values('$userid','$ad','$link','$odeme','$kalanodeme','$genislik','$yukseklik','$alt','$title','$durumu','$tamlink','$tursay','$vtarih')");
								}
								else if($boy == '320 x 100'){
									$genislik = '320';
									$yukseklik = '100'; 
									$kayit = $conn->query("insert into verilenreklamlar(userid,ad,link,odeme,kalanodeme,genislik,yukseklik,alt,title,durumu,resim,turu,aonay,vtarih) values('$userid','$ad','$link','$odeme','$odeme','$genislik','$yukseklik','$alt','$title','$durumu','$tamlink','$tursay','$aonay','$vtarih')");
								}
								else if($boy == '300 x 600'){
									$genislik = '300';
									$yukseklik = '600'; 
									$kayit = $conn->query("insert into verilenreklamlar(userid,ad,link,odeme,kalanodeme,genislik,yukseklik,alt,title,durumu,resim,turu,vtarih) values('$userid','$ad','$link','$odeme','$odeme','$genislik','$yukseklik','$alt','$title','$durumu','$tamlink','$tursay','$aonay','$vtarih')");
								}
								header('Refresh: 0; url=https://www.site.com/reklamveren/reklamlar');
							}
							else{
								echo "Aktarım hatası";
								header('Refresh: 1; url=https://www.site.com/reklamveren/reklam-ver');
							}
						}
						else {
							echo "HATA!";
							header('Refresh: 1; url=https://www.site.com/reklamveren/reklam-ver');
						}
					}
					else {
						echo "Bu dosya bizim istediğimiz dosya türlerine uymuyor. Lütfen .png ya da .jpg türü gosyalar kullanın.";
						header('Refresh: 1; url=https://www.site.com/reklamveren/reklamlar');
					}
				}
				else if($tursay == 2 || $tursay == 3){
					$ad     	=  stripslashes(strip_tags(htmlspecialchars($_POST['ad'])));
					$baslik		=  stripslashes(strip_tags(htmlspecialchars($_POST['baslik'])));
					$aciklama	=  stripslashes(strip_tags(htmlspecialchars($_POST['aciklama'])));
					$boy    	=  stripslashes(strip_tags(htmlspecialchars($_POST['boy'])));
					$link  		=  stripslashes(strip_tags(htmlspecialchars($_POST['link']))); 
					if($boy == '728 x 90'){
						$genislik = '728';
						$yukseklik = '90'; 
						$kayit = $conn->query("insert into verilenreklamlar(userid,ad,link,odeme,kalanodeme,genislik,yukseklik,baslik,aciklama,durumu,turu,aonay,vtarih) values('$userid','$ad','$link','$odeme','$odeme','$genislik','$yukseklik','$baslik','$aciklama','$durumu','$tursay','$aonay','$vtarih')");
					}
					header('Refresh: 0; url=https://www.site.com/reklamveren/reklamlar');
				}
				else {
					echo "Reklam Türünüz Geçersiz Lütfen Tekrar Deneyin.";
					header('Refresh: 3; url=https://www.site.com/');	
				}
			}
			else {
				echo "Reklam Türünüz Hatalı. Lütfen reklam türüne müdehale etmeyin!";
				header('Refresh: 5; url=https://www.site.com/');
			}
		}
		else {
			echo 'Reklam bütçeniz En Az 10 TL Olmalı!';
			header('Refresh: 3; url=https://www.site.com/reklamveren/reklamlar');
		}
	}
	else {
		echo "Lütfen Giriş Yapın";
		header('Refresh: 3; url=https://www.site.com/');
	}
?>
