<meta charset="UTF-8">
<?php 
include("../connect.php");
if($_POST){
	$id = $_SESSION['id'];
	if($id){
		$ad = htmlspecialchars($_POST['ad']);
		$durumu = htmlspecialchars($_POST['durumu']);
		if($durumu=='Aktifleştir'){
			$guncelle = $conn->query("UPDATE verilenreklamlar SET durumu='1' WHERE userid=$id && ad='$ad' ");
			echo "<strong style='color:#00d000'>Reklam  aktifleştirildi</strong>";
		}
		else if($durumu=='Pasifleştir'){
			$guncelle = $conn->query("UPDATE verilenreklamlar SET durumu='0' WHERE userid=$id && ad='$ad' ");
			echo "<strong style='color:#00d000'>Reklam pasifleştirildi</strong>";
		}
		else {
			echo "<strong style='color:red'>HATA!</strong>";
		}
	}
	else{
		echo "<strong style='color:red'>Giriş Yapın!</strong>";
	}
		
}
else {
	echo "<strong style='color:red'>Güncellenecek reklam bulunmuyor!</strong>";
}
?>