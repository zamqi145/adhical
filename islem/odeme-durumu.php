<meta charset="UTF-8">
<?php 
	include("../connect.php");
	$id = $_SESSION['id'];
	if($id){
		$odemedurumu = stripslashes(strip_tags(htmlspecialchars($_POST['odemedurumu'])));
		if($odemedurumu=='Ödeme Almak İstiyorum'){
			$kayit = $conn->query("UPDATE users SET odemedurumu='1' WHERE id=$id ");
			echo "Güncelleme Başarılı";
			header("refresh: 1; url= ../yayinci/ayarlar.php");
		}
		else if($odemedurumu=='Ödeme Almak İstemiyorum'){
			$kayit = $conn->query("UPDATE users SET odemedurumu='0' WHERE id=$id ");
			echo "Güncelleme Başarılı";
			header("refresh: 1; url= ../yayinci/ayarlar.php");
		}
		else {
			echo "HATA!";
			header("refresh: 1; url= ../yayinci/ayarlar.php");
		}
	}
	else {
		echo "Giriş Yapın!";
		header("refresh: 1; url= ../giris.php");
	}
?>
