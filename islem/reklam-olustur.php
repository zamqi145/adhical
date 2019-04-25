<meta charset="utf-8">
<?php 
	include("../connect.php");
	$id = $_SESSION['id'];
	if($id){
		$ad		= stripslashes(strip_tags(htmlspecialchars($_POST['ad'])));
		$boy 	= stripslashes(strip_tags(htmlspecialchars($_POST['boy'])));
		$vtarih = date("Y-m-d");
		$reklam = stripslashes(strip_tags(htmlspecialchars($_POST['reklam'])));
		$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
		while ($oku = mysqli_fetch_array($sor)) {
			if($ad!=""){
				if($reklam!="Hiç siteniz bulunmuyor."){
					if($boy!=""){
						if($boy=='728 x 90'){
							$genislik = 728;
							$yukseklik = 90;
							$ekle = $conn->query("INSERT INTO reklamlar(userid,ad,genislik,yukseklik,durumu,vtarih) values('$id','$ad','$genislik','$yukseklik','1','$vtarih')");
							header('Refresh: 0; url=https://site.com/yayinci/reklamlar');
						}
						else if($boy=='336 x 280'){
							$genislik = 336;
							$yukseklik = 280;
							$ekle = $conn->query("INSERT INTO reklamlar(userid,ad,genislik,yukseklik,durumu,vtarih) values('$id','$ad','$genislik','$yukseklik','1','$vtarih')");
							header('Refresh: 0; url=https://site.com/yayinci/reklamlar');
						}
						else if($boy=='320 x 100'){
							$genislik = 320;
							$yukseklik = 100;
							$ekle = $conn->query("INSERT INTO reklamlar(userid,ad,genislik,yukseklik,durumu,vtarih) values('$id','$ad','$genislik','$yukseklik','1','$vtarih')");
							header('Refresh: 0; url=https://site.com/yayinci/reklamlar');
						}
						else if($boy=='300 x 250'){
							$genislik = 300;
							$yukseklik = 250;
							$ekle = $conn->query("INSERT INTO reklamlar(userid,ad,genislik,yukseklik,durumu,vtarih) values('$id','$ad','$genislik','$yukseklik','1','$vtarih')");
							header('Refresh: 0; url=https://site.com/yayinci/reklamlar');
						}
						else if($boy=='300 x 600'){
							$genislik = 300;
							$yukseklik = 600;
							$ekle = $conn->query("INSERT INTO reklamlar(userid,ad,genislik,yukseklik,durumu,vtarih) values('$id','$ad','$genislik','$yukseklik','1','$vtarih')");
							header('Refresh: 0; url=https://site.com/yayinci/reklamlar');
						}
					}
					else {
					echo "Lütfen reklamınız için boyut seçin.";
					header('Refresh: 0; url=https://site.com/yayinci/reklam-olustur');
					}
				}
				else {
					echo "Hiç site eklememişsiniz.";
					header('Refresh: 0; url=https://site.com/yayinci/reklam-olustur');
				}
			}
			else {
				echo "Lütfen reklamınız için isim girin.";
				header('Refresh: 0; url=https://site.com/yayinci/reklam-olustur');
			}
		}
	}
	else {
		echo "Lütfen giriş yapınız. Bu bölüm üyelerimize özeldir!";
		header('Refresh: 0; url=https://www.site.com/');
	}
?>
