<meta charset="UTF-8">
<?php
	include("../connect.php");
	$userid  =  stripslashes(strip_tags(htmlspecialchars($_SESSION['id'])));
	$talepid =  stripslashes(strip_tags(htmlspecialchars($_GET['talepid'])));
	$cevap   =  stripslashes(strip_tags(htmlspecialchars($_POST['cevap'])));
	$durumu  =  stripslashes(strip_tags(htmlspecialchars($_GET['durumu'])));
	$talepyaz  =  stripslashes(strip_tags(htmlspecialchars($_GET['talepyaz'])));
	$tarih   =  date("Y-m-d");
	$saat    =  date("H:i:s");
	$referer = $_SERVER["HTTP_REFERER"];
	$sql = $conn->query("SELECT * FROM destek WHERE talepid='$talepid' && userid='$userid' ");
	$sqlsayisi = $sql->num_rows;
	if($talepyaz){
		$bak = $conn->query("SELECT * FROM destek WHERE talepid='$talepyaz' && ilkmesaj='1' ");
		while ($oku = mysqli_fetch_array($bak)) {
			$userid = $oku['userid'];
			$baslik = $oku['baslik'];
		}
		$conn->query("INSERT INTO destek(userid,talepid,baslik,mesaj,gonderici,ilkmesaj,durumu,tarih,saat) VALUES('$userid','$talepyaz','$baslik','$cevap','1','0','1','$tarih','$saat') ");
		$conn->query("UPDATE destek SET durumu='1' WHERE talepid='$talepyaz' && userid='$userid' && ilkmesaj='1' ");
		header('Refresh: 0; url='.$referer.'');	
	}
	else {
		if($sqlsayisi){
			if($durumu=='Tamamlanmadı'){
				$ekle = $conn->query("INSERT INTO destek(userid,talepid,mesaj,gonderici,ilkmesaj,durumu,tarih,saat) VALUES('$userid','$talepid','$cevap','0','0','0','$tarih','$saat') ");
				$degistir = $conn->query("UPDATE destek SET durumu='1' WHERE talepid='$talepid' && userid='$userid' && ilkmesaj='1' ");
				if($ekle){
					echo "Cevabınız başarıyla gönderildi..";
					header('Refresh: 2; url='.$referer.'');
				}
				else {
					echo "Cevabınız gönderilirken bir hata oluştu..";
					header('Refresh: 2; url='.$referer.'');	
				}
			}
			else {
				echo "Lütfen size dönüş yapmamızı bekleyin..";
				header('Refresh: 2; url='.$referer.'');	
			}
		}
		else {
			echo "Bu destek talebi sizin gözükmüyor..";
			header('Refresh: 2; url=https://www.site.com/reklamveren/destek');	
		}
	}

?>
