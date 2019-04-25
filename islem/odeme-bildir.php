<meta charset="UTF-8">
<?php 
	include("../connect.php");
	$id = $_SESSION['id'];
	if($id){
		$reklamad = stripslashes(strip_tags(htmlspecialchars($_POST['reklamad'])));
		$hesapad = stripslashes(strip_tags(htmlspecialchars($_POST['hesapad'])));
		$odemeyapan = stripslashes(strip_tags(htmlspecialchars($_POST['odemeyapan'])));
		$kartno = stripslashes(strip_tags(htmlspecialchars($_POST['kartno'])));
		$odememiktari = stripslashes(strip_tags(htmlspecialchars( $_POST['odememiktari'])));
		$onay = 1;
		if($reklamad!=""){
			if($odemeyapan!=""){
				if($kartno!=""){
					if($odememiktari!=""){
						if($odememiktari>=10){
							if(is_numeric($odememiktari)){
								$tarih = date("Y-m-d");
								$sor = $conn->query("INSERT INTO odemeler(userid,reklamad,hesapad,odemeyapan,kartno,odememiktari,onay,odemetarihi) values('$id','$reklamad','$hesapad','$odemeyapan','$kartno','$odememiktari','$onay','$tarih')");
								if($sor){
									echo "Ödeme bildirimi başarılı.";
								}
								else {
									echo "Ödeme bildirimi başarısız.";
								}	
							}
							else {
								echo "Ödeme miktarınız sayı olmak zorundadır!";
							}
						}
						else {
							echo "Ödeme miktarınız en az 10 TL olmak zorundadır!";
						}
					}
					else {
						echo "Ödeme Miktarı Girilmemiş!";
					}
				}
				else {
					echo "Kart NO / İBAN girilmemiş!";
				}
			}
			else {
				echo "Ödeme yapan kişinin adı girilmemiş!";
			}
		}
		else {
			echo "Reklam adı girilmemiş!";
		}
		header("refresh: 1; url=../reklamveren/odemeler.php ");
	}
	else {
		echo "Giriş Yapın!";
		header("refresh: 1; url= ../giris.php");
	}
?>
