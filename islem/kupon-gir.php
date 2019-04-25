<meta charset="UTF-8">
<?php 
	include("../connect.php");
	$id = $_SESSION['id'];
	if($id){
		$kupon_kod	= stripslashes(strip_tags(htmlspecialchars($_POST['kupon_kod'])));
		$reklam_adi	= stripslashes(strip_tags(htmlspecialchars($_POST['reklam'])));
		if($reklam_adi!='Hiç reklam oluşturmamışsınız.'){
			$soru = $conn->query("SELECT * FROM users WHERE id='$id' ");
			$sayicii = $soru->num_rows;
			if($sayicii>0){
				while($ok = mysqli_fetch_array($soru)){
					$kalanharcama = $ok['kalanharcama'];
				}
			}
			$sorgu = $conn->query("SELECT * FROM kupon WHERE kupon_kod = '$kupon_kod' AND aktiflik_durumu='0' ");
			$sayi = $sorgu->num_rows;
			if($sayi>0){
				while ($sayici = mysqli_fetch_array($sorgu)){
					$sart = $sayici['harcama'];
					$aktiflikdurumu = $sayici['aktiflik_durumu'];
					$sor = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
					$say = $sor->num_rows;
					while ($oku = mysqli_fetch_array($sor)) {
						if($oku['ad']==$reklam_adi){
							if($kalanharcama>=$sart && $aktiflikdurumu == '0'){
								$new = $oku['kalanodeme'] + $sayici['kupon_miktari'];
								$new2 = $oku['odeme'] + $sayici['kupon_miktari'];
								$harcamaa = $kalanharcama - $sayici['kupon_miktari'];
								$conn->query("UPDATE verilenreklamlar SET kalanodeme=$new WHERE ad='$reklam_adi' && userid='$id' ");
								$conn->query("UPDATE verilenreklamlar SET odeme=$new2 WHERE ad='$reklam_adi' && userid='$id' ");
								$conn->query("UPDATE verilenreklamlar SET indirim='1' WHERE ad='$reklam_adi' && userid='$id' ");
								$conn->query("UPDATE users SET kalanharcama=$harcamaa WHERE id='$id' ");
								$conn->query("UPDATE kupon SET aktiflik_durumu = '1' WHERE kupon_kod='$kupon_kod' ");
								$conn->query("UPDATE kupon SET userid = '$id' WHERE kupon_kod='$kupon_kod' ");
								echo "Kupon kodu ekleme başarılı";	
							}					
							else {
								echo "İstenen harcama miktarını karşılamıyorsunuz ya da kupon artık aktif değil.";
							}				
						}
					}
				}
			}
			else {
				echo "Kupon Kodu Geçersiz!!!";
			}
		}
		else {
			echo "Hiç reklam oluşturmamışsınız. Lütfen reklam oluşturduktan sonra kupon kodunuzu kullanınız.";
		}
	  	header("refresh:2; url=../reklamveren/kampanyalarimiz");
	}
	else {
		echo "Lütfen giriş yapınız. Bu bölüm üyelerimize özeldir!";
	  	header("refresh:2; url=../");
	}
?>
