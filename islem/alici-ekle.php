<meta charset="utf-8">
<?php 
	include("../connect.php");
	if($_SESSION['id']){
		$hesapsahibi =  stripslashes(strip_tags(htmlspecialchars($_POST['hesapsahibi'])));
		$banka		 =  stripslashes(strip_tags(htmlspecialchars($_POST['banka'])));
		$kartno1     = 	stripslashes(strip_tags(htmlspecialchars($_POST['kartno1'])));
		$kartno2     =  stripslashes(strip_tags(htmlspecialchars($_POST['kartno2'])));
		$kartno3     =  stripslashes(strip_tags(htmlspecialchars($_POST['kartno3'])));
		$kartno4	 =  stripslashes(strip_tags(htmlspecialchars($_POST['kartno4'])));
		if($hesapsahibi!=""){
			if($banka!=""){
				if($kartno1!=""){
					if($kartno2!=""){
						if($kartno3!=""){
							if($kartno4!=""){
								if(is_numeric($kartno1)){
									if(is_numeric($kartno2)){
										if (is_numeric($kartno3)) {
											if (is_numeric($kartno4)) {
												$userid = $_SESSION['id'];
												$sorgu = $conn->query("SELECT * FROM alicibilgi WHERE userid = '$userid' ");
												$sayi = $sorgu->num_rows;
												if($sayi<2){
													$ekle = $conn->query("INSERT INTO alicibilgi(userid,hesapsahibi,banka,kartno1,kartno2,kartno3,kartno4) VALUES('$userid','$hesapsahibi','$banka','$kartno1','$kartno2','$kartno3','$kartno4')");
													if($ekle){
														echo "Alıcı bilgisi başarıyla eklendi.";
														header('refresh: 1; url=https://www.site.com/yayinci/alici-bilgilerim.php');	
													}
												}
												else {
													echo "Zaten alıcı bilgisi eklemişsiniz. Bilgilerinizi düzenlemek için admin ile iletişime geçiniz.";
													header('refresh: 2; url=https://www.site.com/yayinci/alici-bilgilerim.php');	
												}
											}
											else {
												echo "Kart numaranız sayı olarak algılanmamıştır. Lütfen kart numaranızı kontrol ediniz.";
											}
										}
										else {
											echo "Kart numaranız sayı olarak algılanmamıştır. Lütfen kart numaranızı kontrol ediniz.";
										}
									}
									else {
										echo "Kart numaranız sayı olarak algılanmamıştır. Lütfen kart numaranızı kontrol ediniz.";
									}
								}
								else {
									echo "Kart numaranız sayı olarak algılanmamıştır. Lütfen kart numaranızı kontrol ediniz.";
								}
							}
							else {
								echo "Lütfen kart numaranızın tamamını giriniz. Kart numaranız verilen alandan küçükse kart numaranızı verilen alanlara paylaştırabilirsiniz.";
							}
						}
						else {
							echo "Lütfen kart numaranızın tamamını giriniz.";				
						}
					}
					else {
						echo "Lütfen kart numaranızın tamamını giriniz.";				
					}
				}
				else {
					echo "Lütfen kart numaranızın tamamını giriniz.";				
				}
			}
			else {
				echo "Lütfen banka adını giriniz.";				
			}
		}
		else {
			echo "Lütfen hesap sahibinin adını giriniz.";
		}
		header('Refresh: 3; url=https://www.site.com/yayinci/alici-ekle');
	}
	else {
		echo "Lütfen Giriş Yapın";
		header('Refresh: 1; url=https://www.site.com/');
	}
?>
