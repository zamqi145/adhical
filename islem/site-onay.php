<meta charset="UTF-8">
<?php 
	include("../connect.php");
	$userid = $_SESSION['id'];
	$onaykodu = stripslashes(strip_tags(htmlspecialchars($_POST['onaykodu'])));
	$url = stripslashes(strip_tags(htmlspecialchars($_POST['link'])));
	$tamlink1 = $url.$onaykodu.".html";
	$durum1 = @get_headers($tamlink1);
	$tamlink2 = $url."/".$onaykodu.".html";
	$durum2 = @get_headers($tamlink2);
	$tamlink3 = "www.".$url.$onaykodu.".html";
	$durum3 = @get_headers($tamlink3);
	$tamlink4 = "www.".$url."/".$onaykodu.".html";
	$durum4 = @get_headers($tamlink4);
	$tamlink5 = "http://".$url.$onaykodu.".html";
	$durum5 = @get_headers($tamlink5);
	$tamlink6 = "http://".$url."/".$onaykodu.".html";
	$durum6 = @get_headers($tamlink6);
	$tamlink7 = "https://".$url.$onaykodu.".html";
	$durum7 = @get_headers($tamlink7);
	$tamlink8 = "https://".$url."/".$onaykodu.".html";
	$durum8 = @get_headers($tamlink8);
	$tamlink9 = "http://www.".$url.$onaykodu.".html";
	$durum9 = @get_headers($tamlink9);
	$tamlink10 = "http://www.".$url."/".$onaykodu.".html";
	$durum10 = @get_headers($tamlink10);
	$tamlink11 = "https://www.".$url.$onaykodu.".html";
	$durum11 = @get_headers($tamlink11);
	$tamlink12 = "https://www.".$url.$onaykodu.".html";
	$durum12 = @get_headers($tamlink12);
	if(($durum1[0] == 'HTTP/1.0 200 OK') || ($durum2[0] == 'HTTP/1.0 200 OK') || ($durum3[0] == 'HTTP/1.0 200 OK') || ($durum4[0] == 'HTTP/1.0 200 OK') || ($durum5[0] == 'HTTP/1.0 200 OK') || ($durum6[0] == 'HTTP/1.0 200 OK') || ($durum7[0] == 'HTTP/1.0 200 OK') || ($durum8[0] == 'HTTP/1.0 200 OK') || ($durum9[0] == 'HTTP/1.0 200 OK') || ($durum10[0] == 'HTTP/1.0 200 OK') || ($durum11[0] == 'HTTP/1.0 200 OK') || ($durum12[0] == 'HTTP/1.0 200 OK') || ($durum1[0] == 'HTTP/1.1 200 OK') || ($durum2[0] == 'HTTP/1.1 200 OK') || ($durum3[0] == 'HTTP/1.1 200 OK') || ($durum4[0] == 'HTTP/1.1 200 OK') || ($durum5[0] == 'HTTP/1.1 200 OK') || ($durum6[0] == 'HTTP/1.1 200 OK') || ($durum7[0] == 'HTTP/1.1 200 OK') || ($durum8[0] == 'HTTP/1.1 200 OK') || ($durum9[0] == 'HTTP/1.1 200 OK') || ($durum10[0] == 'HTTP/1.1 200 OK') || ($durum11[0] == 'HTTP/1.1 200 OK') || ($durum12[0] == 'HTTP/1.1 200 OK') ){
		$onayla = $conn->query("UPDATE siteler SET onayd=1 WHERE userid='$userid' && link='$url' ");
		if($onayla){
			echo "<p style='color: green; font-size: 20px; font-weight: bold;'>Site başarıyla onaylandı.<br /></p>";
		}
		else {
			echo "<p style='color: red; font-size: 20px; font-weight: bold;'>Site onaylama başarısız oldu. Bu hata bizden kaynaklı gibi gözüküyor. Lütfen bizimle iletişime geçin!</p>";
		}
	}
	else {
		$bak 	= 	$conn->query("SELECT * FROM siteler WHERE userid='$userid' && link='$url' ");
		while($oku = mysqli_fetch_array($bak)){
			$gecerlilik = $oku['onayd'];
		}
		if($gecerlilik==1){
			$onayla = $conn->query("UPDATE siteler SET onayd=0 WHERE userid='$userid' && link='$url' ");
			if($onayla){
				echo "<p style='color: red; font-size: 20px; font-weight: bold;'>Site onaylama başarısız! Web site aktifliği iptal edilmiştir!!!</p>";
			}
			else {
				echo "<p style='color: red; font-size: 20px; font-weight: bold;'>Site onaylama başarısız! Web site linkinizi doğru girdiğinizden eminseniz lütfen bizimle iletişime geçin!</p>";
			}
		}
		else {
			echo "<p style='color: red; font-size: 20px; font-weight: bold;'>Site onaylama başarısız oldu!</p>";
		}		
	}
?>
