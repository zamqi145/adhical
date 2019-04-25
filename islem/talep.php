<meta charset="UTF-8">
<?php 
	include("../connect.php");
	$userid = stripslashes(strip_tags(htmlspecialchars($_SESSION['id'])));
	$baslik = stripslashes(strip_tags(htmlspecialchars($_POST['baslik'])));
	$mesaj = stripslashes(strip_tags(htmlspecialchars($_POST['mesaj'])));
	$tarih = date("Y-m-d");
	$saat = date("H:i:s");
	$sayici = $conn->query("SELECT userid FROM destek WHERE userid='$userid' ");
	$talepsayisi = $sayici->num_rows;
	$talepid = $userid.$talepsayisi;
	$sql = $conn->query("INSERT INTO destek(userid,talepid,baslik,mesaj,gonderici,ilkmesaj,tarih,saat) VALUES('$userid','$talepid','$baslik','$mesaj','0','1','$tarih','$saat') ");
	if($sql){
		echo "Talebiniz başarıyla oluşturuldu.";
		header("refresh:2; url=../reklamveren/destek");
	}
	else {
		echo "Talep oluşturma başarısız. Bize iletişim sayfamızdan ya da forumumuzdan ulaşabilirsiniz ya da tekrar deneyebilirsiniz.";
		header("refresh:3; url=../reklamveren/talep");
	}
?>
